<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (Request $request) {
    //
    // This is a demo project. We create & authenticate a random user
    // so that we don't have to bother with authorization later on.
    //
    // DO NOT COPY/PASTE THIS CODE.
    // DO NOT RUN THIS CODE IN PRODUCTION.
    //
    if (User::count() < 3) {
        User::factory()->count(3)->create();
    }

    if (Auth::guest() && $request->has('login')) {
        Auth::login(User::inRandomOrder()->first());
    }

    if (Auth::check() && $request->has('logout')) {
        Auth::logout();
    }

    if (Post::count() < 5) {
        Post::factory()->count(5)->create();
    }

    $posts = Post::latest()->take(5)->get();

    return view('welcome', compact('posts'));
});

Route::middleware('auth')->group(function () {
    Route::post('like', 'LikeController@like')->name('like');
    Route::delete('like', 'LikeController@unlike')->name('unlike');
});
