<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedBackFormRequest;
use App\Jobs\FeedBackMessageJob;
use App\Mail\FeedbackMailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class FeedbackController extends Controller

{

    public function execute()
    {
        return view('feedBack');
    }

    public function send(FeedBackFormRequest $request)
    {
        $name = strip_tags($request->input('name'));
        $email = strip_tags($request->input('email'));
        $phone = strip_tags($request->input('phone'));
        $msg = strip_tags($request->input('message'));
        $site = 'G6-Store';
        $token = 'bot1563575064:AAFHXmuufEQhvFYMCDXZYVgV07Nt0DuW0AU';
        $chat_id = '-541357186';


        $txt = "У Вас новое сообщение от: " . "\n"
            . "Имя: " . $name . "\n"
            . "E-Mail: " . $email . "\n"
            . "Телефон: " . $phone . "\n"
            . "Сайт: " . $site . "\n"
            . "Сообщение: " .  $msg;


        fopen('https://api.telegram.org/'.$token.'/sendMessage?chat_id='.$chat_id.'&parse_mode=html&text='.rawurlencode($txt), 'r');

//        Mail::to('e.khrystenko1991@gmail.com')->send(new FeedbackMailController($name, $email, $phone, $msg));
        FeedBackMessageJob::dispatch($name, $email, $phone, $msg);

        return redirect()->back()->with(['success' => 'Message sent, thank you!']);
    }

}
