<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class PostsController extends Controller
{
    public function storeupdateprofile()
    {
      dd(request()->all());
    }
}
