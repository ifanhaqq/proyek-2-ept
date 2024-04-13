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
Route::get('/section1-guide', function(){
    return view('pages.user.section1-guide');
});
Route::get('/section1', function(){
    return view('pages.user.section1');
});
Route::get('/section2-guide', function(){
    return view('pages.user.section2-guide');
});
Route::get('/section2', function(){
    return view('pages.user.section2');
});
Route::get('/section3-guide', function(){
    return view('pages.user.section3-guide');
});
Route::get('/section3', function(){
    return view('pages.user.section3');
});
Route::get('/submit', function(){
    return view('pages.user.test-submit');
});
Route::get('/score', function(){
    return view('pages.user.test-score');
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
    Route::get('/', 'login')->middleware('guest')->name('login');
    Route::post('/auth', 'authentication')->name('auth');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
});

Route::controller(TestTakerController::class)->group(function () {
    Route::get('/welcome', 'index')->name('user.dashboard');
    Route::get('/start-the-test/{index}', 'startTest');
    Route::get('/listening-section', 'listeningSection')->name('listening-section');
    Route::get('/reading-section', 'readingSection')->name('reading-section');
    Route::get('/grammar-section', 'grammarSection')->name('grammar-section');
})->middleware(['auth', 'role:user']);


Route::post('/dump-post', [TestTakerController::class, 'dumpPost'])->name('dump-post');
Route::get('/dump-get', [TestTakerController::class, 'dumpGet'])->name('dump-get');
Route::get('/scoring', [TestTakerController::class, 'scoring'])->name('scoring');
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });

// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/index', [TestTakerController::class, 'index'])->name('user.dashboard');
// });



