@extends('layouts.app')
@section('title', __('Ayarlar'))
@section('content')
<div class="container">
  <h2 class="mb-4">{{ __('Ayarlar') }}</h2>
  @include('layouts.alerts')
  <form method="POST" action="{{ route('settings.update') }}">
  @csrf
     <!-- Dil seçimi için açılır menü -->
    <div class="mb-3">
      <label for="locale" class="form-label">{{ __('Dil') }}</label>
       <!-- Dil seçeneklerini gösteren select -->
      <select name="locale" id="locale" class="form-select">
        <option value="tr" {{ $currentLocale==='tr'?'selected':'' }}>Türkçe</option>
        <option value="en" {{ $currentLocale==='en'?'selected':'' }}>English</option>
      </select>
    </div>
    <!-- Tema seçimi için açılır menü -->
    <div class="mb-3">
      <label for="theme" class="form-label">{{ __('Tema') }}</label>
      <select name="theme" id="theme" class="form-select">
        <option value="light" {{ $currentTheme==='light'?'selected':'' }}>{{ __('Açık') }}</option>
        <option value="dark"  {{ $currentTheme==='dark'?'selected':'' }}>{{ __('Koyu') }}</option>
      </select>
    </div>
   <!-- Formu gondereke ayarlari kontrol eder -->
    <button class="btn btn-primary">{{ __('Kaydet') }}</button>
  </form>
</div>
@endsection  