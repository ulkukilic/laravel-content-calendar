{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')
@section('title','Register')
@section('content')

<div class="container-fluid"> <!-- ekranın solundan sağına kadar yayılır ve kenar boşlukları korur-->
    <div class="d-flex full-height p-v-20 flex-column justify-content-between"> <!--tam yükseklik alır, dikeyde 20px boşluk, içerikleri üst ve alt köşelere yerleştirir  -->
         {{-- Sol üst logo --}}
        <div class="d-none d-md-flex p-h-40"><!-- -->
             <img src="{{ asset('panel/assets/images/logo/logo.png') }}" alt="logo">
        </div>
         {{-- FORM KARTI --}}
        <div class="col-md-5"> <!--ekran genişliklerinde 12 sütunluk sistemin 5 sütununu kaplayarak form kartını sayfa düzenine göre konumlandırır-->
        <div class="card"> <!--Kart bileşeni: form alanını-->
        <div class="card-body"><!-- içinde yer alan form elemanlarına etrafında 1rem’lik varsayılan padding -->
              
              <!-- Heading and subheading -->
                <h2 class="m-t-20">Register</h2>
                <p class="m-b-30">Enter your credential to get access</p>
                @include('layouts.alerts')
                 <form method="POST" action="{{ route('register.submit') }}">
                 @csrf <!-- CSRF protection -->
                <!-- Name-->
                <div class="form-group">
                <label class="font-weight-semibold" for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required>
                </div>
                <!--Surname -->
                <div class="form-group">
                <label class="font-weight-semibold" for="surname">Last Name:</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname') }}" class="form-control" placeholder="Surname" required>
                </div>
                <!-- Email -->
                <div class="form-group">
                <label class="font-weight-semibold" for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                </div>
                <!--Password -->
                <div class="form-group">
                <label class="font-weight-semibold" for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
                <!--Password -->
                <div class="form-group">
                <label class="font-weight-semibold" for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>
                <!-- Agreement checkbox & submit -->
                 <div class="form-group">
                 <div class="d-flex align-items-center justify-content-between p-t-15">
                 <div class="checkbox">
                 <input id="agreement" type="checkbox" required>
                 <label for="agreement">
                 <span>I have read the <a href="">agreement</a></span>
                </label>
                </div>
                <button class="btn btn-primary">Sign In</button>
                </div>
                </div>
                </form>
                
        </div>
        </div>
        </div>
  </div>
</div>

   

@endsection
