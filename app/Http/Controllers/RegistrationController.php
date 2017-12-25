<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Foundation\Auth\User;
// use App\User;
// use App\Mail\Welcome;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    public function store(RegistrationRequest $request)
    {
        //Validate the form
        // $this->validate(request(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed'
        // ]);

        //create and save user
            $request->persist();

            session()->flash('message', 'Thanks so much for signing up!');
        // $user = User::create(request(['name', 'email', 'password']));
        // // sign them in
        // auth()->login($user);
        // //redirect to home
        // Mail::to($user)->send(new Welcome($user));
        return redirect('/');
    }
}
