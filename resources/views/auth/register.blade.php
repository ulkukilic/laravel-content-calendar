{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')
@section('title', __('auth.register.title'))
@section('content')

<div class="container-fluid register-page login-page"><!-- ekranın solundan sağına kadar yayılır ve kenar boşlukları korur-->
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
                <h2 class="m-t-20">{{ __('auth.register.title') }}</h2>
                <p class="m-b-30">{{ __('Enter your credentials to get access') }}</p>
                @include('layouts.alerts')
                 <form method="POST" action="{{ route('register.submit') }}">
                 @csrf <!-- CSRF protection -->
                <!-- Name-->
                <div class="form-group">
                <label class="font-weight-semibold" for="name">{{ __('auth.register.name') }}:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('auth.register.name') }}" required>
                </div>
                <!--Surname -->
                <div class="form-group">
                <label class="font-weight-semibold" for="surname">{{ __('auth.register.surname') }}:</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname') }}" class="form-control" placeholder="{{ __('auth.register.surname') }}" required>
                </div>
                <!-- Email -->
                <div class="form-group">
                <label class="font-weight-semibold" for="email">{{ __('auth.register.email') }}:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="{{ __('auth.register.email') }}" required>
                </div>
                <!--Password -->
                <div class="form-group">
                <label class="font-weight-semibold" for="password">{{ __('auth.register.password') }}:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('auth.register.password') }}" required>
                </div>
                <!--Password Confirmation -->
                <div class="form-group">
                <label class="font-weight-semibold" for="password_confirmation">{{ __('auth.register.password_confirm') }}:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('auth.register.password_confirm') }}" required>
                </div>
                <!-- Agreement checkbox & submit -->
                 <div class="form-group">
                 <div class="d-flex align-items-center justify-content-between p-t-15">
                 <div class="checkbox">
                 <<input id="agreement" name="agreement" type="checkbox" value="1" required>
                 <label for="agreement">
                 <span>{{ __('auth.register.agreement', ['agreement' => '<a href="#">'.__('Terms').'</a>']) }}</span>
                </label>
                </div>
                <button class="btn btn-primary">{{ __('auth.register.submit') }}</button>
                </div>
                </div>
                </form>
                
        </div>
        </div>
        </div>
  </div>
</div>

@endsection
