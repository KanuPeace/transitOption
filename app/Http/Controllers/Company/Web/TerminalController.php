<?php

namespace App\Http\Controllers\Company\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminals = Terminal::paginate(25);
        return view("company.terminals.index" , compact('terminals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = auth()->user()->company;
        $terminal = new Terminal();
        $countries = Country::orderby('name')->get();
        $states = !empty($terminal->country_id) ?  State::where("country_id" , $terminal->country_id)->orderby('name')->get() : [];
        $cities = !empty($terminal->state) ?  City::where("state_id" , $terminal->state_id)->orderby('name')->get() : [];
        return view("company.terminals.create" , compact('terminal' , 'company', "countries" , "states" , "cities"));
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
            "company_id" => "required|string|exists:companies,id",
            "name" => "required|string",
            "email" => "nullable|email",
            "phones" => "required|string",
            "address" => "required|string",
            "country_id" => "required|string",
            "state_id" => "required|string",
            "city_id" => "nullable|string",
            "lga_id" => "nullable|string",
        ]);

        $data["code"] = $this->generateCode($data["name"]);
        Terminal::create($data);
        return redirect()->route("company.terminals.index")->with("success_msg" , "Terminal added successfully!");
    }

    private function generateCode($name){
        $code = generateNameCode($name);
        $check = Terminal::where("code" , $code)->count();
        if($check > 0){
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
    public function edit($id)
    {
        $company = auth()->user()->company;
        $terminal = Terminal::findorfail($id);
        $countries = Country::orderby('name')->get();
        $states = !empty($terminal->country_id) ?  State::where("country_id" , $terminal->country_id)->orderby('name')->get() : [];
        $cities = !empty($terminal->state) ?  City::where("state_id" , $terminal->state_id)->orderby('name')->get() : [];
        return view("company.terminals.edit" , compact('terminal' , 'company', "countries" , "states" , "cities"));
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
        $data = $request->validate([
            "name" => "required|string",
            "email" => "nullable|email",
            "phones" => "required|string",
            "address" => "required|string",
            "country_id" => "required|string",
            "state_id" => "required|string",
            "city_id" => "nullable|string",
            "lga_id" => "nullable|string",
        ]);

        Terminal::findorfail($id)->update($data);
        return redirect()->route("company.terminals.index")->with("success_msg" , "Terminal updated successfully!");
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
        return redirect()->route("company.terminals.index")->with("success_msg" , "Terminal deleted successfully!");
    }
}
