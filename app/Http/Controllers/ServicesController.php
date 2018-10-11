<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;

class ServicesController extends Controller
{
    public function __construct() {

        $this->middleware('auth')->except(['home','index', 'show']);
    }

    public function index() {

        $services = Service::latest()->get();

        return view('services.index', compact('services'));
    }

    public function show(Service $service) {

        return view('services.show', compact('service'));
    }

    public function create() {
        
        return view('services.create');

    }

    public function store() {

        $this->validate(request(), [
            'job_title' => 'required',
            'nb_yrs_exp' => 'required',
            'body' => 'required',
        ]);

        Service::create([
            'job_title' => request('job_title'),
            'nb_yrs_exp' => request('nb_yrs_exp'),
            'body' => request('body'),
            'user_id' => auth()->user()->id
        ]);
        
        session()->flash('message', 'New HandyMan service created!');

        return redirect('/services');
    }

    public function edit(Service $service) {

        return view('services.edit', compact('service'));

    }

    public function update(Request $request, Service $service) {

        $service->update($request->all());

        session()->flash('message', 'HandyMan service updated');

        return redirect('/dashboard');

    }

    public function delete($id) {
        
        $service = Service::find($id)->delete();

        session()->flash('message', 'HandyMan service deleted!');

        return redirect('/dashboard');
        
    }
}
