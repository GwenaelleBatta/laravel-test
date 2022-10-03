<?php

use App\Http\Controllers\AuthenticatedSessionController;
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

// Various posts indexes
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);

Route::get('categories/{category:slug}/posts', PostByCategoriesController::class);
Route::get('users/{user:slug}/posts', PostByAuthorsController::class);

// Single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Auth
Route::get('login', [AuthenticatedSessionController::class, 'create'])->middleware('guest');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
