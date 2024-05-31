<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpreadsheetController;
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
Route::get('/manage1', function () {
    return view('pages.admin.manage-test');
});
Route::get('/manage2', function () {
    return view('pages.admin.manage-test2');
});
Route::get('/home', function () {
    return view('pages.admin.home');
});
Route::get('/result', function () {
    return view('pages.admin.test-taker-result');
});
Route::get('/result-more', function () {
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

// Test taker routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/welcome', [TestTakerController::class, 'index'])->name('user.dashboard');
    Route::post('/handle-token', [TestTakerController::class, 'handleToken'])->name('handle-token');

    Route::get("/user-history", [TestTakerController::class, "testHistory"])->name("user-history");
    Route::get("/user-history/{id}", [TestTakerController::class, "historyDetail"])->name("history-detail");

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

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/store-test-wave', [AdminCOntroller::class, 'storeTestWave'])->name('store-test-wave');
    Route::get('/manage-test', [AdminController::class, 'manageTest'])->name('manage-test');

    Route::get('/manage-wave/{wave_id}', [AdminController::class, 'manageWave'])->name('manage-wave');
    Route::post('/update-wave', [AdminController::class, 'updateWave'])->name('update-wave');
    Route::post('/delete-wave', [AdminController::class, 'deleteWave'])->name('delete-wave');

    Route::get('/listening-section-preview/{wave_id}', [AdminController::class, 'listeningPreview'])->name("listening-preview");
    Route::get('/grammar-section-preview/{wave_id}', [AdminController::class, 'grammarPreview'])->name("grammar-preview");
    Route::get('/reading-section-preview/{wave_id}', [AdminController::class, 'readingPreview'])->name("reading-preview");

    Route::get('/test-results', [AdminController::class, 'testResults'])->name('test-results');
    Route::get('/test-result/{index}', [AdminController::class, 'testScores'])->name('test-score');

    Route::post('/store-question', [AdminController::class, 'storeQuestion'])->name('store-question');
    Route::post('/update-question', [AdminController::class, 'updateQuestion'])->name('update-question');
    Route::post('/delete-question', [AdminController::class, 'deleteQuestion'])->name('delete-question');
});

Route::post('/dump-post', [TestTakerController::class, 'dumpPost'])->name('dump-post');
Route::get('/dump-get', [TestTakerController::class, 'dumpGet'])->name('dump-get');
Route::get('/scoring', [TestTakerController::class, 'scoring'])->name('scoring');
Route::get('/dump-spreadsheet', [SpreadsheetController::class, 'index']);
Route::get('/download-template', [SpreadsheetController::class, 'downloadTemplate'])->name('download-template');
Route::post('/import-spreadsheet/{wave_id}', [SpreadsheetController::class, 'importSpreadsheet'])->name('import-spreadsheet');



