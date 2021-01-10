<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function vehicles(Request $request){
        $vehicles = Vehicle::get();
        return view("web.pages.travel.vehicles" , compact('vehicles'));
    }

    public function booking($code){
        $vehicle = Vehicle::where("code" , $code)->firstOrFail();
        return view("web.pages.travel.booking" , compact('vehicle'));
    }
}
