<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
// route sementara
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('pages.user.home');
});

Route::get('/admin', function(){
    return view('pages.admin.test');
});

Route::get('/register', function(){
    return view('pages.register');
});
Route::get('/history', function(){
    return view('pages.user.test-history');
});

// 
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/auth', 'authentication')->name('auth');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



