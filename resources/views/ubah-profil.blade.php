@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-2 jumbotron-search-2">
    <div class="container jumbotron-container-2">
      <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-start align-items-md-center h-100 jumbotron-content-2 gap-3">
        <div>
          <h2 class="text-white">UBAH PROFIL</h2>
          <nav aria-label="breadcrumb" data-bs-theme="dark">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ubah Profil</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="profil-container rounded p-4 d-flex align-items-center gap-4">
    <form class="w-100" id="" action="" method="">
      @csrf
      <div class="mb-3">
        <label for="image_edit" class="form-label text-white">Foto Profil</label>
        <div class="d-flex align-items-center gap-4">
          <div id="imagePreview" class="profil-image p-2 rounded">
            <a href="../img/default-profil.png" data-fancybox>
              <img src="../img/default-profil.png" class="rounded"/>
            </a>
          </div>
          <div>
            <button type="button" id="fileButton" class="button-teal-500 button-teal-500-custom mb-3">Pilih Foto</button>
            <p class="text-white mb-0">Gambar Profile Anda sebaiknya memiliki rasio 1:1 dan berukuran tidak lebih dari 1Mb</p>
          </div>
        </div>
        <input type="file" class="form-control d-none" id="image_edit" name="image_edit">
      </div>
      <div class="mb-3 profil-input">
        <label for="name" class="form-label text-white">Nama</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap anda" required value="Kevin Ianyah">
      </div>
      <div class="mb-3 profil-input">
        <label for="email" class="form-label text-white">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan nama lengkap anda" required value="keviniansyah11@gmail.com">
      </div>
      <button type="submit" class="button-teal-500 button-teal-500-custom">Simpan Perubahan</button>
    </form>
  </div>
@endsection

@push('scripts')
    <script>
      const fileButton = document.getElementById('fileButton');
      const FileInput = document.getElementById('image_edit');

      fileButton.addEventListener('click', function () {
        FileInput.click();
      });

      FileInput.addEventListener('change', function () {
        fileValidation()
      });

      function fileValidation() {
        let fileInput = document.getElementById('image_edit');
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
            reader.onload = function (e) {
              let previewElement = document.getElementById('imagePreview');
              previewElement.innerHTML = `
                <a href="${e.target.result}" data-fancybox>
                  <img src="${e.target.result}" class="rounded"/>
                </a>
              `;
            };
            reader.readAsDataURL(fileInput.files[0]);
          }

          return true;
        }
      }
    </script>
@endpush
