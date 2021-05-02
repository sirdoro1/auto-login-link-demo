<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Notifications\AutoLoginLink;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->middleware(['auth','web']);

        $this->user = $user;
    }


    public function index()
    {
        $users = $this->user->get(['name','email','id','created_at']);
        return view('users.index',[
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        $data = [
                "name" => e($request->name),
                "email" => $request->email,
                "password" => bcrypt($request->password),
        ];

        $user = $this->user->create($data);

        $user->autoLink()->create([
            'token' => Str::random(50),
        ]);

        $user->notify(new AutoLoginLink($user->autoLink->token));

        return redirect('/user');
    }
}
