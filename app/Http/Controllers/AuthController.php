<?php

namespace App\Http\Controllers;

use App\Http\Requests\login;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginAction(login $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('login');
        }
        return redirect()->route('welcome');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
