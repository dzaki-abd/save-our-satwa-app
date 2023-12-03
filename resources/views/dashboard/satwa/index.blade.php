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
              {{$countSatwa}}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-dove fa-fw fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Link Page -->
  <ul class="nav nav-tabs border-bottom-success mt-2 bg-white shadow" style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2">
    <li class="nav-item">
      <button id="All" class="btn btn-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Semua Pulau
      </button>
    </li>
    <li class="nav-item">
      <button id="Sumatra" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Sumatra
      </button>
    </li>
    <li class="nav-item">
      <button id="Jawa" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Jawa
      </button>
    </li>
    <li class="nav-item">
      <button id="Kalimantan" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Kalimantan
      </button>
    </li>
    <li class="nav-item">
      <button id="Sulawesi" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Sulawesi
      </button>
    </li>
    <li class="nav-item">
      <button id="Papua" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Papua
      </button>
    </li>
  </ul>

  <!-- Datatables -->
  <div class="card shadow mb-4 bg-white p-0">
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">List Satwa</h6>
      <button type="button" class="btn btn-success mr-0 ml-auto" data-bs-toggle="modal" data-bs-target="#addSatwaModal">
        <i class="fa-solid fa-plus"></i>
        Tambah Satwa
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="table-list-satwa" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="border-0">No</th>
              <th class="border-0">Nama Ilmiah</th>
              <th class="border-0">Nama Lokal</th>
              <th class="border-0">Populasi (ekor)</th>
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
              <input type="text" class="form-control" id="nama_ilmiah" name="nama_ilmiah" placeholder="Nama ilmiah" required>
            </div>
            <div class="mb-3">
              <label for="nama_lokal" class="form-label required">Nama Lokal</label>
              <input type="text" class="form-control" id="nama_lokal" name="nama_lokal" placeholder="Nama lokal" required>
            </div>
            <div class="mb-3">
              <label for="populasi" class="form-label required">Populasi (ekor)</label>
              <input type="number" class="form-control" id="populasi" name="populasi" placeholder="Populasi (ekor)" required>
            </div>
            <div class="mb-3">
              <label for="lokasi" class="required">Lokasi</label>
              <select class="custom-select" id="lokasi" name="lokasi" required>
                <option value="">Pilih...</option>
                <option value="Sumatra">Sumatra</option>
                <option value="Jawa">Jawa</option>
                <option value="Kalimantan">Kalimantan</option>
                <option value="Sulawesi">Sulawesi</option>
                <option value="Papua">Papua</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label required">Gambar</label>
              <div id="imagePreviewCover"></div>
              <input type="file" class="form-control" id="image" name="image" placeholder="Gambar" onchange="return fileValidation('image', 'imagePreviewCover')" required>
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label required">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi satwa" required></textarea>
            </div>
            <div class="mb-3">
              <p class="required">Pastikan mengisi dahulu nama ilmiah sebelum mengambil data</p>
              <button type="button" class="btn btn-info" id="getDataAPI">Ambil data ilmiah dari API</button>
              <l-squircle size="40" stroke="5" bg-opacity="0" speed="2" color="black" id="loading" style="display: none;"></l-squircle>
            </div>
            <div class="mb-3">
              <label for="nama_inggris" class="form-label required">Nama Inggris</label>
              <input type="text" class="form-control" id="nama_inggris" name="nama_inggris" placeholder="Nama inggris" required readonly>
              <input type="number" id="taxonid" name="taxonid" hidden>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="kingdom" class="form-label required">Kingdom</label>
                <input type="text" class="form-control" id="kingdom" name="kingdom" placeholder="Kingdom" required readonly>
              </div>
              <div class="col">
                <label for="filum" class="form-label required">Filum</label>
                <input type="text" class="form-control" id="filum" name="filum" placeholder="Filum" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="kelas" class="form-label required">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required readonly>
              </div>
              <div class="col">
                <label for="ordo" class="form-label required">Ordo</label>
                <input type="text" class="form-control" id="ordo" name="ordo" placeholder="Ordo" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="famili" class="form-label required">Famili</label>
                <input type="text" class="form-control" id="famili" name="famili" placeholder="Famili" required readonly>
              </div>
              <div class="col">
                <label for="genus" class="form-label required">Genus</label>
                <input type="text" class="form-control" id="genus" name="genus" placeholder="Genus" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="tren_populasi" class="form-label required">Tren Populasi</label>
                <input type="text" class="form-control" id="tren_populasi" name="tren_populasi" placeholder="Tren Populasi" required readonly>
              </div>
              <div class="col">
                <label for="kategori_iucn" class="form-label required">Kategori IUCN</label>
                <input type="text" class="form-control" id="kategori_iucn" name="kategori_iucn" placeholder="Kategori IUCN" required readonly>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Satwa -->
  <div class="modal fade" id="editSatwaModal" tabindex="-1" aria-labelledby="editSatwaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editSatwaModalLabel">Edit Satwa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editSatwaForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="nama_ilmiah" class="form-label required">Nama Ilmiah</label>
              <input type="text" class="form-control" id="nama_ilmiah" name="nama_ilmiah" placeholder="Nama ilmiah" required readonly>
            </div>
            <div class="mb-3">
              <label for="nama_lokal" class="form-label required">Nama Lokal</label>
              <input type="text" class="form-control" id="nama_lokal" name="nama_lokal" placeholder="Nama lokal" required>
            </div>
            <div class="mb-3">
              <label for="populasi" class="form-label required">Populasi (ekor)</label>
              <input type="number" class="form-control" id="populasi" name="populasi" placeholder="Populasi (ekor)" required>
            </div>
            <div class="mb-3">
              <label for="lokasi" class="required">Lokasi</label>
              <select class="custom-select" id="lokasi" name="lokasi" required>
                <option value="">Pilih...</option>
                <option value="Sumatra">Sumatra</option>
                <option value="Jawa">Jawa</option>
                <option value="Kalimantan">Kalimantan</option>
                <option value="Sulawesi">Sulawesi</option>
                <option value="Papua">Papua</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="image_edit" class="form-label required">Gambar</label>
              <div id="imagePreviewCoverEdit"></div>
              <input type="file" class="form-control" id="image_edit" name="image_edit" placeholder="Gambar" onchange="return fileValidation('image_edit', 'imagePreviewCoverEdit')">
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label required">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi satwa" required></textarea>
            </div>
            <div class="mb-3">
              <label for="nama_inggris" class="form-label required">Nama Inggris</label>
              <input type="text" class="form-control" id="nama_inggris" name="nama_inggris" placeholder="Nama inggris" required readonly>
              <input type="number" id="taxonid" name="taxonid" hidden>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="kingdom" class="form-label required">Kingdom</label>
                <input type="text" class="form-control" id="kingdom" name="kingdom" placeholder="Kingdom" required readonly>
              </div>
              <div class="col">
                <label for="filum" class="form-label required">Filum</label>
                <input type="text" class="form-control" id="filum" name="filum" placeholder="Filum" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="kelas" class="form-label required">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required readonly>
              </div>
              <div class="col">
                <label for="ordo" class="form-label required">Ordo</label>
                <input type="text" class="form-control" id="ordo" name="ordo" placeholder="Ordo" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="famili" class="form-label required">Famili</label>
                <input type="text" class="form-control" id="famili" name="famili" placeholder="Famili" required readonly>
              </div>
              <div class="col">
                <label for="genus" class="form-label required">Genus</label>
                <input type="text" class="form-control" id="genus" name="genus" placeholder="Genus" required readonly>
              </div>
            </div>
            <div class="row align-items-center mb-3">
              <div class="col">
                <label for="tren_populasi" class="form-label required">Tren Populasi</label>
                <input type="text" class="form-control" id="tren_populasi" name="tren_populasi" placeholder="Tren Populasi" required readonly>
              </div>
              <div class="col">
                <label for="kategori_iucn" class="form-label required">Kategori IUCN</label>
                <input type="text" class="form-control" id="kategori_iucn" name="kategori_iucn" placeholder="Kategori IUCN" required readonly>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" id="btnConfirmEditSatwa">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var base_url_asset = "{{ asset('') }}";

  var table = $('#table-list-satwa').DataTable({
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

  $('#All, #Sumatra, #Jawa, #Kalimantan, #Sulawesi, #Papua').on('click', function() {
    var locationFilter = $(this).attr('id');

    table.columns().search('').draw();

    if (locationFilter !== 'All') {
      table.column(5).search(locationFilter).draw();
    }

    $('#All, #Sumatra, #Jawa, #Kalimantan, #Sulawesi, #Papua').removeClass('btn btn-success').addClass('btn text-success');

    $(this).removeClass('btn text-success').addClass('btn btn-success');
  });

  $('#getDataAPI').on('click', function() {
    let namaIlmiah = $('#nama_ilmiah').val();
    $('#loading').show();
    $('#getDataAPI').hide();
    $.ajax({
      url: '{{ route("dashboard.satwa.get-data-api") }}',
      type: 'GET',
      data: {
        nama_ilmiah: namaIlmiah
      },
      dataType: 'json',
      success: function(data) {
        $('#loading').hide();
        $('#getDataAPI').show();
        $('#nama_inggris').val(data.nama_inggris);
        $('#taxonid').val(data.taxonid);
        $('#kingdom').val(data.kingdom);
        $('#filum').val(data.filum);
        $('#kelas').val(data.kelas);
        $('#ordo').val(data.ordo);
        $('#famili').val(data.famili);
        $('#genus').val(data.genus);
        $('#tren_populasi').val(data.population_trend);
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

  function editSatwa($id) {
    var url = "{{ route('dashboard.satwa.update', ['satwa' => 'id']) }}".replace('id', $id);
    $.ajax({
      url: "{{ route('dashboard.satwa.edit', ['satwa' => 'id']) }}".replace('id', $id),
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        $('#editSatwaModal').modal('show');
        $('#editSatwaForm').attr('action', `${url}`);
        $('#editSatwaModal #nama_ilmiah').val(response.data.nama_ilmiah);
        $('#editSatwaModal #nama_lokal').val(response.data.nama_lokal);
        $('#editSatwaModal #populasi').val(response.data.populasi);
        $('#editSatwaModal #lokasi').val(response.data.lokasi);
        $('#editSatwaModal #deskripsi').val(response.data.deskripsi);
        $('#editSatwaModal #nama_inggris').val(response.data.nama_inggris);
        $('#editSatwaModal #taxonid').val(response.data.taxonid);
        $('#editSatwaModal #kingdom').val(response.data.kingdom);
        $('#editSatwaModal #filum').val(response.data.filum);
        $('#editSatwaModal #kelas').val(response.data.kelas);
        $('#editSatwaModal #ordo').val(response.data.ordo);
        $('#editSatwaModal #famili').val(response.data.famili);
        $('#editSatwaModal #genus').val(response.data.genus);
        $('#editSatwaModal #tren_populasi').val(response.data.tren_populasi);
        $('#editSatwaModal #kategori_iucn').val(response.data.kategori_iucn);
        $('#editSatwaModal #imagePreviewCoverEdit').html(`
            <a href="${base_url_asset}storage/${response.data.gambar}" data-fancybox>
                <img src="${base_url_asset}storage/${response.data.gambar}" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;"/>
            </a>
        `);
      },
      error: function(xhr) {
        Swal.fire({
          title: 'Gagal!',
          text: xhr.responseJSON.message,
          icon: 'error',
        });
      }
    });
  }

  function destroySatwa($id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{{ route('dashboard.satwa.destroy', ['satwa' => 'id']) }}".replace('id', $id),
          type: 'DELETE',
          data: {
            _token: CSRF_TOKEN
          },
          success: function(response) {
            if (response.status) {
              Swal.fire({
                title: 'Berhasil!',
                text: response.message,
                icon: 'success',
              }).then((result) => {
                if (result.isConfirmed) {
                  $('#table-list-satwa').DataTable().ajax.reload();
                }
              });
            } else {
              Swal.fire({
                title: 'Gagal!',
                text: response.message,
                icon: 'error',
              });
            }
          },
          error: function(xhr) {
            Swal.fire({
              title: 'Gagal!',
              text: xhr.responseJSON.message,
              icon: 'error',
            });
          }
        });
      }
    });
  }
</script>
@endpush