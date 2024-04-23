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
Route ::get('/manage1', function () {
    return view('pages.admin.manage-test');
});
Route ::get('/manage2', function () {
    return view('pages.admin.manage-test2');
});
Route ::get('/home', function () {
    return view('pages.admin.home');
});
Route ::get('/result', function () {
    return view('pages.admin.test-taker-result');
});
Route ::get('/result-more', function () {
    return view('pages.admin.test-taker-score');
});
// yang dah fix
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->middleware('guest')->name('login');
    Route::post('/auth', 'authentication')->name('auth');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/welcome', [TestTakerController::class, 'index'])->name('user.dashboard');
    Route::post('/handle-token', [TestTakerController::class, 'handleToken'])->name('handle-token');
    
    Route::middleware('test-token')->group(function () {
        Route::get('/start-the-test/{index}', [TestTakerController::class, 'startTest'])->name('start-test');
        Route::post('/section-guide/{index}', [TestTakerController::class, 'sectionGuide'])->name('section-guide');
        Route::get('/listening-section', [TestTakerController::class, 'listeningSection'])->name('listening-section');
        Route::get('/grammar-section', [TestTakerController::class, 'grammarSection'])->name('grammar-section');
        Route::get('/reading-section', [TestTakerController::class, 'readingSection'])->name('reading-section');
        Route::post('/score', [TestTakerController::class, 'score'])->name('test_score');
        Route::post('/submit-temp', [TestTakerController::class, 'tempScore'])->name('submit-temp');
    });
});

Route::post('/dump-post', [TestTakerController::class, 'dumpPost'])->name('dump-post');
Route::get('/dump-get', [TestTakerController::class, 'dumpGet'])->name('dump-get');
Route::get('/scoring', [TestTakerController::class, 'scoring'])->name('scoring');



