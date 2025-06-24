<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\ResetPasswordMail;
use App\Mail\AppointmentStatusMail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // login işlemleri için sql bağlantısından users içerisindeki email bakılıyor
        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        // Kullanıcı bulunamazsa hata mesajı ile geri dön
        if (! $user) {
            return back()
                ->withErrors(['email' => 'Kullanıcı bulunamadı.'])
                ->withInput();
        }

        // Şifre doğrulaması
        if (! Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'Şifre yanlış.'])
                ->withInput();
        }

        // session sql'den genel bilgileri alıp login içinde tutmayı amaçlar
        session([
            'user_id' => $user->id,
            'name'    => $user->name,
            'role'    => $user->role,
            'email'   => $user->email,
            'full_name' => $user->name, // view'lardaki session('full_name') için
        ]);

        // if-else döngüsünde kullanıcı rolüne göre sayfaya yönlendirilir
        if ($user->role === 'admin') {
            return redirect()->route('dash.admin');
        } elseif ($user->role === 'staff') {
            return redirect()->route('dash.staff');
        }

        return back()
            ->withErrors(['email' => 'The e-mail or password is not correct'])
            ->withInput();
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush(); // Oturumdaki tüm verileri temizleyerek kullanıcıyı sıfırlar
        return redirect()->route('login.form'); // kullanıcıyı login sayfasına yönlendirir
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'name'     => 'required',
            'surname'  => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ])->validate();

        $validated = $request->only(['name', 'surname', 'email', 'password']);

        DB::table('users')->insert([
            'id'         => Str::uuid(),                   // UUID ekledik
            'name'       => $validated['name'].' '.$validated['surname'], // isim + soyisim
            'email'      => $validated['email'],
            'password'   => Hash::make($validated['password']),
            'role'       => 'staff',
            'created_at' => Carbon::now(),
        ]);

         return redirect()->route('login.form')->with('success','Please Enter the Login Form');
    }
}