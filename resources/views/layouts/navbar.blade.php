<nav class="navbar navbar-expand-lg" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="../img/logosos.png" alt="" style="height: 1.8rem">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                <li class="nav-item px-lg-2 my-sm-2">
                    <a href="/"
                        class="nav-link {{ Request::url() == url('/') || Request::url() == url('/index') ? 'active' : '' }}"
                        aria-current="page">Home</a>
                </li>
                <li class="nav-item px-lg-2 my-sm-2">
                    <a href="/satwa" class="nav-link {{ Request::url() == url('/satwa') ? 'active' : '' }}">Satwa</a>
                </li>
                <li class="nav-item px-lg-2 my-sm-2">
                    <a href="/artikel"
                        class="nav-link {{ Request::url() == url('/artikel') ? 'active' : '' }}">Artikel</a>
                </li>
                <li class="nav-item px-lg-2 my-sm-2">
                    <a href="/favorit"
                        class="nav-link {{ Request::url() == url('/favorit') ? 'active' : '' }}">Favorit</a>
                </li>
                <li class="nav-item px-lg-2 my-sm-2">
                    <a href="/donasi" class="nav-link {{ Request::url() == url('/donasi') ? 'active' : '' }}">Donasi</a>
                </li>
                <li class="nav-item px-lg-2 my-sm-2">
                    <a href="/laporkan"
                        class="nav-link {{ Request::url() == url('/laporkan') ? 'active' : '' }}">Laporkan</a>
                </li>
            </ul>
            @role('admin')
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item px-lg-2 my-sm-2">
                        <a href="{{ route('dashboard.index') }}"
                            class="nav-link @if (request()->routeIs('dashboard.index')) active @endif"
                            aria-current="page">Dashboard</a>
                    </li>
                </ul>
            @endrole
            <div class="d-flex login-button-box">
                @if (Auth::check())
                    <div class="dropdown">
                        <a href="/profil" class="btn text-decoration-none link-dark profile-picture rounded-circle">
                            @if (Auth::user()->foto)
                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profil"
                                    class="rounded-circle" style="width: 2rem; height: 2rem">
                            @else
                                <img src="../img/default-profil.png" alt="">
                            @endif
                        </a>
                    </div>
            </div>
        @else
            <div class="d-flex login-button-box">
                <a class="button-teal-500" href="/login">Masuk</a>
            </div>
            @endif
        </div>
    </div>
</nav>
