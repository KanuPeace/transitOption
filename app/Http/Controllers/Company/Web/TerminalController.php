<?php

namespace App\Http\Controllers\Company\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\TerminalRequest;
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
        $terminals = Terminal::where("company_id" , company()->id)->paginate(25);
        return view("company.terminals.index" , compact('terminals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terminal = new Terminal();
        $countries = Country::orderby('name')->get();
        $states = !empty($terminal->country_id) ?  State::where("country_id" , $terminal->country_id)->orderby('name')->get() : [];
        $cities = !empty($terminal->state) ?  City::where("state_id" , $terminal->state_id)->orderby('name')->get() : [];
        return view("company.terminals.create" , compact('terminal', "countries" , "states" , "cities"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TerminalRequest $request)
    {
        $data = $request->validated();
        $data["code"] = $this->generateCode($data["name"]);
        $data["company_id"] = company()->id;
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
    public function edit(Terminal $terminal)
    {
        $company = auth()->user()->company;
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
    public function update(TerminalRequest $request, Terminal $terminal)
    {
        $data = $request->validated();
        $terminal->update($data);
        return redirect()->route("company.terminals.index")->with("success_msg" , "Terminal updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terminal $terminal)
    {
        $terminal->delete();
        return redirect()->route("company.terminals.index")->with("success_msg" , "Terminal deleted successfully!");
    }
}
