<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
   public function show()
   {
    // Oturumdan değeri al ve değişken adını düzelt
    $currentLocale = session(
        'locale',
        config('app.locale')
    );
    $currentTheme = session(
        'theme', // oturum anahtarı
        'light'  // varsayılan tema
    );
    return view(
        'settings.show',
        compact('currentLocale','currentTheme')
    );
   }

   public function update(Request $request)
   {
    $request->validate([
        'locale' => 'required|in:tr,en',
        'theme'  => 'required|in:light,dark',
    ]);

    session([
        'locale' => $request->locale,
        'theme'  => $request->theme
    ]);

    return back()
        ->with('success', __('Ayarlar güncellendi.'));
   }

}