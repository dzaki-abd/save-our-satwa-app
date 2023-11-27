@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-2">
    <div class="container jumbotron-container-2">
      <div class="d-flex flex-column justify-content-center align-items-start gap-1 h-100 jumbotron-content-2">
        <h2 class="text-white">DONASI</h2>
        <nav aria-label="breadcrumb"  data-bs-theme="dark">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li
              class="breadcrumb-item active"
              aria-current="page"
            >Donasi</li>
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
        <div class="donasi-jumlah rounded p-3 mb-4">
          <h5 class="text-white mb-1">Jumlah Donasi</h5>
          <p class="text-white mb-3" style="font-size: 0.9rem">/22 November 2023</p>
          <h2 class="text-white mb-0">Rp 200.000.000,0</h2>
        </div>
        <div class="donasi-jumlah rounded p-3">
          <h5 class="text-white mb-1">Jumlah Digunakan</h5>
          <p class="text-white mb-3" style="font-size: 0.9rem">/22 November 2023</p>
          <h2 class="text-white mb-0">Rp 150.000.000,0</h2>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-7">
      <div class="accordion accordion-flush shadow" id="accordionFlushExample">
        <!-- Kitabisa -->
        <div class="accordion-item rounded">
          <h2 class="accordion-header rounded">
            <button
              class="accordion-button rounded p-3 p-lg-4"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
            >
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

        <!-- Mandiri -->
        <div class="accordian-donasi accordion-item rounded">
          <h2 class="accordion-header rounded">
            <button
              class="accordion-button collapsed rounded p-3 p-lg-4"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-collapseTwo"
              aria-expanded="false"
              aria-controls="flush-collapseTwo"
            >
              <h6 class="m-0">Mandiri</h6>
              <div class="accordion-logo ms-3 rounded">
                <img src="../img/mandiri.png" alt="" style="height: 1.4rem" >
              </div>
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body p-3 p-lg-4">
              <div class="accordion-body d-flex flex-column justify-content-center align-items-center gap-4 p-0">

                <div class="rekening-box p-3 shadow-sm rounded" style="width: 16rem">
                  <div class="d-flex justify-content-between flex-column align-items-center">
                    <p class="mb-2 text-white">No. Rekening (Mandiri)</p>
                    <h2 class="mb-0 text-white">1250445265</h2>
                  </div>
                </div>

                <div class="accordion shadow-sm w-100" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed p-3 p-lg-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseOne"
                      >
                        <h6 class="m-0">Transfer dari Bank Mandiri menggunakan Mobile Banking Mandiri</h6>
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                      <div class="accordion-body p-3 p-lg-4">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td scope="row">1.</td>
                              <td>
                                <p class="mb-1">Buka Aplikasi Mobile Banking Anda</p>
                                <p class="mb-0">Unduh dan buka aplikasi mobile banking dari bank tempat Anda memiliki
                                  rekening.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">2.</td>
                              <td>
                                <p class="mb-1" >Login ke Akun Anda</p>
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
                                <p class="mb-1" >Pilih Bank Tujuan (Mandiri)</p>
                                <p class="mb-0">Pilih Bank Mandiri sebagai bank tujuan. Masukkan nomor rekening tujuan, yaitu 1250445265.</p>
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
                                <p class="mb-0">Ikuti langkah-langkah untuk menyelesaikan transaksi dan pastikan
                                  mendapatkan bukti atau konfirmasi transaksi.</p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed p-3 p-lg-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo"
                      >
                        <h6 class="m-0">Transfer dari Bank Lain ke Bank Mandiri menggunakan Mobile Banking</h6>
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                      <div class="accordion-body p-3 p-lg-4">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td scope="row">1.</td>
                              <td>
                                <p
                                  class="mb-1"
                                
                                >Buka Aplikasi Mobile Banking Anda</p>
                                <p class="mb-0">Unduh dan buka aplikasi mobile banking dari bank tempat Anda memiliki
                                  rekening.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">2.</td>
                              <td>
                                <p
                                  class="mb-1"
                                
                                >Login ke Akun Anda</p>
                                <p class="mb-0">Masukkan informasi login Anda, seperti nomor rekening dan PIN.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">3.</td>
                              <td>
                                <p
                                  class="mb-1"
                                
                                >Pilih Menu Transfer</p>
                                <p class="mb-0">Cari dan pilih opsi "Transfer" atau "Pembayaran" di menu utama.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">4.</td>
                              <td>
                                <p
                                  class="mb-1"
                                
                                >Pilih Bank Tujuan (Mandiri)</p>
                                <p class="mb-0">Pilih Bank Mandiri sebagai bank tujuan. Masukkan nomor rekening tujuan,
                                  yaitu 1250445265.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">5.</td>
                              <td>
                                <p
                                  class="mb-1"
                                
                                >Masukkan Jumlah Transfer</p>
                                <p class="mb-0">Masukkan jumlah uang yang ingin Anda transfer.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">6.</td>
                              <td>
                                <p
                                  class="mb-1"
                                
                                >Verifikasi Informasi</p>
                                <p class="mb-0">Pastikan informasi yang dimasukkan, termasuk nomor rekening tujuan,
                                  jumlah transfer, dan data lainnya, sudah benar.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">7.</td>
                              <td>
                                <p
                                  class="mb-1"
                                
                                >Setujui Transaksi</p>
                                <p class="mb-0">Setujui transaksi dengan mengikuti petunjuk yang ada di aplikasi.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">8.</td>
                              <td>
                                <p
                                  class="mb-1"
                                
                                >Selesaikan Transaksi</p>
                                <p class="mb-0">Ikuti langkah-langkah untuk menyelesaikan transaksi dan pastikan
                                  mendapatkan bukti atau konfirmasi transaksi.</p>
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

        <!-- BRI -->
        <div class="accordian-donasi accordion-item rounded">
          <h2 class="accordion-header rounded">
            <button
              class="accordion-button collapsed rounded p-3 p-lg-4"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-collapseThree"
              aria-expanded="false"
              aria-controls="flush-collapseThree"
            >
              <h6 class="m-0">BRI</h6>
              <div class="accordion-logo ms-3 rounded">
                <img src="../img/bri.png" alt="" style="height: 1.2rem">
              </div>
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body p-3 p-lg-4">
              <div class="accordion-body d-flex flex-column justify-content-center align-items-center gap-4 p-0">

                <div class="rekening-box p-3 shadow-sm rounded" style="width: 16rem">
                  <div class="d-flex justify-content-between flex-column align-items-center">
                    <p class="mb-2 text-white">No. Rekening (BRI)</p>
                    <h2 class="mb-0 text-white">1250445265</h2>
                  </div>
                </div>

                <div class="accordion shadow-sm w-100" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed p-3 p-lg-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree"
                      >
                        <h6 class="m-0">Transfer dari Bank BRI menggunakan Mobile Banking BRI</h6>
                      </button>
                    </h2>
                    <div
                      id="panelsStayOpen-collapseThree"
                      class="accordion-collapse collapse"
                    >
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
                      <button
                        class="accordion-button collapsed p-3 p-lg-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFour"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFour"
                      >
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
                                <p class="mb-1" >Buka Aplikasi Mobile Banking Anda</p>
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

        <!-- BNI -->
        <div class="accordian-donasi accordion-item rounded">
          <h2 class="accordion-header ">
            <button
              class="accordion-button collapsed rounded p-3 p-lg-4"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-collapseFour"
              aria-expanded="false"
              aria-controls="flush-collapseFour"
            >
              <h6 class="m-0">BNI</h6>
              <div class="accordion-logo ms-3 rounded">
                <img src="../img/bni.png" alt="" style="height: 1rem">
              </div>
            </button>
          </h2>
          <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body p-3 p-lg-4">
              <div class="accordion-body d-flex flex-column justify-content-center align-items-center gap-4 p-0">

                <div class="rekening-box p-3 shadow-sm rounded" style="width: 16rem">
                  <div class="d-flex justify-content-between flex-column align-items-center">
                    <p class="mb-2 text-white">No. Rekening (BNI)</p>
                    <h2 class="mb-0 text-white">1250445265</h2>
                  </div>
                </div>

                <div class="accordion shadow-sm w-100" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button
                        class="accordion-button collapsed p-3 p-lg-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFive"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFive"
                      >
                        <h6 class="m-0">Transfer dari Bank BNI menggunakan Mobile Banking BNI</h6>
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                      <div class="accordion-body">
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
                                <p class="mb-1">Pilih Bank Tujuan (BNI)</p>
                                <p class="mb-0">Pilih Bank BNI sebagai bank tujuan. Masukkan nomor rekening tujuan, yaitu 1250445265.</p>
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
                      <button
                        class="accordion-button collapsed p-3 p-lg-4"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseSix"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseSix"
                      >
                        <h6 class="m-0">Transfer dari Bank Lain ke Bank BNI menggunakan Mobile Banking</h6>
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                      <div class="accordion-body p-3 p-lg-4">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td scope="row">1.</td>
                              <td>
                                <p class="mb-1">Buka Aplikasi Mobile Banking Anda</p>
                                <p class="mb-0">Unduh dan buka aplikasi mobile banking dari bank tempat Anda memiliki
                                  rekening.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">2.</td>
                              <td>
                                <p class="mb-1>Login ke Akun Anda</p>
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
                                <p class="mb-1">Pilih Bank Tujuan (BNI)</p>
                                <p class="mb-0">Pilih Bank BNI sebagai bank tujuan. Masukkan nomor rekening tujuan, yaitu 1250445265.</p>
                              </td>
                            </tr>
                            <tr>
                              <td scope="row">5.</td>
                              <td>
                                <p  class="mb-1">Masukkan Jumlah Transfer</p>
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
@endsection
