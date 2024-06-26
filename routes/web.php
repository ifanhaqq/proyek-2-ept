<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SpreadsheetController;
use App\Http\Controllers\TestTakerController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Auth\Events\PasswordReset;
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

Route::get("/reset-password", function () {
    return view('pages.reset-password');
});

Route::get("/please-wait", function () {
    return view('pages.user.loading-screen');
});



// yang dah fix
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->middleware('guest')->name('login');
    Route::post('/auth', 'redirectLogin')->name('auth');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
});

// Password controller
Route::get("/forgot-password", [PasswordResetController::class, "index"])->name("forgot-password");
Route::post("/reset-password", [PasswordResetController::class, "sendResetPasswordNotification"])->name("reset-password");
Route::get("/reset-password/{token}", [PasswordResetController::class, "changePassword"])->name("password.reset");
Route::post("/update-password", [PasswordResetController::class, "updatePassword"])->name("update-password");


// Email verification
Route::middleware('auth')->group(function () {
    
    Route::get("/verify-email/{id}/{hash}", [EmailController::class, "verifyEmail"])->name("verification.verify");
    Route::post("/send-notification", [EmailController::class, "sendNotification"])->middleware('throttle:6,1')->name("send-notification");
    Route::get("/verification", [EmailController::class, "verificationNotice"])->name('verification-notice');

    Route::post("/logout", [AuthController::class, "logout"])->name("logout");
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

        Route::post('/please-wait', [TestTakerController::class, 'gimmickLoading'])->name('loading-screen');
        Route::post('/sections-handler', [TestTakerController::class, 'sectionsHandler'])->name('sections-handler');
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

    Route::get('/listening-guide/{wave_id}', [AdminController::class, 'listeningGuidePreview'])->name('listening-guide-preview');
    Route::get('/grammar-guide/{wave_id}', [AdminController::class, 'grammarGuidePreview'])->name('grammar-guide-preview');
    Route::get('/reading-guide/{wave_id}', [AdminController::class, 'readingGuidePreview'])->name('reading-guide-preview');
    Route::get('/listening-section-preview/{wave_id}', [AdminController::class, 'listeningPreview'])->name("listening-preview");
    Route::get('/grammar-section-preview/{wave_id}', [AdminController::class, 'grammarPreview'])->name("grammar-preview");
    Route::get('/reading-section-preview/{wave_id}', [AdminController::class, 'readingPreview'])->name("reading-preview");
    Route::get('/rules/{wave_id}', [AdminController::class, 'testRules'])->name('test-rules');

    Route::get('/test-results', [AdminController::class, 'testResults'])->name('test-results');
    Route::get('/test-result/{index}', [AdminController::class, 'testScores'])->name('test-score');

    Route::post('/store-question', [AdminController::class, 'storeQuestion'])->name('store-question');
    Route::post('/update-question', [AdminController::class, 'updateQuestion'])->name('update-question');
    Route::post('/delete-question', [AdminController::class, 'deleteQuestion'])->name('delete-question');

    Route::post('/store-guide/{guide_id}', [AdminController::class, 'storeGuide'])->name('store-guide');

    Route::get('/download-template', [SpreadsheetController::class, 'downloadTemplate'])->name('download-template');
    Route::post('/import-spreadsheet/{wave_id}', [SpreadsheetController::class, 'importSpreadsheet'])->name('import-spreadsheet');
});

Route::post('/dump-post', [TestTakerController::class, 'dumpPost'])->name('dump-post');
Route::get('/dump-get', [TestTakerController::class, 'dumpGet'])->name('dump-get');
Route::get('/scoring', [TestTakerController::class, 'scoring'])->name('scoring');
Route::get('/dump-spreadsheet', [SpreadsheetController::class, 'index']);




