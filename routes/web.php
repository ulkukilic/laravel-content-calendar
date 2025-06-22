<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
// — Cache temizleme
Route::get('/clrall', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    echo "Cache temizlendi!";
});
Route::get('settings', [SettingsController::class, 'show'])->name('settings.show');
Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');

// — Ana sayfaya gelen istekleri login ekranına yönlendir
 Route::get('/', fn() => redirect()->route('login.form'));

 // — AuthController: giriş, kayıt, şifre sıfırlama
    Route::controller(AuthController::class)->group(function () {
     // Giriş / Ana sayfa
     Route::get('login', 'showLoginForm')->name('login.form');
     Route::post('login','login')->name('login.submit');

     // Kayıt
     Route::get('register', 'showRegistrationForm')->name('register.form');
     Route::post('register', 'register')->name('register.submit');

     // Çıkış
     Route::post('logout', 'logout')->name('logout');
    });
   // -- Dil Degistirme -- 
    Route::get('lang/{locale}', function ($locale) 
    {
        session(['locale' => $locale]);
        return redirect()->back();
    })->name('lang.switch')->where('locale', 'en|tr');

    // --- Tema değiştirme ---
    Route::get('theme/{mode}', function ($mode) 
    {
        session(['theme' => $mode]);
        return redirect()->back();
    })->name('theme.switch')->where('mode', 'light|dark');

    Route::view('/privacy', 'privacy')->name('privacy');
    Route::view('/terms',   'terms')->name('terms');
