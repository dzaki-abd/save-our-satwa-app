@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-2 jumbotron-search-2">
    <div class="container jumbotron-container-2">
      <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-start align-items-md-center h-100 jumbotron-content-2 gap-3">
        <div>
          <h2 class="text-white">ARTIKEL & BERITA</h2>
          <nav aria-label="breadcrumb" data-bs-theme="dark">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Artikel</li>
            </ol>
          </nav>
        </div>
        <form class="form-seach d-flex gap-2" action="" method="">
          <input class="form-control" type="text" name="search" id="search" placeholder="cari artikel atau berita...">
          <button type="submit" class="button-teal-500">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <h3 class="text-center h3-top">ARTIKEL <span>& BERITA</span></h3>
  <p class="text-center p-top">Telusuri lebih lanjut artikel dan berita terkait satwa.</p>
  
  @if ($artikelList->count() === 0)
      <p class="text-center mb-0">Belum ada data yang tersedia</p>
  @else 
  <div class="row row-cols-1 row-cols-lg-2 g-3 g-md-4">
    @foreach ( $artikelList as $data )
    <div class="col">
      <div class="card border-0 shadow">
        <div class="row g-0">
          <div class="col-md-4 artikel-poster">
            <img class="rounded" src="{{ asset('storage/' . $data->gambar) }}" alt="" />
          </div>
          <div class="col-md-8 artikel-content">
            <div class="card-body">
              <h5 class="card-title mb-0">{{ $data->judul }}</h5>
              <p class="card-text mb-2 mb-md-3"><small class="text-body-secondary">Last updated {{ \Carbon\Carbon::parse($data->updated_at)->format('d F Y') }}</small></p>
              <p class="card-text mb-2 mb-md-3 description">{{ $data->konten }}</p>
              <a href="/detail-artikel/{{ $data->id }}" class="button-teal-500">Baca</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif
@endsection
