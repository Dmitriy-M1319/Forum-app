<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Forum\PostController;
use App\Http\Controllers\Forum\CommentController;
use App\Http\Controllers\Forum\ThreadController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resources([
        'posts' => PostController::class,
        'threads' => ThreadController::class,
        'comments' => CommentController::class
    ]);

    Route::match(['put', 'patch'], '/posts/{id}/carma', [App\Http\Controllers\Forum\PostController::class, 'clickCarma'])->name('click_carma');
    Route::get('/user', [App\Http\Controllers\Forum\ForumUserController::class, 'index'])->name('user_index');
    Route::post('/user/find', [App\Http\Controllers\Forum\ForumUserController::class, 'findPosts'])->name('find_posts');
    Route::match(['put', 'patch'], '/posts/{id}/carma', [App\Http\Controllers\Forum\PostController::class, 'clickCarma'])->name('click_carma');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
