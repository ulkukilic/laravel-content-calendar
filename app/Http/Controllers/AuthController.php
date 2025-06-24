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

class AuthController extends Controller
{
    public function showLoginForm() // login icerisinde cagrilmamasinin sebebi bu islem bir Get islemi fakat login iceriinde yapilan degerler islendigi icin Post olarak kullanilmali o yuzden ayri function icerisinde yapiliyor 
    {
        return view ('auth.login');
        //if ($request->isMethod('get')) {
        // return view('auth.login'); }
        // // eger showloginForm icerisinde kullanmak yerine direk login icerisinde kullanilmak istenirse bu sekilde get olugunu belli ederek kullanilabilir
    }
    public function login (Request $request)    // login islemleri icin sql baglantisindan users icersindeki email bakiliyor ve gerekli email degiskene ataniyor ilk gelen aliniyro
    {
        $user=DB::table('users')
          ->where('email',$request->email)
          ->first();    
        
        // Bulunamazsa hata ver
        if (! $user) 
        {
            return back()
                ->withErrors(['email' => 'Kullanıcı bulunamadı.'])
                ->withInput();
        }

        //  Şifre eşleşmiyorsa hata ver
        if (! Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'Şifre yanlış.'])
                ->withInput();
        }
        session([
            'user_id'  =>    $user->id,
            'full_name' => $user->name,
            'role'     =>    $user->role,
            'email'    =>    $user->email,
        ]);
         // session sql den genel bilgileri alip login icerisinde tutmayi amaclar 
         // if -else dongusunde kullanici rolune gore giris yapilmak istenen sayfaya yonlendirilir 
        if($user->role=='admin')
        {
            return redirect()->route('dash.admin');
        }
        elseif($user->role=='staff')
        {
              return redirect()->route('dash.staff');
        }
        return back ()
        ->withErrors(['email'=>'The e-mail or password is not correct'])
        ->withInput([$request->only('email')]);
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush(); //  Oturumdaki tüm verileri temizleyerek kullanıcıyı sıfırlar
        return redirect()->route('login'); // kullaniciyi login sayfasina yonlendiri
    }
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        // Validator::make: Laravel’in Validator facade’ı ile $request verilerini belirtilen kurallara göre kontrol eder.
        Validator::make($request->all(),[
            'name' =>'required',
            'surname'=>'required',
            'email'     => 'required|email',
            'password'  => 'required|min:8|confirmed',
        ])->validate();

        $validated=$request->only(['name', 'surname', 'email', 'password']); // sadece gerekli alanlari dondur 
        
        /* 
         eger Validator kullanilmazsa su sekilde de yapilabilir 
          $errors = [];
          
            if (empty($request->name)) { 
                $errors['name'] = 'Name is required.';
            }
            if (empty($request->surname)) {
                $errors['surname'] = 'Surname is required.';
            }
            $name    = trim($request->name);
            $surname = trim($request->surname);
         */

        DB::table('users')->insert([ // Yeni kullanıcı veritabanına kaydedilir
            'id'         => Str::uuid(), 
            'full_name' => $user->name,
            'email'         => $validated['email'],
            'password'      => Hash::make($validated['password']), // Şifre hashlenir
            'role'          => 'staff',
            'created_at'    => Carbon::now(),
        ]);
         return redirect()->route('login')->with('success','Please Enter the Login Form');
    }

}
