<?php

namespace App\Http\Controllers\Company\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("company.dashboard");
    }
}
