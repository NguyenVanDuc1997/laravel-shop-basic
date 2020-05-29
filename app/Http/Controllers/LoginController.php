<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function showFormLogin() {
        return view('login', compact('message'));
    }

    function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $user = [
            'username' => $email,
            'password' => $password
        ];

        if (Auth::attempt($user)) {
            return redirect()->route('users.list');
        } else {
            Session::flash('error-login','Tai khoan hoac mat khau khong dung');
            return back();
        }
    }
}
