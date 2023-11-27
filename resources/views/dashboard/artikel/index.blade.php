@extends('dashboard.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tabel Artikel</h1>
</div>
<div class="row">
    <!-- Card Arikel Posting -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Artikel dan Berita Posting
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $countArtikelPosting }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Arikel Not Posting -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Artikel dan Berita Belum Posting
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $countArtikelTidakPosting }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card All Arikel -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jumlah Artikel dan Berita Keseluruhan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $countArtikel }}
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
        <h6 class="m-0 font-weight-bold text-success">List Artikel</h6>
        <a class="btn btn-success mr-0 ml-auto" href="{{ route('dashboard.artikel.add') }}">
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Artikel
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-list-artikel" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="border-0">No</th>
                        <th class="border-0">Jenis</th>
                        <th class="border-0">Judul</th>
                        <th class="border-0">Penulis</th>
                        <th class="border-0">Posting</th>
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
@endsection

@push('scripts')
<script>
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#table-list-artikel').DataTable({
        fixedHeader: true,
        pageLength: 25,
        lengthChange: true,
        autoWidth: false,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('dashboard.artikel.get-data') }}",
            type: 'GET',
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
            },
            {
                data: 'jenis',
                name: 'jenis'
            },
            {
                data: 'judul',
                name: 'judul'
            },
            {
                data: 'penulis',
                name: 'penulis'
            },
            {
                data: 'di_posting',
                name: 'di_posting'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    function destroyArtikel($id) {
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
                    url: "{{ route('dashboard.artikel.destroy', ['artikel' => 'id']) }}".replace('id', $id),
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
                                    $('#table-list-artikel').DataTable().ajax.reload();
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