{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app') 
@section('title','Login')
@section('content')

  <div class="container-fluid login-page"> <!-- ekranın solundan sağına kadar yayılır ve kenar boşlukları korur-->
    <div class="d-flex full-height p-v-20 flex-column justify-content-between"> <!--tam yükseklik alır, dikeyde 20px boşluk, içerikleri üst ve alt köşelere yerleştirir  -->
         {{-- Sol üst logo --}}
        <div class="d-none d-md-flex p-h-40"><!-- -->
        <img src="{{ asset('panel/assets/images/logo.jpg') }}" alt="logo">
       </div>
         {{-- FORM KARTI --}}
        <div class="col-md-5"> <!--ekran genişliklerinde 12 sütunluk sistemin 5 sütununu kaplayarak form kartını sayfa düzenine göre konumlandırır-->
        <div class="card"> <!--Kart bileşeni: form alanını-->
        <div class="card-body"><!-- içinde yer alan form elemanlarına etrafında 1rem’lik varsayılan padding -->
              
              <!-- Heading and subheading -->
                <h2 class="m-t-20">{{ __('auth.login.title') }}</h2>
                <p class="m-b-30">{{ __('Enter your credentials to get access') }}</p>
                @include('layouts.alerts')
                <form method="POST" action="{{ route('login.submit') }}">
                 @csrf <!-- CSRF protection -->

                 <!-- Email input -->
                 <div class="form-group"><!--  gruplandirma icin-->
                    <label class='font-weight-semibold'  for='email'>{{ __('auth.login.email') }}:</label>
                    <div class="input-affix"><!-- Input’un başına veya sonuna ikon eklemek için -->
                    <i class="prefix-icon anticon anticon-mail"></i> 
                     <input type="email"
                         name="email"
                         id="email"
                         value="{{ old('email') }}"
                         class="form-control"
                         placeholder="{{ __('auth.login.email') }}"
                         required> <!-- value="{{ old('email') }}" = Hata sonrası form yeniden yüklendiğinde önceki girilen değeri korur  -->
                    </div>
                 </div>

                 <!-- Password input -->
                  <div class="form-group">
                    <label class="font-weight-semibold" for="password">{{ __('auth.login.password') }}:</label>
                    <div class="input-affix m-b-10">
                    <i class="prefix-icon anticon anticon-lock"></i>
                    <input type="password"
                         name="password"
                         id="password"
                          class="form-control"
                         placeholder="{{ __('auth.login.password') }}"
                         required>
                    </div>
                       </div>
                <!-- Signup link & submit button -->
                  <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between">
                    <span class="font-size-13 text-muted">{{ __('auth.login.no_account') }}
                    <a class="small" href="{{ route('register') }}">{{ __('auth.login.register') }}</a></span>
                    <button class="btn btn-primary">{{ __('auth.login.submit') }}</button>
                    </div>
                      </div>
                 </form>
        </div>
        </div>
        </div>

       <!-- SAG RESIM -->
        <div class="offset-md-1 col-md-6 d-none d-md-block">
          <img class="img-fluid"  src="{{ asset('panel/assets/images/logo.jpg') }}" alt="logo">
         </div>
      
 </div>
        </div>
         @endsection