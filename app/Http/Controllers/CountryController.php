<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function country()
    {
        $countries = Country::orderBy('country_name','asc')->paginate(20);

        return view('admin-view.countries',compact('countries'));

    }
}
