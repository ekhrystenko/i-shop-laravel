<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMailController extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $phone;
    protected $msg;


    public function __construct($name, $email, $phone, $msg)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->msg = $msg;
    }

    public function build()
    {
        return $this->view('mail.feedbackMail',
        [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'msg' => $this->msg
        ])->subject('У Вас новое сообщение с сайта');
    }
}
