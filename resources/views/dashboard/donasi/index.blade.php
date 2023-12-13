@extends('dashboard.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Donasi</h1>
</div>
<div class="row">
  <!-- Card Uang Masuk -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Donasi Masuk
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              Rp {{ number_format($jumlahDonasi, 0, ',', '.') }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Link Page -->
  <ul class="nav nav-tabs border-bottom-success mt-2 bg-white shadow" style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2">
    <li class="nav-item">
      <button id="All" data-id="All" class="btn btn-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Semua Data
      </button>
    </li>
    <li class="nav-item">
      <button id="BelumDiverifikasi" data-id="Belum Diverifikasi" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Belum Diverifikasi
      </button>
    </li>
    <li class="nav-item">
      <button id="SudahDiverifikasi" data-id="Sudah Diverifikasi" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
        Sudah Diverifikasi
      </button>
    </li>
  </ul>

  <!-- Datatables -->
  <div class="card shadow mb-4 bg-white p-0">
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">List Donasi</h6>
      <button type="button" class="btn btn-success mr-0 ml-auto" data-bs-toggle="modal" data-bs-target="#addDonasiModal">
        <i class="fa-solid fa-plus"></i>
        Tambah Donasi
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="table-list-donasi" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="border-0">No</th>
              <th class="border-0">Nama Donatur</th>
              <th class="border-0">Email</th>
              <th class="border-0">No HP</th>
              <th class="border-0">Jumlah</th>
              <th class="border-0">Status</th>
              <th class="border-0">Role</th>
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

  <!-- Modal Tambah Donasi -->
  <div class="modal fade" id="addDonasiModal" tabindex="-1" aria-labelledby="donasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="donasiModalLabel">Tambah Donasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('dashboard.donasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nama_donatur" class="form-label required">Nama</label>
              <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" placeholder="Nama donatur" required>
            </div>
            <div class="mb-3">
              <label for="email_donatur" class="form-label required">Email</label>
              <input type="text" class="form-control" id="email_donatur" name="email_donatur" placeholder="Email donatur" required>
            </div>
            <div class="mb-3">
              <label for="nomor_donatur" class="form-label required">No Telepon</label>
              <input type="text" class="form-control" id="nomor_donatur" name="nomor_donatur" placeholder="Nomor telepon donatur" required>
            </div>
            <div class="mb-3">
              <label for="jumlah_donatur" class="form-label required">Nominal</label>
              <input type="text" class="form-control" id="jumlah_donatur" name="jumlah_donatur" placeholder="Nominal donasi" required>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label required">Bukti Transfer</label>
              <div id="imagePreviewCover"></div>
              <input type="file" class="form-control" id="image" name="image" placeholder="Gambar" onchange="return fileValidation('image', 'imagePreviewCover')" required>
            </div>
            <label for="status" class="form-label required">Status</label>
            <select class="form-select" aria-label="Default select example" name="status" id="status" required>
              <option value="">Pilih...</option>
              <option value="Belum Diverifikasi">Belum Diverifikasi</option>
              <option value="Sudah Diverifikasi">Sudah Diverifikasi</option>
            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Donasi Masuk Modal -->
  <div class="modal fade" id="editDonasiModal" tabindex="-1" aria-labelledby="editDonasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editDonasiModalLabel">Detail/Edit Donasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="nama_donatur" class="form-label required">Nama</label>
              <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" placeholder="Nama donatur" required>
            </div>
            <div class="mb-3">
              <label for="email_donatur" class="form-label required">Email</label>
              <input type="text" class="form-control" id="email_donatur" name="email_donatur" placeholder="Email donatur" required>
            </div>
            <div class="mb-3">
              <label for="nomor_donatur" class="form-label required">No Telepon</label>
              <input type="text" class="form-control" id="nomor_donatur" name="nomor_donatur" placeholder="Nomor telepon donatur" required>
            </div>
            <div class="mb-3">
              <label for="jumlah_donatur" class="form-label required">Nominal</label>
              <input type="text" class="form-control" id="jumlah_donatur" name="jumlah_donatur" placeholder="Nominal donasi" required>
            </div>
            <div class="mb-3">
              <label for="image_edit" class="form-label required">Bukti Transfer</label>
              <div id="imagePreviewCoverEdit"></div>
              <input type="file" class="form-control" id="image_edit" name="image_edit" placeholder="Gambar" onchange="return fileValidation('image_edit', 'imagePreviewCoverEdit')">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" id="btnConfirmEditDonasi">Konfirmasi</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endsection

  @push('scripts')
  <script>
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var base_url_asset = "{{ asset('') }}";

    var table = $('#table-list-donasi').DataTable({
      fixedHeader: true,
      pageLength: 25,
      lengthChange: true,
      autoWidth: false,
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('dashboard.donasi.get-data') }}",
        type: 'GET',
      },
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          className: 'text-center',
        },
        {
          data: 'nama_donatur',
          name: 'nama_donatur',
        },
        {
          data: 'email',
          name: 'email',
        },
        {
          data: 'no_hp',
          name: 'no_hp',
        },
        {
          data: 'jumlah_donasi',
          name: 'jumlah_donasi',
        },
        {
          data: 'status',
          name: 'status',
        },
        {
          data: 'input_by',
          name: 'input_by',
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });

    $('#All, #BelumDiverifikasi, #SudahDiverifikasi').on('click', function() {
      var locationFilter = $(this).data('id');

      table.columns().search('').draw();

      if (locationFilter !== 'All') {
        table.column(5).search(locationFilter).draw();
      }

      $('#All, #BelumDiverifikasi, #SudahDiverifikasi').removeClass('btn btn-success').addClass('btn text-success');

      $(this).removeClass('btn text-success').addClass('btn btn-success');
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

    function verifyDonasi($id) {
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda tidak akan dapat mengembalikan status!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, verifikasi!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "{{ route('dashboard.donasi.verify', ['id' => 'id']) }}".replace('id', $id),
            type: 'PUT',
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
                    $('#table-list-donasi').DataTable().ajax.reload();
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

    function editDonasi($id) {
      $.ajax({
        url: "{{ route('dashboard.donasi.edit', ['donasi' => 'id']) }}".replace('id', $id),
        type: 'GET',
        success: function(response) {
          if (response.status) {
            if (response.data.status === 'Sudah Diverifikasi' || response.data.input_by === 'User') {
              $('#editDonasiModal #nama_donatur').attr('disabled', true);
              $('#editDonasiModal #email_donatur').attr('disabled', true);
              $('#editDonasiModal #nomor_donatur').attr('disabled', true);
              $('#editDonasiModal #jumlah_donatur').attr('disabled', true);
              $('#editDonasiModal #image_edit').attr('disabled', true);
              $('#editDonasiModal #status').attr('disabled', true);
              $('#editDonasiModal #btnConfirmEditDonasi').hide();
            } else {
              $('#editDonasiModal #nama_donatur').attr('disabled', false);
              $('#editDonasiModal #email_donatur').attr('disabled', false);
              $('#editDonasiModal #nomor_donatur').attr('disabled', false);
              $('#editDonasiModal #jumlah_donatur').attr('disabled', false);
              $('#editDonasiModal #image_edit').attr('disabled', false);
              $('#editDonasiModal #status').attr('disabled', false);
              $('#editDonasiModal #btnConfirmEditDonasi').show();
            }
            $('#editDonasiModal form').attr('action', "{{ route('dashboard.donasi.update', ['donasi' => 'id']) }}".replace('id', $id));
            $('#editDonasiModal #nama_donatur').val(response.data.nama_donatur);
            $('#editDonasiModal #email_donatur').val(response.data.email);
            $('#editDonasiModal #nomor_donatur').val(response.data.no_hp);
            $('#editDonasiModal #jumlah_donatur').val(response.data.jumlah_donasi);
            $('#editDonasiModal #status').val(response.data.status);
            $('#editDonasiModal #imagePreviewCoverEdit').html(`
                    <a href="${base_url_asset}storage/${response.data.bukti_transfer}" data-fancybox>
                        <img src="${base_url_asset}storage/${response.data.bukti_transfer}" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;"/>
                    </a>
                    `);
            $('#editDonasiModal').modal('show');
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

    function destroyDonasi($id) {
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
            url: "{{ route('dashboard.donasi.destroy', ['donasi' => 'id']) }}".replace('id', $id),
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
                    $('#table-list-donasi').DataTable().ajax.reload();
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

    $('#addDonasiModal #jumlah_donatur').mask('Rp 000.000.000.000', { reverse: true });
    $('#editDonasiModal #jumlah_donatur').mask('Rp 000.000.000.000', { reverse: true });
  </script>
  @endpush