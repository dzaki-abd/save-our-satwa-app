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
  </div>

  <!-- Link Page -->
  <ul
    class="nav nav-tabs border-bottom-success mt-2 bg-white shadow"
    style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2"
  >
    <li class="nav-item">
      <button
        id="buttonSumatra"
        class="btn btn-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Sumatra
      </button>
    </li>
    <li class="nav-item">
      <button
        id="buttonJawa"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Jawa
      </button>
    </li>
    <li class="nav-item">
      <button
        id="buttonKalimantan"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Kalimantan
      </button>
    </li>
    <li class="nav-item">
      <button
        id="buttonSulawesi"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Sulawesi
      </button>
    </li>
    <li class="nav-item">
      <button
        id="buttonPapua"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Papua
      </button>
    </li>
    <li class="nav-item">
      <button
        id="buttonAllIslands"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Semua Data
      </button>
    </li>
  </ul>

  <!-- DataTales Laporan Diajukan -->
  <div
    id="boxSumatra"
    class="card-2 shadow mb-4 bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-success">
        Data Satwa Sumatra
      </h6>
      <a
        href="/dashboard/satwa/tambah-satwa"
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
          id="sumatraDataTables"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama</th>
              <th class="border-0 text-gray-700">Habitat</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Populasi</th>
              <th class="border-0 text-gray-700">Sub Pulau</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama</th>
              <th class="text-gray-700">Habitat</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Populasi</th>
              <th class="text-gray-700">Sub Pulau</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 5; $i++)
              <tr class="align-middle">
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 10rem; min-width: 10rem"
                >Kakatua Raja</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 20rem; min-width: 20rem"
                >Papua, Pulau Salawati, dan Pulau Yapen</td>
                <td class="align-middle text-gray-600">Rentan</td>
                <td class="align-middle text-gray-600">-</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 6rem; min-width: 6rem"
                >Papua</td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <a
                      href="/dashboard/satwa/edit-satwa/id"
                      class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-pen"
                        style="font-size: 0.8rem"
                      ></i>
                    </a>
                    <button
                      type="button"
                      href="#"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteLaporan"
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

  <!-- DataTales Laporan Ditinjau -->
  <div
    id="boxJawa"
    class="card-2 shadow mb-4 d-none bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Satwa Jawa
      </h6>
      <a
        href="/dashboard/satwa/tambah-satwa"
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
          id="jawaDataTables"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama</th>
              <th class="border-0 text-gray-700">Habitat</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Populasi</th>
              <th class="border-0 text-gray-700">Sub Pulau</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama</th>
              <th class="text-gray-700">Habitat</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Populasi</th>
              <th class="text-gray-700">Sub Pulau</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 5; $i++)
              <tr class="align-middle">
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 10rem; min-width: 10rem"
                >Kakatua Raja</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 20rem; min-width: 20rem"
                >Papua, Pulau Salawati, dan Pulau Yapen</td>
                <td class="align-middle text-gray-600">Rentan</td>
                <td class="align-middle text-gray-600">-</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 6rem; min-width: 6rem"
                >Papua</td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <a
                      href="/dashboard/satwa/edit-satwa/id"
                      class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-pen"
                        style="font-size: 0.8rem"
                      ></i>
                    </a>
                    <button
                      type="button"
                      href="#"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteLaporan"
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

  <!-- DataTales Laporan Disetujui -->
  <div
    id="boxKalimantan"
    class="card-2 shadow mb-4 d-none bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Satwa Kalimantan
      </h6>
      <a
        href="/dashboard/satwa/tambah-satwa"
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
          id="kalimantanDataTables"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama</th>
              <th class="border-0 text-gray-700">Habitat</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Populasi</th>
              <th class="border-0 text-gray-700">Sub Pulau</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama</th>
              <th class="text-gray-700">Habitat</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Populasi</th>
              <th class="text-gray-700">Sub Pulau</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 5; $i++)
              <tr class="align-middle">
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 10rem; min-width: 10rem"
                >Kakatua Raja</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 20rem; min-width: 20rem"
                >Papua, Pulau Salawati, dan Pulau Yapen</td>
                <td class="align-middle text-gray-600">Rentan</td>
                <td class="align-middle text-gray-600">-</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 6rem; min-width: 6rem"
                >Papua</td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <a
                      href="/dashboard/satwa/edit-satwa/id"
                      class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-pen"
                        style="font-size: 0.8rem"
                      ></i>
                    </a>
                    <button
                      type="button"
                      href="#"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteLaporan"
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

  <!-- DataTales Laporan Ditolak -->
  <div
    id="boxSulawesi"
    class="card-2 shadow mb-4 d-none bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Satwa Sulawesi
      </h6>
      <a
        href="/dashboard/satwa/tambah-satwa"
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
          id="sulawesiDataTables"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama</th>
              <th class="border-0 text-gray-700">Habitat</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Populasi</th>
              <th class="border-0 text-gray-700">Sub Pulau</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama</th>
              <th class="text-gray-700">Habitat</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Populasi</th>
              <th class="text-gray-700">Sub Pulau</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 5; $i++)
              <tr class="align-middle">
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 10rem; min-width: 10rem"
                >Kakatua Raja</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 20rem; min-width: 20rem"
                >Papua, Pulau Salawati, dan Pulau Yapen</td>
                <td class="align-middle text-gray-600">Rentan</td>
                <td class="align-middle text-gray-600">-</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 6rem; min-width: 6rem"
                >Papua</td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <a
                      href="/dashboard/satwa/edit-satwa/id"
                      class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-pen"
                        style="font-size: 0.8rem"
                      ></i>
                    </a>
                    <button
                      type="button"
                      href="#"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteLaporan"
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

  <!-- DataTales Laporan Ditolak -->
  <div
    id="boxPapua"
    class="card-2 shadow mb-4 d-none bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Satwa Papua
      </h6>
      <a
        href="/dashboard/satwa/tambah-satwa"
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
          id="papuaDataTables"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama</th>
              <th class="border-0 text-gray-700">Habitat</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Populasi</th>
              <th class="border-0 text-gray-700">Sub Pulau</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama</th>
              <th class="text-gray-700">Habitat</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Populasi</th>
              <th class="text-gray-700">Sub Pulau</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 5; $i++)
              <tr class="align-middle">
                <td
                  class="align-middle text-gray-600"
                  style="width: 10rem"
                >Kakatua Raja</td>
                <td
                  class="align-middle text-gray-600"
                  style="width: 20rem"
                >Papua, Pulau Salawati, dan Pulau Yapen</td>
                <td class="align-middle text-gray-600">Rentan</td>
                <td class="align-middle text-gray-600">-</td>
                <td class="align-middle text-gray-600">Papua</td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <a
                      href="/dashboard/laporan/detail-laporan/id"
                      class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-pen"
                        style="font-size: 0.8rem"
                      ></i>
                    </a>
                    <button
                      type="button"
                      href="#"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteLaporan"
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

  <!-- DataTales Laporan Ditolak -->
  <div
    id="boxAllIslands"
    class="card-2 shadow mb-4 d-none bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Satwa Seluruh Pulau
      </h6>
      <a
        href="/dashboard/satwa/tambah-satwa"
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
          id="allIslandsDataTables"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama</th>
              <th class="border-0 text-gray-700">Habitat</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Populasi</th>
              <th class="border-0 text-gray-700">Sub Pulau</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama</th>
              <th class="text-gray-700">Habitat</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Populasi</th>
              <th class="text-gray-700">Sub Pulau</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 5; $i++)
              <tr class="align-middle">
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 10rem; min-width: 10rem"
                >Kakatua Raja</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 20rem; min-width: 20rem"
                >Papua, Pulau Salawati, dan Pulau Yapen</td>
                <td class="align-middle text-gray-600">Rentan</td>
                <td class="align-middle text-gray-600">-</td>
                <td
                  class="align-middle text-gray-600"
                  style="max-width: 6rem; min-width: 6rem"
                >Papua</td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <a
                      href="/dashboard/satwa/edit-satwa/id"
                      class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-pen"
                        style="font-size: 0.8rem"
                      ></i>
                    </a>
                    <button
                      type="button"
                      href="#"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteLaporan"
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
  
  <!-- Riwayat Laporan Modal-->
  <div
    class="modal fade"
    id="riwayatLaporan"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Riwayat Laporan dengan ID FHJA21312</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div
          class="modal-body"
          style="margin: 1rem 0rem 1rem 1rem; padding-bottom: 0; padding-top: 0;"
        >
          <section>
            <ul
              class="timeline-with-icons d-flex flex-column m-0"
              style="gap: 1.5rem"
            >
              @for ($i = 0; $i < 5; $i++)
                <li class="timeline-item">
                  <span class="timeline-icon bg-success">
                    <!--
                      Gunakan icon berdasarkan status menggunakan if
                      Diajukan :
                      <i class="fa-solid fa-file-arrow-up text-white fa-sm fa-fw"></i>
                      
                      Ditinjau
                      <i class="fa-solid fa-file-circle-exclamation text-white fa-sm fa-fw"></i>

                      Disetujui
                      <i class="fa-solid fa-file-circle-check text-white fa-sm fa-fw"></i>

                      Ditolak
                      <i class="fa-solid fa-file-circle-xmark text-white fa-sm fa-fw"></i>
                    -->
                    <i class="fa-solid fa-file-arrow-up text-white fa-sm fa-fw"></i>
                  </span>

                  <h6
                    class="fw-bolder text-success"
                    style="font-weight: 600"
                  >Status Laporan {{ $status = "'DIAJUKAN'" }}</h6>
                  <p
                    class="text-muted mb-2"
                    style="font-size: 0.8rem; font-weight: 600"
                  >11 Maret 2020</p>
                  <p class="text-muted m-0">
                    Status laporan berubah menjadi {{ $status = 'DIAJUKAN' }} pada tanggal 11 Maret 2020.
                  </p>
                </li>
              @endfor
            </ul>
          </section>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Laporan Modal-->
  <div
    class="modal fade"
    id="deleteLaporan"
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
          ></button>
        </div>
        <div class="modal-body">
          Pilih opsi "Hapus" di bawah ini apabila Anda sudah siap untuk menghapus data laporan dengan ID "...".
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

  <!-- Logout Modal-->
  <div
    class="modal fade"
    id="logoutModal"
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
          >Siap Untuk Keluar?</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          Pilih opsi "Keluar" di bawah ini apabila Anda sudah siap untuk mengakhiri sesi Anda saat ini.
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >Tutup</button>
          <a
            href="/dashboard/login"
            type="submit"
            class="btn btn-success"
          >Keluar</a>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="../js/satwa-initiator.js"></script>
@endpush