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
                       href="{{ session('role') === 'admin' ? route('dash.admin'): route('dash.staff') }}">
                       Dashboard
                    </a>
                </li>
            </ul>

            @if(session('user_id'))
                <!-- Kullanıcı girişli -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown">
                    {{ session('full_name') }}
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Çıkış Yap
                        </a>
                    </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Giriş Yap</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
