@extends('dashboard.layouts.app')

@section('content')
  <div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent pl-1">
        <li class="breadcrumb-item">
          <a
            class="text-success"
            href="{{ route('dashboard.satwa.index') }}"
          >Satwa</a>
        </li>
        <li
          class="breadcrumb-item active"
          aria-current="page"
        >
          Laporan Satwa
        </li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div
      id="laporan-satwa"
      class="card-2 shadow mb-4 bg-white"
      style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
    >
      <div class="card-header py-3 d-flex align-items-center">
        <h6
          class="m-0 font-weight-bold text-success"
          id="title-table"
        >
          Data Laporan Satwa {{ $satwa[0]->nama_lokal }}
        </h6>
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
                <th class="border-0 text-gray-700">Jumlah Satwa Terdampak</th>
                <th class="border-0 text-gray-700">Status</th>
                <th class="border-0 text-gray-700">Aksi</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // trigger buttonLaporanDitinjau click
    $.fn.dataTable.ext.errMode = function(settings, helpPage, message) {
      console.log(message);
    };

    const idSatwa = window.location.pathname.split('/')[4];
    const url = "{{ route('dashboard.satwa.pelaporan-satwa', ':id') }}".replace(':id', idSatwa);
    let table = $('#list-laporan').DataTable({
      fixedHeader: true,
      pageLength: 25,
      lengthChange: true,
      autoWidth: false,
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: url,
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
          data: 'jumlah_satwa',
          name: 'jumlah_satwa',
          className: 'text-center',
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
  </script>
@endpush
