<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index() 
    {
        return view('login');
    }
    function login(Request $request)
    {
        $request->validate([
            'NIP' => 'required',
            'password' => 'required'
        ], [
            'NIP.required'=>'NIP wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'NIP'=>$request->NIP,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'admin') {
                return redirect('/beranda');
            } elseif (Auth::user()->role == 'user') {
                return redirect('/beranda');
            }
        } else {
            return redirect('/login')->withErrors('NIP dan password tidak sesuai')->withInput();
        }
    }

    function logout()  {
        Auth::logout();
        return redirect('/login');
    }
}
