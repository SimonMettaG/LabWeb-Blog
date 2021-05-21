<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Follow;

class BlogController extends Controller
{
    public function home() {
        $blogs = Blog::select()->join('users', 'blogs.user_id', '=', 'users.id')->orderBy('time', 'DESC')->get();
        return view('blog.home', ['blogs' => $blogs]);
    }

    public function feed() {
        $blogs = Blog::select()
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->join('follows', 'users.id', '=', 'follows.followed')
            ->where('follows.follower', '=', auth()->user()->id)
            ->orderBy('blogs.time', 'DESC')->get();

        return view('blog.feed', ['blogs' => $blogs]);
    }

    public function followers() {
        $followers = User::select()->join('follows', 'users.id', '=', 'follows.follower')
            ->where('follows.followed', '=', auth()->user()->id)->get();
        foreach ($followers as $user) {
            $user->following = Follow::where('follower', '=', auth()->user()->id)->where('followed', '=', $user->follower)->exists();
        }

        $youFollow = User::select()->join('follows', 'users.id', '=', 'follows.followed')
            ->where('follows.follower', '=', auth()->user()->id)->get();

        //dd($followers, $youFollow);

        return view('blog.followers', ['followers' => $followers, 'youFollow' => $youFollow]);
    }

    public function postBlog(Request $req) {
        $data = $req->input();
        $blog = new Blog();
        $blog->entry = $data['entry'];
        $blog->time = now();
        $blog->user_id = auth()->user()->id;
        $blog->save();

        return redirect()->route('blog.home');
    }

    public function redirectSearchUser(Request $req) {
        $data = $req->input();
        return redirect('searchuser/'.$data['user']);
    }

    public function searchUser($user) {
        $users = User::where('username', 'like', '%'.$user.'%')->where('username', '!=', auth()->user()->username)->get();
        foreach ($users as $user) {
            $user->following = Follow::where('follower', '=', auth()->user()->id)->where('followed', '=', $user->id)->exists();
        }
        return view('user.search', ['users' => $users]);
    }

    public function redirectUser(Request $req) {
        $data = $req->input();
        return redirect('user/'.$data['user']);
    }

    public function user($username) {
        $user = User::where('username', '=', $username)->first();
        $blogs = Blog::where('user_id', '=', $user->id)->orderBy('time', 'DESC')->get();
        $following = Follow::where('follower', '=', auth()->user()->id)->where('followed', '=', $user->id)->exists();

        return view('user.show', ['user' => $user, 'blogs' => $blogs, 'following' => $following]);
    }

    public function follow(Request $req) {
        $data = $req->input();

        if(!Follow::where('follower', '=', auth()->user()->id)->where('followed', '=', $data['user_id'])->exists()) {
            $follow = new Follow();
            $follow->follower = auth()->user()->id;
            $follow->followed = $data['user_id'];
            $follow->save();
        }
        else {
            $follow = Follow::where('follower', '=', auth()->user()->id)->where('followed', '=', $data['user_id']);
            $follow->delete();
        }

        return redirect()->back();
    }
}
