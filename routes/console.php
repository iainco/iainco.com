<?php

use App\Mail\TrackingHitsNotification;
use App\Models\CvTrackingCode;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $trackingCodes = CvTrackingCode::where('last_hit_at', '>=', now()->subHours(4))->get();

    if ($trackingCodes->isEmpty()) {
        return;
    }

    $domain = config('services.mailgun.domain');

    $mailable = new TrackingHitsNotification($trackingCodes);
    $html = $mailable->render();
    $text = strip_tags($html);

    Http::withBasicAuth('api', config('services.mailgun.api_key'))
        ->asForm()
        ->post("https://api.mailgun.net/v3/{$domain}/messages", [
            'from' => 'Mailgun Sandbox <postmaster@' . $domain . '>',
            'to' => 'Iain Collins <iain@appinica.com>',
            'subject' => 'CV Tracking Hits',
            'text' => $text,
            'html' => $html,
        ]);
})->everyFourHours()->name('cv-tracking-hits-notification');
