<?php

namespace App\Http\Controllers\Company\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\Models\Terminal;
use App\Models\Vehicle;
use App\Models\VehicleSeatStyle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::where("company_id", company()->id)->paginate(25);
        return view("company.vehicles.index", compact('vehicles'));
    }


    public function factoryStepsOne(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $vehicle =  Vehicle::findorfail($id);
        } else {
            $vehicle = new Vehicle();
        }
        $terminals = Terminal::where("company_id", company()->id)->orderby("name")->get();
        $step = $request->step ?? 0;
        $requestData = collect($request->all());
        $requestData = encrypt($requestData);
        return view("company.vehicles.create", compact('vehicle', "terminals", "step", "requestData"));
    }


    public function postFactoryStepsOne(VehicleRequest $request)
    {
        // dd($request->all());
        $validatedData = $request->validated();
        $validatedData["id"] = $request["id"];
        // dd($validatedData);
        $key = companyVehicleSessionDataKey();
        $request->session()->put($key, $validatedData);
        return redirect()->route("company.vehicles.factory.steps.two");
    }

    public function factoryStepsTwo(Request $request)
    {
        $key = companyVehicleSessionDataKey();
        $requestData = $request->session()->get($key);
        $id = $requestData["id"];
        if (!empty($id)) {
            $vehicle =  Vehicle::findorfail($id);
        } else {
            $vehicle = new Vehicle();
        }
        $step = 2;
        $requestData = encrypt($requestData);
        return view("company.vehicles.create", compact('vehicle', "step", "requestData"));
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $prevData = decrypt($input["data"]);
        unset($input["_token"]);
        unset($input["data"]);
        $input = array_merge($prevData, $input);
        $req = new VehicleRequest($input);
        $data = $req->validate($req->rules(), $input);

        $more = $request->validate([
            "width" => "required|string",
            "empty_seats" => "nullable|string",
            "length" => "required|string",
        ]);

        $vehicleSeatStyle = VehicleSeatStyle::where($more)->first();
        if (empty($vehicleSeatStyle)) {
            $more["user_id"] = auth()->id();
            $more["use_count"] = 1;
            $vehicleSeatStyle = VehicleSeatStyle::create($more);
        }
        $data["code"] = $this->generateCode($data["name"]);
        $data["company_id"] = company()->id;
        $data["vehicle_seat_style_id"] = $vehicleSeatStyle->id;
        $data["no_of_seats"] = getSeatNumber($vehicleSeatStyle);
        Vehicle::create($data);
        return redirect()->route("company.vehicles.index")->with("success_msg", "Vehicle added successfully!");
    }

    private function generateCode($name)
    {
        $code = generateNameCode($name);
        $check = Vehicle::where("code", $code)->count();
        if ($check > 0) {
            $this->generateCode($name);
        }
        return $code;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request["id"] = $id;
        return $this->factoryStepsOne($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $prevData = decrypt($input["data"]);
            $id = $prevData["id"];
            $req = new VehicleRequest($prevData);
            $data = $req->validate($req->rules(), $prevData);
            $more = $request->validate([
                "width" => "required|string",
                "empty_seats" => "nullable|string",
                "length" => "required|string",
            ]);

            $vehicleSeatStyle = VehicleSeatStyle::where($more)->first();
            // dd($more);
            if (empty($vehicleSeatStyle)) {
                $more["user_id"] = auth()->id();
                $more["use_count"] = 1;
                $vehicleSeatStyle = VehicleSeatStyle::create($more);
            }

            $data["vehicle_seat_style_id"] = $vehicleSeatStyle->id;
            $data["no_of_seats"] = getSeatNumber($vehicleSeatStyle);

            Vehicle::findorfail($id)->update($data);
            DB::commit();
            return redirect()->route("company.vehicles.index")->with("success_msg", "Vehicle updated successfully!");
        } catch (Exception $e) {
            DB::rollback();
            logError($e);
            return redirect()->route("company.vehicles.index")->with("error_msg", "An error occurred");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Terminal::findorfail($id)->delete();
        return redirect()->route("company.terminals.index")->with("success_msg", "Terminal deleted successfully!");
    }
}
