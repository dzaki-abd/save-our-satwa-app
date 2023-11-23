@extends('dashboard.layouts.app')

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Artikel</h1>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Jumlah Artikel
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                3
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-newspaper fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow mb-4 bg-white">
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">Artikel</h6>
      <a
        href="/dashboard/artikel/tambah-artikel"
        class="btn btn-success ml-3"
      >
        <i class="fa-solid fa-plus mr-2"></i>
        Tambah
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="artikelDataTebles"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0">Judul</th>
              <th class="border-0">Penulis</th>
              <th class="border-0">Diterbitkan</th>
              <th class="border-0">Jenis</th>
              <th class="border-0">Tampilkan</th>
              <th class="border-0">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Judul</th>
              <th>Penulis</th>
              <th>Diterbitkan</th>
              <th>Jenis</th>
              <th>Tampilkan</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <tr class="align-middle">
              <td class="align-middle">Mari Mengenal Burung Kakaktua Raja</td>
              <td class="align-middle">Kevin Iansyah</td>
              <td class="align-middle">18 November 2023</td>
              <td class="align-middle">Artikel</td>
              <td class="align-middle">True</td>
              <td class="d-flex align-middle">
                <div class="d-flex">
                  <a
                    href="/dashboard/artikel/edit-artikel/id"
                    class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                    style="width: 30px; height: 30px"
                  >
                    <i
                      class="fa-solid fa-pen"
                      style="font-size: 0.8rem"
                    ></i>
                  </a>
                  <button
                    href="#"
                    class="btn btn-danger d-flex justify-content-center align-items-center"
                    style="width: 30px; height: 30px"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteArtikel"
                  >
                    <i
                      class="fa-solid fa-trash"
                      style="font-size: 0.8rem"
                    ></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Delete Artikel-->
  <div
    class="modal fade"
    id="deleteArtikel"
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
          Pilih opsi "Hapus" di bawah ini apabila Anda sudah siap untuk menghapus data artikel dengan ID "...".
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
