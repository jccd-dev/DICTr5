<?php

namespace App\Mail;

use App\Helpers\InboxHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class SendTranscript extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @param array $data : content:
     *                  - name => string
     *                  - email => string
     *                  - exam_schedule => string
     *                  - file_location => string : gets from storage, example value is 'public/sample_transcript.pdf'
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
            subject: 'ICT Diagnostic Exam Transcript',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'layouts.email.send-transcript',
            with: [
                'data' => $this->data,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromStorage($this->data['file_location']),
        ];
    }
}
