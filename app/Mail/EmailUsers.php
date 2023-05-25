<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailUsers extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @param array $data elements:
     *               - name => string complete name
     *               - venue => string
     *               - exam_sched => string exam schedule
     *               For Failed:
     *               - part1 => string percentage
     *               - part2 => string percentage
     *               - part3 => string percentage,
     * @param bool $passed if pass or failed
     */
    public function __construct(
        protected bool $passed,
        protected array $data
    )
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Diagnostic Exam Result',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'layouts.email.exam-result',
            with: [
                'data' => $this->data,
                'passed' => $this->passed,
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
        return [];
    }
}
