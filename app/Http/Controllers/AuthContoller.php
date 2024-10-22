<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function login(Request $request){
        Session::flash('username', $request->username);

        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ],[
            'username.required' => 'email harus diisi..',
            'password.required' => 'password harus diisi..',
        ]);

        $data_login = [
            'email'     => $request->username,
            'password'  => $request->password,
        ];

        if (User::attempt($data_login)) {
            return redirect('dashboard')->with('info', 'Anda berhasil login..');
        } else {
            return redirect('/')->withErrors('Email atau password tidak valid');
        }
    }

    function logout(){
        User::logout();
        return redirect('/')->with('info', "Anda telah logout..");
    }
}
