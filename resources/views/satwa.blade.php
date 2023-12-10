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
        <form class="form-seach d-flex gap-2" action="/satwa" method="">
          @if (request('lokasi'))
            <input type="hidden" name="lokasi" value="{{ request('lokasi') }}">
          @endif
          @if (request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
          @endif
          @if (request('tren_populasi'))
            <input type="hidden" name="tren_populasi" value="{{ request('tren_populasi') }}">
          @endif
          <input class="form-control" type="text" name="search" id="search" placeholder="cari satwa..." value="{{ request('search') }}" required>
          <button type="submit" class="button-teal-500">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
          <button type="button" class="button-teal-500"  data-bs-toggle="modal" data-bs-target="#filterSatwa">
            <i class="fa-solid fa-sliders"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <h3 class="text-center h3-top">INFORMASI <span>SATWA</span></h3>
  <p class="text-center p-top">Jelajahi Informasi tentang Satwa yang Dilindungi</p>
  
  @if ($satwaList->count() === 0)
    <p class="text-center mb-0">Belum ada data yang tersedia</p>
  @else 
  <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3 g-lg-4">
    @foreach ($satwaList as $data)
    <div class="col">
      <a href="/detail-satwa/{{ $data->id }}" class="card satwa-box border-0">
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

  <div class="d-flex justify-content-center">
    <nav aria-label="..." class="mt-4">
      <ul class="pagination mb-0">
          @if ($satwaList->onFirstPage())
              <li class="page-item disabled">
                  <span class="page-link">Previous</span>
              </li>
          @else
              <li class="page-item">
                  <a class="page-link" href="{{ $satwaList->previousPageUrl() }}" rel="prev">Previous</a>
              </li>
          @endif

          @for ($i = max(1, $satwaList->currentPage() - 1); $i <= min($satwaList->lastPage(), $satwaList->currentPage() + 1); $i++)
              <li class="page-item{{ ($i == $satwaList->currentPage()) ? ' active' : '' }}">
                  <a class="page-link" href="{{ $satwaList->url($i) }}">{{ $i }}</a>
              </li>
          @endfor

          @if ($satwaList->hasMorePages())
              <li class="page-item">
                  <a class="page-link" href="{{ $satwaList->nextPageUrl() }}" rel="next">Next</a>
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
  <div class="modal fade" id="filterSatwa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-teal-500" id="exampleModalLabel">Filter</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/satwa" method="">
            <div class="mb-3">
              <label for="lokasi" class="form-label">Lokasi</label>
              <select  id="lokasi" name="lokasi" class="form-select" aria-label="Default select example">
                <option selected value="{{ request('lokasi') }}">{{ request('lokasi') ? request('lokasi') : 'Pilih' }}</option>
                <option value="Jawa">Jawa</option>
                <option value="Sumatra">Sumatra</option>
                <option value="Kalimantan">Kalimantan</option>
                <option value="Sulawesi">Sulawesi</option>
                <option value="Papua">Papua</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select  id="status" name="status" class="form-select" aria-label="Default select example">
                <option selected value="{{ request('status') }}">{{ request('status') ? request('status') : 'Pilih' }}</option>
                <option value="EX">Extinct (EX) - Punah</option>
                <option value="EW">Extinct in the Wild (EW) - Punah di Alam Liar</option>
                <option value="CR">Critically Endangered (CR) - Terancam Punah</option>
                <option value="EN">Endangered (EN) - Terancam</option>
                <option value="NT">Near Threatened (NT) - Hampir Terancam</option>
                <option value="LC">Least Concern (LC) - Risiko Rendah</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="tren_populasi" class="form-label">Tren Populasi</label>
              <select  id="tren_populasi" name="tren_populasi" class="form-select" aria-label="Default select example">
                <option selected value="{{ request('tren_populasi') }}">{{ request('tren_populasi') ? request('tren_populasi') : 'Pilih' }}</option>
                <option value="Stable">Stable - Stabil</option>
                <option value="Decreasing">Decreasing - Menurun</option>
                <option value="Increasing">Increasing - Bertambah</option>
              </select>
            </div>
            <div class="modal-footer pb-0">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <a href="/satwa" class="button-teal-500">Reset</a>
              <button type="submit" class="button-teal-500">Gunakan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
