@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-4 jumbotron-search-4" style="background-image: url('{{ asset('storage/img/artikel_images/' . $artikel->gambar) }}')">
    <div class="jumbotron-container-4">
      <div class="container h-100">
        <div class="d-flex align-items-center justify-content-center h-100 jumbotron-content-4">
          <div class="d-flex flex-column align-items-start">
            <h2 class="text-white mb-1">{{ $artikel->judul }}</h2>
            <nav aria-label="breadcrumb" data-bs-theme="dark">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Artikel</li>
              </ol>
            </nav>
            <div class="like-button button-teal-500 mt-3">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="container shadow rounded detail-artikel-container p-2 p-md-3">
    <a href="{{ asset('storage/img/artikel_images/' . $artikel->gambar) }}" data-fancybox>
      <img src="{{ asset('storage/img/artikel_images/' . $artikel->gambar) }}" class="rounded" alt="">
    </a>

    <div class="row g-0 mt-4">
      <div class="col-lg-9 detail-artikel-content pe-0 pe-lg-5">
        {!! $artikel->konten !!}
      </div>
      <div class="col-lg-3 detail-artikel-sidebar">
        <h6>Jenis</h6>
        <p>{{ $artikel->jenis }}</p>
        <h6>Penulis</h6>
        <p>Admin</p>
        <h6>Diterbitkan</h6>
        <p>{{ \Carbon\Carbon::parse($artikel->created_at)->format('d F Y') }}</p>
        <h6>Diubah</h6>
        <p>{{ \Carbon\Carbon::parse($artikel->updated_at)->format('d F Y') }}</p>
        <h6>Kata Kunci</h6>
        <div class="d-flex flex-wrap gap-2">
          @php
              $tags = explode(', ', $artikel->tag);
          @endphp
      
          @foreach ($tags as $tag)
              <div class="button-teal-500">{{ $tag }}</div>
          @endforeach
      </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script>
      const table = document.querySelector("table");
      if (table) {
        table.classList.add("table", "table-striped");
      }

      const figure = document.querySelector("figure");
      if (figure) {
        figure.classList.add("table-responsive");
      }
    </script>
@endpush
