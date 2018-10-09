<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function create() {

    
        return view('registration.create');

    }

    public function createHandyMan() {

        return view('registration.createHandyMan');

    }

    public function store() {
        $current_url = url()->previous();
        $role = 'Customer';
        if($current_url === "http://handyman.test/register/handyman") {
            $role = 'HandyMan';
        } else {
            $role = "Customer";
        }
        // Validate
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        // Create user
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'role' => $role
            ]);
        // Sign them in
        auth()->login($user);
        // Redirect back to home
        return redirect('/');
    }

}
