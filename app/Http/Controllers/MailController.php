<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function sendEmail()
    {
        $details = ['title'=>'Mail from Time Tracker',
            'body'=> 'This is first testing'];

        Mail::to("alex.neville@icloud.com")->send(new WelcomeMail($details));
        return "Email Sent";
    }
}
