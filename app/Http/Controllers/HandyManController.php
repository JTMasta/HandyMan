<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HandyManController extends Controller
{
    public function index(Request $request) {

        $handyman_title = $request->input('job_title');

        // dd($handyman_title);

        $handymen = DB::table('services')
                                ->where([
                                    ['job_title', '=', $handyman_title],
                                ])->get();
        $distances = [];
        $destinationsArr = [];
        $origin = Auth::user()->only(['street_address','city', 'province', 'country', 'zip']);
        $origin = implode(" ", array_values($origin));
        
        $from = urlencode($origin);
        $destinations = DB::table('users')->select('street_address','city', 'province', 'country', 'zip')->where('role', '=', 'HandyMan')->get();
        // dd(implode(" ", get_object_vars($destinations[0])));
        foreach($destinations as $destination) {
            array_push($destinationsArr, implode(" ", get_object_vars($destination)));
        }
        // dd($destinationsArr);
        foreach($destinationsArr as $destination) {
            $to = urlencode($destination);
            $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&key=AIzaSyCdvFqXTGyqAG7njPUCJ441WeugMW5jafE");
            $data = json_decode($api);
            array_push($distances, $data->rows[0]->elements[0]->distance->text);
        }
        for($i = 0; $i < sizeof($handymen); $i++) {
            $handymen[$i]->distance = $distances[$i];
            $handymen[$i]->city = $destinations[$i]->city;
        }
        
        return view('handyman.results', compact('handymen'));
    }

    public function search() {

        return view('handyman.search');

    }
}
