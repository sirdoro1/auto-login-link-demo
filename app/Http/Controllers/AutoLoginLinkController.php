<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoLoginLinkController extends Controller
{
    public function __construct()
    {

    }

    public function loginLinkAttempt($link)
    {
        dd($link);
    }
}
