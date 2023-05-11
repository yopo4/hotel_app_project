<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function send($email)
    {
        // $contactName = Input::get('name');
        // $contactEmail = Input::get('email');
        // $contactMessage = Input::get('message');

        // $data = array('name'=>$contactName, 'email'=>$contactEmail, 'message'=>$contactMessage);
        // Mail::send('template.mail', $data, function($message) use ($contactEmail, $contactName)
        // {
        //     $message->from($contactEmail, $contactName);
        //     $message->to('info@aallouch.com', 'myName')->subject('Mail via aallouch.com');
        // });
    }
}
