@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
    <div class="jumbotron-2 jumbotron-search-2">
        <div class="container jumbotron-container-2">
            <div
                class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-start align-items-md-center h-100 jumbotron-content-2 gap-3">
                <div>
                    <h2 class="text-white">PROFIL PENGGUNA</h2>
                    <nav aria-label="breadcrumb" data-bs-theme="dark">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="profil-container rounded p-4 d-flex align-items-center gap-4">
        <div class="profil-image p-2 rounded">
            @if ($user->foto)
                <a href="{{ asset('storage/' . $user->foto) }}" data-fancybox>
                    <img src="{{ asset('storage/' . $user->foto) }}" class="rounded" />
                </a>
            @else
                <a href="../img/default-profil.png" data-fancybox>
                    <img src="../img/default-profil.png" class="rounded" />
                </a>
            @endif
        </div>
        <div class="profil-content">
            <h3>{{ $user->name }}</h3>
            <p>{{ $user->email }}</p>
            <div class="d-flex gap-2">
                <a href="/ubah-profil" class="button-teal-500 button-teal-500-custom">Ubah Profil</a>
                <button class="button-teal-500 button-teal-500-custom"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <h3 class="text-center h3-top">RIWAYAT <span>LAPORAN</span></h3>
    <p class="text-center p-top">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>

    <div class="row">
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
    <ul class="nav nav-tabs border-bottom-success mt-2 bg-white shadow"
        style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2">
        <li class="nav-item">
            <button id="buttonLaporanDitinjau" class="btn btn-success"
                style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
                data-id="Ditinjau">
                Laporan Ditinjau
            </button>
        </li>
        <li class="nav-item">
            <button id="buttonLaporanDisetujui" class="btn text-success"
                style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
                data-id="Disetujui">
                Laporan Disetujui
            </button>
        </li>
        <li class="nav-item">
            <button id="buttonLaporanDitolak" class="btn text-success"
                style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
                data-id="Ditolak">
                Laporan Ditolak
            </button>
        </li>
    </ul>

    <div class="shadow p-3 rounded">
        <div class="table-responsive pt-2 pb-2">
            <table class="table table-striped table-riwayat m-0" id="list-laporan" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="border-0 text-gray-700">Laporan</th>
                        <th class="border-0 text-gray-700">Tanggal Kejadian</th>
                        <th class="border-0 text-gray-700">Satwa</th>
                        <th class="border-0 text-gray-700">Status</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
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
            ajax: "{{ route('get-riwayat', 'Ditinjau') }}",
            columns: [{
                    data: 'pelanggaran_id',
                    name: 'laporan'
                },
                {
                    data: 'tanggal_kejadian',
                    name: 'tanggal_kejadian'
                },
                {
                    data: 'satwa_id',
                    name: 'satwa'
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

            table.ajax.url("{{ route('get-riwayat', ':id') }}".replace(':id', laporanFilter))
                .load();

        });
    </script>
@endpush
