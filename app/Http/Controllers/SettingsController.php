<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
   // Oturum acildiginda session ile mevcut dili ve temayi alir 
   public function show()
   {
    //Oturumdandegeri alip app.localde varsayilani kullandirir 
    $currentLocale = session('locale', config('app.locale'));
    $currentTheme  = session('theme','light');
    return view('settings.show', compact('currentLocale','currentTheme'));

   }

   public function update(Request $request)
   {
    // 'locale' değeri 'tr' veya 'en', 'theme' değeri 'light' veya 'dark' olmalı
        $request->validate([
            'locale' => 'required|in:tr,en',
            'theme'  => 'required|in:light,dark',
        ]);

        // Doğrulanmış verileri oturuma kaydet
        session([
            'locale' => $request->locale, // örn: 'en' veya 'tr'
            'theme'  => $request->theme   // örn: 'light' veya 'dark'
        ]);

        // Başarı mesajını flash olarak ekle ve ayarlar sayfasına geri dön
        return back()
            ->with(
                'success',               // flash mesaj anahtarı
                __('Ayarlar güncellendi.') // çevirisi yapılan metin
            );//__() helper fonksiyonu: belirtlen metni dil dosyalarından çevirir ve döndürür
   }

}