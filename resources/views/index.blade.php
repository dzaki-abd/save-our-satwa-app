@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron">
    <div class="container jumbotron-container">
      <div class="d-flex flex-column justify-content-center align-items-start gap-3 h-100 jumbotron-content">
        <h1 class="text-white">SAVE OUR SATWA</h1>
        <p class="text-white">Save Our Satwa, aplikasi pelaporan tindakan ilegal terhadap satwa langka dan sumber informasi detail serta artikel menarik tentang satwa. Lindungi kehidupan satwa dengan memberikan suaramu melalui aplikasi ini. Laporkan Temuan Terhadap tindakan tlegal terhadap satwa dengan menekan tombol di bawah ini!</p>
        <a href="/laporkan" class="button-teal-500">Laporan Sekarang!</a>
      </div>
    </div>
  </div>
@endsection
