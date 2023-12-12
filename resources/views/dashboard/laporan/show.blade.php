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

  @if ($data['laporan']->status == 'Ditinjau')
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex align-items-center">
        <h6 class="m-0 font-weight-bold text-success">
          Edit Status Laporan dengan Registration Number {{ strtoupper($data['laporan']->uniqid) }}
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
  @endif

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Detail Laporan dengan Registration Number {{ strtoupper($data['laporan']->uniqid) }}
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
                @if ($data['laporan']->status == 'Ditolak')
                  <button
                    type="button"
                    class="btn btn-danger"
                  >Ditolak</button>
                @elseif ($data['laporan']->status == 'Ditinjau')
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
              >{{ $data['laporan']->user->name }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Email</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $data['laporan']->user->email }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Nomor Telepon</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $data['laporan']->user->no_hp }}</td>
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
              >{{ date('d F Y', strtotime($data['laporan']->waktu_kejadian)) }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Lokasi Kejadian</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $data['laporan']->lokasi_kejadian }}</td>
            </tr>
            <tr class="align-middle">
              <td
                colspan="2"
                class="align-middle text-gray-600 pl-0"
                style="border-top: 0"
              >
                <div class="mb-3">
                  <div
                    id="map"
                    class="mb-1 rounded"
                    style="height: 400px;"
                  ></div>
                  <input
                    type="text"
                    class="form-control"
                    id="lokasi_kejadian"
                    name="lokasi_kejadian"
                    placeholder="Masukkan lokasi kejadian"
                    required
                    readonly
                  >
                  <input
                    type="hidden"
                    class="form-control"
                    id="latitude"
                    name="latitude"
                    placeholder="Masukkan lokasi kejadian"
                    required
                    readonly
                    value="{{ $data['laporan']->latitude }}"
                  >
                  <input
                    type="hidden"
                    class="form-control"
                    id="longitude"
                    name="longitude"
                    placeholder="Masukkan lokasi kejadian"
                    required
                    readonly
                    value="{{ $data['laporan']->longitude }}"
                  >
                </div>
              </td>
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
              >{{ $data['laporan']->pelanggaran->nama_pelanggaran }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Jenis Satwa</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $data['laporan']->satwa->nama_lokal }}</td>
            </tr>
            <tr class="align-middle">
              <th
                class="pl-0"
                style="border-top: 0; max-width: 10rem;"
              >Jumlah Satwa</th>
              <td
                class="align-middle text-gray-600"
                style="border-top: 0"
              >{{ $data['laporan']->jumlah_satwa }} ekor</td>
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
              >{{ $data['laporan']->deskripsi_kejadian }}</td>
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
                @foreach ($data['buktiKejadian'] as $bukti)
                  <a
                    href="{{ asset('img/buktilaporan.jpg') }}"
                    {{-- data-fancybox="buktiLaporan" --}}
                    {{-- data-caption="Gallery B #2" --}}
                  >
                    <img
                      src="{{ asset('storage/' . $bukti->bukti_kejadian) }}"
                      alt=""
                      class="rounded mb-1"
                      style="height: 200px"
                    >
                  </a>
                @endforeach
                @if ($data['buktiKejadian']->isEmpty())
                  <p class="text-gray-600">Tidak ada</p>
                @endif
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
              >{{ $data['laporan']->tindak_lanjut ?? 'Tidak ada' }}</td>
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
                @if ($data['laporan']->hasil_investigasi == null)
                  <p class="text-gray-600">Tidak ada</p>
                @else
                  <a
                    href="{{ asset('storage/' . $data['laporan']->hasil_investigasi) }}"
                    class="btn btn-success"
                    target="_blank"
                  >Download pdf</a>
                @endif
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
              >{{ $data['laporan']->catatan_tambahan ?? 'Tidak ada' }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    // Fancybox.bind('[data-fancybox="buktiLaporan"]', {});
    // get from url
    const idLaporan = window.location.pathname.split('/')[3];

    function updateStatus(status, jumlahSatwa = null) {
      return new Promise((resolve, reject) => {
        let urlUpdate = "{{ route('dashboard.laporan.update', ':id') }}".replace(':id', idLaporan);
        $.ajax({
          url: urlUpdate,
          method: 'PUT',
          data: {
            _token: '{{ csrf_token() }}',
            status: status,
            jumlahSatwa: jumlahSatwa
          },
          success: function(response) {
            if (response.status == 'success') {
              resolve(response);
            } else {
              reject(response);
            }
          },
          error: function(response) {
            reject(response);
          }
        });
      });
    }

    $('#btn-ubah-status').click(async function() {
      let status = $('#status').val();
      const inputValue = "{{ $data['laporan']->jumlah_satwa }}";

      if (status == 'null') {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Anda belum memilih status!',
        });
      } else if (status == 'Disetujui') {
        await Swal.fire({
          title: "Anda akan menyetujui laporan ini!",
          input: "text",
          inputLabel: "Dengan menyetujui, populasi satwa akan berkurang. Ubah jumlah satwa jika tidak sesuai",
          confirmButtonColor: '#1cc88a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Batal',
          showCancelButton: true,
          inputValue,
          showLoaderOnConfirm: true,
          preConfirm: async (inputValue) => {
            try {
              const response = await updateStatus(status, inputValue);
              if (response.status == 'success') {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Status laporan berhasil diubah!',
                }).then(() => {
                  window.location.reload();
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Terjadi kesalahan!',
                });
              }
            } catch (error) {
              Swal.hideLoading();
            }
          },
          allowOutsideClick: () => !Swal.isLoading(),
          inputValidator: (value) => {
            if (!value) {
              return "Jumlah satwa wajib dimasukkan!";
            }
          }
        });
      } else {
        await Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Anda akan mengubah status laporan ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#1cc88a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ubah',
          cancelButtonText: 'Batal',
          showLoaderOnConfirm: true,
          preConfirm: async () => {
            try {
              const response = await updateStatus(status, inputValue);
              if (response.status == 'success') {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Status laporan berhasil diubah!',
                }).then(() => {
                  window.location.reload();
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Terjadi kesalahan!',
                });
              }
            } catch (error) {
              Swal.hideLoading();
            }
          },
          allowOutsideClick: () => !Swal.isLoading()
        });
      }
    });

    let latitude = $('#latitude').val();
    let longitude = $('#longitude').val();
    let map = L.map('map').setView([latitude, longitude], 12);
    L.marker([latitude, longitude], {
      draggable: false,
      autoPan: true
    }).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

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

    reverseGeocode(map.getCenter());
  </script>
@endpush
