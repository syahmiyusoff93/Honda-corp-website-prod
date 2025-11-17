<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function __invoke($shortcode)
    {
        return view('model.landing');
    }

}
