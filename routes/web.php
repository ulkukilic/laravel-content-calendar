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
// — Ana sayfaya gelen istekleri login ekranına yönlendir
 Route::get('/', fn() => redirect()->route('login.form'));

 // — AuthController: giriş, kayıt, şifre sıfırlama
    Route::controller(AuthController::class)->group(function () {
     // Giriş / Ana sayfa
     Route::get('login', 'showLoginForm')->name('login.form');
     Route::post('login','login')->name('login.submit');

     // Kayıt
     Route::get('register', 'showRegistrationForm')->name('register.form');
     Route::post('register', 'registerSave')->name('register.submit');

     // Çıkış
     Route::post('logout', 'logout')->name('logout');
    });


    Route::get('theme/{theme}', function ($theme) 
    {
        if (in_array($theme, ['light','dark'])) 
        {
            session(['theme' => $theme]);
        }
        return back();
    })->name('theme.switch');

    Route::get('lang/{locale}', function ($locale) 
    {
        if (in_array($locale, ['en','tr'])) 
        {
            session(['locale' => $locale]);
        }
        return back();
    })->name('lang.switch');