<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user; //passing data to verification_email.blade.php
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         return $this
            ->subject(config('app.name')." Account Verification")
            ->view('mail.verification_email');
     }
}
