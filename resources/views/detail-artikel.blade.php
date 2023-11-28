@extends('layouts.app', ['showFooter' => true])

@section('jumbotron')
  <div class="jumbotron-4 jumbotron-search-4" style="background-image: url('../img/donasi.jpg')">
    <div class="jumbotron-container-4">
      <div class="container h-100">
        <div class="d-flex align-items-center justify-content-center h-100 jumbotron-content-4">
          <div class="d-flex flex-column align-items-start">
            <h2 class="text-white mb-1">Mengenal Satwa Kakaktua Raja</h2>
            <nav aria-label="breadcrumb" data-bs-theme="dark">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Artikel</li>
              </ol>
            </nav>
            <div class="like-button button-teal-500 mt-3">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="container shadow rounded detail-artikel-container p-2 p-md-3">
    <a href="../img/donasi.jpg" data-fancybox>
      <img src="../img/donasi.jpg" class="rounded" alt="">
    </a>

    <div class="row g-0 mt-4">
      <div class="col-md-9 detail-artikel-content">
        <h3> heading 3</h3>
        <p>Harimau Sumatra (Panthera tigris sumatrae) merupakan salah satu spesies harimau yang mendiami pulau Sumatra, Indonesia. Keunikan dan keindahan harimau ini membuatnya menjadi objek kajian ilmiah, kebanggaan nasional, dan kepedulian global terkait pelestarian satwa liar. Namun, sayangnya, populasinya kini terancam punah akibat berbagai ancaman&nbsp;dari&nbsp;manusia.</p>
        <p>Harimau Sumatra (Panthera tigris sumatrae) merupakan salah satu spesies harimau yang mendiami pulau Sumatra, Indonesia. Keunikan dan keindahan harimau ini membuatnya menjadi objek kajian ilmiah, kebanggaan nasional, dan kepedulian global terkait pelestarian satwa liar. Namun, sayangnya, populasinya kini terancam punah akibat berbagai ancaman&nbsp;dari&nbsp;manusia.</p>
        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>heading 3</h3>
        <p>paragraf</p>
        <p><strong>Bold</strong></p>
        <p><i>italic</i></p>
        <ul>
          <li>
            Soto&nbsp;
          </li>
          <li>
            Pecel
          </li>
          <li>
            Rawon
          </li>
        </ul>
        <ol>
          <li>
            Soto&nbsp;
          </li>
          <li>
            Pecel
          </li>
          <li>
            Rawon
          </li>
        </ol>
        <blockquote>
          <p>ini Blockquote</p>
        </blockquote>
        <p><a href="http://127.0.0.1:8000/laporkan">Ini link</a></p>
        <h3>heading 3</h3>
        <p>Harimau Sumatra (Panthera tigris sumatrae) merupakan salah satu spesies harimau yang mendiami pulau Sumatra, Indonesia. Keunikan dan keindahan harimau ini membuatnya menjadi objek kajian ilmiah, kebanggaan nasional, dan kepedulian global terkait pelestarian satwa liar. Namun, sayangnya, populasinya kini terancam punah akibat berbagai ancaman&nbsp;dari&nbsp;manusia.</p>
        <p>Harimau Sumatra (Panthera tigris sumatrae) merupakan salah satu spesies harimau yang mendiami pulau Sumatra, Indonesia. Keunikan dan keindahan harimau ini membuatnya menjadi objek kajian ilmiah, kebanggaan nasional, dan kepedulian global terkait pelestarian satwa liar. Namun, sayangnya, populasinya kini terancam punah akibat berbagai ancaman&nbsp;dari&nbsp;manusia.</p>

        <h3>heading 3</h3>
        <p>Harimau Sumatra (Panthera tigris sumatrae) merupakan salah satu spesies harimau yang mendiami pulau Sumatra, Indonesia. Keunikan dan keindahan harimau ini membuatnya menjadi objek kajian ilmiah, kebanggaan nasional, dan kepedulian global terkait pelestarian satwa liar. Namun, sayangnya, populasinya kini terancam punah akibat berbagai ancaman&nbsp;dari&nbsp;manusia.</p>
        <p>Harimau Sumatra (Panthera tigris sumatrae) merupakan salah satu spesies harimau yang mendiami pulau Sumatra, Indonesia. Keunikan dan keindahan harimau ini membuatnya menjadi objek kajian ilmiah, kebanggaan nasional, dan kepedulian global terkait pelestarian satwa liar. Namun, sayangnya, populasinya kini terancam punah akibat berbagai ancaman&nbsp;dari&nbsp;manusia.</p>
        <figure class="table">
          <table>
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Nama
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  1
                </td>
                <td>
                  Kevin Iansyah
                </td>
                <td>
                Kevin Iansyah
                </td>
                <td>
                  Kevin Iansyah
                </td>
                <td>
                  Kevin Iansyah
                </td>
                <td>
                  Kevin Iansyah
                </td>
              </tr>
            </tbody>
          </table>
        </figure>
      </div>
      <div class="col-md-3 detail-artikel-sidebar">
        <h6>Jenis</h6>
        <p>Artikel</p>
        <h6>Penulis</h6>
        <p>Admin</p>
        <h6>Diterbitkan</h6>
        <p>20 November 2023</p>
        <h6>Kata Kunci</h6>
        <div class="d-flex flex-wrap gap-2">
          <div class="button-teal-500">Satwa</div>
          <div class="button-teal-500">Burung</div>
          <div class="button-teal-500">Kakaktua</div>
          <div class="button-teal-500">Kakaktua Raja</div>
          <div class="button-teal-500">Dilindungi</div>
          <div class="button-teal-500">Terancam</div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script>
      const table = document.querySelector("table");
      if (table) {
        table.classList.add("table", "table-striped");
      }

      const figure = document.querySelector("figure");
      if (figure) {
        figure.classList.add("table-responsive");
      }
    </script>
@endpush
