<?php

namespace App\Http\Controllers;

use App\Mail\TestSendingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function index()
    {
        Mail::to('rayydna14@gmail.com')->send(new TestSendingEmail());
    }
}
