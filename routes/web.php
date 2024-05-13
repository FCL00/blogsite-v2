<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

// User Related Route
Route::get('/', [UserController::class, 'home'])->name("user.home");
Route::get('/home', [UserController::class, 'home'])->name("user.homePage");
Route::get('/login', [UserController::class, "showlogin"])->name("user.loginPage")->middleware("guest");
Route::post('/login', [UserController::class, "login"])->name("user.login")->middleware("guest");
Route::post("/logout", [UserController::class, "logout"])->name('user.logout');
Route::get('/register', [UserController::class, "register"])->name("user.register")->middleware("guest");
Route::post('/register', [UserController::class, "registration"])->name("user.create")->middleware("guest");
Route::get('/dashboard', [UserController::class, "dashboard"])->name("user.dashboard")->middleware("mustBeLoggedIn");

// Post Routes
Route::get('/post', [PostController::class, 'index'])->name('post.index')->middleware("mustBeLoggedIn");
Route::get('/post/create', [PostController::class, 'create'])->name('post.create')->middleware("mustBeLoggedIn");
Route::post('/post/create', [PostController::class, 'store'])->name('post.store')->middleware("mustBeLoggedIn");
Route::get('/post/show/{post}', [PostController::class, 'show'])->name('post.show')->middleware("mustBeLoggedIn");
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit')->middleware("mustBeLoggedIn");
Route::put('/post/edit/{post}', [PostController::class, 'update'])->name('post.update')->middleware("mustBeLoggedIn");
Route::delete('/post/delete/{post}', [PostController::class, 'delete'])->name('post.delete')->middleware("mustBeLoggedIn");


