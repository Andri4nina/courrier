<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendEmail () {
        $toEmail = "raherinotoavinasa@gmail.com";
        $message = "Ceci est un test";
        $subject = "Le voici le subject";

        $response = Mail::to($toEmail)->send(new SendMail($message, $subject));

    }
}
