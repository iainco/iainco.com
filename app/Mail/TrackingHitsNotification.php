<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class TrackingHitsNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Collection $trackingCodes
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'CV Tracking Hits',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tracking-hits-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
