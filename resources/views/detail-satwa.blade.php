@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div
    class="jumbotron-3"
    style="background-image: url('{{ asset('storage/' . $satwa->gambar) }}');"
  >
    <div class="jumbotron-container-3">
      <div class="container d-flex flex-column flex-lg-row gap-5 detail-satwa-container h-100">
        <div class="detail-poster d-flex flex-column gap-3">
          <nav
            aria-label="breadcrumb"
            data-bs-theme="dark"
          >
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li
                class="breadcrumb-item active"
                aria-current="page"
              >Detail Satwa</li>
            </ol>
          </nav>
          <div class="poster-box">
            <a
              href="{{ asset('storage/' . $satwa->gambar) }}"
              data-fancybox
            >
              <img
                src="{{ asset('storage/' . $satwa->gambar) }}"
                class="rounded"
              />
            </a>
            @if ($user_id)
                <div id="favorite-button">
                  @if ($isFavorite)
                    <form action="/favorite-remove-satwa" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="user_id" value="{{ $user_id }}">
                      <input type="hidden" name="satwa_id" value="{{ $satwa->id }}">
                      <button type="submit" aria-label="unlike this satwa" class="like-button button-teal-500">
                        <i class="fa-solid fa-heart"></i>
                      </button>
                    </form>
                  @else
                    <form action="/favorite-add-satwa" method="POST">
                      @csrf
                      <input type="hidden" name="user_id" value="{{ $user_id }}">
                      <input type="hidden" name="satwa_id" value="{{ $satwa->id }}">
                      <input type="hidden" name="nama_lokal" value="{{ $satwa->nama_lokal }}">
                      <input type="hidden" name="deskripsi" value="{{ $satwa->deskripsi }}">
                      <input type="hidden" name="gambar" value="{{ $satwa->gambar}}">
                      <button type="submit" aria-label="like this satwa" class="like-button button-teal-500">
                        <i class="fa-regular fa-heart"></i>
                      </button>
                    </form>
                  @endif
                </div>
            @endif
  
          </div>
        </div>
        <div class="detail-content d-flex flex-column justify-content-center gap-3">
          <h1>{{ $satwa->nama_lokal }}</h1>
          <table
            class="table m-0"
            width="100%"
            cellspacing="0"
          >
            <tbody>
              <tr>
                <th class="ps-0">Nama Inggris</th>
                <td class="p-2 ps-0 ps-md-5">{{ $satwa->nama_inggris }}</td>
              </tr>
              <tr>
                <th class="ps-0">Nama Ilmiah</th>
                <td class="p-2 ps-0 ps-md-5">{{ $satwa->nama_ilmiah }}</td>
              </tr>
              <tr>
                <th class="ps-0">Lokasi</th>
                <td class="p-2 ps-0 ps-md-5">{{ $satwa->lokasi }}</td>
              </tr>
              <tr>
                <th class="ps-0">Status</th>
                <td class="p-2 ps-0 ps-md-5">{{ $satwa->kategori_iucn }}</td>
              </tr>
              <tr>
                <th class="ps-0">Tren Populasi</th>
                <td class="p-2 ps-0 ps-md-5">{{ $satwa->tren_populasi }}</td>
              </tr>
              <tr>
                <th class="ps-0">Populasi</th>
                <td class="p-2 ps-0 ps-md-5">{{ $satwa->populasi }}</td>
              </tr>
              <tr>
                <th class="ps-0">Deskripsi</th>
              </tr>
              <tr>
                <td
                  colspan="2"
                  class="p-2 ps-0"
                >{{ $satwa->deskripsi }}</td>
              </tr>
              <tr>
                <th class="ps-0">Taksonomi</th>
              </tr>
              <tr>
                <td
                  colspan="2"
                  class="p-2 ps-0"
                >
                  <div class="taxonomy-box rounded p-3">
                    <div class="row">
                      <div class="col-6 col-md-4 d-flex flex-column p-2">
                        <h6>Kingdom</h6>
                        <h5>{{ strtolower($satwa->kingdom) }}</h5>
                      </div>
                      <div class="col-6 col-md-4 d-flex flex-column p-2">
                        <h6>Filum</h6>
                        <h5>{{ strtolower($satwa->filum) }}</h5>
                      </div>
                      <div class="col-6 col-md-4 d-flex flex-column p-2">
                        <h6>Kelas</h6>
                        <h5>{{ strtolower($satwa->kelas) }}</h5>
                      </div>
                      <div class="col-6 col-md-4 d-flex flex-column p-2">
                        <h6>Ordo</h6>
                        <h5>{{ strtolower($satwa->ordo) }}</h5>
                      </div>
                      <div class="col-6 col-md-4 d-flex flex-column p-2">
                        <h6>Famili</h6>
                        <h5>{{ strtolower($satwa->famili) }}</h5>
                      </div>
                      <div class="col-6 col-md-4 d-flex flex-column p-2">
                        <h6>Genus</h6>
                        <h5>{{ strtolower($satwa->genus) }}</h5>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <h3 class="text-center h3-top">RIWAYAT <span>SATWA</span></h3>
  <p class="text-center p-top">Menelusuri Riwayat dan Keunikan Kehidupan Satwa</p>

  <div class="shadow p-3 rounded">
    <div class="table-responsive pt-2 pb-2">
      <table
        class="table table-striped table-riwayat m-0"
        id="table-riwayat-satwa"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th class="border-0 text-gray-700">Laporan</th>
            <th class="border-0 text-gray-700">Tanggal Kejadian</th>
            <th class="border-0 text-gray-700">Jumlah Satwa Terdampak</th>
            <th class="border-0 text-gray-700">Status</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>

@endsection

@push('scripts')
  <script type="module">
    $('#table-riwayat-satwa').DataTable({
      fixedHeader: true,
      pageLength: 25,
      lengthChange: true,
      autoWidth: false,
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('get-riwayat-satwa', $satwa->id) }}",
        type: 'GET',
      },
      columns: [{
          data: 'pelanggaran_id',
          name: 'laporan'
        },
        {
          data: 'tanggal_kejadian',
          name: 'tanggal_kejadian'
        },
        {
          data: 'jumlah_satwa',
          name: 'jumlah_satwa_terdampak'
        },
        {
          data: 'status',
          name: 'status'
        },
      ]
    });
  </script>
@endpush
