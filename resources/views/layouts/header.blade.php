<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Sayfa başlığı: eğer @section('title') kullanılmamışsa varsayılan -->
  <title>@yield('title', 'Takvim Uygulaması')</title>

 </head>
<body>
  <header class="bg-white shadow-sm py-3 mb-4">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Logo / Site Adı -->
      <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Takvim Logo" height="40">
        <span class="ms-2 fw-bold">Takvim</span>
      </a>

      <!-- Tema / Dil Seçici veya Basit Menü -->
      <div class="d-flex gap-2">
        {{-- Dil --}}
        <a href="{{ url('lang/tr') }}" class="btn btn-sm btn-outline-primary">TR</a>
        <a href="{{ url('lang/en') }}" class="btn btn-sm btn-outline-primary">EN</a>>
        <!--  Karanlık/aydınlık mod butonu -->
        <a href="{{ url('theme/light') }}" class="btn btn-sm btn-outline-secondary">☀️</a>
        <a href="{{ url('theme/dark') }}"  class="btn btn-sm btn-outline-secondary">🌙</a>
      </div>
    </div>
  </header>
</body>
</html>
