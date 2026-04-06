<?php

use App\Mail\ContactFormMessage;
use App\Models\CvSection;
use App\Models\CvTrackingCode;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/cv-cover/{code}', function (string $code) {
    $trackingCode = CvTrackingCode::where('code', $code)->first();

    if (!$trackingCode || $trackingCode->isExpired()) {
        abort(404);
    }

    return Inertia::render('CvCover', [
        'url' => url("/{$code}"),
    ]);
})->name('cv-cover');

Route::get('/cover-letter', function () {
    return Inertia::render('CoverLetter');
})->name('cover-letter');

Route::get('/{code?}', function (?string $code = null) {
    $workExperience = null;

    if ($code) {
        $trackingCode = CvTrackingCode::where('code', $code)->first();

        if (!$trackingCode || $trackingCode->isExpired()) {
            abort(404);
        }

        $trackingCode->increment('hit_count');
        $trackingCode->update(['last_hit_at' => now()]);

        $workExperience = CvSection::where('key', 'experience')->first();
        $contactDetails = CvSection::where('key', 'contact')->first();
    }

    return Inertia::render('Home', [
        'workExperience' => $workExperience,
        'contactDetails' => $contactDetails ?? null,
    ]);
})->name('home');

Route::post('contact', function () {
    sleep(1);

    request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    $domain = config('services.mailgun.domain');

    $mailable = new ContactFormMessage(
        request('name'),
        request('email'),
        request('message')
    );
    $html = $mailable->render();
    $text = strip_tags($html);

    Http::withBasicAuth('api', config('services.mailgun.api_key'))
        ->asForm()
        ->post("https://api.mailgun.net/v3/{$domain}/messages", [
            'from' => 'no-reply@iainco.com <mailgun@' . $domain . '>',
            'to' => 'iain@appinica.com',
            'subject' => 'iainco.com Contact Form Message',
            'text' => $text,
            'html' => $html,
        ]);

    return back();
})->name('contact');
