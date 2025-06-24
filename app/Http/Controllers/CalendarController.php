<?php

namespace App\Http\Controllers;

// Gerekli kütüphaneler projeye dahil ediliyor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;               // Giriş/çıkış işlemleri için Auth sınıfı
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Hash;               // Şifreleme ve şifre doğrulama için
use Illuminate\Support\Facades\Mail;               // Mail gönderimi için
use Illuminate\Support\Facades\DB;                 // Veritabanı işlemleri için
use Illuminate\Support\Facades\Validator;          // Manuel doğrulama işlemleri için
use Illuminate\Support\Str;                        // Rastgele token oluşturma için
use Carbon\Carbon;                                 // Tarih/saat işlemleri için
use App\Mail\ResetPasswordMail;                    // Şifre sıfırlama maili sınıfı
use App\Mail\AppointmentStatusMail;   

class CalendarController extends Controller
{
    public function index()
{
    // Takvim ana sayfası görünümünü döndür
    return view('calendar.index');
}

}