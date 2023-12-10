<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  />
  <title>Email</title>
</head>

<body>

  <!-- Body Email -->
  <div class="container">
    <div
      style="@media screen and (max-width: 576px) { max-width: 18rem; }; @media screen and (max-width: 992px) { max-width: 22rem; }; max-width: 35rem; margin: 0 auto; font-family:Arial, Helvetica, sans-serif;"
    >
      <div
        class="container-content"
        style="width: 100%;"
      >
        <div
          class="jumbotron"
          style="padding: 1rem 4rem; border-radius: 0.35rem; background-image: url('https://i.ibb.co/16zcpky/jumbotron-2.jpg'); background-position: center; background-size: cover;"
        >
          <div
            style="backdrop-filter: blur(20px); border-radius: 0.35rem; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 1rem 2rem;"
          >
            <img
              src="https://i.ibb.co/fq1Q67P/logosos.png"
              alt=""
              style="height: 2.5rem;"
            >
            <h4 style="color: white; margin: 0; padding-top: 0.5rem;">
              SAVE OUR SATWA
            </h4>
            <!-- https://i.postimg.cc/sfkB6dy0/logosos.png -->
            <!-- https://i.postimg.cc/rsKphjYT/jumbotron-2.jpg -->
          </div>
        </div>
        <div class="content">
          <p style="font-size: 0.95rem; line-height: 1.5rem;">
            Halo, <strong>{{ $pelaporan->user->name }}</strong>
          </p>
          <p style="font-size: 0.95rem; line-height: 1.5rem;">
            Kami ingin memberikan informasi terkini mengenai status laporan kontribusi Anda. Laporan yang Anda kirimkan
            beberapa waktu lalu telah menjadi landasan utama bagi tim kami dalam merancang strategi pelestarian. Kami
            dengan senang hati mengumumkan bahwa rekomendasi dan temuan yang Anda sampaikan telah menjadi dasar
            keputusan kami.
          </p>
          <p style="font-size: 0.95rem; line-height: 1.5rem;">
            Sejauh ini, langkah-langkah yang diimplementasikan telah memberikan dampak positif yang signifikan, dengan
            hasil yang menggembirakan dalam perlindungan habitat dan pemulihan populasi satwa tertentu. Berikut detail
            dari perkembangan laporan kamu.
          </p>

          <p style="font-size: 0.95rem; line-height: 1.5rem; margin-bottom: 5px">
            <strong>Registration Number: </strong> {{ $pelaporan->uniqid }}
          </p>
          <p style="font-size: 0.95rem; line-height: 1.5rem; margin-bottom: 5px">
            <strong>Jenis Pelanggaran: </strong>
            {{ $pelaporan->pelanggaran_id ? $pelaporan->pelanggaran->nama_pelanggaran : $pelaporan->pelanggaran_lain }}
          </p>
          <p style="font-size: 0.95rem; line-height: 1.5rem; margin-bottom: 5px">
            <strong>Jenis Pelanggaran: </strong>
            {{ $pelaporan->satwa_id ? $pelaporan->satwa->nama_lokal : $pelaporan->satwa_lain }}
          </p>

          <p style="font-size: 0.95rem; line-height: 1.5rem; margin-bottom: 5px">
            <strong>Status: </strong>
          </p>

          <div style="display: inline">
            @if ($pelaporan->status == 'Ditinjau')
              <div
                style="background-color: #f6c23e; border-radius: 0.35rem; padding: 0.5rem; color: white; width: fit-content;"
              >
                Ditinjau
              </div>
            @elseif ($pelaporan->status == 'Disetujui')
              <div
                style="background-color: #20c997; border-radius: 0.35rem; padding: 0.5rem; color: white; width: fit-content;"
              >
                Disetujui
              </div>
            @elseif ($pelaporan->status == 'Ditolak')
              <div
                style="background-color: #e74a3b; border-radius: 0.35rem; padding: 0.5rem; color: white; width: fit-content;"
              >
                Ditolak
              </div>
            @endif
          </div>


          <p style="font-size: 0.95rem; line-height: 1.5rem;">
            Kami sangat berterima kasih atas dedikasi dan kontribusi Anda dalam menjaga keanekaragaman hayati.
            Bersama-sama, kita dapat membuat perbedaan yang signifikan dan mewariskan dunia yang lebih baik untuk
            generasi mendatang.
          </p>

          <p style="font-size: 0.95rem; line-height: 1.5rem;">
            Kunjung link
            <a
              href="{{ route('home') }}"
              style="font-size: 0.95rem; line-height: 1.5rem; color: #20c997;"
            >
              ini!
            </a>
          </p>

          <p style="font-size: 0.95rem; line-height: 1.5rem;">
            Terima kasih atas perhatian dan dukungan Anda.
          </p>

          <hr>

          <h4 style="color: #20c997; margin: 0; padding: 0.5rem 0; text-align: center;">
            SAVE OUR SATWA TEAM
          </h4>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Body Email -->

</body>

</html>
