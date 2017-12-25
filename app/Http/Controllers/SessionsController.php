<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        // $tes t = "test";
        // dd(request(['email', 'password']));
        // attempt to auth the user
        if(! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your password'
            ]);
        }
        return redirect()->home();
        // if not redirect back

        // if so, sign them in

        // redirect to home page
    }
    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
