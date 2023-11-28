@extends('dashboard.layouts.app')

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
  </div>
  <div class="row">
    <!-- Card Laporan Diajukan -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Laporan Diajukan
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $countLaporan }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-file-arrow-up  fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <!-- Card Laporan Ditinjau -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Laporan Ditinjau
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $countLaporan }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-file-circle-exclamation fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card Laporan Disetujui -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Laporan Disetujui
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                50
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-file-circle-check fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card Laporan Ditolak -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Laporan Ditolak
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                60
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-file-circle-xmark fa-2x text-gray-300"></i>
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
        id="buttonLaporanDitinjau"
        class="btn btn-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Laporan Ditinjau
      </button>
    </li>
    {{-- <li class="nav-item">
      <button
        id="buttonLaporanDitinjau"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Laporan Ditinjau
      </button>
    </li> --}}
    <li class="nav-item">
      <button
        id="buttonLaporanDisetujui"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Laporan Disetujui
      </button>
    </li>
    <li class="nav-item">
      <button
        id="buttonLaporanDitolak"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
      >
        Laporan Ditolak
      </button>
    </li>
  </ul>

  <!-- DataTales Laporan Diajukan -->
  {{-- <div
    id="boxLaporanDiajukan"
    class="card-2 shadow mb-4 bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Laporan Diajukan
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="laporanDiajukan"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">No</th>
              <th class="border-0 text-gray-700">Nama Pelapor</th>
              <th class="border-0 text-gray-700">Tanggal Kejadian</th>
              <th class="border-0 text-gray-700">Jenis Pelanggaran</th>
              <th class="border-0 text-gray-700">Jenis Satwa</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">No</th>
              <th class="text-gray-700">Nama Pelapor</th>
              <th class="text-gray-700">Tanggal Kejadian</th>
              <th class="text-gray-700">Jenis Pelanggaran</th>
              <th class="text-gray-700">Jenis Satwa</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div> --}}

  <!-- DataTales Laporan Ditinjau -->
  <div
    id="boxLaporanDitinjau"
    class="card-2 shadow mb-4 bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Laporan Ditinjau
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="laporanDitinjau"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama Pelapor</th>
              <th class="border-0 text-gray-700">Tanggal Kejadian</th>
              <th class="border-0 text-gray-700">Jenis Pelanggaran</th>
              <th class="border-0 text-gray-700">Jenis Satwa</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama Pelapor</th>
              <th class="text-gray-700">Tanggal Kejadian</th>
              <th class="text-gray-700">Jenis Pelanggaran</th>
              <th class="text-gray-700">Jenis Satwa</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- DataTales Laporan Disetujui -->
  <div
    id="boxLaporanDisetujui"
    class="card-2 shadow mb-4 d-none bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Laporan Disetujui
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="laporanDisetujui"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama Pelapor</th>
              <th class="border-0 text-gray-700">Tanggal Kejadian</th>
              <th class="border-0 text-gray-700">Jenis Pelanggaran</th>
              <th class="border-0 text-gray-700">Jenis Satwa</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama Pelapor</th>
              <th class="text-gray-700">Tanggal Kejadian</th>
              <th class="text-gray-700">Jenis Pelanggaran</th>
              <th class="text-gray-700">Jenis Satwa</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 5; $i++)
              <tr class="align-middle">
                <td class="align-middle text-gray-600">Kevin Iansyah</td>
                <td class="align-middle text-gray-600">20 Desember 2022</td>
                <td class="align-middle text-gray-600">Perburuan Illegal</td>
                <td class="align-middle text-gray-600">Orang Utan</td>
                <td class="align-middle text-gray-600">
                  <button
                    type="button"
                    class="btn btn-success"
                  >Disetujui</button>
                </td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <button
                      type="button"
                      href="#"
                      class="btn btn-primary d-flex justify-content-center align-items-center mr-1"
                      data-bs-toggle="modal"
                      data-bs-target="#riwayatLaporan"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-clock-rotate-left"
                        style="font-size: 0.8rem"
                      ></i>
                    </button>
                    <a
                      href="/dashboard/laporan/detail-laporan/id"
                      class="btn btn-warning d-flex justify-content-center align-items-center mr-1"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-eye"
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
    id="boxLaporanDitolak"
    class="card-2 shadow mb-4 d-none bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Data Laporan Ditolak
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="laporanDitolak"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama Pelapor</th>
              <th class="border-0 text-gray-700">Tanggal Kejadian</th>
              <th class="border-0 text-gray-700">Jenis Pelanggaran</th>
              <th class="border-0 text-gray-700">Jenis Satwa</th>
              <th class="border-0 text-gray-700">Status</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama Pelapor</th>
              <th class="text-gray-700">Tanggal Kejadian</th>
              <th class="text-gray-700">Jenis Pelanggaran</th>
              <th class="text-gray-700">Jenis Satwa</th>
              <th class="text-gray-700">Status</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 5; $i++)
              <tr class="align-middle">
                <td class="align-middle text-gray-600">Kevin Iansyah</td>
                <td class="align-middle text-gray-600">20 Desember 2022</td>
                <td class="align-middle text-gray-600">Perburuan Illegal</td>
                <td class="align-middle text-gray-600">Orang Utan</td>
                <td class="align-middle text-gray-600">
                  <button
                    type="button"
                    class="btn btn-danger"
                  >Ditolak</button>
                </td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <button
                      type="button"
                      href="#"
                      class="btn btn-primary d-flex justify-content-center align-items-center mr-1"
                      data-bs-toggle="modal"
                      data-bs-target="#riwayatLaporan"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-clock-rotate-left"
                        style="font-size: 0.8rem"
                      ></i>
                    </button>
                    <a
                      href="/dashboard/laporan/detail-laporan/id"
                      class="btn btn-warning d-flex justify-content-center align-items-center mr-1"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-eye"
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
          ><i class="fa-solid fa-xmark"></i></button>
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
@endsection

@push('scripts')
  <script src="{{ asset('js/laporan-initiator.js') }}"></script>

  <script>
    $.fn.dataTable.ext.errMode = function(settings, helpPage, message) {
      console.log(message);
    };

    $('#laporanDitinjau').DataTable({
      fixedHeader: true,
      pageLength: 25,
      lengthChange: true,
      autoWidth: false,
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "{{ route('dashboard.laporan.index') }}",
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          className: 'text-center',
        },
        {
          data: 'nama_pelapor',
          name: 'nama_pelapor'
        },
        {
          data: 'tanggal_kejadian',
          name: 'tanggal_kejadian'
        },
        {
          data: 'jenis_pelanggaran',
          name: 'jenis_pelanggaran'
        },
        {
          data: 'jenis_satwa',
          name: 'jenis_satwa'
        },
        {
          data: 'status',
          name: 'status'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });
    $(document).ready(function() {

      $('#laporanDitinjau').DataTable();
      $('#laporanDisetujui').DataTable();
      $('#laporanDitolak').DataTable();
    });
  </script>
@endpush
