<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Twilio\Rest\Client;
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

    public function sendsms()
    {   

        $sid = "AC64536da47842a11729e02da2602762e0"; // Your Account SID from www.twilio.com/console
        $token = "ed1a349b5535fbdd79209e54e374a433"; // Your Auth Token from www.twilio.com/console

        $client = new Client($sid, $token);
        $message = $client->messages->create(
        '+22890794496', // Text this number
        [
            'from' => '+19378844832', // From a valid Twilio number
            'body' => 'Ceci vient de mon application Ekue Sky!'
        ]
        );

        print $message->sid;

    }

}


