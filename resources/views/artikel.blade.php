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
  <p class="text-center p-top">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
  
  <div class="row row-cols-1 row-cols-lg-2 g-3 g-md-4">
    @for ( $i = 0; $i < 7; $i++ )
    <div class="col">
      <div class="card border-0 shadow">
        <div class="row g-0">
          <div class="col-md-4 artikel-poster">
            <img src="../img/donasi.jpg" class="rounded" alt="...">
          </div>
          <div class="col-md-8 artikel-content">
            <div class="card-body">
              <h5 class="card-title mb-0">Card title</h5>
              <p class="card-text mb-2 mb-md-3"><small class="text-body-secondary">Last updated 28 November 2023</small></p>
              <p class="card-text mb-2 mb-md-3 description">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et numquam distinctio quibusdam libero sint minus! Aspernatur, qui a minima incidunt cumque quod cum quos doloremque. Dolor esse ab dignissimos iure?</p>
              <a href="/detail-artikel" class="button-teal-500">Baca</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endfor
  </div>
@endsection
