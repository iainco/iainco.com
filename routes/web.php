<?php

use App\Mail\ContactFormMessage;
use App\Mail\CvCodeRequest;
use App\Models\CvSection;
use App\Models\CvTrackingCode;
use App\Services\CvPdfGenerator;
use App\Services\Mailgun;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
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

Route::get('/cv-pdf/{code}', function (string $code) {
    $trackingCode = CvTrackingCode::where('code', $code)->first();

    if (!$trackingCode || $trackingCode->isExpired()) {
        abort(404);
    }

    $workExperience = CvSection::where('key', 'experience')->first();
    $contactDetails = CvSection::where('key', 'contact')->first();
    $education = CvSection::where('key', 'education')->first();

    if (!$workExperience) {
        abort(404);
    }

    return Inertia::render('CvPdf', [
        'workExperience' => $workExperience,
        'contactDetails' => $contactDetails,
        'education' => $education,
    ]);
})->name('cv-pdf');

Route::get('/cv-download/{code}', function (string $code, CvPdfGenerator $generator) {
    $trackingCode = CvTrackingCode::where('code', $code)->first();

    if (!$trackingCode || $trackingCode->isExpired()) {
        abort(404);
    }

    try {
        $path = $generator->path($trackingCode->code);
    } catch (Throwable $e) {
        report($e);

        // Chrome is unavailable or rendering failed: fall back to the print-friendly page.
        return redirect()->route('cv-pdf', $trackingCode->code);
    }

    return response()->download($path, config('cv.pdf.filename'));
})->name('cv-download');

Route::get('/{code?}', function (?string $code = null) {
    $trackingCode = null;
    $workExperience = null;
    $contactDetails = null;
    $education = null;

    if ($code) {
        $trackingCode = CvTrackingCode::where('code', $code)->first();

        if (!$trackingCode || $trackingCode->isExpired()) {
            abort(404);
        }

        $trackingCode->increment('hit_count');
        $trackingCode->update(['last_hit_at' => now()]);

        $workExperience = CvSection::where('key', 'experience')->first();
        $contactDetails = CvSection::where('key', 'contact')->first();
        $education = CvSection::where('key', 'education')->first();
    }

    return Inertia::render('Home', [
        'code' => $trackingCode?->code,
        'workExperience' => $workExperience,
        'contactDetails' => $contactDetails,
        'education' => $education,
    ]);
})->name('home');

Route::post('contact', function () {
    sleep(1);

    request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    Mailgun::send(
        new ContactFormMessage(request('name'), request('email'), request('message')),
        'iainco.com Contact Form Message'
    );

    return back();
})->name('contact');

Route::post('cv-code', function () {
    request()->validate([
        'code' => 'required|string|max:20',
    ]);

    $trackingCode = CvTrackingCode::where('code', Str::lower(trim(request('code'))))->first();

    if (!$trackingCode || $trackingCode->isExpired()) {
        return back()->withErrors(['code' => 'That code is not valid or has expired.']);
    }

    return redirect()->route('home', $trackingCode->code);
})->middleware('throttle:10,1')->name('cv-code');

Route::post('cv-request', function () {
    request()->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:255',
    ]);

    Mailgun::send(
        new CvCodeRequest(request('name'), request('email')),
        'iainco.com CV Code Request'
    );

    return back();
})->middleware('throttle:5,1')->name('cv-request');
