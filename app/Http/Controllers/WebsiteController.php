<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
   public function index(){

       return view('website.index');
   }
   public function about(){

    return view('website.about');
}
}
