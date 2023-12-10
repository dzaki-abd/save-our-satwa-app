@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-4 jumbotron-search-4" style="background-image: url('{{ asset('storage/' . $artikel->gambar) }}')">
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
            <div id="favorite-button" class="favorite-button-artikel mt-3">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="container shadow rounded detail-artikel-container p-2 p-md-3">
    <a href="{{ asset('storage/' . $artikel->gambar) }}" data-fancybox class="favorite-button-artikel-box">
      <img src="{{ asset('storage/' . $artikel->gambar) }}" class="rounded" alt="">
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
              <a href="/artikel?kata_kunci={{ $tag }}" class="button-teal-500">{{ $tag }}</a>
          @endforeach
      </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script type="module">
      import LikeButtonInitiator from '{{ asset('js/utils/like-button-artikel-initiator.js') }}';

      LikeButtonInitiator.init({
        likeButtonContainer: document.getElementById('favorite-button'),
        artikel: {
          id: {{ $artikel->id }},
          user_id: {{ $user_id }},
          title: '{{ $artikel->judul }}',
          description: '{{ $deskripsi }}',
          image: '{{ $artikel->gambar }}',
          updated_at: '{{ $artikel->updated_at }}'
        },
      });

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