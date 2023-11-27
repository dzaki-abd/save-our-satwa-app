<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion"id="accordionSidebar">
  <div class="sidebar-brand d-flex align-items-center justify-content-center">
    <img src="../../img/logosos.png" alt="" style="height: 1.8rem">
  </div>

  <hr class="sidebar-divider my-0" />
  <li class="nav-item {{ Request::url() == url('/dashboard/dashboard') ? 'active' : '' }}">
    <a
      href="/dashboard/dashboard"
      class="nav-link"
    >
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <hr class="sidebar-divider" />

  <div class="sidebar-heading">Halaman</div>

  <li class="nav-item {{ Request::url() == url('/dashboard/admin') ? 'active' : '' }}">
    <a
      href="/dashboard/admin"
      class="nav-link"
    >
      <i class="fa-solid fa-user fa-sm fa-fw"></i>
      <span>Admin</span>
    </a>
  </li>
  <li class="nav-item {{ Request::url() == url('/dashboard/laporan') ? 'active' : '' }}">
    <a
      href="/dashboard/laporan"
      class="nav-link"
    >
      <i class="fa-solid fa-clipboard-list fa-sm fa-fw"></i>
      <span>Laporan</span>
    </a>
  </li>
  <li
    class="nav-item {{ Request::url() == url('dashboard/satwa') || Request::url() == url('dashboard/satwa*') ? 'active' : '' }}"
  >
    <a
      href="/dashboard/satwa"
      class="nav-link"
    >
      <i class="fa-solid fa-dove fa-sm fa-fw"></i>
      <span>Satwa</span>
    </a>
  </li>
  <li
    class="nav-item @if (request()->routeIs('dashboard.artikel.*')) active @endif"
  >
    <a
      href="{{ route('dashboard.artikel.index') }}"
      class="nav-link"
    >
      <i class="fa-solid fa-newspaper fa-sm fa-fw"></i>
      <span>Artikel</span>
    </a>
  </li>
  <li class="nav-item {{ Request::url() == url('/dashboard/donasi') ? 'active' : '' }}">
    <a
      href="/dashboard/donasi"
      class="nav-link"
    >
      <i class="fa-solid fa-hand-holding-dollar fa-sm fa-fw"></i>
      <span>Donasi</span>
    </a>
  </li>

  <hr class="sidebar-divider d-none d-md-block" />

  <div class="sidebar-heading">Keluar</div>

  <li class="nav-item">
    <a
      class="nav-link"
      style="cursor: pointer"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    >
      <i class="fa-solid fa-right-from-bracket fa-sm fa-fw"></i>
      <span>Keluar</span>
    </a>
    <form
      id="logout-form"
      action="{{ route('logout') }}"
      method="POST"
      class="d-none"
    >
      @csrf
    </form>
  </li>

  <hr class="sidebar-divider d-none d-md-block" />

  <div class="text-center d-none d-md-inline">
    <button
      class="rounded-circle border-0"
      id="sidebarToggle"
    ></button>
  </div>
</ul>
