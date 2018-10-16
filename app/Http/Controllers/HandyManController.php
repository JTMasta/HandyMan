<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandyManController extends Controller
{
    public function index(Request $request) {

        $handyman_title = $request->input('job_title');

        // dd($handyman_title);

        $handymen = DB::table('handy_men')
                                ->where([
                                    ['job_title', '=', $handyman_title],
                                ])->get();

        $cityArr = [];
        $distances = [];
        $origin = '1640 Trepanier Brossard QC Canada';
        $from = urlencode($origin);
        $cities = DB::table('handy_men')->select('city')->where([['job_title', '=', $handyman_title],])->get();
        foreach($cities as $city) {
            array_push($cityArr,$city->city);
        }
   
        foreach($cityArr as $city) {
            $to = urlencode($city);
            $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&key=AIzaSyCdvFqXTGyqAG7njPUCJ441WeugMW5jafE");
            $data = json_decode($api);
            array_push($distances, $data->rows[0]->elements[0]->distance->text);
        }
        for($i = 0; $i < sizeof($handymen); $i++) {
            $handymen[$i]->distance = $distances[$i];
        }
      
        return view('handyman', compact('handymen'));
    }

    public function search() {

        return view('search');

    }
}
