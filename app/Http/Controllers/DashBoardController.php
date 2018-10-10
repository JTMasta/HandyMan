<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashBoardController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        $user_id = auth()->user()->id;
        $services = User::find($user_id)->services;

        // return $services[0]->job_title;

        return view('dashboard.index', compact('services'));

    }
}
