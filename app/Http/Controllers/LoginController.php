<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return 'ada';
        }
        return 'gagal';
    }

    public function logout()
    {
        // if (Auth::guard('admin')->check()) {
        //     Auth::guard('admin')->logout();
        // } elseif (Auth::guard('super_admin')->check()) {
        //     Auth::guard('super_admin')->logout();
        // }
        // return redirect('/login');
    }
}
