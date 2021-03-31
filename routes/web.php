<?php

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

Route::get('/', function () {
    return redirect('/tweets');
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/explore' , ['App\Http\Controllers\ExploreController' , 'index']);
    Route::get('/tweets', [App\Http\Controllers\TweetController::class, 'index'])->name('home');
    Route::get('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');
    Route::post('/tweets', [App\Http\Controllers\TweetController::class, 'store']);
    Route::post('/profiles/{user:username}/follow', [App\Http\Controllers\FollowsController::class, 'store']);
    Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->middleware('can:edit,user');
    Route::post('/profiles/{user:username}/password', [App\Http\Controllers\ProfilesController::class, 'updatePassword'])->middleware('can:edit,user');
    Route::post('/profiles/{user:username}/edit', [App\Http\Controllers\ProfilesController::class, 'update'])->middleware('can:edit,user');
    Route::post('/profiles/{user:username}/avatar', [App\Http\Controllers\ProfilesController::class, 'updateAvatar'])->middleware('can:edit,user');
    Route::post('/like/{tweet}', [App\Http\Controllers\likeController::class , 'like' ]);
    Route::post('/dislike/{tweet}', [App\Http\Controllers\likeController::class , 'dislike' ]);
});
