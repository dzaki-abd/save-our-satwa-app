<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/data-tables.css">
  </head>

  <body id="page-top">
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion"id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <hr class="sidebar-divider my-0" />

        <li class="nav-item">
          <a class="nav-link" href="/dashboard/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <hr class="sidebar-divider" />

        <div class="sidebar-heading">Halaman</div>

        <li class="nav-item">
          <a class="nav-link" href="/dashboard/admin">
            <i class="fa-solid fa-user fa-sm fa-fw"></i>
            <span>Admin</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/dashboard/laporan">
            <i class="fa-solid fa-clipboard-list fa-sm fa-fw"></i>
            <span>Laporan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/satwa">
            <i class="fa-solid fa-dove fa-sm fa-fw"></i>
            <span>Satwa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/artikel">
            <i class="fa-solid fa-newspaper fa-sm fa-fw"></i>
            <span>Artikel</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/donasi">
            <i class="fa-solid fa-hand-holding-dollar fa-sm fa-fw"></i>
            <span>Donasi</span>
            </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block" />

        <div class="sidebar-heading">Keluar</div>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal" style="cursor: pointer">
            <i class="fa-solid fa-right-from-bracket fa-sm fa-fw"></i>
            <span>Keluar</span>
          </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block" />

        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->

      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                  <button class="btn btn-success" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown" >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                      <div class="input-group-append">
                        <button class="btn btn-success" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
            </div>
            <div class="row">
              <!-- Card Laporan Diajukan -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Laporan Diajukan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          200
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa-solid fa-file-arrow-up  fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card Laporan Ditinjau -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Laporan Ditinjau
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          40
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa-solid fa-file-circle-exclamation fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card Laporan Disetujui -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Laporan Disetujui
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          50
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa-solid fa-file-circle-check fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card Laporan Ditolak -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                          Laporan Ditolak
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          60
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa-solid fa-file-circle-xmark fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Link Page -->
            <ul class="nav nav-tabs border-bottom-success mt-2 bg-white shadow" style="border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem; position: relative; z-index: 2">
              <li class="nav-item">
                <button id="buttonLaporanDiajukan" class="btn btn-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
                  Laporan Diajukan
                </button>
              </li>
              <li class="nav-item">
                <button id="buttonLaporanDitinjau" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
                  Laporan Ditinjau
                </button>
              </li>
              <li class="nav-item">
                <button id="buttonLaporanDisetujui" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
                  Laporan Disetujui
                </button>
              </li>
              <li class="nav-item">
                <button id="buttonLaporanDitolak" class="btn text-success" style="border-radius: 0; border-top-left-radius: 0.35rem; border-top-right-radius: 0.35rem">
                  Laporan Ditolak
                </button>
              </li>
            </ul>

            <!-- DataTales Laporan Diajukan -->
            <div id="boxLaporanDiajukan" class="card-2 shadow mb-4 bg-white" style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem">
              <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-success">
                  Data Laporan Diajukan
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="laporanDiajukan" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="border-0 text-gray-700">Nama Pelapor</th>
                        <th class="border-0 text-gray-700">Tanggal Kejadian</th>
                        <th class="border-0 text-gray-700">Jenis Pelanggaran</th>
                        <th class="border-0 text-gray-700">Jenis Satwa</th>
                        <th class="border-0 text-gray-700">Status</th>
                        <th class="border-0 text-gray-700">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="text-gray-700">Nama Pelapor</th>
                        <th class="text-gray-700">Tanggal Kejadian</th>
                        <th class="text-gray-700">Jenis Pelanggaran</th>
                        <th class="text-gray-700">Jenis Satwa</th>
                        <th class="text-gray-700">Status</th>
                        <th class="text-gray-700">Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @for ($i = 0; $i < 5; $i++)
                      <tr class="align-middle">
                        <td class="align-middle text-gray-600">Kevin Iansyah</td>
                        <td class="align-middle text-gray-600">20 Desember 2022</td>
                        <td class="align-middle text-gray-600">Perburuan Illegal</td>
                        <td class="align-middle text-gray-600">Orang Utan</td>
                        <td class="align-middle text-gray-600">
                          <button type="button" class="btn btn-primary">Diajukan</button>
                        </td>
                        <td class="d-flex align-middle">
                          <div class="d-flex">
                            <!-- Button Trigger-->
                            <button type="button" href="#" class="btn btn-primary d-flex justify-content-center align-items-center mr-1"  data-bs-toggle="modal" data-bs-target="#riwayatLaporan" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-clock-rotate-left" style="font-size: 0.8rem"></i>
                            </button>
                            <a href="/dashboard/laporan/detail-laporan/id" class="btn btn-warning d-flex justify-content-center align-items-center mr-1" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-eye" style="font-size: 0.8rem"></i>
                            </a>
                            <button type="button" href="#" class="btn btn-danger d-flex justify-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#deleteLaporan" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-trash" style="font-size: 0.8rem"></i>
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

            <!-- DataTales Laporan Ditinjau -->
            <div id="boxLaporanDitinjau" class="card-2 shadow mb-4 d-none bg-white" style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem">
              <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-success">
                  Data Laporan Ditinjau
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="laporanDitinjau" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="border-0 text-gray-700">Nama Pelapor</th>
                        <th class="border-0 text-gray-700">Tanggal Kejadian</th>
                        <th class="border-0 text-gray-700">Jenis Pelanggaran</th>
                        <th class="border-0 text-gray-700">Jenis Satwa</th>
                        <th class="border-0 text-gray-700">Status</th>
                        <th class="border-0 text-gray-700">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="text-gray-700">Nama Pelapor</th>
                        <th class="text-gray-700">Tanggal Kejadian</th>
                        <th class="text-gray-700">Jenis Pelanggaran</th>
                        <th class="text-gray-700">Jenis Satwa</th>
                        <th class="text-gray-700">Status</th>
                        <th class="text-gray-700">Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @for ($i = 0; $i < 5; $i++)
                      <tr class="align-middle">
                        <td class="align-middle text-gray-600">Kevin Iansyah</td>
                        <td class="align-middle text-gray-600">20 Desember 2022</td>
                        <td class="align-middle text-gray-600">Perburuan Illegal</td>
                        <td class="align-middle text-gray-600">Orang Utan</td>
                        <td class="align-middle text-gray-600">
                          <button type="button" class="btn btn-warning">Ditinjau</button>
                        </td>
                        <td class="d-flex align-middle">
                          <div class="d-flex">
                            <!-- Button Trigger-->
                            <button type="button" href="#" class="btn btn-primary d-flex justify-content-center align-items-center mr-1"  data-bs-toggle="modal" data-bs-target="#riwayatLaporan" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-clock-rotate-left" style="font-size: 0.8rem"></i>
                            </button>
                            <a href="/dashboard/laporan/detail-laporan/id" class="btn btn-warning d-flex justify-content-center align-items-center mr-1" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-eye" style="font-size: 0.8rem"></i>
                            </a>
                            <button type="button" href="#" class="btn btn-danger d-flex justify-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#deleteLaporan" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-trash" style="font-size: 0.8rem"></i>
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

            <!-- DataTales Laporan Disetujui -->
            <div id="boxLaporanDisetujui" class="card-2 shadow mb-4 d-none bg-white" style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem">
              <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-success">
                  Data Laporan Disetujui
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="laporanDisetujui" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="border-0 text-gray-700">Nama Pelapor</th>
                        <th class="border-0 text-gray-700">Tanggal Kejadian</th>
                        <th class="border-0 text-gray-700">Jenis Pelanggaran</th>
                        <th class="border-0 text-gray-700">Jenis Satwa</th>
                        <th class="border-0 text-gray-700">Status</th>
                        <th class="border-0 text-gray-700">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="text-gray-700">Nama Pelapor</th>
                        <th class="text-gray-700">Tanggal Kejadian</th>
                        <th class="text-gray-700">Jenis Pelanggaran</th>
                        <th class="text-gray-700">Jenis Satwa</th>
                        <th class="text-gray-700">Status</th>
                        <th class="text-gray-700">Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @for ($i = 0; $i < 5; $i++)
                      <tr class="align-middle">
                        <td class="align-middle text-gray-600">Kevin Iansyah</td>
                        <td class="align-middle text-gray-600">20 Desember 2022</td>
                        <td class="align-middle text-gray-600">Perburuan Illegal</td>
                        <td class="align-middle text-gray-600">Orang Utan</td>
                        <td class="align-middle text-gray-600">
                          <button type="button" class="btn btn-success">Disetujui</button>
                        </td>
                        <td class="d-flex align-middle">
                          <div class="d-flex">
                            <!-- Button Trigger-->
                            <button type="button" href="#" class="btn btn-primary d-flex justify-content-center align-items-center mr-1"  data-bs-toggle="modal" data-bs-target="#riwayatLaporan" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-clock-rotate-left" style="font-size: 0.8rem"></i>
                            </button>
                            <a href="/dashboard/laporan/detail-laporan/id" class="btn btn-warning d-flex justify-content-center align-items-center mr-1" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-eye" style="font-size: 0.8rem"></i>
                            </a>
                            <button type="button" href="#" class="btn btn-danger d-flex justify-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#deleteLaporan" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-trash" style="font-size: 0.8rem"></i>
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

            <!-- DataTales Laporan Ditolak -->
            <div id="boxLaporanDitolak" class="card-2 shadow mb-4 d-none bg-white" style="border-bottom-left-radius: 0.35rem; border-bottom-right-radius: 0.35rem">
              <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-success">
                  Data Laporan Ditolak
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="laporanDitolak" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="border-0 text-gray-700">Nama Pelapor</th>
                        <th class="border-0 text-gray-700">Tanggal Kejadian</th>
                        <th class="border-0 text-gray-700">Jenis Pelanggaran</th>
                        <th class="border-0 text-gray-700">Jenis Satwa</th>
                        <th class="border-0 text-gray-700">Status</th>
                        <th class="border-0 text-gray-700">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="text-gray-700">Nama Pelapor</th>
                        <th class="text-gray-700">Tanggal Kejadian</th>
                        <th class="text-gray-700">Jenis Pelanggaran</th>
                        <th class="text-gray-700">Jenis Satwa</th>
                        <th class="text-gray-700">Status</th>
                        <th class="text-gray-700">Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @for ($i = 0; $i < 5; $i++)
                      <tr class="align-middle">
                        <td class="align-middle text-gray-600">Kevin Iansyah</td>
                        <td class="align-middle text-gray-600">20 Desember 2022</td>
                        <td class="align-middle text-gray-600">Perburuan Illegal</td>
                        <td class="align-middle text-gray-600">Orang Utan</td>
                        <td class="align-middle text-gray-600">
                          <button type="button" class="btn btn-danger">Ditolak</button>
                        </td>
                        <td class="d-flex align-middle">
                          <div class="d-flex">
                            <!-- Button Trigger-->
                            <button type="button" href="#" class="btn btn-primary d-flex justify-content-center align-items-center mr-1"  data-bs-toggle="modal" data-bs-target="#riwayatLaporan" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-clock-rotate-left" style="font-size: 0.8rem"></i>
                            </button>
                            <a href="/dashboard/laporan/detail-laporan/id" class="btn btn-warning d-flex justify-content-center align-items-center mr-1" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-eye" style="font-size: 0.8rem"></i>
                            </a>
                            <button type="button" href="#" class="btn btn-danger d-flex justify-content-center align-items-center"  data-bs-toggle="modal" data-bs-target="#deleteLaporan" style="width: 30px; height: 30px">
                              <i class="fa-solid fa-trash" style="font-size: 0.8rem"></i>
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
          </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Save Our Satwa 2023</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Riwayat Laporan Modal-->
    <div class="modal fade" id="riwayatLaporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center">
            <h5 class="modal-title fs-5" id="exampleModalLabel">Riwayat Laporan dengan ID FHJA21312</h5>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
          </div>
          <div class="modal-body" style="margin: 1rem 0rem 1rem 1rem; padding-bottom: 0; padding-top: 0;">
            <section>
              <ul class="timeline-with-icons d-flex flex-column m-0" style="gap: 1.5rem">
                @for($i = 0; $i < 5; $i++)
                <li class="timeline-item">
                  <span class="timeline-icon bg-success">
                    <!-- 
                      Gunakan icon berdasarkan status menggunakan if
                      Diajukan :
                      <i class="fa-solid fa-file-arrow-up text-white fa-sm fa-fw"></i>
                      
                      Ditinjau
                      <i class="fa-solid fa-file-circle-exclamation text-white fa-sm fa-fw"></i>

                      Disetujui
                      <i class="fa-solid fa-file-circle-check text-white fa-sm fa-fw"></i>

                      Ditolak
                      <i class="fa-solid fa-file-circle-xmark text-white fa-sm fa-fw"></i>
                    -->
                    <i class="fa-solid fa-file-arrow-up text-white fa-sm fa-fw"></i>
                  </span>
            
                  <h6 class="fw-bolder text-success" style="font-weight: 600">Status Laporan {{ $status = "'DIAJUKAN'" }}</h6>
                  <p class="text-muted mb-2" style="font-size: 0.8rem; font-weight: 600">11 Maret 2020</p>
                  <p class="text-muted m-0">
                    Status laporan berubah menjadi {{ $status = "DIAJUKAN" }} pada tanggal 11 Maret 2020.
                  </p>
                </li>
                @endfor
              </ul>
            </section>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Laporan Modal-->
    <div class="modal fade" id="deleteLaporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center">
            <h5 class="modal-title fs-5" id="exampleModalLabel">Apakah Anda Yakin?</h5>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
          </div>
          <div class="modal-body">
            Pilih opsi "Hapus" di bawah ini apabila Anda sudah siap untuk menghapus data laporan dengan ID "...".
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success">Hapus</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center">
            <h5 class="modal-title fs-5" id="exampleModalLabel">Siap Untuk Keluar?</h5>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
          </div>
          <div class="modal-body">
            Pilih opsi "Keluar" di bawah ini apabila Anda sudah siap untuk mengakhiri sesi Anda saat ini.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <a href="/dashboard/login" type="submit" class="btn btn-success">Keluar</a>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/laporan-initiator.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
  
    <!-- Page level custom scripts -->
    <script src="../js/datatables-initiator.js"></script>
  </body>
</html>
