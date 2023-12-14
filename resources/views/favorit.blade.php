@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
    <div class="jumbotron-2 jumbotron-search-2" style="background-image: url('{{ asset('img/jumbotron-2.jpg') }}')">
        <div class="container jumbotron-container-2">
            <div
                class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-start align-items-md-center h-100 jumbotron-content-2 gap-3">
                <div>
                    <h2 class="text-white">FAVORIT</h2>
                    <nav aria-label="breadcrumb" data-bs-theme="dark">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Favorit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <h3 class="text-center h3-top">FAVORIT <span>SATWA</span> & ARTIKEL</h3>
    <p class="text-center p-top">Lihat List Satwa dan Artikel yang Anda Favoritkan</p>

    <ul class="nav nav-tabs border-bottom-success mt-2 bg-white shadow"
        style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2">
        <li class="nav-item">
            <button id="buttonSatwa" class="button-teal-500"
                style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
                data-id="Satwa">
                Satwa
            </button>
        </li>
        <li class="nav-item">
            <button id="buttonArtikel" class="button-white"
                style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
                data-id="Artikel">
                Artikel
            </button>
        </li>
    </ul>

    <div class="not-found-container-satwa">
      @if ($favoritSatwa->isEmpty())
        <p class="text-center mb-0 mt-4">Belum ada data yang ditambahkan</p>
      @endif
    </div>

    <div class="not-found-container-artikel d-none">
      @if ($favoritArtikel->isEmpty())
        <p class="text-center mb-0 mt-4">Belum ada data yang ditambahkan</p>
      @endif
    </div>

    <div class="favorite-satwa-container row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3 g-lg-4 mt-2">
      @foreach ($favoritSatwa as $data)
        <div class="col">
          <a href="/detail-satwa/{{ $data->satwa_id }}" class="card satwa-box border-0">
            <div class="satwa-overlay">
              <img src="{{ asset('storage/' . $data->gambar) }}" alt="" />
            </div>
            <div class="satwa-content">
              <h6>{{ $data->nama_lokal }}</h6>
              <p class="m-0">{{ $data->deskripsi }}</p>
            </div>
          </a>
        </div>
      @endforeach
    </div>

    <div class="favorite-artikel-container row row-cols-1 row-cols-lg-2 g-3 g-md-4 d-none mt-2">
      @foreach ( $favoritArtikel as $data )
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
                  <a href="/detail-artikel/{{ $data->artikel_id }}" class="button-teal-500">Baca</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/utils/favorite-initiator.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endpush
