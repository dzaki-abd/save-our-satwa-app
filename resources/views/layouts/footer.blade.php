@php
    $currentRoute = Route::currentRouteName();
    $isDetailArtikel = Str::startsWith($currentRoute, 'detail-artikel');
@endphp

<div class="footer card text-center p-0 shadow {{ $isDetailArtikel || Request::url() == url('/') || Request::url() == url('/index') ? 'active' : '' }}" data-bs-theme="dark">
  <div class="container">
    <div class="card-body d-flex flex-column justify-content-between gap-4 container flex-lg-row p-0">
      <div class="card border-0" style="min-width: 20rem; width: 100%">
        <div class="text-start p-0">
          <img src="{{ asset('img/logosos.png') }}" alt="" class="mb-2" style="height: 1.8rem">
          <p class="card-text mt-3"> Save Our Satwa, aplikasi pelaporan tindakan ilegal terhadap satwa langka dan sumber informasi detail serta artikel menarik tentang satwa. Lindungi kehidupan satwa dengan memberikan suaramu melalui aplikasi ini.</p>
        </div>
      </div>
      <div class="card border-0" style="width: 100%">
        <div class="text-start d-flex justify-content-start justify-content-lg-end p-0">
          <div class="d-flex flex-column gap-3">
              <h5 class="card-title">Navigasi</h5>
              <a href="/" class="nav-link">Home</a>
              <a href="/satwa" class="nav-link">Satwa</a>
              <a href="/artikel" class="nav-link">Artikel</a>
              <a href="/favorit" class="nav-link">Favorit</a>
              <a href="/donasi" class="nav-link">Donasi</a>
              <a href="/laporkan" class="nav-link">Laporkan</a>
          </div>
        </div>
      </div>
      <div class="card border-0" style="width: 100%">
        <div class="text-start d-flex justify-content-start justify-content-lg-end p-0">
          <div class="d-flex flex-column gap-3">
            <h5 class="card-title">Akun</h5>
            <a href="/profil" class="nav-link">Profil</a>
            <a href="/login" class="nav-link">Masuk</a>
            <a href="/register" class="nav-link">Daftar</a>
          </div>
        </div>
    </div>
      <div class="card border-0" style="width: 100%">
        <div class="text-start d-flex justify-content-start justify-content-lg-end p-0">
          <div class="d-flex flex-column gap-3">
              <h5 class="card-title">Kontak</h5>
              <a href="mailto:saveoursatwa@gmail.com?subject=Halo Save Our Satwa!" target="blank_" rel="noopener" class="nav-link">Email</a>
              <a href="https://x.com/saveoursatwa?s=21" target="blank_" rel="noopener" class="nav-link">Twitter</a>
              <a href="https://instagram.com/saveoursatwa?igshid=OGQ5ZDc2ODk2ZA==" target="blank_" rel="noopener" class="nav-link">Instagram</a>
          </div>
        </div>
      </div>
      <div class="card border-0" style="width: 100%">
        <div class="text-start d-flex justify-content-start justify-content-lg-end p-0">
          <div class="d-flex flex-column  gap-3">
              <h5 class="card-title">Alamat</h5>
              <p class="card-text m-0" class="nav-link">Ciputra, Bandung</p>
              <p class="card-text m-0" class="nav-link">Rungkut, Surabaya</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer p-3">
      &copy;SaveOurSatwa - 2023
    </div>
  </div>
</div>