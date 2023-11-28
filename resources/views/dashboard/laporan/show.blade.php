@extends('dashboard.layouts.app')

@section('content')
  <div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent pl-1">
        <li class="breadcrumb-item">
          <a
            class="text-success"
            href="{{ route('dashboard.laporan.index') }}"
          >Laporan</a>
        </li>
        <li
          class="breadcrumb-item active"
          aria-current="page"
        >
          Detail Laporan
        </li>
      </ol>
    </nav>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Edit Status Laporan dengan ID {{ $laporan->uniqid }}
      </h6>
    </div>
    <div class="card-body">
      <form
        action=""
        method=""
        class="row g-3 align-items-center"
      >
        <div class="col-auto">
          <label
            for="status"
            class="col-form-label"
          >Status</label>
        </div>
        <div
          class="col-auto"
          style="width: 10rem"
        >
          <select
            class="custom-select"
            id="status"
            name="status"
            required
          >
            <option
              readonly
              selected
              value="null"
            >Pilih...</option>
            <option value="Ditinjau">Ditinjau</option>
            <option value="Disetujui">Disetujui</option>
            <option value="Ditolak">Ditolak</option>
          </select>
        </div>
        <div class="col-auto">
          <button
            type="button"
            class="btn btn-success"
            id = "btn-ubah-status"
          >Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Detail Laporan dengan ID KAL121JWY
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table"
          width="100%"
          cellspacing="0"
        >
          <tbody>
            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success">Status Laporan</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <td
                colspan="2"
                class="align-middle text-gray-600 pl-0"
                style="border-top: 0"
              >
                <!-- Pilih salah satu status menggunakan if berdasarkan status terbar -->
                @if ($laporan->status == 'Ditolak')
                  <button
                    type="button"
                    class="btn btn-danger"
                  >Ditolak</button>
                @elseif ($laporan->status == 'Ditinjau')
                  <button
                    type="button"
                    class="btn btn-warning"
                  >Ditinjau</button>
                @else
                  <button
                    type="button"
                    class="btn btn-success"
                  >Disetujui</button>
                @endif
              </td>
            </tr>

            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success pt-3">Informasi Pelapor</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Nama</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $laporan->user->name }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Email</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $laporan->user->email }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Nomor Telepon</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $laporan->user->no_hp }}</td>
            </tr>

            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success pt-3">Informasi Kejadian</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Tanggal Kejadian</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ date('d F Y', strtotime($laporan->waktu_kejadian)) }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Lokasi Kejadian</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $laporan->lokasi_kejadian }}</td>
            </tr>

            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success pt-3">Jenis Pelanggaran</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Jenis Pelanggaran</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $laporan->jenis_pelanggaran }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Jenis Satwa</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $laporan->jenis_satwa }}</td>
            </tr>

            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success pt-3">Deskripsi Kejadian</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <td
                colspan="2"
                class="align-middle text-gray-600 pl-0"
                style="border-top: 0"
              >{{ $laporan->deskripsi_kejadian }}</td>
            </tr>

            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success pt-3">Bukti Pendukung</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <td
                colspan="2"
                class="align-middle text-gray-600 pl-0"
                style="border-top: 0"
              >
                @for ($i = 0; $i < 5; $i++)
                  <a
                    href="../../../img/buktilaporan.jpg"
                    {{-- data-fancybox="buktiLaporan" --}}
                    {{-- data-caption="Gallery B #2" --}}
                  >
                    <img
                      src="../../../img/buktilaporan.jpg"
                      alt=""
                      class="rounded mb-1"
                      style="height: 200px"
                    >
                  </a>
                @endfor
              </td>
            </tr>

            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success pt-3">Tindakan yang Diambil</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <td
                colspan="2"
                class="align-middle text-gray-600 pl-0"
                style="border-top: 0"
              >{{ $laporan->tindak_lanjut ?? 'Tidak ada' }}</td>
            </tr>

            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success pt-3">Hasil Investigasi</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <td
                colspan="2"
                class="align-middle text-gray-600 pl-0"
                style="border-top: 0;"
              >
                <a
                  href="../../../pdf/brosurIL.pdf"
                  class="btn btn-success"
                >Download pdf</a>
              </td>
            </tr>

            <thead>
              <tr>
                <td
                  class="pl-0"
                  style="border-top: none"
                >
                  <h5 class="m-0 font-weight-bold text-success pt-3">Pencatatan Tambahan</h5>
                </td>
              </tr>
            </thead>
            <tr class="align-middle">
              <td
                colspan="2"
                class="align-middle text-gray-600 pl-0"
                style="border-top: 0"
              >{{ $laporan->catatan_tambahan ?? 'Tidak ada' }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // Fancybox.bind('[data-fancybox="buktiLaporan"]', {});
    // get from url
    const idLaporan = window.location.pathname.split('/')[3];

    $('#btn-ubah-status').click(function() {
      // console.log(idLaporan);
      let status = $('#status').val();
      let urlUpdate = "{{ route('dashboard.laporan.update', ':id') }}".replace(':id', idLaporan);
      if (status == 'null') {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Anda belum memilih status!',
        })
      } else {
        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Anda akan mengubah status laporan ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#1cc88a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ubah',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: urlUpdate,
              method: 'PUT',
              data: {
                _token: '{{ csrf_token() }}',
                status: status
              },
              success: function(response) {
                if (response.status == 'success') {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Status laporan berhasil diubah!',
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.reload();
                    }
                  })
                }
              },
              error: function(response) {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Terjadi kesalahan!',
                })
              }
            })
          }
        })
      }
    });
  </script>
@endpush
