<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    //



    public function sendmail()
    {
        # code...
        Mail::to('test@mail.tg')->send(new TestMail());
        return 'Mail successfully send';
    }

}


