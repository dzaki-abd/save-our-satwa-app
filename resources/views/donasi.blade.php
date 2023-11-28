@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
<div class="jumbotron-2">
  <div class="container jumbotron-container-2">
    <div class="d-flex flex-column justify-content-center align-items-start gap-1 h-100 jumbotron-content-2">
      <h2 class="text-white">DONASI</h2>
      <nav aria-label="breadcrumb" data-bs-theme="dark">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Donasi</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
@endsection

@section('content')
<h3 class="text-center h3-top">DONASI <span>SEKARANG</span></h3>
<p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
<div class="row gap-4 gap-lg-0">
  <div class="col-12 col-lg-5">
    <div class="donasi-content rounded p-3 p-lg-4 shadow">
      <div class="donasi-jumlah rounded p-3">
        <h5 class="text-white mb-1">Jumlah Donasi (via Bank BRI)</h5>
        <p class="text-white mb-3" style="font-size: 0.9rem">hingga {{getFullDateID()}}</p>
        <h2 class="text-white mb-0">Rp 200.000.000,0</h2>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-7">
    <div class="accordion accordion-flush shadow" id="accordionFlushExample">
      <!-- Kitabisa -->
      <div class="accordion-item rounded">
        <h2 class="accordion-header rounded">
          <button class="accordion-button rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <h6 class="m-0">KitaBisa</h6>
            <div class="accordion-logo ms-3 rounded">
              <img src="../img/kitabisa.png" alt="" style="height: 1.3rem">
            </div>
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body p-3 p-lg-4">
            Gabung dalam aksi kebaikan di <strong>Kitabisa!</strong> Sumbangkan donasi untuk melindungi satwa yang membutuhkan. Setiap sumbanganmu memberikan harapan baru bagi kehidupan mereka. Donasikan sekarang di <strong>Kitabisa!</strong> dan menjadi bagian dari perubahan positif untuk kehidupan satwa.
            <div class="d-flex justify-content-center w-100 mt-3">
              <a href="https://kitabisa.com/campaign/savesatwaliar?utm_source=socialsharing_donor_web_null&utm_medium=share_campaign_copas&utm_campaign=share_detail_campaign" target="blank_" rel="noopener" class="button-teal-500">Donasi Kitabisa</a>
            </div>
          </div>
        </div>
      </div>

      <!-- BRI -->
      <div class="accordian-donasi accordion-item rounded">
        <h2 class="accordion-header rounded">
          <button class="accordion-button collapsed rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            <h6 class="m-0">BRI</h6>
            <div class="accordion-logo ms-3 rounded">
              <img src="../img/bri.png" alt="" style="height: 1.2rem">
            </div>
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body p-3 p-lg-4">
            <div class="accordion-body d-flex flex-column justify-content-center align-items-center gap-4 p-0">

              <div class="rekening-box p-3 shadow-sm rounded" style="width: 18rem">
                <div class="d-flex justify-content-between flex-column align-items-center">
                  <p class="mb-2 text-white">No. Rekening (BRI)</p>
                  <h2 class="mb-0 text-white">530601028331531</h2>
                </div>
              </div>
              <div class="d-flex flex-column justify-content-center align-items-center">
                <p><span style="color: red">*</span>Sudah transfer? Harap lakukan konfirmasi!</p>
                <button type="button" class="button-teal-500" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">Konfirmasi</button>
              </div>

              <div class="accordion shadow-sm w-100" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                      <h6 class="m-0">Transfer dari Bank BRI menggunakan Mobile Banking BRI</h6>
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body p-3 p-lg-4">
                      <table class="table mb-0">
                        <tbody>
                          <tr>
                            <td scope="row">1.</td>
                            <td>
                              <p class="mb-1">Buka Aplikasi Mobile Banking Anda</p>
                              <p class="mb-0">Unduh dan buka aplikasi mobile banking dari bank tempat Anda memiliki rekening.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">2.</td>
                            <td>
                              <p class="mb-1">Login ke Akun Anda</p>
                              <p class="mb-0">Masukkan informasi login Anda, seperti nomor rekening dan PIN.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">3.</td>
                            <td>
                              <p class="mb-1">Pilih Menu Transfer</p>
                              <p class="mb-0">Cari dan pilih opsi "Transfer" atau "Pembayaran" di menu utama.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">4.</td>
                            <td>
                              <p class="mb-1">Pilih Bank Tujuan (BRI)</p>
                              <p class="mb-0">Pilih Bank BRI sebagai bank tujuan. Masukkan nomor rekening tujuan, yaitu 1250445265.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">5.</td>
                            <td>
                              <p class="mb-1">Masukkan Jumlah Transfer</p>
                              <p class="mb-0">Masukkan jumlah uang yang ingin Anda transfer.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">6.</td>
                            <td>
                              <p class="mb-1">Verifikasi Informasi</p>
                              <p class="mb-0">Pastikan informasi yang dimasukkan, termasuk nomor rekening tujuan, jumlah transfer, dan data lainnya, sudah benar.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">7.</td>
                            <td>
                              <p class="mb-1">Setujui Transaksi</p>
                              <p class="mb-0">Setujui transaksi dengan mengikuti petunjuk yang ada di aplikasi.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">8.</td>
                            <td>
                              <p class="mb-1">Selesaikan Transaksi</p>
                              <p class="mb-0">Ikuti langkah-langkah untuk menyelesaikan transaksi dan pastikan mendapatkan bukti atau konfirmasi transaksi.</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                      <h6 class="m-0">Transfer dari Bank Lain ke Bank BRI menggunakan Mobile Banking</h6>
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                    <div class="accordion-body p-3 p-lg-4">
                      <table class="table mb-0">
                        <tbody>
                          <tr>
                            <td scope="row">1.</td>
                            <td>
                              <p class="mb-1">Buka Aplikasi Mobile Banking Anda</p>
                              <p class="mb-0">Unduh dan buka aplikasi mobile banking dari bank tempat Anda memiliki rekening.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">2.</td>
                            <td>
                              <p class="mb-1">Login ke Akun Anda</p>
                              <p class="mb-0">Masukkan informasi login Anda, seperti nomor rekening dan PIN.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">3.</td>
                            <td>
                              <p class="mb-1">Pilih Menu Transfer</p>
                              <p class="mb-0">Cari dan pilih opsi "Transfer" atau "Pembayaran" di menu utama.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">4.</td>
                            <td>
                              <p class="mb-1">Pilih Bank Tujuan (BRI)</p>
                              <p class="mb-0">Pilih Bank BRI sebagai bank tujuan. Masukkan nomor rekening tujuan, yaitu 1250445265.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">5.</td>
                            <td>
                              <p class="mb-1">Masukkan Jumlah Transfer</p>
                              <p class="mb-0">Masukkan jumlah uang yang ingin Anda transfer.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">6.</td>
                            <td>
                              <p class="mb-1">Verifikasi Informasi</p>
                              <p class="mb-0">Pastikan informasi yang dimasukkan, termasuk nomor rekening tujuan, jumlah transfer, dan data lainnya, sudah benar.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">7.</td>
                            <td>
                              <p class="mb-1">Setujui Transaksi</p>
                              <p class="mb-0">Setujui transaksi dengan mengikuti petunjuk yang ada di aplikasi.</p>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">8.</td>
                            <td>
                              <p class="mb-1">Selesaikan Transaksi</p>
                              <p class="mb-0">Ikuti langkah-langkah untuk menyelesaikan transaksi dan pastikan mendapatkan bukti atau konfirmasi transaksi.</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="konfirmasiModalLabel">Konfirmasi Donasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('donasi.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nama_donatur" class="form-label required">Nama</label>
            <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" placeholder="Ketik nama anda" required>
          </div>
          <div class="mb-3">
            <label for="email_donatur" class="form-label required">Email</label>
            <input type="text" class="form-control" id="email_donatur" name="email_donatur" placeholder="Ketik email anda" required>
          </div>
          <div class="mb-3">
            <label for="nomor_donatur" class="form-label required">No Telepon</label>
            <input type="text" class="form-control" id="nomor_donatur" name="nomor_donatur" placeholder="Ketik nomor anda" required>
          </div>
          <div class="mb-3">
            <label for="jumlah_donatur" class="form-label required">Nominal</label>
            <input type="text" class="form-control" id="jumlah_donatur" name="jumlah_donatur" placeholder="Nominal donasi" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label required">Bukti Transfer</label>
            <div id="imagePreviewCover"></div>
            <input type="file" class="form-control" id="image" name="image" placeholder="Gambar" onchange="return fileValidation('image', 'imagePreviewCover')">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
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
</script>
@endpush