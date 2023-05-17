<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    private $superEmail;

    public function __construct(string $superEmail = "")
    {
        $this->superEmail = $superEmail;
    }

    public function index($receiverEmail)
    {
        $this->superEmail = $receiverEmail;
        return view('auth.email_form', compact('receiverEmail'));
    }

    public function Send(Request $request)
    {
        $toEmail = $this->superEmail;
        $contactName = $request->input('name');
        $contactEmail = $request->input('sender-email');
        $contactMessage = $request->input('message');

        if ($contactMessage = "") {
            return redirect()->back()->with('empty', 'This field is required.');
        }
        $data = array('name' => $contactName, 'email' => $contactEmail, 'message' => $contactMessage);
        Mail::send('emails.activation', $data, function($message) use ($toEmail) {
            $message->to($toEmail)->subject('Avtivation');
        });

        return redirect()->route('waiting')->with('');
    }
}
