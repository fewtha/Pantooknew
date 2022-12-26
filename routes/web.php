<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use Illuminate\Support\Facedes\Auth;
use Illuminate\Support\Facedes\DB;


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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function (){
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
    Route::get('/posts/user', [App\Http\Controllers\PostController::class, 'userindex'])->name('userposts');

    Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('store');
    Route::get('/posts/show/{id}', [App\Http\Controllers\PostController::class, 'show']);

    Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.add');
    Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');  
    
    Route::get('/posts/delete/{id}',[App\Http\Controllers\PostController::class,'delete'])->name('delete');

});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});