<?php

namespace App\Services;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Http;

class Mailgun
{
    /**
     * Deliver a mailable to Iain through the Mailgun API.
     */
    public static function send(Mailable $mailable, string $subject): void
    {
        $domain = config('services.mailgun.domain');
        $html = $mailable->render();

        Http::withBasicAuth('api', config('services.mailgun.api_key'))
            ->asForm()
            ->post("https://api.mailgun.net/v3/{$domain}/messages", [
                'from' => 'Mailgun Sandbox <postmaster@'.$domain.'>',
                'to' => 'Iain Collins <iain@appinica.com>',
                'subject' => $subject,
                'text' => strip_tags($html),
                'html' => $html,
            ]);
    }
}
