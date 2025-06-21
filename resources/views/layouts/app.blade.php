<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
@if($theme === 'dark')
  <link href="{{ asset('css/app-dark.css') }}" rel="stylesheet">
@else
  <link href="{{ asset('css/app-light.css') }}" rel="stylesheet">
@endif

  <title>@yield('title')</title>
  <link href="{{ asset('panel/assets/css/layouts.css') }}" rel="stylesheet">
</head>
<body>
  <div class="page-layout">
    <aside class="sidebar">
       @if(session('role') === 'admin')
        @include('layouts.sidebar-admin') 
       @elseif(session('role') === 'staff')
        @include('layouts.sidebar-staff')
      @endif 
    </aside>
      <div class="container-inner"> <!--İçeriği merkezde tutan iç konteyner -->
      <main class="content-wrapper"><!-- Sayfa içeriğinin ana sarmalayıcısı-->
         <h1 class="page-title">@yield('page_title')</h1>
        @include('layouts.alerts')
        @yield('content')
      </main>
    </div>
  </div>
   @include('layouts.footer') 
  </body>
</html>