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
        <form class="form-seach d-flex gap-2" action="/artikel" method="">
          @if (request('jenis'))
            <input type="hidden" name="jenis" value="{{ request('jenis') }}">
          @endif
          <input class="form-control" type="text" name="search" id="search" placeholder="cari artikel atau berita...">
          <button type="submit" class="button-teal-500">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
          <button type="button" class="button-teal-500"  data-bs-toggle="modal" data-bs-target="#filterArtikel">
            <i class="fa-solid fa-sliders"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <h3 class="text-center h3-top">ARTIKEL <span>& BERITA</span></h3>
  <p class="text-center p-top">Telusuri Lebih Lanjut Artikel dan Berita Terkait Satwa</p>
  
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

  <div class="d-flex justify-content-center">
    <nav aria-label="..." class="mt-4">
      <ul class="pagination mb-0">
          @if ($artikelList->onFirstPage())
              <li class="page-item disabled">
                  <span class="page-link">Previous</span>
              </li>
          @else
              <li class="page-item">
                  <a class="page-link" href="{{ $artikelList->previousPageUrl() }}" rel="prev">Previous</a>
              </li>
          @endif

          @for ($i = max(1, $artikelList->currentPage() - 1); $i <= min($artikelList->lastPage(), $artikelList->currentPage() + 1); $i++)
              <li class="page-item{{ ($i == $artikelList->currentPage()) ? ' active' : '' }}">
                  <a class="page-link" href="{{ $artikelList->url($i) }}">{{ $i }}</a>
              </li>
          @endfor

          @if ($artikelList->hasMorePages())
              <li class="page-item">
                  <a class="page-link" href="{{ $artikelList->nextPageUrl() }}" rel="next">Next</a>
              </li>
          @else
              <li class="page-item disabled">
                  <span class="page-link">Next</span>
              </li>
          @endif
      </ul>
    </nav>
  </div>
  @endif

  <!-- Modal -->
  <div class="modal fade" id="filterArtikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-teal-500" id="exampleModalLabel">Filter</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/artikel" method="">
            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis</label>
              <select  id="jenis" name="jenis" class="form-select" aria-label="Default select example">
                <option selected value="{{ request('jenis') }}">{{ request('jenis') ? request('jenis') : 'Pilih' }}</option>
                <option value="Artikel">Artikel</option>
                <option value="Berita">Berita</option>
              </select>
            </div>
            <div class="modal-footer pb-0">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <a href="/artikel" class="button-teal-500">Reset</a>
              <button type="submit" class="button-teal-500">Gunakan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
