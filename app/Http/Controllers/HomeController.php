<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
	public function __construct()
    {
    	$facebook = DB::table('social_links')->where('id', 1)->first(['title','link']);
   		$twitter = DB::table('social_links')->where('id', 2)->first(['title','link']);
   		$linkedin = DB::table('social_links')->where('id', 3)->first(['title','link']);
   		$google_plus = DB::table('social_links')->where('id', 4)->first(['title','link']);
   		return view('front.parts.header')
   		->with('facebook', $facebook)
   		->with('twitter', $twitter)
   		->with('linkedin', $linkedin)
   		->with('google_plus', $google_plus);
    }
   public function home()
   {
   		// $facebook = DB::table('social_links')->where('id', 1)->first(['title','link']);
   		// $twitter = DB::table('social_links')->where('id', 2)->first(['title','link']);
   		// $linkedin = DB::table('social_links')->where('id', 3)->first(['title','link']);
   		// $google_plus = DB::table('social_links')->where('id', 4)->first(['title','link']);
   		return view('front.pages.home');
   		// ->with('facebook', $facebook)
   		// ->with('twitter', $twitter)
   		// ->with('linkedin', $linkedin)
   		// ->with('google_plus', $google_plus);
   }


	 public function getDrugsReactionHome()
	 {
//			 $Reactives = DB::table('medicin_reactives')
//			 ->orderBy('id', 'desc')->get();
			 return view('front.pages.drugs_reactions');
	 }

	 public function getDrugsReaction()
     {
         $drugs=DB::table('medicin_reactives')->get();
         return view('front.pages.drugs')->with('drugs',$drugs);
     }

     public function getDrugsFoodReaction()
     {
         $drugs=DB::table('drugs_foods')->get();
         return view('front.pages.drugs-food-reaction')->with('drugs',$drugs);
     }
}
