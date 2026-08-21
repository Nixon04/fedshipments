<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GeneralPublicMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */  

     public string $content;
     public string $toState;
     public ?string $fromState;
     public string $subjectState;
    public function __construct($content, $toState, $fromState, $subjectState)
    {
        $this->content = $content;
        $this->toState = $toState;
        $this->fromState = $fromState;
        $this->subjectState = $subjectState;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mailer',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.general-public-mailer',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
