<?php

use App\Models\CvTrackingCode;
use App\Services\CvPdfGenerator;
use Illuminate\Support\Facades\Http;
use Inertia\Testing\AssertableInertia;

function trackingCode(array $attributes = []): CvTrackingCode
{
    return CvTrackingCode::create(array_merge([
        'code' => 'abcde',
        'entity' => 'Test Co',
        'expires_at' => now()->addDays(30),
    ], $attributes));
}

test('the home page only exposes the tracking code when one is used', function () {
    trackingCode();

    $this->get('/')->assertInertia(fn (AssertableInertia $page) => $page->where('code', null));
    $this->get('/abcde')->assertInertia(fn (AssertableInertia $page) => $page->where('code', 'abcde'));
});

test('a valid code redirects to the coded home page', function () {
    trackingCode();

    $this->from('/')
        ->post('/cv-code', ['code' => ' ABCDE '])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/abcde');
});

test('an unknown or expired code is rejected', function () {
    trackingCode(['code' => 'old01', 'expires_at' => now()->subDay()]);

    $this->from('/')->post('/cv-code', ['code' => 'nope1'])
        ->assertRedirect('/')
        ->assertSessionHasErrors('code');

    $this->from('/')->post('/cv-code', ['code' => 'old01'])
        ->assertRedirect('/')
        ->assertSessionHasErrors('code');
});

test('requesting a code sends an email through mailgun', function () {
    Http::fake();

    $this->from('/')
        ->post('/cv-request', ['name' => 'Jane Doe', 'email' => 'jane@example.com'])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');

    Http::assertSent(fn ($request) => str_contains($request->url(), 'api.mailgun.net')
        && $request['subject'] === 'iainco.com CV Code Request'
        && str_contains($request['html'], 'Jane Doe')
        && str_contains($request['html'], 'jane@example.com'));
});

test('a code request needs a name and a valid email', function () {
    Http::fake();

    $this->from('/')
        ->post('/cv-request', ['name' => '', 'email' => 'not-an-email'])
        ->assertRedirect('/')
        ->assertSessionHasErrors(['name', 'email']);

    Http::assertNothingSent();
});

test('the cv download serves the generated pdf', function () {
    trackingCode();

    $pdf = tempnam(sys_get_temp_dir(), 'cv').'.pdf';
    file_put_contents($pdf, '%PDF-1.4 test');

    $this->mock(CvPdfGenerator::class)
        ->shouldReceive('path')->once()->with('abcde')->andReturn($pdf);

    $this->get('/cv-download/abcde')
        ->assertOk()
        ->assertDownload('Iain Collins CV.pdf');
});

test('the cv download falls back to the print page when generation fails', function () {
    trackingCode();

    $this->mock(CvPdfGenerator::class)
        ->shouldReceive('path')->andThrow(new RuntimeException('Chrome is not installed'));

    $this->get('/cv-download/abcde')->assertRedirect('/cv-pdf/abcde');
});

test('the cv download requires a valid code', function () {
    trackingCode(['code' => 'old01', 'expires_at' => now()->subDay()]);

    $this->get('/cv-download/nope1')->assertNotFound();
    $this->get('/cv-download/old01')->assertNotFound();
});
