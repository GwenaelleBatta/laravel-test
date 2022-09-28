<?php

use App\Http\Controllers\AsideController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PostByAuthorsController;
use App\Http\Controllers\PostByCategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/authors/{user}/posts', PostByAuthorsController::class);

Route::get('/categories/{category}/posts', PostByCategoriesController::class);

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/categories/{category}', function (Category $category) {
    return $category->load('posts');
});

Route::get('/users/{user:slug}', function (User $user){
    return $user;
});

// Gestion du login

Route::get('auth/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest');

Route::post('auth/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');

Route::get('auth/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
