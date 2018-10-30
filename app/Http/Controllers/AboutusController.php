<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class AboutusController extends Controller
{
   public function aboutus()
   {
       $about = DB::table('abouts')->get();
   		return view('front.pages.aboutus')->with('about' , $about);
   }
}
