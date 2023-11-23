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

        <li class="nav-item active">
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
        <li class="nav-item">
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
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>
            
           <!-- Content Row -->
            <div class="row">
              <!-- Card Admin -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Admin
                                  </div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      10
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Card Laporan -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                      Laporan
                                  </div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                     400
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fa-solid fa-clipboard-list fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Card Satwa -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Satwa
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                   20
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-dove fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              <!-- Card Artikel -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                      Artikel
                                  </div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      18
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fa-solid fa-newspaper fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>

            <!-- Content Row -->

            <div class="row">
              <!-- Area Chart -->
              <div class="col-xl-8 col-lg-7">
                  <div class="card shadow mb-4">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">
                              Earnings Overview
                          </h6>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                          <div class="chart-area">
                              <canvas id="myAreaChart"></canvas>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Pie Chart -->
              <div class="col-xl-4 col-lg-5">
                  <div class="card shadow mb-4">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">
                              Revenue Sources
                          </h6>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                          <div class="chart-pie pt-4 pb-2">
                              <canvas id="myPieChart"></canvas>
                          </div>
                          <div class="mt-4 text-center small">
                              <span class="mr-2">
                                  <i class="fas fa-circle text-primary"></i> Direct
                              </span>
                              <span class="mr-2">
                                  <i class="fas fa-circle text-success"></i> Social
                              </span>
                              <span class="mr-2">
                                  <i class="fas fa-circle text-info"></i> Referral
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
            </div>

            <!-- Content Row -->
            <div class="row">
              <!-- Content Column -->
              <div class="col-lg-6 mb-4">
                  <!-- Project Card Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                    </div>
                    <div class="card-body">
                    <h4 class="small font-weight-bold">
                      Server Migration <span class="float-right">20%</span>
                    </h4>
                    <div class="progress mb-4">
                      <div
                        class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 20%"
                        aria-valuenow="20"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <h4 class="small font-weight-bold">
                      Sales Tracking <span class="float-right">40%</span>
                    </h4>
                    <div class="progress mb-4">
                      <div
                        class="progress-bar bg-warning"
                        role="progressbar"
                        style="width: 40%"
                        aria-valuenow="40"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <h4 class="small font-weight-bold">
                      Customer Database <span class="float-right">60%</span>
                    </h4>
                    <div class="progress mb-4">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 60%"
                        aria-valuenow="60"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <h4 class="small font-weight-bold">
                      Payout Details <span class="float-right">80%</span>
                    </h4>
                    <div class="progress mb-4">
                      <div
                        class="progress-bar bg-info"
                        role="progressbar"
                        style="width: 80%"
                        aria-valuenow="80"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <h4 class="small font-weight-bold">
                      Account Setup <span class="float-right">Complete!</span>
                    </h4>
                    <div class="progress">
                      <div
                        class="progress-bar bg-success"
                        role="progressbar"
                        style="width: 100%"
                        aria-valuenow="100"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mb-4">
                  <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                          Development Approach
                        </h6>
                      </div>
                    <div class="card-body">
                    <p>
                      SB Admin 2 makes extensive use of Bootstrap 4 utility
                      classes in order to reduce CSS bloat and poor page
                      performance. Custom CSS classes are used to create custom
                      components and custom utility classes.
                    </p>
                    <p class="mb-0">
                      Before working with this theme, you should become familiar
                      with the Bootstrap framework, especially the utility
                      classes.
                    </p>
                  </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/chart-area-initiator.js"></script>
    <script src="../js/chart-pie-initiator.js"></script>
  </body>
</html>
