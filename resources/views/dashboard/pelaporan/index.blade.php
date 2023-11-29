@extends('dashboard.layouts.app')

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pelaporan</h1>
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
                {{ $countLaporan['ditinjau'] }}
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
                {{ $countLaporan['disetujui'] }}
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
                {{ $countLaporan['ditolak'] }}
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
        data-id="Ditinjau"
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
        data-id="Disetujui"
      >
        Laporan Disetujui
      </button>
    </li>
    <li class="nav-item">
      <button
        id="buttonLaporanDitolak"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
        data-id="Ditolak"
      >
        Laporan Ditolak
      </button>
    </li>
  </ul>

  <!-- DataTales Laporan Ditinjau -->
  <div
    id="boxLaporanDitinjau"
    class="card-2 shadow mb-4 bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    
    <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-success">Data Laporan Ditinjau</h6>
        <a class="btn btn-success mr-0 ml-auto" href="{{ route('dashboard.pelaporan.add') }}">
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Laporan
        </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="list-laporan"
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
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/laporan-initiator.js') }}"></script>

  <script>
    // trigger buttonLaporanDitinjau click
    $.fn.dataTable.ext.errMode = function(settings, helpPage, message) {
      console.log(message);
    };

    let table = $('#list-laporan').DataTable({
      fixedHeader: true,
      pageLength: 25,
      lengthChange: true,
      autoWidth: false,
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "{{ route('dashboard.pelaporan.get-data', 'Ditinjau') }}",
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
      ]
    });

    $('#buttonLaporanDitinjau, #buttonLaporanDisetujui, #buttonLaporanDitolak').on('click', function() {
      let laporanFilter = $(this).data('id');
      $('#title-table').html('Data Laporan ' + laporanFilter);

      table.ajax.url("{{ route('dashboard.pelaporan.get-data', ':id') }}".replace(':id', laporanFilter)).load();

    });
  </script>
@endpush
