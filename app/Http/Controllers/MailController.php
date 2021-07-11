<?php

namespace App\Http\Controllers;

use App\Mail\ProfileUpdateMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function sendWelcomeEmail($first_name, $last_name,$email)
    {

        $details = ['first_name'=>$first_name, 'last_name'=>$last_name];

        Mail::to($email)->send(new WelcomeMail($details));
    }

    public function sendProfileUpdateEmail($first_name, $last_name,$email)
    {
        $details = ['first_name'=>$first_name, 'last_name'=>$last_name];
        Mail::to($email)->send(new ProfileUpdateMail($details));
    }
}
