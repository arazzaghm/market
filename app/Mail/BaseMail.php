<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

abstract class BaseMail extends Mailable
{
    public $fromEmail = "noreply@market.loc";
    public $fromName = "Noreply Support";
}
