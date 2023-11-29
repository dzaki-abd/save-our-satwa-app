@extends('dashboard.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Admin</h1>
</div>
<div class="row">
  <!-- Card Admin -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Jumlah Admin
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              {{$countAdmin}}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTales Admin -->
<div class="card shadow mb-4 bg-white">
  <div class="card-header py-3 d-flex align-items-center">
    <h6 class="m-0 font-weight-bold text-success">List Admin</h6>
    <button type="button" class="btn btn-success mr-0 ml-auto" data-bs-toggle="modal" data-bs-target="#addAdminModal">
      <i class="fa-solid fa-plus"></i>
      Tambah Admin
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped" id="table-list-admin" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="border-0">No</th>
            <th class="border-0">Nama</th>
            <th class="border-0">Email</th>
            <th class="border-0">No. HP</th>
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


<!-- Tambah Admin Modal-->
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="adminModalLabel">Tambah Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('dashboard.admin.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nama_admin" class="form-label required">Nama</label>
            <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Nama" required>
          </div>
          <div class="mb-3">
            <label for="email_admin" class="form-label required">Email</label>
            <input type="text" class="form-control" id="email_admin" name="email_admin" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <label for="nomor_admin" class="form-label required">No Telepon</label>
            <input type="text" class="form-control" id="nomor_admin" name="nomor_admin" placeholder="Nomor telepon" required>
          </div>
          <div class="mb-3">
            <label for="password_admin" class="form-label required">Password</label>
            <input type="password" class="form-control" id="password_admin" name="password_admin" placeholder="Password" required>
          </div>
          <div class="mb-3">
            <label for="confirm_password_admin" class="form-label required">Konfirmasi Password</label>
            <input type="password" class="form-control" id="confirm_password_admin" name="confirm_password_admin" placeholder="Konfirmasi Password" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Admin Modal-->
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="adminModalLabel">Edit Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="nama_admin" class="form-label required">Nama</label>
            <input type="text" class="form-control" id="nama_admin_edit" name="nama_admin_edit" placeholder="Nama" required>
          </div>
          <div class="mb-3">
            <label for="email_admin" class="form-label required">Email</label>
            <input type="text" class="form-control" id="email_admin_edit" name="email_admin_edit" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <label for="nomor_admin" class="form-label required">No Telepon</label>
            <input type="text" class="form-control" id="nomor_admin_edit" name="nomor_admin_edit" placeholder="Nomor telepon" required>
          </div>
          <div class="mb-3">
            <label for="confirm_change_password" class="form-check-label">Ubah Password?</label>
            <input class="form-check-input ml-2" type="checkbox" name="confirm_change_password" id="confirm_change_password">
          </div>
          <div class="mb-3" hidden id="input_password">
            <label for="password_admin" class="form-label required">Password Baru</label>
            <input type="password" class="form-control" id="password_admin_edit" name="password_admin_edit" placeholder="Password baru">
          </div>
          <div class="mb-3" hidden id="input_confirm_password">
            <label for="confirm_password_admin" class="form-label required">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="confirm_password_admin_edit" name="confirm_password_admin_edit" placeholder="Konfirmasi password baru">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  $('#table-list-admin').DataTable({
    fixedHeader: true,
    pageLength: 25,
    lengthChange: true,
    autoWidth: false,
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('dashboard.admin.get-data') }}",
      type: 'GET',
    },
    columns: [{
        data: 'DT_RowIndex',
        name: 'DT_RowIndex',
        className: 'text-center',
      },
      {
        data: 'nama',
        name: 'nama'
      },
      {
        data: 'email',
        name: 'email'
      },
      {
        data: 'no_hp',
        name: 'no_hp'
      },
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      },
    ]
  });

  function editAdmin($id) {
    $.ajax({
      url: "{{ route('dashboard.admin.edit', ['admin' => 'id']) }}".replace('id', $id),
      type: 'GET',
      success: function(response) {
        if (response.status) {
          $('#editAdminModal form').attr('action', "{{ route('dashboard.admin.update', ['admin' => 'id']) }}".replace('id', $id));
          $('#editAdminModal #nama_admin_edit').val(response.data.name);
          $('#editAdminModal #email_admin_edit').val(response.data.email);
          $('#editAdminModal #nomor_admin_edit').val(response.data.no_hp);
          $('#editAdminModal').modal('show');
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

  function destroyAdmin($id) {
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
          url: "{{ route('dashboard.admin.destroy', ['admin' => 'id']) }}".replace('id', $id),
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
                  $('#table-list-admin').DataTable().ajax.reload();
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

  $('#confirm_change_password').change(function() {
    if (this.checked) {
      $('#input_password').removeAttr('hidden');
      $('#password_admin').attr('required', true);
      $('#input_confirm_password').removeAttr('hidden');
      $('#confirm_password_admin').attr('required', false);
    } else {
      $('#input_password').attr('hidden', true);
      $('#input_confirm_password').attr('hidden', true);
    }
  });
</script>
@endpush