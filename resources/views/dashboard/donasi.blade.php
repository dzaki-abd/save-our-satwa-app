@extends('dashboard.layouts.app')

@section('content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Donasi</h1>
  </div>
  <div class="row">
    <!-- Card Uang Masuk -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Uang Masuk
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Rp 200.000,00
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card Uang Keluar -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Uang Keluar
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Rp 150.000,00
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Link Page -->
  <ul
    class="nav nav-tabs border-bottom-success mt-2 bg-white shadow"
    style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2"
  >
    <li class="nav-item">
      <button
        id="buttonRincianMasuk"
        class="btn btn-success"
        style="border-radius: 0; border-top-left-radius: 0.3rem; border-top-right-radius: 0.3rem"
      >
        Rincian Uang Masuk
      </button>
    </li>
    <li class="nav-item">
      <button
        id="buttonRincianKeluar"
        class="btn text-success"
        style="border-radius: 0; border-top-left-radius: 0.3rem; border-top-right-radius: 0.3rem"
      >
        Rincian Uang Keluar
      </button>
    </li>
  </ul>

  <!-- DataTales Donasi Masuk -->
  <div
    id="boxDonasiMasuk"
    class="card-2 shadow mb-4 bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Rincian Uang Masuk
      </h6>
      <!-- Button Trigger-->
      <button
        type="button"
        class="btn btn-success ml-3"
        data-bs-toggle="modal"
        data-bs-target="#tambahDonasiMasukModal"
      >
        <i class="fa-solid fa-plus mr-2"></i>
        Tambah
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="donasiMasuk"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0 text-gray-700">Nama</th>
              <th class="border-0 text-gray-700">Jumlah</th>
              <th class="border-0 text-gray-700">Tanggal</th>
              <th class="border-0 text-gray-700">Rekening</th>
              <th class="border-0 text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-gray-700">Nama</th>
              <th class="text-gray-700">Jumlah</th>
              <th class="text-gray-700">Tanggal</th>
              <th class="text-gray-700">Rekening</th>
              <th class="text-gray-700">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 20; $i++)
              <tr class="align-middle">
                <td class="align-middle text-gray-600">Kevin Iansyah</td>
                <td class="align-middle text-gray-600">Rp 200.000,00</td>
                <td class="align-middle text-gray-600">18 November 2023</td>
                <td class="align-middle text-gray-600">Akulaku</td>
                <td class="d-flex align-middle">
                  <div class="d-flex">
                    <!-- Button Trigger-->
                    <button
                      type="button"
                      class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                      data-bs-toggle="modal"
                      data-bs-target="#editDonasiMasukModal"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-pen"
                        style="font-size: 0.8rem"
                      ></i>
                    </button>
                    <button
                      type="button"
                      href="#"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteDonasiMasukModal"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-trash"
                        style="font-size: 0.8rem"
                      ></i>
                    </button>
                  </div>
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- DataTales Donasi Keluar -->
  <div
    id="boxDonasiKeluar"
    class="card-2 shadow mb-4 d-none bg-white"
    style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem"
  >
    <div class="card-header py-3 d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-success">
        Rincian Uang Keluar
      </h6>
      <!-- Button Triger Modal -->
      <button
        type="button"
        class="btn btn-success ml-3"
        data-bs-toggle="modal"
        data-bs-target="#tambahDonasiKeluarModal"
      >
        <i class="fa-solid fa-plus mr-2"></i>
        Tambah
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-striped"
          id="donasiKeluar"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="border-0">Jumlah</th>
              <th class="border-0">Tanggal</th>
              <th class="border-0">Keperluan</th>
              <th class="border-0">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Jumlah</th>
              <th>Tanggal</th>
              <th>Keperluan</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @for ($i = 0; $i < 20; $i++)
              <tr class="align-middle">
                <td class="align-middle">Rp 200.000,00</td>
                <td class="align-middle">18 November 2023</td>
                <td
                  class="align-middle"
                  style="min-width: 350px;"
                >
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur asperiores quod soluta atque
                  sapiente, voluptatum repellat pariatur, ab nisi commodi velit dolorem omnis odit fugit modi deleniti
                  possimus quis non.
                </td>
                <td class="align-middle">
                  <div class="d-flex">
                    <button
                      type="button"
                      class="btn btn-info d-flex justify-content-center align-items-center mr-1"
                      data-bs-toggle="modal"
                      data-bs-target="#editDonasiKeluarModal"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-pen"
                        style="font-size: 0.8rem"
                      ></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger d-flex justify-content-center align-items-center"
                      data-bs-toggle="modal"
                      data-bs-target="#deleteDonasiKeluarModal"
                      style="width: 30px; height: 30px"
                    >
                      <i
                        class="fa-solid fa-trash"
                        style="font-size: 0.8rem"
                      ></i>
                    </button>
                  </div>
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Tambah Donasi Masuk Modal -->
  <div
    class="modal fade"
    id="tambahDonasiMasukModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Tambah Rincian Uang Masuk</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body pb-0">
          <form
            action=""
            method=""
          >
            <div class="mb-3">
              <label
                for="name"
                class="form-label"
              >Nama</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Masukkan nama"
                required
              />
            </div>
            <div class="mb-3">
              <label
                for="donation"
                class="form-label"
              >Jumlah Donasi</label>
              <input
                type="number"
                class="form-control"
                id="donation"
                name="donation"
                placeholder="Masukkan jumlah donasi"
                required
              >
            </div>
            <div class="mb-3 pb-2">
              <label for="rekening">Rekening</label>
              <select
                class="custom-select custom-select-2"
                id="rekening"
                required
              >
                <option>Pilih...</option>
                <option value="Akulaku">Akulaku</option>
                <option value="Mandiri">Mandiri</option>
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
              </select>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >Tutup</button>
              <button
                type="submit"
                class="btn btn-success"
              >Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah Donasi Keluar Modal -->
  <div
    class="modal fade"
    id="tambahDonasiKeluarModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Tambah Rincian Uang Masuk</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body pb-0">
          <form
            action="money"
            method=""
          >
            <div class="mb-3">
              <label
                for="uangKeluar"
                class="form-label"
              >Jumlah Uang</label>
              <input
                type="number"
                class="form-control"
                id="money"
                name="money"
                placeholder="Masukkan jumlah uang"
                required
              />
            </div>
            <div class="mb-3">
              <label
                for="description"
                class="form-label"
              >Keperluan</label>
              <textarea
                class="form-control"
                id="description"
                name="description"
                rows="6"
                placeholder="Jelaskan keperluan"
                required
              ></textarea>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >Tutup</button>
              <button
                type="submit"
                class="btn btn-success"
              >Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Donasi Masuk Modal -->
  <div
    class="modal fade"
    id="editDonasiMasukModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Edit Rincian Uang Masuk</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body pb-0">
          <form
            action=""
            method=""
          >
            <div class="mb-3">
              <label
                for="name"
                class="form-label"
              >Nama</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Masukkan nama"
                required
                value="Kevin Iansyah"
              />
            </div>
            <div class="mb-3">
              <label
                for="donation"
                class="form-label"
              >Jumlah Donasi</label>
              <input
                type="number"
                class="form-control"
                id="donation"
                name="donation"
                placeholder="Masukkan jumlah donasi"
                required
                value="200000"
              >
            </div>
            <div class="mb-3 pb-2">
              <label for="rekening">Rekening</label>
              <select
                class="custom-select custom-select-2"
                id="rekening"
                name="rekening"
                required
              >
                <option
                  selected
                  value="Mandiri"
                >{{ $value = 'Mandiri' }}</option>
                <option value="Akulaku">Akulaku</option>
                <option value="Mandiri">Mandiri</option>
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
              </select>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >Tutup</button>
              <button
                type="submit"
                class="btn btn-success"
              >Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Donasi Keluar Modal -->
  <div
    class="modal fade"
    id="editDonasiKeluarModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Edit Rincian Uang Masuk</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body pb-0">
          <form
            action=""
            method=""
          >
            <div class="mb-3">
              <label
                for="money"
                class="form-label"
              >Jumlah Uang</label>
              <input
                type="number"
                class="form-control"
                id="money"
                name="money"
                placeholder="Masukkan jumlah uang"
                required
                value="200000"
              />
            </div>
            <div class="mb-3">
              <label
                for="description"
                class="form-label"
              >Keperluan</label>
              <textarea
                class="form-control"
                id="description"
                name="description"
                rows="6"
                placeholder="Jelaskan keperluan"
                required
              >{{ $value = 'Beli tali jepang' }}</textarea>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >Tutup</button>
              <button
                type="submit"
                class="btn btn-success"
              >Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Donasi Masuk Modal-->
  <div
    class="modal fade"
    id="deleteDonasiMasukModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Apakah Anda Yakin?</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
          Pilih opsi "Hapus" di bawah ini apabila Anda sudah siap untuk menghapus data dengan ID "...".
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >Tutup</button>
          <button
            type="submit"
            class="btn btn-success"
          >Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Donasi Keluar Modal-->
  <div
    class="modal fade"
    id="deleteDonasiKeluarModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5
            class="modal-title fs-5"
            id="exampleModalLabel"
          >Apakah Anda Yakin?</h5>
          <button
            type="button"
            class="btn btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
          Pilih opsi "Hapus" di bawah ini apabila Anda sudah siap untuk menghapus data dengan ID "...".
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >Tutup</button>
          <button
            type="submit"
            class="btn btn-success"
          >Hapus</button>
        </div>
      </div>
    </div>
  </div>
@endsection
