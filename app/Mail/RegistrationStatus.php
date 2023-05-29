<?php

namespace App\Mail;

use App\Helpers\InboxHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @param int $status : 1 - Disapprove
     *                      2 - Incomplete Requirements
     *                      4 - Approve
     * @param array $data - contains:
     *                      - name = > string
     *                      - email = > string
     *                      - intended_for = > string
     */
    public function __construct(
        protected int $status,
        protected array $data,
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
            subject: 'ICT Diagnostic Exam Application Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'layouts.email.application-status',
            with: ['status' => $this->status]
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
