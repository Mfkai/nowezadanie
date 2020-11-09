<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:8'
            ]
        );

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('/admin'); //intended(route('admin.dashboard'));
        }

        return redirect()->back()->with($request->only('email','remember'));

    }

}
