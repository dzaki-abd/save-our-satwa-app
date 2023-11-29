@extends('dashboard.layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Laporan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent pl-1">
                <li class="breadcrumb-item">
                    <a class="text-success" href="{{ route('dashboard.pelaporan.indexPelaporan') }}">Pelaporan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tambah Laporan
                </li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-success">
                Tambah Laporan
            </h6>
        </div>
        <div class="card-body">
            <form action="/laporkan/store" method="POST" enctype="multipart/form-data">
                @csrf
                <h5 class="mb-3">INFORMASI KEJADIAN</h5>
                <div class="mb-3">
                    <label for="waktu_kejadian" class="form-label">Tanggal Kejadian</label>
                    <input type="date" class="form-control" id="waktu_kejadian" name="waktu_kejadian"
                        placeholder="Masukkan tanggal kejadian" required>
                </div>
                <div class="mb-5">
                    <label for="lokasi_kejadian" class="form-label">Lokasi Kejadian</label>
                    <input type="text" class="form-control" id="lokasi_kejadian" name="lokasi_kejadian"
                        placeholder="Masukkan lokasi kejadian" required>
                </div>

                <h5 class="mb-3">JENIS PELANGGARAN</h5>
                <p class="text-sm text-white bg-success p-1 pl-2 rounded">
                    <i class="fa-solid fa-circle-info"></i>
                    Jika anda memilih lainnya pada form select maka isi form dengan label lainnya!
                </p>
                <div class="mb-3">
                    <label for="jenis_pelanggaran" class="form-label">Pilih Jenis Pelanggaran</label>
                    <select class="form-select" id="jenis_pelanggaran" name="jenis_pelanggaran"
                        aria-label="Default select example" required>
                        <option selected>Pilih...</option>
                        <option value="Pemeliharaan Illegal">Pemeliharaan Illegal</option>
                        <option value="Pemusnahan Satwa">Pemusnahan Satwa</option>
                        <option value="Perburuan Satwa">Perburuan Satwa</option>
                        <option value="Perdagangan Satwa">Perdagangan Satwa</option>
                        <option value="Eksperimen Satwa yang Tidak Etis">Eksperimen Satwa yang Tidak Etis</option>
                        <option value="Pertandingan Satwa">Pertandingan Satwa</option>
                        <option value="Penangkapan dan Penyiksaan Satwa">Penangkapan dan Penyiksaan Satwa</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis_pelanggaran_lainnya" class="form-label">Jenis Pelanggaran Lainnya</label>
                    <input type="text" class="form-control" id="jenis_pelanggaran_lainnya"
                        name="jenis_pelanggaran_lainnya" placeholder="Masukkan jenis pelanggaran lainnya">
                </div>
                <div class="mb-3">
                    <label for="jenis_satwa" class="form-label">Pilih Jenis Satwa</label>
                    <select class="form-select" id="jenis_satwa" name="jenis_satwa" aria-label="Default select example"
                        required>
                        <option selected>Pilih...</option>
                        <option value="Harimau Sumatra">Harimau Sumatra</option>
                        <option value="Komodo">Komodo</option>
                        <option value="Anoa">Anoa</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="jenis_satwa_lainnya" class="form-label">Jenis Satwa Lainnya</label>
                    <input type="text" class="form-control" id="jenis_satwa_lainnya" name="jenis_satwa_lainnya"
                        placeholder="Masukkan jenis satwa lainya">
                </div>

                <h5 class="mb-3">DESKRIPSI KEJADIAN</h5>
                <p class="text-sm text-white bg-success p-1 pl-2 rounded">
                    <i class="fa-solid fa-circle-info"></i>
                    Ceritakan secara rinci tentang kejadian yang dilaporkan, termasuk aktivitas yang teramati dan potensi
                    dampak
                    terhadap satwa dilindungi!
                </p>
                <div class="mb-5">
                    <label for="deskripsi_kejadian" class="form-label">Deskripsi Kejadian</label>
                    <textarea class="form-control" id="deskripsi_kejadian" name="deskripsi_kejadian" rows="3"
                        placeholder="Masukkan deskripsi kejadian" required></textarea>
                </div>

                <h5 class="mb-3">BUKTI PENDUKUNG</h5>
                <p class="text-sm text-white bg-success p-1 pl-2 rounded">
                    <i class="fa-solid fa-circle-info"></i>
                    Wajib melampirkan satu foto, dengan jumlah maksimal foto yang dapat diunggah sebanyak 10. Jika Anda
                    memiliki
                    lebih
                    banyak foto bukti atau bukti dalam bentuk lainnya, seperti video, surat, dan sebagainya, Anda dapat
                    mengunggahnya
                    ke Drive dan melampirkan linknya di kolom yang telah disediakan.
                </p>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Foto</label>
                    <input type="file" id="gambar" name="gambar[]" class="dropify" data-height="200"
                        data-max-file-size="25M" data-allowed-file-extensions="jpg jpeg png" multiple>
                </div>

                <div class="mb-5">
                    <label for="link_gdrive" class="form-label">Link Google Drive (Optional)</label>
                    <input type="text" class="form-control" id="link_gdrive" name="link_gdrive"
                        placeholder="Masukkan link Google Drive">
                </div>

                <h5 class="mb-3">TINDAKAN YANG DIAMBIL</h5>
                <p class="text-sm text-white bg-success p-1 pl-2 rounded">
                    <i class="fa-solid fa-circle-info"></i>
                    Apakah tindakan langsung diambil sebagai tanggapan terhadap pelanggaran tersebut? Jika ya, jelaskan
                    tindakan
                    yang
                    diambil.
                </p>
                <div class="mb-5">
                    <label for="tindak_lanjut" class="form-label">Tindakan Yang Diambil (Optional)</label>
                    <textarea class="form-control" id="tindak_lanjut" name="tindak_lanjut" rows="3"
                        placeholder="Masukkan tindakan yang diambil"></textarea>
                </div>

                <h5 class="mb-3">HASIL INVESTIGASI</h5>
                <p class="text-sm text-white bg-success p-1 pl-2 rounded">
                    <i class="fa-solid fa-circle-info"></i>
                    Jika ada penyelidikan yang dilakukan, sertakan hasil penyelidikan termasuk pihak yang terlibat dan bukti
                    yang
                    ditemukan. Lampirkan hasil investigasi dalam bentuk file dengan format pdf.
                </p>
                <div class="mb-5">
                    <label for="hasil_investigasi" class="form-label">Hasil Investigasi (Optional)</label>
                    <input type="file" class="form-control" id="hasil_investigasi" name="hasil_investigasi"
                        onchange="fileValidationPdf('hasil_investigasi')">
                </div>

                <h5 class="mb-3">PENCATATAN TAMBAHAN</h5>
                <p class="text-sm text-white bg-success p-1 pl-2 rounded">
                    <i class="fa-solid fa-circle-info"></i>
                    Apakah tindakan langsung diambil sebagai tanggapan terhadap pelanggaran tersebut? Jika ya, jelaskan
                    tindakan
                    yang
                    diambil.
                </p>
                <div class="mb-3">
                    <label for="catatan_tambahan" class="form-label">Pencatatan Tambahan (Optional)</label>
                    <textarea class="form-control" id="catatan_tambahan" name="catatan_tambahan" rows="3"
                        placeholder="Masukkan catatan tambahan"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Kirim</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function fileValidation(id, idPreview) {
            let fileInput = document.getElementById(id);
            let filePath = fileInput.value;
            let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            if (!allowedExtensions.test(filePath)) {
                Swal.fire({
                    title: 'Error',
                    text: 'Tipe file tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.',
                    icon: 'error',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
                fileInput.value = '';
                return false;
            } else {
                let fileSize = fileInput.files[0].size; // in bytes
                let maxSizeInBytes = 10 * 1024 * 1024; // 10 MB

                if (fileSize > maxSizeInBytes) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ukuran file terlalu besar. Maksimal 10 MB.',
                        icon: 'error',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                    fileInput.value = '';
                    return false;
                }

                if (fileInput.files && fileInput.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let previewElement = document.getElementById(idPreview);
                        previewElement.innerHTML = `
                <a href="${e.target.result}" data-fancybox>
                    <img src="${e.target.result}" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;"/>
                </a>
                `;
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        $(document).ready(function() {
            let editor;
            ClassicEditor
                .create(document.querySelector('#konten'))
                .then(ckEditorInstance => {
                    editor = ckEditorInstance;
                    editor.editing.view.focus();
                })
                .catch(error => {
                    console.error(error);
                });

            Fancybox.bind('[data-fancybox]', {});
        });

        $(document).ready(function() {
            // Initialize Dropify
            $('.dropify').dropify();

            // You can also add event listeners or customize options here
            $('.dropify').on('dropify.beforeClear', function(event, element) {
                return confirm("Apakah Anda yakin ingin menghapus \"" + element.file.name + "\" ?");
            });

            $('.dropify').on('dropify.afterClear', function(event, element) {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Foto berhasil dihapus.',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            });

            $('.dropify').on('dropify.errors', function(event, element) {
                Swal.fire({
                    title: 'Error',
                    text: 'Tipe file tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.',
                    icon: 'error',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            });

            $('.dropify').on('dropify.fileReady', function(event, element) {
                let fileSize = element.file.size; // in bytes
                let maxSizeInBytes = 10 * 1024 * 1024; // 10 MB

                if (fileSize > maxSizeInBytes) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ukuran file terlalu besar. Maksimal 10 MB.',
                        icon: 'error',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                    $('.dropify').dropify('clear');
                }
            });
        });
    </script>
@endpush
