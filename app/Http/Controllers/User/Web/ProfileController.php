<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\NextOfKin;
use App\Models\State;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function complete(Request $request){
        
        $user = auth()->user();
        $statuses = getUserProfileStatuses($user);
        $currentStatus = getUserProfileStatuses($user , true);

        if(is_bool($currentStatus) && $currentStatus == true){
            return "gg";
        }

        $countries = Country::orderby('name')->get();
        $states = !empty($user->country_id) ?  State::where("country_id" , $user->country_id)->orderby('name')->get() : [];
        $cities = !empty($user->state) ?  City::where("state_id" , $user->state_id)->orderby('name')->get() : [];
        
        // dump($currentStatus);
        // dd($statuses);

        if($request->getMethod() == "GET"){
            return view("user.profile.complete" , compact("statuses" , "currentStatus" , "user" , "countries" , "states" , "cities"));
        }

        if($request->status_key == "user_profile"){
            $data = $request->validate([
                "country_id" => "required|string",
                "state_id" => "required|string",
                "city_id" => "required|string",
                "lga_id" => "nullable|string",
                "phone" => "required|string",
                "gender" => "required|string",
                "address" => "required|string",
            ]);
            $user->update($data);
        }

       return redirect()->route("user.dashboard");

    }


    public function next_of_kin(Request $request){
        
        $user = auth()->user();

        if($request->status_key == "next_kin"){

            $nextKin = NextOfKin::where("user_id" , $user->id)->first();
            $data = $request->validate([
                "name" => "required|string",
                "email" => "nullable|email|unique:next_of_kin,email",
                "phone" => "required|string|unique:next_of_kin,phone",
                "gender" => "required|string",
                "address" => "required|string",
            ]);
            $data["user_id"] = $user->id;
            if(empty($nextKin)){
                NextOfKin::create($data);
            }
            else{
                $nextKin->update($data);
            }
        }

       return redirect()->route("user.dashboard");

    }


}
