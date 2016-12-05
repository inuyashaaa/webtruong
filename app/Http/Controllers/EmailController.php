<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendMail()
    {
        $data[] = ['name' => 'Manh'];
        Mail::send('email.index', $data, function ($message) {
            $message->from('uetmail.web@gmail.com', 'Laravel');
            $message->to('ngonhuttruong0110@gmail.com','university of engineering and technology')->subject('Thông báo!');
        });
    }
}
