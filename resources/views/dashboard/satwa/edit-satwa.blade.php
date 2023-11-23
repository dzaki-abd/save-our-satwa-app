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

    <!-- Fancy Box -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    
    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.css" rel="stylesheet" />
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
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/laporan">
            <i class="fa-solid fa-clipboard-list fa-sm fa-fw"></i>
            <span>Laporan</span>
          </a>
        </li>
        <li class="nav-item active">
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
            <div class="mb-4">
              <h1 class="h3 mb-0 text-gray-800">Edit Satwa</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-1">
                  <li class="breadcrumb-item">
                    <a class="text-success" href="/dashboard/satwa">Satwa</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Edit Satwa
                  </li>
                </ol>
              </nav>
            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex align-items-center">
                <h6 class="m-0 font-weight-bold text-success">
                  Edit Satwa
                </h6>
              </div>
              <div class="card-body">
              <form action="" method="">
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label for="general-name">Nama Umum</label>
                        <input type="text" class="form-control" id="general-name" name="general-name" placeholder="Masukkan nama umum" value="{{ $general_name = "Harimau" }}"/>
                      </div>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                        <label for="scientific-name">Nama Ilmiah</label>
                        <input type="text" class="form-control" id="scientific-name" name="scientific-name" placeholder="Masukkan nama ilmiah" value="{{ $scientific_name = "Tiger" }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <div class="mb-3">
                            <label for="habitat">Habitat</label>
                            <input type="text" class="form-control" id="habitat" name="habitat" placeholder="Masukkan habitat" value="{{ $habitat = "Sumatera" }}"/>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                        <label for="population">Populasi</label>
                        <input type="text" class="form-control" id="population" name="population" placeholder="Masukkan populasi" value="{{ $population = "100" }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="custom-select" id="status" name="status" required>
                            <option value="{{ $status = "Aman" }}">{{ $status = "Aman" }}</option>
                            <option value="Aman">Aman</option>
                            <option value="Rentan">Rentan</option>
                            <option value="Terancam Punah">Terancam Punah</option>
                            <option value="Sangat Terancam">Sangat Terancam</option>
                            <option value="Hampir Punah">Hampir Punah</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                        <label for="sub-island">Sub Pulau</label>
                        <select class="custom-select" id="sub-island" name="sub-island" required>
                            <option value="{{ $subPulau = "Jawa" }}">{{ $subPulau = "Jawa" }}</option>
                            <option value="Jawa">Jawa</option>
                            <option value="Kalimantan">Kalimantan</option>
                            <option value="Sumatera">Sumatera</option>
                            <option value="Sulawesi">Sulawesi</option>
                            <option value="Papua">Papua</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="treats">Ancaman</label>
                    <textarea class="form-control" id="treats" name="treats" rows="6" placeholder="Jelaskan ancaman" required>{{ $treats = "Perdagangan ilegal" }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="6" placeholder="Jelaskan deskripsi" required>{{ $description = "Berada pada hutan dekat masyarakat dan ..." }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="backdrop">Backdrop</label>
                    <div id="backdropPreviewGambar">
                      <a href="../../../img/backdrop.jpg" data-fancybox>
                        <img src="../../../img/backdrop.jpg" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;"/>
                      </a>
                    </div>
                    <div id="currentBackdropGambar"></div>
                    <input type="file" class="form-control" id="backdrop" name="backdrop" style="padding: 0.2rem" onchange="return fileValidation('backdrop', 'backdropPreviewGambar', 'currentBackdropGambar')"/>
                  </div>
                  <div class="mb-3">
                    <label for="poster">Poster</label>
                    <div id="posterPreviewGambar">
                      <a href="../../../img/poster.jpg" data-fancybox>
                        <img src="../../../img/poster.jpg" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;"/>
                      </a>
                    </div>
                    <div id="currentPosterGambar"></div>
                    <input type="file" class="form-control" id="poster" name="poster" style="padding: 0.2rem" onchange="return fileValidation('poster', 'posterPreviewGambar', 'currentPosterGambar')"/>
                  </div>

                  <button type="submit" class="btn btn-success">Simpan</button>
                </form>
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

    <script>
      function fileValidation(current = null, previewGambar, currentGambar) {
        let fileInput = document.getElementById(current);
        let filePath = fileInput.value;
        let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    
        if (!allowedExtensions.exec(filePath)) {
          alert('Invalid file type');
          fileInput.value = '';
          return false;
        } else {
          if (fileInput.files && fileInput.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
              if (current != null) document.getElementById(currentGambar).innerHTML = `<input type="hidden" name="currentGambar" value="${current}">`;
              document.getElementById(previewGambar).innerHTML = `
                <a href="${e.target.result}" data-fancybox>
                  <img src="${e.target.result}" class="rounded" style="margin-bottom: 0.8rem; height: 200px; max-height: 300px;"/>
                </a>
              `;
            };
            reader.readAsDataURL(fileInput.files[0]);
          }
        }
      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script>
      Fancybox.bind('[data-fancybox]', {});
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../js/sb-admin-2.js"></script>
  </body>
</html>
