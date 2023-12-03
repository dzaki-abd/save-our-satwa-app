@extends('dashboard.layouts.app')

@section('content')
<div class="mb-4">
  <h1 class="h3 mb-0 text-gray-800">Detail {{$artikel->judul}}</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-1">
      <li class="breadcrumb-item">
        <a class="text-success" href="{{ route('dashboard.artikel.index') }}">Artikel</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Detail {{$artikel->jenis}}
      </li>
    </ol>
  </nav>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex align-items-center">
    <h6 class="m-0 font-weight-bold text-success">
      Detail {{$artikel->jenis}}
    </h6>
  </div>
  <div class="card-body">
    <form action="{{ route('dashboard.artikel.update', ['artikel' => $artikel->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3">
            <label for="jenis_artikel" class="required">Jenis</label>
            <select class="custom-select" id="jenis_artikel" name="jenis_artikel" required>
              <option value="">Pilih...</option>
              <option value="Artikel">Artikel</option>
              <option value="Berita">Berita</option>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label for="di_posting" class="required">Posting</label>
            <select class="custom-select" id="di_posting" name="di_posting" required>
              <option value="">Pilih...</option>
              <option value="Ya">Ya</option>
              <option value="Tidak">Tidak</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3">
            <div class="mb-3">
              <label for="judul_artikel" class="required">Judul</label>
              <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" placeholder="Masukkan judul artikel" required />
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="tag_artikel" class="required">Kata Kunci</label>
        <p class="text-sm text-white bg-success p-1 pl-2 rounded">
          <i class="fa-solid fa-circle-info"></i> Pisahkan setiap
          kata kunci dengan tanda ( , ).
        </p>
        <input type="text" class="form-control" id="tag_artikel" name="tag_artikel" placeholder="Masukkan kata kunci" required />
      </div>
      <div class="mb-3">
        <label for="image" class="required">Gambar</label>
        <div id="imagePreviewCover"></div>
        <input type="file" class="form-control" id="image" name="image" onchange="return fileValidation('image', 'imagePreviewCover')"/>
      </div>
      <div class="mb-3">
        <label for="konten" class="required">Konten</label>
        <textarea class="form-controls" id="konten" name="konten"></textarea>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{ route('dashboard.artikel.index') }}" class="btn btn-secondary">Kembali</a>
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

  let editor;
  ClassicEditor
    .create(document.querySelector('#konten'))
    .then(ckEditorInstance => {
      editor = ckEditorInstance;
      editor.setData('{!! $artikel->konten !!}');
      editor.editing.view.focus();
    })
    .catch(error => {
      console.error(error);
    });

  Fancybox.bind('[data-fancybox]', {});

  $('#jenis_artikel').val('{{ $artikel->jenis }}');
  $('#di_posting').val('{{ $artikel->di_posting }}');
  $('#judul_artikel').val('{{ $artikel->judul }}');
  $('#tag_artikel').val('{{ $artikel->tag }}');
  $('#konten').val('{!! $artikel->konten !!}');
  $('#imagePreviewCover').html(`
        <a href="{{ asset('storage/' . $artikel->gambar) }}" data-fancybox>
            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;"/>
        </a>
        `);
</script>
@endpush