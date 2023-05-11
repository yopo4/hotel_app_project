<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function send($name, $senderEmail, $receiverEmail, $message)
    {
        $contactName = $name;
        $contactEmail = $senderEmail;
        $contactMessage = $message;

        $data = array('name'=>$contactName, 'email'=>$contactEmail, 'message'=>$contactMessage);
        Mail::send('template.mail', $data, function($message) use ($contactEmail, $contactName, $receiverEmail)
        {
            $message->from($contactEmail, $contactName);
            $message->to($receiverEmail, 'Super')->subject('Mail for admin\'s validation');
        });
        return redirect()->route('waiting')->with('');
    }
}
