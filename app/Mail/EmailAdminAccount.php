<?php

namespace App\Mail;

use App\Helpers\InboxHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailAdminAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @param array $data - contains:
     *              name => string
     *              email => string
     *              password => string
     *              url => string
     *              intended_for => string
     */
    public function __construct(
        protected array $data
    )
    {
        $inbox = new InboxHelper($data['name'], $data['email'], $data['intended_for']);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'DICTR5 CamSur Account Credential',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'layouts.email.admin-account',
            with: ['data' => $this->data],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
