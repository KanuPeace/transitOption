<?php

namespace App\Http\Controllers\Company\Web;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Http\Request;

class VehicleImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $vehicle = Vehicle::findorfail($id);
        $images = VehicleImage::where("vehicle_id", $id)->get();
        return view("company.vehicles.images.index", compact("vehicle", "images"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "vehicle_id" => "required|alpha_num",
            "image" => "required|image"
        ]);

        $count = VehicleImage::where("vehicle_id", $data["vehicle_id"])->count();
        if ($count >= 3) {
            return back()->with("error_msg", "Sorry, you cant upload more than 3 images per vehicle!");
        }

        $data["image"] = resizeImageandSave($request->file("image"), $this->companyVehicleImagePath, 'local', 1200, 700);
        VehicleImage::create($data);
        return back()->with("success_msg", "Image created successfully!");
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
    public function edit(VehicleImage $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleImage $image)
    {
        $data = $request->validate([
            // "vehicle_id" => "required|alpha_num",
            "image" => "required|image"
        ]);
        $data["image"] = resizeImageandSave($request->file("image"), $this->companyVehicleImagePath, 'local', 1200, 700);
        deleteFileFromPrivateStorage($this->companyVehicleImagePath . "/" . $image->image);
        $image->update($data);
        return back()->with("success_msg", "Image updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleImage $image)
    {
        deleteFileFromPrivateStorage($image->getImagePath());
        $image->delete();
        return back()->with("success_msg", "Image delete successfully!");
    }
}
