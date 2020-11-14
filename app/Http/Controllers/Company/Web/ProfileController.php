<?php

namespace App\Http\Controllers\Company\Web;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function company_profile(Request $request){
        
        $user = auth()->user();

        if($request->status_key == "company_profile"){
            $company = Company::where("user_id" , $user->id)->first();
            $data = $request->validate([
                "name" => "required|string",
                "email" => "nullable|email|unique:companies,email",
                "phone" => "required|string|unique:companies,phone",
                "reg_no" => "nullable|string",
                "address" => "required|string",
                "logo" => "nullable|image|mimetypes:".imageMimes(),
            ]);

        
            $data["user_id"] = $user->id;
            $data["code"] = $this->generateCode($data["name"]);
            if(!empty($logo = $request->file("logo"))){
                $data["logo"] = putFileInPrivateStorage($logo , $this->companyLogoImagePath);

                // Check if company
                if(!empty($company) && !empty($logo = $company->logo)){
                    deleteFileFromPrivateStorage( $this->companyLogoImagePath.'/'.$logo);
                }
            }
            if(empty($company)){
                Company::create($data);
            }
            else{
                $company->update($data);
            }
        }

       return redirect()->route("company.dashboard");

    }


    private function generateCode($name){
        $code = generateNameCode($name);
        $check = Company::where("code" , $code)->count();
        if($check > 0){
            $this->generateCode($name);
        }
        return $code;
    }


}
