<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'Welcome Home!';
});
Route::middleware(['guest'])->group(function(){
    //Registration routes
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');

    //Login routes
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'loginUser'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::get('/users', [UsersController::class, 'displayUsers'])->name('users.index');

//Restricting home access
Route::middleware(['auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    
    Route::get('/posts', [PostController::class, 'posts'])->name('posts');
    Route::post('/posts', [PostController::class, 'posts'])->name('posts');
    Route::get('/comments', [CommentController::class, 'comments'])->name('comments');
    Route::post('/comments', [CommentController::class, 'comments'])->name('comments');
});