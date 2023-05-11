<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kokonseran</title>
 

  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor2/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor2/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor2/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor2/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/">Kokonseran</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#reservation">Pemesanan</a></li>
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Selamat Datang di Kokonseran</h1>
          <h2>Konser paling seru hanya disini!</h2>
        </div>
      </div>
      <div class="text-center">
        <a href="#reservation" class="btn-get-started scrollto">Klik untuk pemesanan tiket!</a>
      </div>

    
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="reservation" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pemesanan Tiket</h2>
          @if (session()->has('sukses'))
              
          <div class="alert alert-primary" role="alert">
            {{ session('sukses') }}
          </div>
          @endif
        </div>

        
        <div class="row content justify-content-center">
          <div class="card" style="width: 30rem;">
            <div class="card-body">
              <form action="/" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                  <label for="no_hp" class="form-label">No HP</label>
                  <input type="text" class="form-control" id="no_hp" name="no_hp">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <button type="submit" class="btn btn-primary">Pesan</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    
  </main><!-- End #main -->

 

  <!-- Vendor JS Files -->
  <script src="assets/vendor2/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor2/aos/aos.js"></script>
  <script src="assets/vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor2/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor2/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor2/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor2/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>