<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $user)
    {
        $this->name = $user->name;
        $this->msg = $user->message;
    }
    
    /**
     * Build the message.
     * 
     * @return $this
     */ 
    public function build()
    {   /* when the from() method is omited the value of MAIL_FROM_ADDRESS and MAIL_FROM_NAME parameters in your .env file 
        will be used as the from email and Sender name respectively */

        return $this->subject("Welcome to Slat Team")
                    ->view('email.confirmation')
                    ->with(['date' => date('y-m-d')])
                    ->attach(storage_path(). '/letters/welcome-letter.pdf', ['as' => 'WelcomeDev.pdf', 'mime' => 'application/pdf']);
    }
}
