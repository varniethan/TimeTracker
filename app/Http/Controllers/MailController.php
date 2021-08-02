<?php

namespace App\Http\Controllers;

use App\Mail\EmployeeCreatedMail;
use App\Mail\OrganisationCreatedMail;
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

    public function sendOrganisationCreatedEmail($first_name, $last_name, $email,$organisation_name)
    {
        $details = ['first_name'=>$first_name, 'last_name'=>$last_name, 'organisation_name'=>$organisation_name];
        Mail::to($email)->send(new OrganisationCreatedMail($details));
    }

    public function sendEmployeeCreatedEmail($first_name, $last_name, $email, $password)
    {
        $details = ['first_name'=>$first_name, 'last_name'=>$last_name, 'password'=>$password];
        Mail::to($email)->send(new EmployeeCreatedMail($details));
    }

}
