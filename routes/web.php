<?php

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
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::resources([
        'posts' => PostController::class,
        'threads' => ThreadController::class,
    ]);

    Route::resource('comments', CommentController::class)->only([
        'index', 'show', 'store', 'update', 'destroy', 'edit'
    ]);


    Route::match(['put', 'patch'], '/posts/{id}/carma', [App\Http\Controllers\Forum\PostController::class, 'clickCarma'])->name('click_carma_post');
    Route::match(['put', 'patch'], '/comments/{id}/carma', [App\Http\Controllers\Forum\CommentController::class, 'clickCarma'])->name('click_carma_comment');

    Route::get('/comments/create/{id}', [CommentController::class, 'create'])->name('comments.create');

    Route::get('/threads/admin', function (\Illuminate\Http\Request $request){
        dd($request);
        //return redirect()->route('threads.edit', $id);
    })->name('threads.admin');

    Route::get('/user', [App\Http\Controllers\Forum\ForumUserController::class, 'index'])->name('user_index');
    Route::post('/user/find', [App\Http\Controllers\Forum\ForumUserController::class, 'findPosts'])->name('find_posts');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
