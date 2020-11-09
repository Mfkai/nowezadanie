<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Country;
use Illuminate\Support\Facades\DB;

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function profile(){

        $profiles = User::orderBy('name','asc')->paginate(20);

        return view('admin-view.profile',compact('profiles'));

    }

    public function destroy($id) {

        $post = User::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }


}
