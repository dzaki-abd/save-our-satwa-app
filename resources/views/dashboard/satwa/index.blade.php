@extends('dashboard.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Satwa</h1>
</div>
<div class="row">
  <!-- Card Jumlah Satwa -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Jumlah Satwa
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              40
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-dove fa-fw fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Card Tambah Satwa -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Tambah Satwa
            </div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSatwaModal">
              <i class="fa-solid fa-plus"></i>
              Tambah Satwa
            </button>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-hippo fa-fw fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Link Page -->
  <ul class="nav nav-tabs border-bottom-success mt-2 bg-white shadow" style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2">
    <li class="nav-item">
      <button id="buttonSumatra" class="btn btn-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Sumatra
      </button>
    </li>
    <li class="nav-item">
      <button id="buttonJawa" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Jawa
      </button>
    </li>
    <li class="nav-item">
      <button id="buttonKalimantan" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Kalimantan
      </button>
    </li>
    <li class="nav-item">
      <button id="buttonSulawesi" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Sulawesi
      </button>
    </li>
    <li class="nav-item">
      <button id="buttonPapua" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Papua
      </button>
    </li>
    <li class="nav-item">
      <button id="buttonAllIslands" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Semua Data
      </button>
    </li>
  </ul>

  <!-- Datatables -->
  <div class="card shadow mb-4 bg-white p-0">
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">Satwa</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="table-list-satwa" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="border-0">No</th>
              <th class="border-0">Nama Ilmiah</th>
              <th class="border-0">Nama Lokal</th>
              <th class="border-0">Populasi</th>
              <th class="border-0">Kategori IUCN</th>
              <th class="border-0">Lokasi</th>
              <th class="border-0">Aksi</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Satwa -->
  <div class="modal fade" id="addSatwaModal" tabindex="-1" aria-labelledby="addSatwaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addSatwaModalLabel">Tambah Satwa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('dashboard.satwa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nama_ilmiah" class="form-label required">Nama Ilmiah</label>
              <input type="text" class="form-control" id="nama_ilmiah" placeholder="Nama ilmiah" required>
            </div>
            <div class="mb-3">
              <label for="nama_lokal" class="form-label required">Nama Lokal</label>
              <input type="text" class="form-control" id="nama_lokal" placeholder="Nama lokal" required>
            </div>
            <div class="mb-3">
              <label for="populasi" class="form-label required">Populasi (ekor)</label>
              <input type="text" class="form-control" id="populasi" placeholder="Populasi (ekor)" required>
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label required">Gambar</label>
              <div id="imagePreviewCover"></div>
              <input type="file" class="form-control" id="gambar" placeholder="Gambar" onchange="return fileValidation('gambar', 'imagePreviewCover')" required>
            </div>
            <div class="mb-3">
              <p class="required">Pastikan mengisi dahulu nama ilmiah sebelum mengambil data</p>
              <button type="button" class="btn btn-info" id="getDataAPI">Ambil data ilmiah dari API</button>
            </div>
            <div class="mb-3">
              <label for="nama_inggris" class="form-label required">Nama Inggris</label>
              <input type="text" class="form-control" id="nama_inggris" placeholder="Nama inggris" required readonly>
              <input type="text" id="taxonid" name="taxonid" hidden required>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="kingdom" class="form-label required">Kingdom</label>
                <input type="text" class="form-control" id="kingdom" placeholder="Kingdom" required readonly>
              </div>
              <div class="col">
                <label for="filum" class="form-label required">Filum</label>
                <input type="text" class="form-control" id="filum" placeholder="Filum" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="kelas" class="form-label required">Kelas</label>
                <input type="text" class="form-control" id="kelas" placeholder="Kelas" required readonly>
              </div>
              <div class="col">
                <label for="ordo" class="form-label required">Ordo</label>
                <input type="text" class="form-control" id="ordo" placeholder="Ordo" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="famili" class="form-label required">Famili</label>
                <input type="text" class="form-control" id="famili" placeholder="Famili" required readonly>
              </div>
              <div class="col">
                <label for="genus" class="form-label required">Genus</label>
                <input type="text" class="form-control" id="genus" placeholder="Genus" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="population_trend" class="form-label required">Tren Populasi</label>
                <input type="text" class="form-control" id="population_trend" placeholder="Tren Populasi" required readonly>
              </div>
              <div class="col">
                <label for="kategori_iucn" class="form-label required">Kategori IUCN</label>
                <input type="text" class="form-control" id="kategori_iucn" placeholder="Kategori IUCN" required readonly>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="addConfirmTambahSatwa">Tambah</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  $('#table-list-satwa').DataTable({
    fixedHeader: true,
    pageLength: 25,
    lengthChange: true,
    autoWidth: false,
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('dashboard.satwa.get-data') }}",
      type: 'GET',
    },
    columns: [{
        data: 'DT_RowIndex',
        name: 'DT_RowIndex',
        className: 'text-center',
      },
      {
        data: 'nama_ilmiah',
        name: 'nama_ilmiah',
      },
      {
        data: 'nama_lokal',
        name: 'nama_lokal',
      },
      {
        data: 'populasi',
        name: 'populasi',
      },
      {
        data: 'kategori_iucn',
        name: 'kategori_iucn',
      },
      {
        data: 'lokasi',
        name: 'lokasi',
      },
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      },
    ]
  });

  // getDataAPI button click get data from api
  $('#getDataAPI').on('click', function() {
    let namaIlmiah = $('#nama_ilmiah').val();
    $.ajax({
      url: '{{ route("dashboard.satwa.get-data-api") }}',
      type: 'GET',
      data: {
        nama_ilmiah: namaIlmiah
      },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        $('#nama_inggris').val(data.nama_inggris);
        $('#taxonid').val(data.taxonid);
        $('#kingdom').val(data.kingdom);
        $('#filum').val(data.filum);
        $('#kelas').val(data.kelas);
        $('#ordo').val(data.ordo);
        $('#famili').val(data.famili);
        $('#genus').val(data.genus);
        $('#population_trend').val(data.population_trend);
        $('#kategori_iucn').val(data.kategori_iucn);
      },
      error: function(data) {
        console.log(data);
      }
    });
  });

  function fileValidation(id, idPreview) {
    let fileInput = document.getElementById(id);
    let filePath = fileInput.value;
    let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.test(filePath)) {
      Swal.fire({
        title: 'Error',
        text: 'Tipe file tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.',
        icon: 'error',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
      });
      fileInput.value = '';
      return false;
    } else {
      let fileSize = fileInput.files[0].size; // in bytes
      let maxSizeInBytes = 10 * 1024 * 1024; // 10 MB

      if (fileSize > maxSizeInBytes) {
        Swal.fire({
          title: 'Error',
          text: 'Ukuran file terlalu besar. Maksimal 10 MB.',
          icon: 'error',
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: false
        });
        fileInput.value = '';
        return false;
      }

      if (fileInput.files && fileInput.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
          let previewElement = document.getElementById(idPreview);
          previewElement.innerHTML = `
                <a href="${e.target.result}" data-fancybox>
                    <img src="${e.target.result}" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;"/>
                </a>
                `;
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  }
</script>
@endpush