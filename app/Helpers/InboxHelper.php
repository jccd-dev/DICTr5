<?php

namespace App\Helpers;

use App\Models\CMS\Inbox;

class InboxHelper
{
    private string $name;
    private string $email;
    private string $sent_email_type;
    public function __construct(
        string $name,
        string $email,
        string $sent_email_type,
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->sent_email_type = $sent_email_type;

        Inbox::create([
            'user' => $this->name,
            'email' => $this->email,
            'intended_for' => $this->sent_email_type,
        ]);
    }
}
