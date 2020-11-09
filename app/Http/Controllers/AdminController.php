<?php

namespace App\Http\Controllers;

use App\Country as AppCountry;
use Illuminate\Http\Request;
use App\User;
use App\Check;
use App\Country;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dane = DB::table('countries')
        ->leftJoin('checks','countries.cid','=','checks.country_id')
        ->leftJoin('users','checks.user_id','=','users.id')
        ->select('countries.cid','checks.chid','checks.user_id','checks.country_id','users.id','users.name','countries.country_name','countries.country_code','countries.language')
        ->where('checks.pub_status','=','topublish')->distinct()
        ->paginate(20);

        $tablica = array();
		foreach($dane as $rzad)
		{
            $countryid = $rzad->cid;
            $checkid = $rzad->chid;
            $country_id = $rzad->country_id;
			$user_id = $rzad->user_id;
			$country_name = $rzad->country_name;
            $user = $rzad->name;
            $userid = $rzad->id;
            $language = $rzad->language;
            $country_code = $rzad->country_code;

            if(!isset($tablica[$country_id]))
			$tablica[$country_id] = array('country_id'=>$country_id, 'country_name' => $country_name, 'language'=>$language,'country_code'=>$country_code,'usersi' => array());

            if(!isset($tablica[$country_id]['usersi'][$userid]))
            $tablica[$country_id]['usersi'][$userid]=array('user'=> $user,'userid'=>$userid,'checkid'=>$checkid);

        }
        // dd($tablica);

        return view('admin',compact('tablica'));
    }

    public function akceptuj(Request $request)
    {
        $check_id = $request->checkid;
        foreach($check_id as $key => $chkid)
        {
            $update = array(
                'pub_status' => 'done'
            );
            Check::where('chid','=', $chkid)->update(['pub_status' => 'done']);
        }

        return redirect('/admin');
    }
}
