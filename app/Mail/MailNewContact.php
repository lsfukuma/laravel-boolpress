<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNewContact extends Mailable
{
    use Queueable, SerializesModels;

    public $newMessage;
    public function __construct($_newMessage)
    {
        $this->newMessage = $_newMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact');
    }
}
