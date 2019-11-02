<?php

namespace App\Mail\User;

use App\Mail\BaseMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeletedPostMail extends BaseMail
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->fromEmail, $this->fromName)
            ->markdown('emails.user.deleted-post');
    }
}
