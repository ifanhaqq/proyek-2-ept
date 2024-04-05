<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestTakerController;
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
// route user sementara
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('pages.user.home');
});


Route::get('/history', function(){
    return view('pages.user.test-history');
});
Route::get('/history-detail', function(){
    return view('pages.user.test-history-detail');
});
Route::get('/start-1', function(){
    return view('pages.user.test-start-1');
});
Route::get('/start-2', function(){
    return view('pages.user.test-start-2');
});
Route::get('/start-3', function(){
    return view('pages.user.test-start-3');
});

// route admin Sementara 
Route::get('/admin', function(){
    return view('pages.admin.test');
});


Route::get('/new', function(){
    return view('pages.admin.new-test');
});

Route::get('/manage', function(){
    return view('pages.admin.manage-test');
});
// yang dah fix
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/auth', 'authentication')->name('auth');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/index', [TestTakerController::class, 'index'])->name('user.dashboard');
});



