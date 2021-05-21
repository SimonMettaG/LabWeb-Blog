<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $req) {
        return view('auth.register');
    }

    public function doRegister(Request $req) {
        $data = $req->all();

        Validator::make($req->all(), [
            'username' => 'required|unique:users|alpha_dash',
            'img' => 'nullable|url',
            'password' => 'required|confirmed'
        ])->validate();

        $data['password'] = Hash::make($data['password']);
        //dd($data);

        User::create($data);
        return redirect()->route('auth.login');
    }

    public function login(Request $req) {
        return view('auth.login');
    }

    public function doLogin(Request $req) {
        $credentials = $req->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('blog.home');
        }
        return redirect()->back();
    }

    public function logout(Request $req) {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
