<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Perusahaan A Landing Page</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt="Logo Perusahaan A"> -->
        <h1 class="sitename">Perusahaan A</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#" class="active">Home</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          @auth
          <li><a href="{{ route('home') }}">Dashboard</a></li>
          @else
          <li><a href="{{ route('login') }}">Login Dashboard</a></li>
          <li><a href="{{ route('register') }}">Register Dashboard</a></li>
          @endauth

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <!-- Optional background image -->
      <!-- <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in"> -->

      <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="container position-relative">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-container">
              <h2>Selamat Datang di Perusahaan A</h2>
              <p>Kami hadir untuk mewujudkan transformasi digital yang berdampak.</p>
              <a href="#about" class="btn-get-started">Tentang Kami</a>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="carousel-container">
              <h2>Solusi Teknologi Terintegrasi</h2>
              <p>Dari pengembangan perangkat lunak hingga integrasi sistem yang disesuaikan dengan kebutuhan Anda.</p>
              <a href="#services" class="btn-get-started">Lihat Layanan</a>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="carousel-container">
              <h2>Menuju Masa Depan Digital</h2>
              <p>Komitmen kami adalah menjadi mitra andal dalam setiap langkah inovasi Anda.</p>
              <a href="#contact" class="btn-get-started">Hubungi Kami</a>
            </div>
          </div>

        </div>
      </div>
    </section><!-- /Hero Section -->


          <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>

          <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>

          <ol class="carousel-indicators"></ol>

        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
  <div class="service-item item-cyan position-relative">
    <div class="icon">
      <i class="bi bi-bullseye"></i>
    </div>
    <a href="#" class="stretched-link">
      <h3>Visi Kami</h3>
      <h5>Mewujudkan transformasi digital.</h5>
    </a>
    <p>Menjadi penyedia solusi teknologi yang berdampak dan terpercaya di Asia Tenggara.</p>
  </div>
</div><!-- End Service Item -->

<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
  <div class="service-item item-orange position-relative">
    <div class="icon">
      <i class="bi bi-people"></i>
    </div>
    <a href="#" class="stretched-link">
      <h3>Tim Profesional</h3>
      <h5>Dipimpin oleh talenta teknologi.</h5>
    </a>
    <p>Gabungan dari praktisi teknologi, manajer proyek, dan pengembang berpengalaman.</p>
  </div>
</div><!-- End Service Item -->

<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
  <div class="service-item item-teal position-relative">
    <div class="icon">
      <i class="bi bi-tools"></i>
    </div>
    <a href="#" class="stretched-link">
      <h3>Layanan Kami</h3>
      <h5>Solusi digital yang lengkap.</h5>
    </a>
    <p>Mulai dari pengembangan aplikasi, sistem informasi, hingga cloud infrastructure.</p>
  </div>
</div><!-- End Service Item -->

<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
  <div class="service-item item-red position-relative">
    <div class="icon">
      <i class="bi bi-stars"></i>
    </div>
    <a href="#" class="stretched-link">
      <h3>Budaya Kerja</h3>
      <h5>Inovatif dan kolaboratif.</h5>
    </a>
    <p>Kami membangun lingkungan kerja yang terbuka, kreatif, dan inklusif untuk semua tim.</p>
  </div>
</div><!-- End Service Item -->


        <section id="featured-services" class="featured-services section">

          <div class="container">
    
            <div class="row gy-4">
    
        

      </div>

    </section><!-- /Featured Services Section -->

<!-- About Section -->
<section id="about" class="about section light-background">

  <div class="container">

    <div class="row gy-4">
      <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
        <img src="assets/img/about.jpg" class="img-fluid" alt="Tentang Perusahaan">
        <a href="https://youtu.be/8xsF2c0-7y0?si=a7lMILT9KByCpXpF" class="glightbox pulsating-play-btn" title="Video Profil Perusahaan"></a>
      </div>
      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
        <h3>Tentang Perusahaan A</h3>
        <p class="fst-italic">
          Kami adalah perusahaan teknologi yang berfokus pada pengembangan solusi digital untuk berbagai sektor industri.
        </p>
        <ul>
          <li><i class="bi bi-check2-all"></i> <span>Berpengalaman dalam pengembangan aplikasi dan sistem informasi.</span></li>
          <li><i class="bi bi-check2-all"></i> <span>Didukung oleh tim profesional dari berbagai bidang.</span></li>
          <li><i class="bi bi-check2-all"></i> <span>Berkomitmen terhadap inovasi, kualitas, dan kepuasan mitra.</span></li>
        </ul>
        <p>
          Dengan pendekatan kolaboratif dan teknologi mutakhir, kami hadir untuk membantu bisnis bertransformasi secara digital dan berdaya saing tinggi.
        </p>
      </div>
    </div>

  </div>
</section>


</section><!-- /About Section -->

<!-- Features Section -->
<section id="features" class="features section">

  <div class="container">

    <!-- Features Item 1 -->
    <div class="row gy-4 align-items-center features-item">
      <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
        <img src="assets/img/features-3.svg" class="img-fluid" alt="Infrastruktur Digital">
      </div>
      <div class="col-md-7" data-aos="fade-up">
        <h3>Komitmen terhadap Solusi Digital Berkualitas</h3>
        <p>Perusahaan A hadir sebagai mitra strategis dalam transformasi digital yang berkelanjutan.</p>
        <ul>
          <li><i class="bi bi-check"></i> <span>Proses kerja efisien dan transparan.</span></li>
          <li><i class="bi bi-check"></i> <span>Dukungan teknis dari tim berpengalaman.</span></li>
          <li><i class="bi bi-check"></i> <span>Layanan terintegrasi dan dapat disesuaikan.</span></li>
        </ul>
      </div>
    </div><!-- End Features Item 1 -->

    <!-- Features Item 2 -->
    <div class="row gy-4 align-items-center features-item">
      <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
        <img src="assets/img/features-4.svg" class="img-fluid" alt="Profil Perusahaan A">
      </div>
      <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
        <h3>Mengenal Lebih Dekat Perusahaan A</h3>
        <p class="fst-italic">
          Komitmen kami adalah menjadi pelopor solusi teknologi yang inovatif dan berdampak.
        </p>
        <p>
          Perusahaan A merupakan penyedia layanan teknologi yang berfokus pada pengembangan perangkat lunak, sistem informasi, dan integrasi digital. Kami menggabungkan teknologi mutakhir dengan nilai-nilai integritas, kolaborasi, dan keberlanjutan untuk mendukung pertumbuhan bisnis klien kami.
        </p>
      </div>
    </div><!-- End Features Item 2 -->

    <!-- Features Item 3 -->
<div class="row gy-4 align-items-center features-item">
  <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
    <img src="assets/img/features-3.svg" class="img-fluid" alt="Visi Masa Depan">
  </div>
  <div class="col-md-7" data-aos="fade-up">
    <h3>Masa Depan Digital, Dimulai dari Sini</h3>
    <p class="fst-italic">
      Kami percaya bahwa masa depan ditentukan oleh langkah-langkah hari ini.
    </p>
    <p>
      Dengan semangat inovasi yang berkelanjutan, Perusahaan A terus bertransformasi untuk menghadirkan solusi digital yang tidak hanya menjawab kebutuhan saat ini, tetapi juga mempersiapkan bisnis menghadapi tantangan masa depan. Komitmen kami adalah menjadi mitra jangka panjang dalam perjalanan transformasi digital Anda.
    </p>
  </div>
</div><!-- End Features Item 3 -->


  </div>
</section>

          </div><!-- Features Item -->

        </div>

    </section><!-- /Features Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="#" class="d-flex align-items-center">
            <span class="sitename">Perusahaan A</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jalan Jalanan</p>
            <p>Jakarta</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+00000000000</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Tentang Kami us</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Moderna</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Company Admin Portal</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: 'Poppins', sans-serif;
        background-color: #0d0c1d;
        color: #fff;
        line-height: 1.6;
      }

      header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 50px;
        background-color: #1a192a;
        border-bottom: 1px solid #2e2d3f;
      }

      .logo {
        font-size: 24px;
        font-weight: 700;
        background: linear-gradient(to right, #6d5dfc, #b34dff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      nav a {
        margin: 0 12px;
        text-decoration: none;
        color: #aaa;
        font-size: 15px;
        transition: color 0.3s ease, border-bottom 0.3s ease;
      }

      nav a.active,
      nav a:hover,
      nav a:focus {
        color: #fff;
        border-bottom: 2px solid #6d5dfc;
        padding-bottom: 2px;
      }

      .buttons {
        display: flex;
        gap: 12px;
      }

      .buttons button {
        background: transparent;
        border: 1px solid #6d5dfc;
        color: #fff;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .buttons button:hover,
      .buttons button:focus {
        background: #6d5dfc;
        outline: none;
      }

      .hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 80px 50px;
        flex-wrap: wrap;
      }

      .hero-text {
        max-width: 540px;
      }

      .hero-text h1 {
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 20px;
      }

      .hero-text p {
        color: #bbb;
        font-size: 16px;
        margin-bottom: 30px;
      }

      .cta {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
      }

      .cta button {
        padding: 12px 26px;
        border: none;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: 0.3s ease;
      }

      .cta .dashboard {
        background: linear-gradient(to right, #6d5dfc, #b34dff);
        color: #fff;
      }

      .cta .dashboard:hover {
        opacity: 0.9;
      }

      .cta .request-access {
        background: transparent;
        border: 1px solid #ccc;
        color: #fff;
      }

      .cta .request-access:hover {
        background-color: rgba(255, 255, 255, 0.1);
      }

      .hero-image {
        width: 320px;
        border-radius: 16px;
        overflow: hidden;
        background: #1f1d2b;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .hero-image:hover {
        transform: scale(1.03);
        box-shadow: 0 0 30px rgba(179, 77, 255, 0.6);
      }

      .hero-image img {
        width: 100%;
        display: block;
      }

      footer {
        padding: 30px 50px;
        text-align: center;
        color: #777;
        font-size: 14px;
        background-color: #1a192a;
        border-top: 1px solid #2e2d3f;
        margin-top: 60px;
      }

      @media (max-width: 768px) {
        .hero {
          flex-direction: column;
          padding: 60px 20px;
          text-align: center;
        }

        .hero-text {
          max-width: 100%;
          margin-bottom: 30px;
        }

        .cta {
          justify-content: center;
        }

        .hero-image {
          margin: 0 auto;
        }
      }
    </style>
  </head>
  <body>

    <header>
      <div class="logo">Company Admin</div>
      <nav>
        <a href="" class="active">Home</a>
        <a href="https://jeroennoten.github.io/Laravel-AdminLTE/">Documentation</a>
        <a href="">Support</a>
      </nav>
      <div class="buttons">
        <button><a href="{{ route('register') }}" style="color: white; text-decoration: none;">Create Employee Account</a></button>
        <button style="background: #6d5dfc; border: none;">
          <a href="{{ route('login') }}" style="color: white; text-decoration: none;">Access Dashboard</a>
        </button>
      </div>
    </header>

    <section class="hero">
      <div class="hero-text">
        <h1>Welcome to the <strong>Company Admin Portal</strong></h1>
        <p>
          Streamline your HR operations with our all-in-one administrative dashboard. Easily manage employee records, handle department structures, and maintain user access with secure controls. Track daily attendance with an intuitive check-in/out system, and review, approve, or deny leave requests through a centralized interface. Designed for efficiency and clarity, the Company Admin Portal empowers your HR team with the tools they need to support our workforce.
        </p>
        <div class="cta">
          <button class="dashboard">
            <a href="{{ route('login') }}" style="color: white; text-decoration: none;">Access Dashboard</a>
          </button>
          <button class="request-access">
            <a href="{{ route('register') }}" style="color: white; text-decoration: none;">Create Employee Account</a>
          </button>
        </div>
      </div>

      <div class="hero-image">
        <img src="img/hrislogo.png" alt="App Logo"/>
      </div>
    </section>

    <footer>
      © 2025 Company. Internal Use Only.
    </footer>

  </body>
</html> --}}