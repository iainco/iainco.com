<?php

use App\Mail\ContactFormMessage;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
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

/*
Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
*/
