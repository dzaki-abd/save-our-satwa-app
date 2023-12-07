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
    <p class="text-center p-top">Laporkan temuan tindakan ilegal terhadap satwa.</p>

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
            <input type="datetime-local" class="form-control" id="waktu_kejadian" name="waktu_kejadian"
                placeholder="Masukkan tanggal kejadian" required>
        </div>
        <div class="mb-5">
            <label for="lokasi_kejadian" class="form-label">Lokasi Kejadian</label>
            <div class="text-sm text-white p-1 ps-2 mb-3 rounded d-flex align-items-center information">
                <i class="fa-solid fa-circle-info"></i>
                <div class="rounded p-2 d-flex gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle rounded-circle lokasi-anda" style="width: 1rem; height: 1rem"></div>
                        <p class="mb-0">Lokasi Anda</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-danger-subtle rounded-circle lokasi-kejadian" style="width: 1rem; height: 1rem"></div>
                        <p class="mb-0">Lokasi Kejadian</p>
                    </div>
                </div>
            </div>
            <div id="map" class="mb-1 rounded" style="height: 400px;"></div>
            <input type="text" class="form-control" id="lokasi_kejadian" name="lokasi_kejadian"
                placeholder="Masukkan lokasi kejadian" required readonly>
            <input type="hidden" class="form-control" id="latitude" name="latitude"
                placeholder="Masukkan lokasi kejadian" required readonly>
            <input type="hidden" class="form-control" id="longitude" name="longitude"
                placeholder="Masukkan lokasi kejadian" required readonly>
        </div>

        <h5 class="mb-3">JENIS PELANGGARAN</h5>
        <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
            <i class="fa-solid fa-circle-info"></i>
            Jika anda memilih lainnya pada form select maka isi form dengan label lainnya!
        </p>
        <div class="mb-3">
            <label for="pelanggaran_id" class="form-label">Pilih Jenis Pelanggaran</label>
            <select class="form-select" id="pelanggaran_id" name="pelanggaran_id" aria-label="Default select example"
                required>
                <option selected disabled>Pilih...</option>
                @foreach ($pelanggaran as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_pelanggaran }}</option>
                @endforeach
                <option value="0">Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pelanggaran_lain" class="form-label">Jenis Pelanggaran Lainnya (Opsional)</label>
            <input type="text" class="form-control" id="pelanggaran_lain" name="pelanggaran_lain"
                placeholder="Masukkan jenis pelanggaran lainnya">
        </div>
        <div class="mb-3">
            <label for="satwa_id" class="form-label">Pilih Jenis Satwa</label>
            <select class="form-select" id="satwa_id" name="satwa_id" aria-label="Default select example" required>
                <option selected disabled>Pilih...</option>
                @foreach ($satwa as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_lokal }}</option>
                @endforeach
                <option value="0">Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="satwa_lain" class="form-label">Jenis Satwa Lainnya (Opsional)</label>
            <input type="text" class="form-control" id="satwa_lain" name="satwa_lain"
                placeholder="Masukkan jenis satwa lainya">
        </div>
        <div class="mb-5">
            <label for="jumlah_satwa" class="form-label">Jumlah Satwa</label>
            <input type="number" class="form-control" id="jumlah_satwa" name="jumlah_satwa"
                placeholder="Masukkan jumlah satwa" required>
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
            <input type="file" id="gambar" name="gambar[]" class="dropify" data-height="200" data-max-file-size="10M"
                data-allowed-file-extensions="jpg jpeg png">
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
            <input type="file" id="hasil_investigasi" name="hasil_investigasi" class="dropify" data-height="200"
                data-max-file-size="10M" data-allowed-file-extensions="pdf">
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
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        let map = L.map('map').setView([-7.6145, 110.7128], 8);
        let userMarker; 
        let clickMarkers = L.layerGroup();
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
    
        // Fungsi untuk mendapatkan lokasi pengguna
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showUserPosition, errorHandler);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    
        // Fungsi yang dipanggil saat lokasi pengguna berhasil didapatkan
        function showUserPosition(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;
    
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
    
            // Hapus marker pengguna jika sudah ada
            if (userMarker) {
                map.removeLayer(userMarker);
            }
    
            // Tambahkan marker ke lokasi pengguna
            userMarker = L.circleMarker([latitude, longitude], { radius: 10, color: 'blue' }).addTo(map);
    
            // Reverse geocode untuk mendapatkan alamat
            reverseGeocode({ lat: latitude, lng: longitude });
        }
    
        // Fungsi yang dipanggil saat terjadi kesalahan mendapatkan lokasi
        function errorHandler(error) {
            console.error('Error getting location:', error.message);
        }
    
        // Fungsi reverse geocode untuk mendapatkan alamat berdasarkan koordinat
        function reverseGeocode(latlng) {
            const url = 'https://nominatim.openstreetmap.org/reverse?format=json&lat=' + latlng.lat + '&lon=' + latlng.lng;
    
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    let address = data.display_name;
                    document.getElementById('lokasi_kejadian').value = address;
                })
                .catch(error => console.error('Error:', error));
        }
    
        // Panggil fungsi getLocation saat halaman dimuat
        getLocation();
    
        // Tambahkan event listener untuk mendapatkan lokasi saat klik peta
        map.on('click', function (e) {
            let latitude = e.latlng.lat;
            let longitude = e.latlng.lng;
    
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
    
            // Hapus semua marker klik sebelumnya
            clickMarkers.clearLayers();
    
            // Tambahkan marker ke lokasi yang diklik pengguna
            let clickMarker = L.circleMarker([latitude, longitude], { radius: 10, color: 'red' }).addTo(clickMarkers);
    
            // Reverse geocode untuk mendapatkan alamat saat klik peta
            reverseGeocode(e.latlng);
        });
    
        // Tambahkan clickMarkers ke peta
        clickMarkers.addTo(map);
    </script>
    
    <script>
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
