<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Country;
use Illuminate\Support\Facades\DB;

class Welcome extends Controller
{
    public function index()
    {

        $dane = DB::table('countries')
        ->leftJoin('checks','countries.cid','=','checks.country_id')
        ->leftJoin('users','checks.user_id','=','users.id')
        ->select('countries.cid','checks.chid','checks.user_id','users.id','checks.country_id','countries.country_name','users.name','countries.country_code','countries.language')
        ->where('checks.pub_status','=','done')->distinct()
        ->paginate(20);

        $tablica = array();
		foreach($dane as $rzad)
		{
            $countryid = $rzad->cid;
            $checkid = $rzad->chid;
            $userid = $rzad->id;
            $country_id = $rzad->country_id;
            $userid = $rzad->user_id;
            $user = $rzad->name;
			$country_name = $rzad->country_name;
            $language = $rzad->language;
            $country_code = $rzad->country_code;

            if(!isset($tablica[$country_id]))
			$tablica[$country_id] = array('cid'=>$country_id, 'country_name' => $country_name, 'language'=>$language,'country_code'=>$country_code,'usersi' => array());

            if(!isset($tablica[$country_id]['usersi'][$userid]))
            $tablica[$country_id]['usersi'][$userid]=array('user'=> $user);
        }
        //  dd($tablica);
        return view('welcome',compact('tablica'));


    }

    public function jsondata()
    {
        $json = Storage::disk('local')->get('languages.json');
        $json = json_decode($json, true);
        $dane = $json['res'];

        $names = array_column($dane, 'country_name');
        $language = array_column($dane, 'lang_name');
        $codes = array_column($dane,'country_code_name');

        $names_codes = array_map(NULL, $names, $language,$codes);
        return view('nowywidok',compact('names','codes','names_codes'));
    }

}
