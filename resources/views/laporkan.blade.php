@extends('layouts.app')

@section('jumbotron')
  <div class="jumbotron-2">
    <div class="container jumbotron-container-2">
      <div class="d-flex flex-column justify-content-center align-items-start gap-1 h-100 jumbotron-content-2">
        <h2 class="text-white">LAPORKAN</h2>
        <nav
          aria-label="breadcrumb"
          data-bs-theme="dark"
        >
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li
              class="breadcrumb-item active"
              aria-current="page"
            >Laporkan</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <h3 class="text-center">LAPORKAN <span>SEKARANG</span></h3>
  <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>

  <form
    action=""
    method=""
    class="shadow p-4 form-laporkan"
  >
    <h5 class="mb-3">INFORMASI PELAPOR</h5>
    <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
      <i class="fa-solid fa-circle-info"></i>
      Data anda kami jamin kerahasiaannya!
    </p>
    <div class="mb-3">
      <label
        for="name"
        class="form-label"
      >Name</label>
      <input
        type="text"
        class="form-control"
        id="name"
        name="name"
        placeholder="Masukkan nama lengkap anda"
        required
      >
    </div>
    <div class="mb-3">
      <label
        for="email"
        class="form-label"
      >Email</label>
      <input
        type="email"
        class="form-control"
        id="email"
        name="email"
        placeholder="Masukkan email anda"
        required
      >
    </div>
    <div class="mb-5">
      <label
        for="phone"
        class="form-label"
      >Nomor Telepon</label>
      <input
        type="text"
        class="form-control"
        id="phone"
        name="phone"
        placeholder="Masukkan nomor telepon anda"
        required
      >
    </div>

    <h5 class="mb-3">INFORMASI KEJADIAN</h5>
    <div class="mb-3">
      <label
        for="date"
        class="form-label"
      >Tanggal Kejadian</label>
      <input
        type="date"
        class="form-control"
        id="date"
        name="date"
        placeholder="Masukkan tanggal kejadian"
        required
      >
    </div>
    <div class="mb-5">
      <label
        for="address"
        class="form-label"
      >Lokasi Kejadian</label>
      <input
        type="text"
        class="form-control"
        id="address"
        name="address"
        placeholder="Masukkan lokasi kejadian"
        required
      >
    </div>

    <h5 class="mb-3">JENIS PELANGGARAN</h5>
    <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
      <i class="fa-solid fa-circle-info"></i>
      Jika anda memilih lainnya pada form select maka isi form dengan label lainnya!
    </p>
    <div class="mb-3">
      <label
        for="violation"
        class="form-label"
      >Pilih Jenis Pelanggaran</label>
      <select
        class="form-select"
        id="violation"
        name="violation"
        aria-label="Default select example"
        required
      >
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
      <label
        for="other_violation"
        class="form-label"
      >Jenis Pelanggaran Lainnya</label>
      <input
        type="text"
        class="form-control"
        id="other_violation"
        name="other_violation"
        placeholder="Masukkan jenis pelanggaran lainnya"
        required
      >
    </div>
    <div class="mb-3">
      <label
        for="animal"
        class="form-label"
      >Pilih Jenis Satwa</label>
      <select
        class="form-select"
        id="animal"
        name="animal"
        aria-label="Default select example"
        required
      >
        <option selected>Pilih...</option>
        <option value="Harimau Sumatra">Harimau Sumatra</option>
        <option value="Komodo">Komodo</option>
        <option value="Anoa">Anoa</option>
        <option value="Lainnya">Lainnya</option>
      </select>
    </div>
    <div class="mb-5">
      <label
        for="other_animal"
        class="form-label"
      >Jenis Satwa Lainnya</label>
      <input
        type="text"
        class="form-control"
        id="other_animal"
        name="other_animal"
        placeholder="Masukkan jenis satwa lainya"
        required
      >
    </div>

    <h5 class="mb-3">DESKRIPSI KEJADIAN</h5>
    <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
      <i class="fa-solid fa-circle-info"></i>
      Ceritakan secara rinci tentang kejadian yang dilaporkan, termasuk aktivitas yang teramati dan potensi dampak
      terhadap satwa dilindungi!
    </p>
    <div class="mb-5">
      <label
        for="description"
        class="form-label"
      >Deskripsi Kejadian</label>
      <textarea
        class="form-control"
        id="description"
        name="description"
        rows="3"
        placeholder="Masukkan deskripsi kejadian"
        required
      ></textarea>
    </div>

    <h5 class="mb-3">BUKTI PENDUKUNG</h5>
    <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
      <i class="fa-solid fa-circle-info"></i>
      Wajib melampirkan satu foto, dengan jumlah maksimal foto yang dapat diunggah sebanyak 10. Jika Anda memiliki lebih
      banyak foto bukti atau bukti dalam bentuk lainnya, seperti video, surat, dan sebagainya, Anda dapat mengunggahnya
      ke Drive dan melampirkan linknya di kolom yang telah disediakan.
    </p>
    <div class="mb-3">
      <label
        for="gambar1"
        class="form-label"
      >Foto 1</label>
      <div id="imagePreviewGambar1"></div>
      <input
        type="file"
        class="form-control"
        id="gambar1"
        name="gambar1"
        onchange="fileValidation('gambar1', 'imagePreviewGambar1')"
        aria-label="file example"
        required
      />
    </div>

    <div id="formfield">
    </div>
    <div>
      <button
        type="button"
        class="btn button-teal-500"
        style="margin-bottom: 1rem;"
        onclick="addUpload()"
      >Tambah Unggah</button>
      <button
        type="button"
        class="btn button-teal-500"
        style="margin-bottom: 1rem;"
        onclick="removeUpload()"
      >Hapus Unggah</button>
    </div>


    <div class="mb-5">
      <label
        for="link_gdrive"
        class="form-label"
      >Link Google Drive (Optional)</label>
      <input
        type="text"
        class="form-control"
        id="link_gdrive"
        name="link_gdrive"
        placeholder="Masukkan link Google Drive"
      >
    </div>

    <h5 class="mb-3">TINDAKAN YANG DIAMBIL</h5>
    <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
      <i class="fa-solid fa-circle-info"></i>
      Apakah tindakan langsung diambil sebagai tanggapan terhadap pelanggaran tersebut? Jika ya, jelaskan tindakan yang
      diambil.
    </p>
    <div class="mb-5">
      <label
        for="action"
        class="form-label"
      >Tindakan Yang Diambil (Optional)</label>
      <textarea
        class="form-control"
        id="action"
        name="action"
        rows="3"
        placeholder="Masukkan tindakan yang diambil"
      ></textarea>
    </div>

    <h5 class="mb-3">HASIL INVESTIGASI</h5>
    <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
      <i class="fa-solid fa-circle-info"></i>
      Jika ada penyelidikan yang dilakukan, sertakan hasil penyelidikan termasuk pihak yang terlibat dan bukti yang
      ditemukan. Lampirkan hasil investigasi dalam bentuk file dengan format pdf.
    </p>
    <div class="mb-5">
      <label
        for="investigation"
        class="form-label"
      >Hasil Investigasi (Optional)</label>
      <input
        type="file"
        class="form-control"
        id="investigation"
        name="investigation"
        onchange="fileValidationPdf('investigation')"
      >
    </div>

    <h5 class="mb-3">PENCATATAN TAMBAHAN</h5>
    <p class="text-sm text-white p-1 ps-2 mb-3 rounded">
      <i class="fa-solid fa-circle-info"></i>
      Apakah tindakan langsung diambil sebagai tanggapan terhadap pelanggaran tersebut? Jika ya, jelaskan tindakan yang
      diambil.
    </p>
    <div class="mb-3">
      <label
        for="additional_notes"
        class="form-label"
      >Pencatatan Tambahan (Optional)</label>
      <textarea
        class="form-control"
        id="additional_notes"
        name="additional_notes"
        rows="3"
        placeholder="Masukkan catatan tambahan"
      ></textarea>
    </div>
    <button
      type="submit"
      class="btn button-teal-500"
    >Kirim</button>
  </form>
@endsection

@push('scripts')
  <script>
    let no = 2;
    const max = 10;

    function addUpload() {
      if (no <= max) {
        var form = `
                      <div class="mb-3">
                          <label for="gambar${no}" class="form-label">Foto ${no}</label>
                          <div id="imagePreviewGambar${no}"></div>
                          <input type="file" class="form-control" id="gambar${no}" onchange="fileValidation('gambar${no}', 'imagePreviewGambar${no}')" name="gambar${no}" aria-label="file example" required />
                      </div>`;
        document.getElementById('formfield').insertAdjacentHTML("beforeend", form);
        no++;
      } else {
        alert('Maksimal upload 10');
      }
    }

    function removeUpload() {
      if (no > 2) {
        no--;
        document.getElementById('formfield').removeChild(document.getElementById('formfield').lastElementChild);
      } else {
        alert('Minimal upload 1');
      }
    }

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
  </script>
@endpush
