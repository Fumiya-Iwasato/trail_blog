<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $title;
    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {   
        $this->name = $inputs['name'];
        $this->email = $inputs['email'];
        $this->title = $inputs['title'];
        $this->message  = $inputs['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('fmy.nmh@gmail.com')
            ->subject('自動送信メール')
            ->view('mail')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'title' => $this->title,
                'message'  => $this->message,
            ]);
    }
}