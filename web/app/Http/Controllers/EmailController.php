<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\ResendFailedEmails;

class EmailController extends Controller
{
    public function triggerResendEmails()
    {
        ResendFailedEmails::dispatch();
        return response()->json(['message' => 'Resend email job dispatched successfully!']);
    }
}
