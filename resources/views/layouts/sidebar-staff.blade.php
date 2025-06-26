
  <!-- <aside class="vh-100 bg-light border-end" style="width: 240px;">
   Tam yüksekliğe sahip, sol kenarda sabit duran açık renkli yan çubuk (240px genişlik) -->
  
    <!-- <ul class="nav flex-column py-4 px-2 fw-semibold">
   Dikey yönde sıralanan, içten boşluklu ve kalın yazı stilli navigasyon menüsü -->

    <nav class="side-nav bg-white vh-100 overflow-auto border-end">
    <div class="side-nav-inner">  <!-- Tüm yan menü içeriğini saran kapsayıcı -->
        <ul class="side-nav-menu scrollable">
    {{-- Takvim --}}
    <li class="nav-item mb-2">
      <a class="nav-link d-flex align-items-center {{ request()->routeIs('calendar.*') ? 'active text-primary' : 'text-dark' }}"
         href="{{ route('calendar.index') }}">
        📅 <span class="ms-2">{{ __('calendar.title') }}</span>
      </a>
    </li>

    
    {{-- Blog / İçerik --}}
    <li class="nav-item mb-2">
      <a class="nav-link d-flex align-items-center {{ request()->routeIs('content.*') ? 'active text-primary' : 'text-dark' }}"
         href="{{ route('content.index') }}">
        📝 <span class="ms-2">Blog</span>
      </a>
    </li>

       {{-- Ayarlar --}}
    <li class="nav-item mb-2">
      <a class="nav-link d-flex align-items-center {{ request()->routeIs('settings.*') ? 'active text-primary' : 'text-dark' }}"
         href="{{ route('settings.show') }}">
        ⚙️ <span class="ms-2">{{ __('Ayarlar') }}</span>
      </a>
    </li>

    {{-- Çıkış --}}
    <li class="nav-item mt-auto">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-link nav-link d-flex align-items-center text-danger">
          🚪 <span class="ms-2">{{ __('auth.logout') }}</span>
        </button>
      </form>
    </li>
  </ul>
</aside>