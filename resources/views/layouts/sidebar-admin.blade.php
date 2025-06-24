{{-- resources/views/layouts/sidebar-admin.blade.php --}}
<aside class="vh-100 bg-light border-end" style="width:240px;">
  <ul class="nav flex-column py-4 px-2 fw-semibold">

    {{--  Takvim --}}
    <li class="nav-item mb-2">
      <a class="nav-link d-flex align-items-center {{ request()->routeIs('calendar.*') ? 'active text-primary' : 'text-dark' }}"
         href="{{ route('calendar.index') }}">
        📅 <span class="ms-2">{{ __('calendar.title') }}</span>
      </a>
    </li>

    {{--  Çalışanlar – başlık etiketi --}}
    <li class="nav-item text-muted small text-uppercase px-2 mt-3 mb-1">
      {{ __('Çalışanlar') }}
    </li>

    {{--  Çalışan Ekle --}}
    <li class="nav-item ms-3 mb-1">
      <a class="nav-link d-flex align-items-center {{ request()->routeIs('users.create') ? 'active text-primary' : 'text-dark' }}"
         href="{{ route('users.create') }}">
        ➕ <span class="ms-2">{{ __('Çalışan Ekle') }}</span>
      </a>
    </li>

    {{--   Çalışanları Sil / Listele --}}
    <li class="nav-item ms-3 mb-1">
      <a class="nav-link d-flex align-items-center {{ request()->routeIs('users.index') ? 'active text-primary' : 'text-dark' }}"
         href="{{ route('users.index') }}">
        🗑️ <span class="ms-2">{{ __('Çalışan Listesi / Sil') }}</span>
      </a>
    </li>

    {{-- Çalışan Blogları --}}
    <li class="nav-item ms-3 mb-2">
      <a class="nav-link d-flex align-items-center {{ request()->routeIs('users.blogs') ? 'active text-primary' : 'text-dark' }}"
         href="{{ route('users.blogs') }}">
        📝 <span class="ms-2">{{ __('Çalışan Blogları') }}</span>
      </a>
    </li>

    {{--   Ayarlar --}}
    <li class="nav-item mb-2">
      <a class="nav-link d-flex align-items-center {{ request()->routeIs('settings.*') ? 'active text-primary' : 'text-dark' }}"
         href="{{ route('settings.show') }}">
        ⚙️ <span class="ms-2">{{ __('Ayarlar') }}</span>
      </a>
    </li>

    {{--   Çıkış --}}
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
