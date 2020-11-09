<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }

    public function mojprofil()
    {
        // $user = User::findOrFail($id);
        // $user->select('name','email');


        return view('user-view.profile');
    }

    public function usersprofile()
    {

        $countries = DB::table('users')
        ->leftJoin('checks', 'checks.user_id','=','users.id')
        ->leftJoin('countries','countries.cid','=','checks.country_id')
        ->select('users.id','checks.country_id','checks.user_id','users.name','countries.country_name','countries.country_code','countries.language')
        ->get();

        $tablica = array();
		foreach($countries as $rzad)
		{
            // $countryid = $rzad->cid;
            // $checkid = $rzad->chid;
            $userid = $rzad->id;
            $country_id = $rzad->country_id;
            $user_name = $rzad->name;
			$country_name = $rzad->country_name;
            $language = $rzad->language;
            $country_code = $rzad->country_code;

            if(!isset($tablica[$userid]))
			$tablica[$userid] = array('user_name' => $user_name, 'kraje' => array());

            if(!isset($tablica[$userid]['kraje'][$country_id]))
            $tablica[$userid]['kraje'][$country_id]=array('country_name'=> $country_name, 'language'=>$language, 'country_code'=>$country_code);
        }


        return view('user-view.allusers',compact('tablica'));
    }
}
