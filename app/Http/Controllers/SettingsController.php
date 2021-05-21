<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SettingsController extends Controller
{
    public function settings(Request $req) {
        return view('blog.settings');
    }

    public function changeUsername(Request $req) {
        Validator::make($req->all(), [
            'username' => 'required|unique:users|alpha_dash'
        ])->validate();

        $data = $req->input();
        $user = User::find(auth()->user()->id);
        $user->username = $data['username'];
        $user->save();

        return redirect()->route('blog.settings');
    }

    public function changeImg(Request $req) {
        Validator::make($req->all(), [
            'img' => 'required|url'
        ])->validate();

        $data = $req->input();
        $user = User::find(auth()->user()->id);
        $user->img = $data['img'];
        $user->save();

        return redirect()->route('blog.settings');
    }

    public function changePassword(Request $req) {
        Validator::make($req->all(), [
            'password' => 'required|confirmed'
        ])->validate();

        $data = $req->input();
        $data['password'] = Hash::make($data['password']);
        $user = User::find(auth()->user()->id);
        $user->password =  $data['password'];
        $user->save();

        return redirect()->route('blog.settings');
    }

    public function deleteUser(Request $req) {
        $user = User::find(auth()->user()->id);
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        $user->delete();

        return redirect()->route('auth.login');
    }
}
