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
                10
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
  <div
    id="boxAdmin"
    class="card-2 shadow mb-4 bg-white"
  >
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-success">
        Data Admin
      </h6>
      <!-- Button Trigger-->
      <button
        type="button"
        class="btn btn-success ml-3"
        data-bs-toggle="modal"
        data-bs-target="#tambahAdmin"
      >
        <i class="fa-solid fa-plus mr-2"></i>
        Tambah
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="adminDataTables"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama</th>
              <th class="border-0 text-gray-700">Email</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama</th>
              <th class="text-gray-700">Email</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 20; $i++)
              <tr class="align-middle">
                <td class="align-middle text-gray-600">Kevin Iansyah</td>
                <td class="align-middle text-gray-600">keviniansyah@gmail.com</td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <button
                      type="button"
                      href="#"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteAdmin"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-trash"
                        style="font-size: 0.8rem"
                      ></i>
                    </button>
                  </div>
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <!-- Tambah Admin Modal-->
  <div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h4 class="modal-title fs-5 text-success" id="exampleModalLabel">Tambah Admin</h4>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body pb-0">
          <form
            action=""
            method=""
          >
            <div class="mb-3">
              <label
                for="name"
                class="form-label"
              >Nama</label>
              <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                placeholder="Masukkan nama"
                required
              />
            </div>
            <div class="mb-3">
              <label
                for="email"
                class="form-label"
              >Email</label>
              <input
                type="email"
                class="form-control"
                name="email"
                id="email"
                placeholder="Masukkan email"
                required
              >
            </div>
            <div class="mb-3">
              <label
                for="password"
                class="form-label"
              >Password</label>
              <input
                type="password"
                class="form-control"
                name="password"
                id="password"
                placeholder="Masukkan password"
                required
              >
            </div>
            <div class="mb-3">
              <label
                for="password"
                class="form-label"
              >Confirm Password</label>
              <input
                type="password"
                class="form-control"
                name="password"
                id="password"
                placeholder="Masukkan password"
                required
              >
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >Tutup</button>
              <button
                type="submit"
                class="btn btn-success"
              >Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Admin-->
  <div
    class="modal fade"
    id="deleteAdmin"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Apakah Anda Yakin?</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
          Pilih opsi "Hapus" di bawah ini apabila Anda sudah siap untuk menghapus data admin dengan ID "...".
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >Tutup</button>
          <button
            type="submit"
            class="btn btn-success"
          >Hapus</button>
        </div>
      </div>
    </div>
  </div>
@endsection
