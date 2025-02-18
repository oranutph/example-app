<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

route::get('/users', [HomeController::class, 'users'])->name('users');
route::get('/users/create', [HomeController::class, 'users_create'])->name('users_create');
route::post('/users/insert', [HomeController::class, 'users_insert'])->name('users_insert');
route::get('/users/edit/{id}', [HomeController::class, 'users_edit'])->name('users_edit');
route::post('/users/update', [HomeController::class, 'users_update'])->name('users_update');
route::get('/users/delete/{id}', [HomeController::class, 'users_delete'])->name('users_delete');

// route::prefix('admin')->group(function () {
//     route::get('/users', [HomeController::class, 'users'])->name('users');
//     route::get('/users/create', [HomeController::class, 'users_create'])->name('users_create');
//     route::post('/users/insert', [HomeController::class, 'users_insert'])->name('users_insert');
//     route::get('/users/edit/{id}', [HomeController::class, 'users_edit'])->name('users_edit');
//     route::post('/users/update', [HomeController::class, 'users_update'])->name('users_update');
//     route::get('/users/delete/{id}', [HomeController::class, 'users_delete'])->name('users_delete');
// });
