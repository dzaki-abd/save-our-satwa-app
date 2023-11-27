@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-3" style="background-image: url('../img/jumbotron.jpg');">
    <div class="jumbotron-container-3">
      <div class="container d-flex flex-column flex-lg-row gap-5 detail-satwa-container h-100">
        <div class="detail-poster d-flex flex-column gap-3">
          <nav aria-label="breadcrumb" data-bs-theme="dark">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Satwa</li>
            </ol>
          </nav>
          <div class="poster-box">
            <a href="../img/poster.jpg" data-fancybox>
              <img src="../img/poster.jpg" class="rounded"/>
            </a>
            <div class="like-button button-teal-500">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
        </div>
        <div class="detail-content d-flex flex-column justify-content-center gap-3">
          <h1>Kakaktua Raja</h1>
          <table class="table m-0" width="100%" cellspacing="0">
            <tbody>
              <tr>
                <th class="ps-0">Nama Umum</th>
                <td class="p-2 ps-0 ps-md-5">Kakatua Raja</td>
              </tr>
              <tr>
                <th class="ps-0">Nama Ilmiah</th>
                <td class="p-2 ps-0 ps-md-5">Probosciger aterrimus</td>
              </tr>
              <tr>
                <th class="ps-0">Habitat</th>
                <td class="p-2 ps-0 ps-md-5">Papua, Pulau Salawati, dan Pulau Yapen adsada adad zada adad ada adad</td>
              </tr>
              <tr>
                <th class="ps-0">Status</th>
                <td class="p-2 ps-0 ps-md-5">Rentan</td>
              </tr>
              <tr>
                <th class="ps-0">Populasi</th>
                <td class="p-2 ps-0 ps-md-5">-</td>
              </tr>
              <tr>
                <th class="ps-0">Ancaman</th>
              </tr>
              <tr>
                <td colspan="2" class="p-2 ps-0">Ancaman terhadap kakatua raja termasuk hilangnya habitat, perburuan untuk perdagangan satwa liar, dan perdagangan ilegal.</td>
              </tr>
              <tr>
                <th class="ps-0">Deskripsi</th>
              </tr>
              <tr>
                <td colspan="2" class="p-2 ps-0">Kakatua Raja memiliki warna bulu yang mencolok, dengan kombinasi merah, kuning, dan hitam. Mereka memiliki paruh yang kuat dan seringkali hidup dalam kelompok besar.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <h3 class="text-center h3-top">RIWAYAT <span>SATWA</span></h3>
  <p class="text-center p-top">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>

  <div class="shadow p-3 rounded">
    <div class="table-responsive pt-2 pb-2">
      <table
        class="table table-striped table-riwayat m-0"
        id="detailSatwa"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th class="border-0 text-gray-700">Nama</th>
            <th class="border-0 text-gray-700">Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-gray-700">Nama</th>
            <th class="text-gray-700">Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          @for ($i = 0; $i < 2; $i++)
            <tr class="align-middle">
              <td class="text-gray-600">
                <h6 class="mb-2">PERBURUAN HEWAN KAKAKTUA RAJA</h6>
                <p class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore modi in a provident delectus repudiandae voluptate reprehenderit corrupti veritatis, iusto vero doloremque dolores aperiam animi dolor cum sit dolore voluptas.</p>
                <div class="d-flex gap-2 align-items-center mb-2 icon-riwayat">
                  <i class="fa-solid fa-calendar"></i>
                  <p class="m-0">20 November 2023</p>
                </div>
                <div class="d-flex gap-2 align-items-center icon-riwayat">
                  <i class="fa-solid fa-clock-rotate-left"></i>
                  <p class="m-0">27 November 2023</p>
                </div>
              </td>
              <td class="">
                <div class="d-flex gap-1">
                  <button type="submit" class="button-teal-500"><i class="fa-solid fa-eye"></i></button>
                </div>
              </td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>
@endsection