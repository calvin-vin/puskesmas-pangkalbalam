<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Puskesmas Pangkalbalam</title>

  <!-- Font awesome -->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- My CSS -->
  <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body id="home">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">
        <img src="<?= base_url('assets/'); ?>img/home/puskesmas_pangkal_balam_logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="Logo Puskesmas Pangkal Balam">
        Puskesmas Pangkalbalam
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="#home">Beranda</a>
          <a class="nav-item nav-link" href="#pelayanan">Pelayanan</a>
          <a class="nav-item nav-link" href="#berita">Berita</a>
          <a class="nav-item nav-link" href="#tentang">Tentang Kami</a>
          <a class="nav-item nav-link" href="#kesehatan">Data Kesehatan</a>
          <?php if (!$this->session->userdata('email')) : ?>
             <a class="nav-item btn btn-primary tombol" href="<?= base_url('auth'); ?>">Masuk</a>
          <?php else : ?>
            <a class="nav-item btn btn-primary tombol" href="<?= base_url('auth'); ?>"><?= $this->session->userdata('email'); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- End of Navbar -->

  <!-- Carousel -->
  <div id="carouselControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url('assets/'); ?>img/home/puskesmas_pangkal_balam_1.jpg" class="d-block w-100" alt="Puskesmas Pangkal Balam">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/'); ?>img/home/puskesmas_pangkal_balam_1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/'); ?>img/home/puskesmas_pangkal_balam_1.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- End of Carousel -->



  <div class="container">
    
    <!-- Info Panel -->
      <div class="row justify-content-center info">
        <div class="col-10">
          
        </div>
      </div>
    <!-- End of Info Panel -->
  </div>

  <!-- Pelayanan -->
  <section class="pelayanan" id="pelayanan">
    <div class="container">
      
      <h3 class="text-center">Pelayanan</h3>
      <p class="text-center mt-3">Puskesmas Kecamatan Pangkalbalam</p>
      <hr>

      <div class="row">
        
          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal" data-title="Klinik Umum">
              <img src="<?= base_url('assets/'); ?>img/home/umum.png" width="80">
              <p class="text-primary text-center mt-1">Klinik Umum</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/gigi.png" width="80">
              <p class="text-primary text-center mt-1">Klinik Gigi</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/kb.png" width="80">
              <p class="text-primary text-center mt-1">Keluarga Berencana</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/lansia.png" width="80">
              <p class="text-primary text-center mt-1">Poli Manula</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/ruang-bersalin.png" width="80">
              <p class="text-primary text-center mt-1">Ruang Bersalin</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/umum.png" width="80">
              <p class="text-primary text-center mt-1">Klinik Umum</p>
            </div>
          </div>

      </div>

      <div class="row">
        
          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/umum.png" width="80">
              <p class="text-primary text-center mt-1">Klinik Umum</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/gigi.png" width="80">
              <p class="text-primary text-center mt-1">Klinik Gigi</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/kb.png" width="80">
              <p class="text-primary text-center mt-1">Keluarga Berencana</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/lansia.png" width="80">
              <p class="text-primary text-center mt-1">Poli Manula</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/ruang-bersalin.png" width="80">
              <p class="text-primary text-center mt-1">Ruang Bersalin</p>
            </div>
          </div>

          <div class="col mb-3">
            <div class="kotak" data-toggle="modal" data-target="#layananModal">
              <img src="<?= base_url('assets/'); ?>img/home/umum.png" width="80">
              <p class="text-primary text-center mt-1">Klinik Umum</p>
            </div>
          </div>

      </div>

    </div>
  </section>
  <!-- End of Pelayanan -->

  <!-- Berita -->
  <section class="berita" id="berita">
    <div class="container">
      
      <h3 class="text-center text-dark">Berita</h3>
      <hr>

      <div class="row">
        
        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="<?= base_url('assets/'); ?>img/home/puskesmas1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-dark">IKM - Puskesmas Kecamatan Pangkalbalam</h5>
              <p class="card-text">
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="<?= base_url('assets/'); ?>img/home/puskesmas2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-dark">IKM - Puskesmas Kecamatan Pangkalbalam</h5>
              <p class="card-text">
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="<?= base_url('assets/'); ?>img/home/puskesmas3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-dark">IKM - Puskesmas Kecamatan Pangkalbalam</h5>
              <p class="card-text">
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="<?= base_url('assets/'); ?>img/home/puskesmas1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-dark">IKM - Puskesmas Kecamatan Pangkalbalam</h5>
              <p class="card-text">
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

      </div>

      <div class="row mt-3">
        <div class="col-4 offset-4">
          <a href="" class="btn btn-outline-primary lainnya">Berita lainnya</a>
        </div>
      </div>

    </div>
  </section>
  <!-- End of Berita -->

  <!-- Tentang kami -->
  <section class="tentang bg-light" id="tentang">
    <div class="container">

      <h3 class="text-center text-dark">Tentang Kami</h3>
      <hr>

      <div class="row">
        <div class="col-md-6">
          <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-md-6">
          <div class="accordion" id="accordionTentang">
            <div class="card">
              <div class="card-header bg-primary" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h2 class="mb-0">
                  <button class="btn text-light" type="button">
                    PROFIL KEPALA PUSKESMAS
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionTentang">
                <div class="card-body container">
                  <div class="row">
                    <div class="col">
                      <img src="<?= base_url('assets/'); ?>img/home/girl.jpg" alt="" width="200">
                    </div>
                    <div class="col">
                      <h5 class="text-dark">dr. Hj. Tri Wahyuni Masrohani</h5>
                      <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header bg-primary" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h2 class="mb-0">
                  <button class="btn text-light collapsed" type="button">
                    MOTTO
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTentang">
                <div class="card-body">
                  <p class="text-dark">KAMI MELAYANI DENGAN SENYUM, RAMAH, DAN IKHLAS</p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header bg-primary" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h2 class="mb-0">
                  <button class="btn text-light collapsed" type="button" >
                    VISI
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionTentang">
                <div class="card-body text-dark">
                  <p>Terwujudnya UPT. Puskesmas Pangkalbalam sebagai sentra Pelayanan Kesehatan Yang Berkualitas.</p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header bg-primary" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <h2 class="mb-0">
                  <button class="btn text-light collapsed" type="button">
                    MISI
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionTentang">
                <div class="card-body text-dark">
                  <p>1. Meningkatkan pelayanan kesehatan prima kepada masyarakat</p>
                  <p>2. Memberdayakan masyarakat untuk menerapkan perilaku hidup bersih dan sehat (PHBS)</p>
                  <p>3. Meningkatkan kompetensi SDM kesehatan yang berdaya saing dan inovatif</p>
                  <p>4. Meningkatkan profesionalisme bidan dalam upaya pencapaian program kesehatan Ibu dan anak</p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header bg-primary" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <h2 class="mb-0">
                  <button class="btn text-light collapsed" type="button">
                    TATA NILAI
                  </button>
                </h2>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionTentang">
                <div class="card-body text-dark">
                  <p>BERTINDAK CEPAT DAN TEPAT, INISIATIF, RAMAH, MALU, AKUNTABEL (BIRMA)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- End of Tentang kami -->

  <!-- Data Kesehatan -->
  <section class="kesehatan" id="kesehatan">
    <div class="container">
      
      <h3 class="text-center text-dark">Data Kesehatan</h3>
      <hr>

      <div class="row">
        
        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="<?= base_url('assets/'); ?>img/home/puskesmas1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-dark">IKM - Puskesmas Kecamatan Pangkalbalam</h5>
              <p class="card-text">
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="<?= base_url('assets/'); ?>img/home/puskesmas2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-dark">IKM - Puskesmas Kecamatan Pangkalbalam</h5>
              <p class="card-text">
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="<?= base_url('assets/'); ?>img/home/puskesmas3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-dark">IKM - Puskesmas Kecamatan Pangkalbalam</h5>
              <p class="card-text">
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="<?= base_url('assets/'); ?>img/home/puskesmas1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-dark">IKM - Puskesmas Kecamatan Pangkalbalam</h5>
              <p class="card-text">
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

      </div>

      <div class="row mt-3">
        <div class="col-4 offset-4">
          <a href="" class="btn btn-outline-primary lainnya">Data kesehatan lainnya</a>
        </div>
      </div>

    </div>
  </section>
  <!-- End of Data Kesehatan -->

  <!-- Footer -->
  <footer>
    <div class="container">
      
      <div class="row justify-content-md-between">
        
        <div class="col-md-4">
          <div class="row">
            <div class="col">
              <h5 class="text-light">TENTANG KAMI</h5>
              <hr class="blend">
              <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco.</p>
            </div>  
          </div>
          <div class="row mt-3 social-media mb-5">
            <div class="col">
              <h5 class="text-light">Social <span class="text-primary">Media</span></h5>
              <span class="platform"><a href="" class="app"><i class="fab fa-facebook-square"></i></a></span>
              <span class="platform"><a href="" class="app"><i class="fab fa-twitter-square"></i></a></span>
              <span class="platform"><a href="" class="app"><i class="fab fa-google-plus-square"></i></a></span>
              <span class="platform"><a href="" class="app"><i class="fab fa-youtube-square"></i></a></span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h5 class="text-light">KONTAK</h5>
          <hr class="blend">
          <p>
            <h6 class="text-primary"><i class="fas fa-map-marker-alt"></i><span class="text-light ml-3">Jalan Ahmad Yani No 3</span></h6>
            <h6 class="text-primary"><i class="fas fa-phone-alt"></i><span class="text-light ml-3">+62 21 54823671</span></h6>
            <h6 class="text-primary"><i class="fas fa-building"></i></i><span class="text-light ml-3">+62 21 54823671</span></h6>
            <h6 class="text-primary"><i class="fas fa-envelope"></i><a href="" class="mail ml-3">info@puskesmaspangkalbalam.com</a></h6>
          </p>

        </div>

      </div>

    </div>    
  </footer>
  <!-- end of Footer -->


  <!-- Copyright -->
    <div class="copyright text-secondary">
      <div class="container">
        <p>&copy; Copyright 2020 Puskesmas Kec. Pangkalbalam|Designed By <a href="" class="developer text-danger">Mahasiswa Teknik Elektro-UBB</a></p>
      </div>
    </div>
  <!-- End of CopyRight -->


  <!-- Modal -->
  <div class="modal fade" id="layananModal" tabindex="-1" role="dialog" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="layananModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/'); ?>js/home_script.js"></script>

</body>

</html>
