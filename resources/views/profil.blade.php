@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-2 jumbotron-search-2">
    <div class="container jumbotron-container-2">
      <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-start align-items-md-center h-100 jumbotron-content-2 gap-3">
        <div>
          <h2 class="text-white">PROFIL PENGGUNA</h2>
          <nav aria-label="breadcrumb" data-bs-theme="dark">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profil</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="profil-container rounded p-4 d-flex align-items-center gap-4">
    <div class="profil-image p-2 rounded">
      <a href="../img/default-profil.png" data-fancybox>
        <img src="../img/default-profil.png" class="rounded"/>
      </a>
    </div>
    <div class="profil-content">
      <h3>KEVIN IANSYAH</h3>
      <p>keviniansyah11@gmail.com</p>
      <div class="d-flex gap-2">
        <a href="/ubah-profil" class="button-teal-500 button-teal-500-custom">Ubah Profil</a>
        <button class="button-teal-500 button-teal-500-custom" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</button>
        <form
          id="logout-form"
          action="{{ route('logout') }}"
          method="POST"
          class="d-none"
        >
          @csrf
        </form>
      </div>
    </div>
  </div>

  <h3 class="text-center h3-top">RIWAYAT <span>LAPORAN</span></h3>
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
            <th class="border-0 text-gray-700">Laporan</th>
            <th class="border-0 text-gray-700">Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-gray-700">Laporan</th>
            <th class="text-gray-700">Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          @for ($i = 0; $i < 2; $i++)
            <tr class="align-middle">
              <td class="text-gray-600">
                <h6 class="mb-2">PERBURUAN HEWAN KAKAKTUA RAJA</h6>
                <p class="mb-2 description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore modi in a provident delectus repudiandae voluptate reprehenderit corrupti veritatis, iusto vero doloremque dolores aperiam animi dolor cum sit dolore voluptas.</p>
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