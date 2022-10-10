<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostByAuthorsController;
use App\Http\Controllers\PostByCategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
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
Route::get('/posts', [PostController::class, 'index']);
Route::post('posts/destroy/{post:id}', [PostController::class, 'destroy'])->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->can('create',Post::class);
Route::post('/posts/create', [PostController::class, 'store'])->middleware('auth')->can('create',Post::class);
Route::get('/posts/edit/{post:id}', [PostController::class, 'edit'])->middleware('auth');;
Route::post('/posts/edit/{post:id}', [PostController::class, 'update'])->middleware('auth');;

Route::get('/categories/{category:slug}/posts', PostByCategoriesController::class);
Route::get('/users/{user:slug}/posts', PostByAuthorsController::class);

// Single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comment/destroy/{comment:id}', [CommentController::class, 'destroy'])->middleware('auth');
Route::get('/posts/{post:slug}', [CommentController::class, 'create'])->middleware('auth');
Route::post('/posts/{post:slug}', [CommentController::class, 'store'])->middleware('auth');
Route::post('/posts/{post:slug}/comment/{comment:id}', [CommentController::class, 'update'])->middleware('auth');

// Auth
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterUserController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest');
