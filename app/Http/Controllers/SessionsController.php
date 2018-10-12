<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct() {

        $this->middleware('guest', ['except' => 'destroy']);

    }

    public function create() {

        return view('sessions.create');

    }

    public function destroy() {

        auth()->logout();

        session()->flash('message', 'You have successfully logged out');

        return redirect('/');

    }

    public function store(Request $request) {

        // $credentials = $request->only('email', 'password');

        // if (!Auth::attempt($credentials)) {
        //     // Authentication did not pass...

        //     session()->flash('message', 'Incorrect credentials. Please try again ');

        //     return back();
        // }

        if (! auth()->attempt(request(['email', 'password']))) {

            return back()->withErrors([

                'message' => 'Please check your credentials and try again.'

            ]);
        }
        
        session()->flash('message', 'Welcome back '.auth()->user()->name);

        return redirect('/');

    }
}
