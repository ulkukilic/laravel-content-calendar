<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ContentController;
use App\Http\Middleware\AuthenticateSession;


Route::get('/clrall', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    return 'Cache temizlendi!';
});
// Ayarlar
Route::get('settings',  [SettingsController::class, 'show'])->name('settings.show');
Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');

// Ana sayfa → login
Route::get('/', fn() => redirect()->route('login'));

// Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('login',    'showLoginForm')->name('login');
    Route::post('login',   'login')->name('login.submit');
    Route::get('register', 'showRegisterForm')->name('register');
    Route::post('register','register')->name('register.submit');
    Route::post('logout',  'logout')->name('logout');
});


Route::middleware(['web', 'auth.session'])->prefix('dash')->group(function () {
    Route::get('staff', fn() => view('dash.staff')) ->middleware('role:staff') ->name('dash.staff');
        
    Route::get('admin', fn() => view('dash.admin')) ->middleware('role:admin')->name('dash.admin');
});

// Takvim ve içerik
Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');

Route::middleware('auth.session')->resource('content', CalendarController::class);

// Dil & tema
Route::get('lang/{locale}', fn($l) => back()->withSession(['locale' => $l])) ->name('lang.switch');
Route::get('theme/{mode}', fn($m) => back()->withSession(['theme' => $m])) ->name('theme.switch');

// Statik sayfalar
Route::view('privacy','privacy')->name('privacy');
Route::view('terms','terms')->name('terms');