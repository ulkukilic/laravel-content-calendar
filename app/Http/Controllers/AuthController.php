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

        session([
            'user_id'  =>    $user->id,
            'name'     =>    $user->name,
            'role'     =>    $user->role,
            'email'    =>    $user->email,
        ]);
         // session sql den genel bilgileri alip login icerisinde tutmayi amaclar 
         // if -else dongusunde kullanici rolune gore giris yapilmak istenen sayfaya yonlendirilir 
        if($user->role=='admin')
        {
            return redirect()->route('dash.staff');
        }
        elseif($user->role=='staff')
        {
              return redirect()->route('dash.admin');
        }
        return back ()
        ->withErrors(['email'=>'The e-mail or password is not correct'])
        ->withErrors([$request->only('email')]);
    }
    
    public function logout()
    {
        $request->session()->flush(); //  Oturumdaki tüm verileri temizleyerek kullanıcıyı sıfırlar
        return redirect()->route('login.form'); // kullaniciyi login sayfasina yonlendiri
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
            'name'     => $validated['name'] . ' ' . $validated['surname'],
            'email'         => $validated['email'],
            'password'      => Hash::make($validated['password']), // Şifre hashlenir
            'role'          => 'staff',
            'created_at'    => Carbon::now(),
        ]);
         return redirect()->route('login.form')->with('success','Please Enter the Login Form');
    }

}
