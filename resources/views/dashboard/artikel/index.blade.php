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
                            Jumlah Artikel Posting
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
    <!-- Card Arikel Not Posting -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Artikel Belum Posting
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
    <!-- Card All Arikel -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jumlah Artikel Keseluruhan
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
        <h6 class="m-0 font-weight-bold text-success">List Artikel</h6>
        <button type="button" class="btn btn-success mr-3 ml-auto" data-bs-toggle="modal" data-bs-target="#addArtikelModal">
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Artikel
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-list-artikel" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="border-0">No</th>
                        <th class="border-0">Judul</th>
                        <th class="border-0">Konten</th>
                        <th class="border-0">Gambar</th>
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

<!-- Modal Tambah Artikel-->
<div class="modal fade" id="addArtikelModal" aria-labelledby="addArtikelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('dashboard.artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title fs-5 text-success" id="addArtikelModalLabel">Tambah Artikel</h4>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label required">Judul</label>
                        <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul Artikel" required>
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="form-label required">Konten</label>
                        <textarea class="form-control" id="konten" rows="3" placeholder="Masukkan Konten Artikel" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label required">Gambar Header</label>
                        <input type="file" class="filepond" id="gambar" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
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
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'penulis',
                    name: 'penulis'
                },
                {
                    data: 'diterbitkan',
                    name: 'diterbitkan'
                },
                {
                    data: 'jenis',
                    name: 'jenis'
                },
                {
                    data: 'tampilkan',
                    name: 'tampilkan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        ClassicEditor
            .create(document.querySelector('#konten'))
            .catch(error => {
                console.error(error);
            });
        FilePond.parse(document.body);
    });
</script>

@endpush