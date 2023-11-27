@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-2 jumbotron-search-2">
    <div class="container jumbotron-container-2">
      <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-start align-items-md-center h-100 jumbotron-content-2 gap-3">
        <div>
          <h2 class="text-white">SATWA</h2>
          <nav aria-label="breadcrumb" data-bs-theme="dark">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Satwa</li>
            </ol>
          </nav>
        </div>
        <form class="form-seach d-flex gap-2" action="" method="">
          <input class="form-control" type="text" name="search" id="search" placeholder="cari satwa...">
          <button type="submit" class="button-teal-500">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <h3 class="text-center h3-top">INFORMASI <span>SATWA</span></h3>
  <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
  
  <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3 g-lg-4">
    @for ( $i = 0; $i < 7; $i++ )
    <div class="col">
      <a href="/detail-satwa" class="card satwa-box border-0"> 
        <div class="satwa-overlay">
          <img src="../img/donasi.jpg" alt="" />
        </div>
        <div class="satwa-content">
          <h6>Kakaktua Raja</h6>
          <p class="m-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt vero voluptatum laboriosam sequi! Explicabo officia, aut, tempore debitis aspernatur alias</p>
        </div>
      </a>
    </div>
    @endfor
  </div>
@endsection
