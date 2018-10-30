<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $confirmation_code;
    public function __construct($confirmation_code)
    {
        $this->confirmation_code=$confirmation_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hageribrahim04@gmail.com')->view('emails.verify')
            ->with('confirmation_code',$this->confirmation_code);
    }
}
