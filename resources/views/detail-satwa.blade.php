@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-3" style="background-image: url('{{ asset('storage/img/satwa_images/' . $satwa->gambar) }}');">
    <div class="jumbotron-container-3">
      <div class="container d-flex flex-column flex-lg-row gap-5 detail-satwa-container h-100">
        <div class="detail-poster d-flex flex-column gap-3">
          <nav aria-label="breadcrumb" data-bs-theme="dark">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Satwa</li>
            </ol>
          </nav>
          <div class="poster-box">
            <a href="{{ asset('storage/img/satwa_images/' . $satwa->gambar) }}" data-fancybox>
              <img src="{{ asset('storage/img/satwa_images/' . $satwa->gambar) }}" class="rounded"/>
            </a>
            <div id="favorite-button">

            </div>
          </div>
        </div>
        <div class="detail-content d-flex flex-column justify-content-center gap-3">
          <h1>{{ $satwa->nama_lokal }}</h1>
          <table class="table m-0" width="100%" cellspacing="0">
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
                <td colspan="2" class="p-2 ps-0">{{ $satwa->deskripsi }}</td>
              </tr>
              <tr>
                <th class="ps-0">Taksonomi</th>
              </tr>
              <tr>
                <td colspan="2" class="p-2 ps-0">
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
  <p class="text-center p-top">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>

  <div class="shadow p-3 rounded">
    <div class="table-responsive pt-2 pb-2">
      <table
        class="table table-striped table-riwayat m-0"
        id="detailSatwa"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th class="border-0 text-gray-700">Laporan</th>
            <th class="border-0 text-gray-700">Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-gray-700">Laporan</th>
            <th class="text-gray-700">Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          @for ($i = 0; $i < 2; $i++)
            <tr class="align-middle">
              <td class="text-gray-600">
                <h6 class="mb-2">PERBURUAN HEWAN KAKAKTUA RAJA</h6>
                <p class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore modi in a provident delectus repudiandae voluptate reprehenderit corrupti veritatis, iusto vero doloremque dolores aperiam animi dolor cum sit dolore voluptas.</p>
                <div class="d-flex gap-2 align-items-center mb-2 icon-riwayat">
                  <i class="fa-solid fa-calendar"></i>
                  <p class="m-0">20 November 2023</p>
                </div>
                <div class="d-flex gap-2 align-items-center icon-riwayat">
                  <i class="fa-solid fa-clock-rotate-left"></i>
                  <p class="m-0">27 November 2023</p>
                </div>
              </td>
              <td class="">
                <div class="d-flex gap-1">
                  <button type="submit" class="button-teal-500"><i class="fa-solid fa-eye"></i></button>
                </div>
              </td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="module">
    import LikeButtonInitiator from '{{ asset('js/utils/like-button-satwa-initiator.js') }}';

    LikeButtonInitiator.init({
      likeButtonContainer: document.getElementById('favorite-button'),
      satwa: {
        id: {{ $satwa->id }},
        name: '{{ $satwa->nama_lokal }}',
        description: '{{ $satwa->deskripsi }}',
        image: '{{ $satwa->gambar }}'
      },
    });
  </script>
@endpush