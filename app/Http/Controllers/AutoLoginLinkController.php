<?php

namespace App\Http\Controllers;

use App\Models\AutoLoginLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoLoginLinkController  extends Controller
{

    protected $autoLink;

    public function __construct(AutoLoginLink $autoLink)
    {
        $this->middleware(['web']);
        $this->autoLink = $autoLink;
    }

    public function loginLinkAttempt($token)
    {
        $link = $this->autoLink->whereToken($token)->first();

        // Auth::login($link->user);
        Auth::login($link->user);

        if (Auth::check()) {
            return redirect()->intended('/');
        }else{
            dd(Auth::login($link->user));
        }
    }
}
