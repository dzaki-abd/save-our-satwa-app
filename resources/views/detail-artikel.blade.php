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

            @if ($user_id)
              <div id="favorite-button" class="favorite-button-artikel mt-3">
                @if ($isFavorite)
                  <form action="/favorite-remove-artikel" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">
                    <button type="submit" aria-label="unlike this artikel" class="like-button button-teal-500">
                      <i class="fa-solid fa-heart"></i>
                    </button>
                  </form>
                @else
                  <form action="/favorite-add-artikel" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">
                    <input type="hidden" name="judul" value="{{ $artikel->judul }}">
                    <input type="hidden" name="konten" value="{{ $deskripsi }}">
                    <input type="hidden" name="gambar" value="{{ $artikel->gambar}}">
                    <button type="submit" aria-label="like this artikel" class="like-button button-teal-500">
                      <i class="fa-regular fa-heart"></i>
                    </button>
                  </form>
                @endif
              </div>
            @endif
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
        <p>{{ $user_name }}</p>
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