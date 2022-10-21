<body>
  <!-- Start Preloader Area -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="pl-spark-1 pl-spark-2"></div>
    </div>
  </div>
  <!-- End Preloader Area -->

  <!-- Start Header Area -->
  <header class="header-area">

    <!-- Start Navbar Area -->
    <div class="navbar-area">
      <div class="mobile-responsive-nav">
        <div class="container">
          <div class="mobile-responsive-menu">
            <div class="logo">
              <a href="<?= base_url() ?>">
                <img src="<?= base_url() ?>assets/img/uho.png" alt="logo" width="46px">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="desktop-nav">
        <div class="container">
          <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url() ?>assets/img/uho.png" alt="logo" width="46px">
            </a>

            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
              <ul class="navbar-nav m-auto">
                <li class="nav-item">
                  <a href="<?= base_url('') ?>" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Jadwal 
                    <i class="ri-arrow-down-s-line"></i>
                  </a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a href="<?= base_url('home/practices') ?>" class="nav-link">Praktikum</a>
                      </li>
                      <li class="nav-item">
                        <a href="<?= base_url('home/extracurriculars') ?>" class="nav-link">Kegiatan Belajar Tambahan</a>
                      </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Layanan 
                    <i class="ri-arrow-down-s-line"></i>
                  </a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a href="<?= base_url('home/documents') ?>" class="nav-link">Dokumen</a>
                      </li>
                      <li class="nav-item">
                        <a href="<?= base_url('home/facilities') ?>" class="nav-link">Fasilitas</a>
                      </li>
                      <li class="nav-item">
                        <a href="<?= base_url('home/galleries') ?>" class="nav-link">Galeri</a>
                      </li>
                  </ul>
                </li>
              </ul>

              <div class="others-options">
                <ul>
                  <li>
                    <a href="<?= base_url('auth/login') ?>" class="cart">
                      Masuk
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!-- End Navbar Area -->
  </header>
  <!-- End Header Area -->