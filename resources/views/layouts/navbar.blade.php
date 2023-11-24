<nav
  class="navbar navbar-expand-lg fixed-top"
  data-bs-theme="dark"
>
  <div class="container">
    <a
      class="navbar-brand"
      href="#"
    >Logo</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div
      class="collapse navbar-collapse"
      id="navbarSupportedContent"
    >
      <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
        <li class="nav-item px-lg-2 my-sm-2">
          <a
            href="/"
            class="nav-link {{ Request::url() == url('/') || Request::url() == url('/index') ? 'active' : '' }}"
            aria-current="page"
          >Home</a>
        </li>
        <li class="nav-item px-lg-2 my-sm-2">
          <a
            href="/satwa"
            class="nav-link {{ Request::url() == url('/satwa') ? 'active' : '' }}"
          >Satwa</a>
        </li>
        <li class="nav-item px-lg-2 my-sm-2">
          <a
            href="/artikel"
            class="nav-link {{ Request::url() == url('/artikel') ? 'active' : '' }}"
          >Artikel</a>
        </li>
        <li class="nav-item px-lg-2 my-sm-2">
          <a
            href="/favorit"
            class="nav-link {{ Request::url() == url('/favorit') ? 'active' : '' }}"
          >Favorit</a>
        </li>
        <li class="nav-item px-lg-2 my-sm-2">
          <a
            href="/donasi"
            class="nav-link {{ Request::url() == url('/donasi') ? 'active' : '' }}"
          >Donasi</a>
        </li>
        <li class="nav-item px-lg-2 my-sm-2">
          <a
            href="/laporkan"
            class="nav-link {{ Request::url() == url('/laporkan') ? 'active' : '' }}"
          >Laporkan</a>
        </li>
      </ul>
      <div class="d-flex login-button-box">
        @if (Auth::check())
          <div class="dropdown">
            <a
              href="#"
              class="btn text-decoration-none link-dark profile-picture rounded-circle"
              role="button"
              id="dropdownMenuLink"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src="../img/profie-picture.jpg"
                alt=""
              >
            </a>
            <ul
              class="dropdown-menu shadow dropdown-profile"
              aria-labelledby="dropdownMenuLink"
            >
              <li>
                <a
                  href="/profil"
                  class="p-2 px-3 text-decoration-none"
                >Profil</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="d-flex align-items-center gap-1">
                <a
                  class="ps-3 pe-1 text-decoration-none"
                  href="#"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >Keluar</a>
                <i class="fa-solid fa-right-from-bracket"></i>
                <form
                  id="logout-form"
                  action="{{ route('logout') }}"
                  method="POST"
                  class="d-none"
                >
                  @csrf
                </form>
              </li>
            </ul>
          </div>
      </div>
    @else
      <div class="d-flex login-button-box">
        <a
          class="btn button-teal-500"
          href="/login"
        >Login</a>
      </div>
      @endif
    </div>
  </div>
</nav>
