<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $details = [
            'title' => 'Mail From Website Test Laravel',
            'body' => 'This is for testing mail using laravel'
        ];
        Mail::to('moustafaadel019@gmail.com')->send(new TestMail($details));
        return 'Mail Sent';
    }
}
