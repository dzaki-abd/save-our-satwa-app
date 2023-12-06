@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
    <div class="jumbotron-2 jumbotron-search-2">
        <div class="container jumbotron-container-2">
            <div
                class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-start align-items-md-center h-100 jumbotron-content-2 gap-3">
                <div>
                    <h2 class="text-white">FAVORIT</h2>
                    <nav aria-label="breadcrumb" data-bs-theme="dark">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Favorit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <h3 class="text-center h3-top">FAVORIT <span>SATWA</span> & ARTIKEL</h3>
    <p class="text-center p-top">Lihat List Satwa dan Artikel yang Anda Favoritkan.</p>

    <ul class="nav nav-tabs border-bottom-success mt-2 bg-white shadow"
        style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2">
        <li class="nav-item">
            <button id="buttonSatwa" class="button-teal-500"
                style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
                data-id="Satwa">
                Satwa
            </button>
        </li>
        <li class="nav-item">
            <button id="buttonArtikel" class="button-white"
                style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem"
                data-id="Artikel">
                Artikel
            </button>
        </li>
    </ul>

    <div class="not-found-container-satwa"></div>
    <div class="not-found-container-artikel d-none"></div>

    <div class="favorite-satwa-container row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3 g-lg-4 mt-2">
    </div>

    <div class="favorite-artikel-container row row-cols-1 row-cols-lg-2 g-3 g-md-4 d-none mt-2">
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/utils/favorite-initiator.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script type="module">
      import SatwaIdb from '{{ asset('js/data/satwa-idb.js') }}';
      import ArtikelIdb from '{{ asset('js/data/artikel-idb.js') }}';

      const satwas = await SatwaIdb.getAllSatwas();
      const satwaContainer = document.querySelector('.favorite-satwa-container');
      const notFoundContainerSatwa = document.querySelector('.not-found-container-satwa');
      const imgBaseUrlSatwa = '{{ asset('storage/') }}';

      if (satwas.length > 0) {
        satwas.forEach((satwa) => {
          satwaContainer.innerHTML += `
            <div class="col">
              <a href="/detail-satwa/${ satwa.id }" class="card satwa-box border-0">
                <div class="satwa-overlay">
                  <img src="${ imgBaseUrlSatwa }/${ satwa.image }" alt="" />
                </div>
                <div class="satwa-content">
                  <h6>${ satwa.name }</h6>
                  <p class="m-0">${ satwa.description }</p>
                </div>
              </a>
            </div>
          `;
        });
      } else {
        notFoundContainerSatwa.innerHTML = '<p class="text-center mb-0 mt-4">Belum ada data yang ditambahkan</p>';
      }


      const artikels = await ArtikelIdb.getAllArtikels();
      const artikelContainer = document.querySelector('.favorite-artikel-container');
      const notFoundContainerArtikel = document.querySelector('.not-found-container-artikel');
      const imgBaseUrlArtikel = '{{ asset('storage/') }}';

      if (artikels.length > 0) {
        artikels.forEach((artikel) => {
          artikelContainer.innerHTML += `
          <div class="col">
            <div class="card border-0 shadow">
              <div class="row g-0">
                <div class="col-md-4 artikel-poster">
                  <img class="rounded" src="${ imgBaseUrlArtikel }/${ artikel.image }" alt="" />
                </div>
                <div class="col-md-8 artikel-content">
                  <div class="card-body">
                    <h5 class="card-title mb-0">${ artikel.title }</h5>
                    <p class="card-text mb-2 mb-md-3"><small class="text-body-secondary">Last updated ${ moment(artikel.updated_at).format('DD MMMM YYYY') }</small></p>
                    <p class="card-text mb-2 mb-md-3 description">${ artikel.description }</p>
                    <a href="/detail-artikel/${ artikel.id }" class="button-teal-500">Baca</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          `;
        });
      } else {
        notFoundContainerArtikel.innerHTML = '<p class="text-center mb-0 mt-4">Belum ada data yang ditambahkan</p>';
      }
    </script>
@endpush
