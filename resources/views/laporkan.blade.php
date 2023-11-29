@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
    <div class="jumbotron-2">
        <div class="container jumbotron-container-2">
            <div class="d-flex flex-column justify-content-center align-items-start gap-1 h-100 jumbotron-content-2">
                <h2 class="text-white">LAPORKAN</h2>
                <nav aria-label="breadcrumb" data-bs-theme="dark">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporkan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <h3 class="text-center h3-top">LAPORKAN <span>SEKARANG</span></h3>
    <p class="text-center p-top">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>

    <form action="/laporkan/store" method="POST" enctype="multipart/form-data" class="shadow p-4 form-laporkan">
        @csrf
        {{-- if the user is logged in --}}
        @if (!Auth::check())
            <h5 class="mb-3">INFORMASI PELAPOR</h5>
            <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
                <i class="fa-solid fa-circle-info"></i>
                Data anda kami jamin kerahasiaannya!
            </p>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Masukkan nama lengkap anda" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda"
                    required>
            </div>
            <div class="mb-5">
                <label for="no_hp" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp"
                    placeholder="Masukkan nomor telepon anda" required>
            </div>
        @endif

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
        <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
            <i class="fa-solid fa-circle-info"></i>
            Jika anda memilih lainnya pada form select maka isi form dengan label lainnya!
        </p>
        <div class="mb-3">
            <label for="jenis_pelanggaran" class="form-label">Pilih Jenis Pelanggaran</label>
            <select class="form-select" id="jenis_pelanggaran" name="jenis_pelanggaran" aria-label="Default select example"
                required>
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
            <input type="text" class="form-control" id="jenis_pelanggaran_lainnya" name="jenis_pelanggaran_lainnya"
                placeholder="Masukkan jenis pelanggaran lainnya">
        </div>
        <div class="mb-3">
            <label for="jenis_satwa" class="form-label">Pilih Jenis Satwa</label>
            <select class="form-select" id="jenis_satwa" name="jenis_satwa" aria-label="Default select example" required>
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
        <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
            <i class="fa-solid fa-circle-info"></i>
            Ceritakan secara rinci tentang kejadian yang dilaporkan, termasuk aktivitas yang teramati dan potensi dampak
            terhadap satwa dilindungi!
        </p>
        <div class="mb-5">
            <label for="deskripsi_kejadian" class="form-label">Deskripsi Kejadian</label>
            <textarea class="form-control" id="deskripsi_kejadian" name="deskripsi_kejadian" rows="3"
                placeholder="Masukkan deskripsi kejadian" required></textarea>
        </div>

        <h5 class="mb-3">BUKTI PENDUKUNG</h5>
        <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
            <i class="fa-solid fa-circle-info"></i>
            Wajib melampirkan satu foto, dengan jumlah maksimal foto yang dapat diunggah sebanyak 10. Jika Anda memiliki
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
        <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
            <i class="fa-solid fa-circle-info"></i>
            Apakah tindakan langsung diambil sebagai tanggapan terhadap pelanggaran tersebut? Jika ya, jelaskan tindakan
            yang
            diambil.
        </p>
        <div class="mb-5">
            <label for="tindak_lanjut" class="form-label">Tindakan Yang Diambil (Optional)</label>
            <textarea class="form-control" id="tindak_lanjut" name="tindak_lanjut" rows="3"
                placeholder="Masukkan tindakan yang diambil"></textarea>
        </div>

        <h5 class="mb-3">HASIL INVESTIGASI</h5>
        <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
            <i class="fa-solid fa-circle-info"></i>
            Jika ada penyelidikan yang dilakukan, sertakan hasil penyelidikan termasuk pihak yang terlibat dan bukti yang
            ditemukan. Lampirkan hasil investigasi dalam bentuk file dengan format pdf.
        </p>
        <div class="mb-5">
            <label for="hasil_investigasi" class="form-label">Hasil Investigasi (Optional)</label>
            <input type="file" class="form-control" id="hasil_investigasi" name="hasil_investigasi"
                onchange="fileValidationPdf('hasil_investigasi')">
        </div>

        <h5 class="mb-3">PENCATATAN TAMBAHAN</h5>
        <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
            <i class="fa-solid fa-circle-info"></i>
            Apakah tindakan langsung diambil sebagai tanggapan terhadap pelanggaran tersebut? Jika ya, jelaskan tindakan
            yang
            diambil.
        </p>
        <div class="mb-3">
            <label for="catatan_tambahan" class="form-label">Pencatatan Tambahan (Optional)</label>
            <textarea class="form-control" id="catatan_tambahan" name="catatan_tambahan" rows="3"
                placeholder="Masukkan catatan tambahan"></textarea>
        </div>
        <button type="submit" class="button-teal-500">Kirim</button>
    </form>
@endsection

@push('scripts')
    <script>
        function fileValidation(id, idPreview) {
            var fileInput = document.getElementById(id);
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Jenis file tidak valid');
                fileInput.value = '';
                return false;
            } else {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(idPreview).innerHTML = `
                              <a href="${e.target.result}" data-fancybox="buktiLaporan" data-caption="Gallery B #2">
                                <img src="${e.target.result}" alt="" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;">
                              </a>
                          `;
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        function fileValidationPdf(id) {
            var fileInput = document.getElementById(id);
            var filePath = fileInput.value;
            var allowedExtensions = /(\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Jenis file tidak valid');
                fileInput.value = '';
                return false;
            }
        }

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
