<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        {{-- LOGO --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('panel/assets/images/logo.jpg') }}" alt="Logo" height="40">
        </a>

        {{-- Mobil Menü Butonu --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menü Öğeleri --}}
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('calendar.*') ? 'active' : '' }}" 
                       href="{{ route('calendar.index') }}">
                        Takvim
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dash.*') ? 'active' : '' }}" 
                       href="{{ auth()->user()->role === 'admin' ? route('dash.admin') : route('dash.staff') }}">
                        Dashboard
                    </a>
                </li>
            </ul>

            {{-- Kullanıcı Profili --}}
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ auth()->user()->profile_photo_url ?? asset('panel/assets/images/default-profile.png') }}"
                                 alt="Profil" class="rounded-circle me-2" width="32" height="32">
                            <span>{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    Profilim
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Çıkış Yap
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">Giriş Yap</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
