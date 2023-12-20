@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
<div class="jumbotron" style="background-image: url('{{ asset('img/jumbotron.jpg') }}')">
    <div class="container jumbotron-container">
      <div class="d-flex flex-column justify-content-center align-items-start gap-3 h-100 jumbotron-content">
        <h1 class="text-white">SAVE OUR SATWA</h1>
        <p class="text-white">Save Our Satwa, aplikasi pelaporan tindakan ilegal terhadap satwa langka dan sumber informasi detail serta artikel menarik tentang satwa. Lindungi kehidupan satwa dengan memberikan suaramu melalui aplikasi ini. Laporkan temuan terhadap tindakan ilegal terhadap satwa dengan menekan tombol di bawah ini!</p>
        <a href="/laporkan" class="button-teal-500">Laporan Sekarang!</a>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="container">
    <div data-aos="zoom-in" data-aos-offset="150" class="layanan-container container mx-auto p-3 p-lg-4 row row-cols-1 row-cols-md-3 shadow rounded">

      <div data-aos="zoom-in" data-aos-offset="150" class="col mb-4 mb-lg-0">
        <div class="layanan-content p-2 d-flex flex-column align-items-center gap-2 gap-md-3">
          <div class="layanan-icon d-flex justify-content-center align-items-center rounded">
            <i class="fa-solid fa-paper-plane"></i>
          </div>
          <h5 class="m-0">Laporkan</h5>
          <p class="m-0">Laporkan temuan tindakan ilegal terhadap satwa</p>
        </div>
      </div>

      <div data-aos="zoom-in" data-aos-offset="150" class="col mb-4 mb-lg-0">
        <div class="layanan-content p-2 d-flex flex-column align-items-center gap-2 gap-md-3">
          <div class="layanan-icon d-flex justify-content-center align-items-center rounded">
            <i class="fa-solid fa-dove"></i>
          </div>
          <h5 class="m-0">Informasi Satwa</h5>
          <p class="m-0">Jelajahi informasi tentang satwa yang dilindungi</p>
        </div>
      </div>

      <div data-aos="zoom-in" data-aos-offset="150"  class="col">
        <div class="layanan-content p-2 d-flex flex-column align-items-center gap-2 gap-md-3">
          <div class="layanan-icon d-flex justify-content-center align-items-center rounded">
            <i class="fa-solid fa-newspaper"></i>
          </div>
          <h5 class="m-0">Artikel</h5>
          <p class="m-0">Telusuri lebih lanjut artikel dan berita terkait satwa</p>
        </div>
      </div>

    </div>

    <div data-aos="zoom-in" data-aos-offset="150">
      <h3 class="text-center h3-home">SATWA <span>DILINDUNGI</span></h3>
      <p class="text-center p-top">Dapatkan Pengetahuan Mendalam tentang Satwa dengan Informasi Detail yang Menarik</p>
    </div>

    @if ($satwaList->count() === 0)
      <p class="text-center mb-0">Belum ada data yang tersedia</p>
    @else 
      <div class="swiper-satwa" style="width: 100%;">
        <div class="swiper-wrapper">
          @foreach ($satwaList as $satwa)
            <div data-aos="zoom-in" data-aos-offset="150" class="swiper-slide">
              <a href="/detail-satwa/{{ $satwa->id }}" class="card satwa-box border-0">
                <div class="satwa-overlay">
                  <img src="{{ asset('storage/' . $satwa->gambar) }}" alt="" />
                </div>
                <div class="satwa-content">
                  <h6>{{ $satwa->nama_lokal }}</h6>
                  <p class="m-0">{{ $satwa->deskripsi }}</p>
                </div>
              </a>
            </div>
          @endforeach
          <a data-aos="zoom-in" data-aos-offset="150" href="/satwa" class="swiper-slide selengkapnya-container d-flex flex-column justify-content-center align-items-center p-2 rounded mb-0">
            Lihat Selengkapnya
          </a>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    @endif
    

    <div data-aos="zoom-in" data-aos-offset="150">
      <h3 class="text-center h3-top">ARTIKEL <span>& BERITA</span></h3>
      <p class="text-center p-top">Baca Informasi Menarik dan Pengetahuan Terbaru tentang Satwa</p>
    </div>
   
    @if ($artikelList->count() === 0)
      <p class="text-center mb-0">Belum ada data yang tersedia</p>
    @else 
      <div class="swiper-artikel" style="width: 100%;">
        <div class="swiper-wrapper">
          @foreach ($artikelList as $artikel)
          <div data-aos="zoom-in" data-aos-offset="150" class="swiper-slide">
            <div class="card">
              <div class="row g-0">
                <div class="col-md-4 artikel-poster">
                  <img class="rounded" src="{{ asset('storage/' . $artikel->gambar) }}" alt="" />
                </div>
                <div class="col-md-8 artikel-content">
                  <div class="card-body">
                    <h5 class="card-title mb-0">{{ $artikel->judul }}</h5>
                    <p class="card-text mb-2 mb-md-3"><small class="text-body-secondary">Last updated {{ \Carbon\Carbon::parse($artikel->updated_at)->format('d F Y') }}</small></p>
                    <p class="card-text mb-2 mb-md-3 description">{{ $artikel->konten }}</p>
                    <a href="/detail-artikel/{{ $artikel->id }}" class="button-teal-500">Baca</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <a data-aos="zoom-in" data-aos-offset="150" href="/artikel" class="swiper-slide selengkapnya-container selengkapnya-artikel d-flex flex-column justify-content-center align-items-center p-2 rounded mb-0">
            Lihat Selengkapnya
          </a>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    @endif

    <div class="tentangkami-container rounded" style="background-image: url('{{ asset('img/donasi.jpg') }}')">
      <div class="tentangkami-content px-3 px-md-4 rounded">
        <div data-aos="zoom-in" data-aos-offset="150" class="tentangkami-title">
          <h3 class="text-white h3-top">TENTANG KAMI</h3>
          <p class="text-white p-top">Misi dan Dedikasi dalam Melindungi Satwa</p>
        </div>
        <div data-aos="zoom-in" data-aos-offset="150" class="tentangakami-body">
          <p class="text-white">Save Our Satwa adalah komunitas peduli satwa yang berkomitmen untuk melindungi dan melestarikan keanekaragaman hayati. Kami hadir untuk memberikan informasi, mengedukasi, dan bertindak nyata dalam menjaga kehidupan satwa. Bergabunglah dengan kami dan menjadi bagian dari perubahan positif untuk masa depan satwa dan alam kita.</p>
          <p class="text-white">Hubungi kami,</p>
          <div class="tentangkami-contact">
            <a href="mailto:saveoursatwa@gmail.com?subject=Halo Save Our Satwa!" target="blank_" rel="noopener" class="button-teal-500" style="width: fit-content">
              <i class="fa-solid fa-envelope pe-2"></i>
              Email
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="jumlahlaporan-container">
    <div class="container">
      <div data-aos="zoom-in" data-aos-offset="150" class="jumlahlaporan-title">
        <h3 class="text-center h3-top">JUMLAH <span>LAPORAN</span></h3>
        <p class="text-center p-top"> Informasi Terkait Jumlah Laporan Tindakan Ilegal Terhadap Satwa</p>
      </div>
      <div class="jumlahlaporan-content-row row row-cols-1 row-cols-lg-3">
        <div data-aos="zoom-in" data-aos-offset="150" class="col mb-4 mb-lg-0">
          <div class="jumlahlaporan-content d-flex justify-content-between align-items-center rounded p-3">
            <div class="d-flex gap-2 align-items-center">
              <div class="jumlahlaporan-icon d-flex justify-content-center align-items-center rounded">
                <i class="fa-solid fa-file-circle-exclamation"></i>
              </div>
              <div>
                <h5 class="mb-0 text-white">Laporan Ditinjau</h5>
                <p class="mb-0 text-white"><small>hingga {{ getFullDateID() }}</small></p>
              </div>
            </div>
            <h1 class="mb-0 text-white">{{ $ditinjauCount }}</h1>
          </div>
        </div>

        <div data-aos="zoom-in" data-aos-offset="150" class="col mb-4 mb-lg-0">
          <div class="jumlahlaporan-content d-flex justify-content-between align-items-center rounded p-3">
            <div class="d-flex gap-2 align-items-center">
              <div class="jumlahlaporan-icon d-flex justify-content-center align-items-center rounded">
                <i class="fa-solid fa-file-circle-check"></i>
              </div>
              <div>
                <h5 class="mb-0 text-white">Laporan Disetujui</h5>
                <p class="mb-0 text-white"><small>hingga {{ getFullDateID() }}</small></p>
              </div>
            </div>
            <h1 class="mb-0 text-white">{{ $disetujuiCount }}</h1>
          </div>
        </div>

        <div data-aos="zoom-in" data-aos-offset="150" class="col">
          <div class="jumlahlaporan-content d-flex justify-content-between align-items-center rounded p-3">
            <div class="d-flex gap-2 align-items-center">
              <div class="jumlahlaporan-icon d-flex justify-content-center align-items-center rounded">
                <i class="fa-solid fa-file-circle-xmark"></i>
              </div>
              <div>
                <h5 class="mb-0 text-white">Laporan Ditolak</h5>
                <p class="mb-0 text-white"><small>hingga {{ getFullDateID() }}</small></p>
              </div>
            </div>
            <h1 class="mb-0 text-white">{{ $ditolakCount }}</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="donasi-container" style="background-image: url('{{ asset('img/jumbotron-2.jpg') }}')">
    <div class="container">
      <div data-aos="zoom-in" data-aos-offset="150" class="donasi-home-content rounded p-3 d-flex flex-column align-items-center">
        <h3 class="text-white text-center">DONASI</h3>
        <p class="text-center text-lg-start p-top text-white">Berkontribusi untuk Perlindungan Satwa</p>

        <p class="text-white text-center">Sumbangkan bantuan Anda untuk mendukung misi Save Our Satwa dalam melindungi dan melestarikan satwa-satwa yang membutuhkan. Bergabunglah dalam upaya kolektif kami untuk menciptakan perubahan positif bagi satwa dilindungi. Dengan memberikan sumbangan, Anda turut berperan aktif dalam menjaga keindahan dan keseimbangan alam. Terima kasih atas kebaikan hati dan kontribusi Anda.</p>
        <a href="/donasi" class="button-teal-500">Donasi Sekarang!</a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="faq-container d-flex flex-column align-items-center flex-lg-row justify-content-lg-between align-items-lg-center gap-5">
      <div class="faq-content w-100">
        
        <div data-aos="zoom-in" data-aos-offset="150">
          <h3 class="text-center text-lg-start h3-home">SERING <span>DITANYAKAN</span></h3>
        <p class="text-center text-lg-start p-top">Temukan Jawaban untuk Pertanyaan-Pertanyaan yang Sering Diajukan</p>
        </div>

        <div data-aos="zoom-in" data-aos-offset="150" class="accordion accordion-flush shadow w-100" id="accordionFlushExample">

          <div class="accordion-item rounded">
            <h2 class="accordion-header rounded">
              <button class="accordion-button rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <h6 class="m-0">Apa itu SaveOurSatwa?</h6>
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body p-3 p-lg-4">
                SaveOurSatwa adalah sebuah aplikasi yang bertujuan untuk pelaporkan tindakan ilegal terhadap satwa dan menggalang dukungan untuk pelestarian satwa. Aplikasi ini memberikan informasi tentang satwa, kampanye perlindungan, dan cara berkontribusi.
              </div>
            </div>
          </div>

          <div class="accordian-donasi accordion-item rounded">
            <h2 class="accordion-header rounded">
              <button class="accordion-button collapsed rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                <h6 class="m-0">Bagaimana cara menggunakan SaveOurSatwa?</h6>
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body p-3 p-lg-4">
                Cari aplikasi SaveOurSatwa dari website, daftar, dan jelajahi kontennya. Anda dapat menemukan informasi tentang satwa, berpartisipasi dalam pelaporan satwa dilindungi, dan melihat artikel serta berita satwa.
              </div>
            </div>
          </div>

          <div class="accordian-donasi accordion-item rounded">
            <h2 class="accordion-header rounded">
              <button class="accordion-button collapsed rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                <h6 class="m-0">Bagaimana saya bisa berkontribusi untuk melestarikan satwa?</h6>
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body p-3 p-lg-4">
                Ada beberapa cara untuk berkontribusi. Anda dapat menyumbangkan dana, berpartisipasi dalam kampanye pelaporan satwa dilindungi, atau bahkan membagikan informasi melalui media sosial untuk meningkatkan kesadaran.
              </div>
            </div>
          </div>

          <div class="accordian-donasi accordion-item rounded">
            <h2 class="accordion-header rounded">
              <button class="accordion-button collapsed rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                <h6 class="m-0">Apakah aplikasi SaveOurSatwa gratis?</h6>
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body p-3 p-lg-4">
                Ya, SaveOurSatwa dapat dijangkau secara gratis dengan website. Namun, terdapat opsi untuk menyumbangkan dana sebagai bentuk dukungan untuk proyek pelestarian dan kampanye penyelamatan satwa.
              </div>
            </div>
          </div>

          <div class="accordian-donasi accordion-item rounded">
            <h2 class="accordion-header rounded">
              <button class="accordion-button collapsed rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                <h6 class="m-0">Bagaimana saya bisa melaporkan kasus kejahatan terhadap satwa dilindungi?</h6>
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body p-3 p-lg-4">
                Aplikasi ini menyediakan fitur pelaporan di mana pengguna dapat melaporkan kasus kejahatan terhadap satwa liar. Anda dapat mengunggah informasi, deskripsi, atau foto terkait untuk membantu penyelidikan lebih lanjut.
              </div>
            </div>
          </div>

          <div class="accordian-donasi accordion-item rounded">
            <h2 class="accordion-header rounded">
              <button class="accordion-button collapsed rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                <h6 class="m-0">Apakah informasi pribadi saya aman di SaveOurSatwa?</h6>
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body p-3 p-lg-4">
                Keamanan informasi pengguna sangat penting. Aplikasi ini memiliki kebijakan privasi yang ketat untuk melindungi data pengguna dan memastikan bahwa informasi pribadi tetap aman.
              </div>
            </div>
          </div>

          <div class="accordian-donasi accordion-item rounded">
            <h2 class="accordion-header rounded">
              <button class="accordion-button collapsed rounded p-3 p-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                <h6 class="m-0">Bagaimana cara menghubungi tim dukungan SaveOurSatwa?</h6>
              </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body p-3 p-lg-4">
                Anda dapat menghubungi tim dukungan melalui fitur "Hubungi Kami" di dalam aplikasi atau melalui alamat email yang tercantum di situs web resmi SaveOurSatwa.
              </div>
            </div>
          </div>

        </div>

      </div>
      <div data-aos="zoom-in" data-aos-offset="150" class="faq-image d-none d-lg-block">
        <img src="{{ asset('img/faq.png') }}" alt="">
      </div>
    </div>
  </div>

  <div class="faqlanjut-container">
    <div class="container">
      <div data-aos="zoom-in" data-aos-offset="150" class="faqlanjut-content d-flex flex-column justify-content-center flex-md-row justify-content-md-between align-items-md-center rounded px-4 py-5 gap-4">
        <div>
          <h3 class="text-white text-center text-md-start">PUNYA PERTANYAAN LEBIH LANJUT</h3>
          <p class="text-white text-center text-md-start mb-0">Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan tambahan atau butuh informasi lebih lanjut</p>
        </div>
        <a href="mailto:saveoursatwa@gmail.com?subject=Halo Save Our Satwa!" target="blank_" rel="noopener" class="button-teal-500 button-teal-500-custom">Hubungi Kami</a>
      </div>
    </div>
  </div>
 
@endsection

@push('scripts')
  <script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

    const swiperSatwa = new Swiper('.swiper-satwa', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      breakpoints: {
        1400: {
          slidesPerView: 7,
          spaceBetween: 10,
        },
        1200: {
          slidesPerView: 6,
          spaceBetween: 10,
        },
        992: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        576: {
          slidesPerView: 3.2,
          spaceBetween: 10,
        },
        320: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
      },
    });

    const swiperArtikel = new Swiper('.swiper-artikel', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      breakpoints: {
        1400: {
          slidesPerView: 2.5,
          spaceBetween: 10,
        },
        1200: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        576: {
          slidesPerView: 1.2,
          spaceBetween: 10,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
      },
    });
  </script>
@endpush
