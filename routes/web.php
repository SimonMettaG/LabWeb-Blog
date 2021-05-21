<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('is_loged');

Route::get('login', [AuthController::class, 'login'])->name('auth.login')->middleware('is_loged');
Route::post('login', [AuthController::class, 'doLogin'])->name('auth.do-login');
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('register', [AuthController::class, 'register'])->name('auth.register')->middleware('is_loged');
Route::post('register', [AuthController::class, 'doRegister'])->name('auth.do-register');

Route::get('home', [BlogController::class, 'home'])->name('blog.home')->middleware('not_loged');
Route::get('feed', [BlogController::class, 'feed'])->name('blog.feed')->middleware('not_loged');
Route::get('followers', [BlogController::class, 'followers'])->name('blog.followers')->middleware('not_loged');
Route::get('settings', [SettingsController::class, 'settings'])->name('blog.settings')->middleware('not_loged');

Route::post('home', [BlogController::class, 'postBlog'])->name('blog.post-blog');

Route::post('change-user', [SettingsController::class, 'changeUsername'])->name('settings.username');
Route::post('change-img', [SettingsController::class, 'changeImg'])->name('settings.img');
Route::post('change-pass', [SettingsController::class, 'changePassword'])->name('settings.password');
Route::delete('delete-user', [SettingsController::class, 'deleteUser'])->name('settings.delete-user');

Route::get('user-search', [BlogController::class, 'redirectSearchUser'])->name('user.redisearch')->middleware('not_loged');
Route::get('searchuser/{user}', [BlogController::class,  'searchUser'])->middleware('not_loged');

Route::get('user', [BlogController::class, 'redirectUser'])->name('user.show')->middleware('not_loged');
Route::get('user/{username}', [BlogController::class,  'user'])->middleware('not_loged');

Route::post('follow', [BlogController::class, 'follow'])->name('user.follow');

