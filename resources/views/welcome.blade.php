<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Internal Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to bottom right, #f3f4f6, #d1d5db);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 1rem;
    }
    .card {
      background: white;
      border-radius: 1.5rem;
      padding: 2rem;
      max-width: 32rem;
      width: 100%;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .icon {
      background: #e5e7eb;
      border-radius: 9999px;
      padding: 1rem;
      display: inline-block;
    }
    .icon svg {
      width: 2.5rem;
      height: 2.5rem;
      color: #4b5563;
    }
    h1 {
      font-size: 1.875rem;
      font-weight: 700;
      color: #1f2937;
      margin: 1rem 0 0.5rem;
    }
    p {
      font-size: 0.875rem;
      color: #6b7280;
      margin-bottom: 2rem;
    }
    .btn {
      background-color: #3b82f6;
      color: white;
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      border: none;
      border-radius: 0.75rem;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: background-color 0.2s;
      text-decoration: none;
    }
    .btn:hover {
      background-color: #2563eb;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="icon">
      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V7.875A4.125 4.125 0 0012.375 3.75v0a4.125 4.125 0 00-4.125 4.125V10.5M5.25 10.5h13.5m-1.125 0v6.375a1.125 1.125 0 01-1.125 1.125H7.5a1.125 1.125 0 01-1.125-1.125V10.5h11.25z" />
      </svg>
    </div>
    <h1>Aplikasi Internal X</h1>
    <p>Aplikasi ini khusus pegawai perusahaan X, tolong log in atau sign up menggunakan akun perusahaan. Untuk membuat akun, dibutuhkan id pegawai yang dicantumkan bersama email penerimaan pekerjaan.</p>
    <a href="{{ route('login') }}"" class="btn">Log In</a>
    <a href="{{ route('register') }}"class="btn">Sign Up</a>
  </div>
</body>
</html>

{{-- old ass home page, need to replace --}}
{{-- current one is temp, remember to inform group members to make new one --}}
{{-- theme: company internal app --}}

{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Moderna Bootstrap Template</title>
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

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Moderna</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" class="active">Home</a></li>
          <li><a href="{{ route('login') }}" class="active">Login</a></li>
          <li><a href="{{ route('register') }}" class="active">Register</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <!-- <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in"> -->

      <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="container position-relative">

          <div class="carousel-item active">
            <div class="carousel-container">
              <h2>Welcome to Loker Saza</h2>
              <p>Tempat cari kerja paling cepet dan mantap .</p>
              <a href="#about" class="btn-get-started">Info Loker</a>
            </div>
          </div><!-- End Carousel Item -->

          <div class="carousel-item">
            <div class="carousel-container">
              <h2>Loker Saza</h2>
              <p>Semua yang kamu butuhin ada disini!</p>
              <a href="#about" class="btn-get-started">Info Loker</a>
            </div>
          </div><!-- End Carousel Item -->

          <div class="carousel-item">
            <div class="carousel-container">
              <h2>Shibut</h2>
              <p>Wo Chiang</p>
              <a href="#about" class="btn-get-started">Info Loker </a>
            </div>
          </div><!-- End Carousel Item -->

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
                <i class="bi bi-activity"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Staff Admin</h3>
                <h4>Pt Willie Wonka</h4>
              </a>
              <p>SMA/SMK, kontrak 1 - 2 tahun fresh graduate.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
                <div class="icon">
                  <i class="bi bi-broadcast"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Digital Marketing</h3>
                <h4>Pt Dragon Amaan</h4>
              </a>
              <p>ngi shibut anchiang mo, SMA/SMK, pengalaman kerja 16 tahun, fresh graduate.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Pelukis Handal</h3>
                <h4>Ibu dewi Sardihoe</h4>
              </a>
              <p>butuh guru seni yang ngajarin anak saya lukis, minimal pernah melukis monalisa.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Video Editing</h3>
                <h4>Yt Willie Salim</h4>
              </a>
              <p>pengalaman edit video youtube mantap.</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->
        </div>

        <section id="featured-services" class="featured-services section">

          <div class="container">
    
            <div class="row gy-4">
    
              <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative">
                  <div class="icon">
                    <i class="bi bi-activity"></i>
                  </div>
                  <a href="service-details.html" class="stretched-link">
                    <h3>Staff Admin</h3>
                    <h4>Pt Willie Wonka</h4>
                  </a>
                  <p>SMA/SMK, kontrak 1 - 2 tahun fresh graduate.</p>
                </div>
              </div><!-- End Service Item -->
    
              <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item item-orange position-relative">
                    <div class="icon">
                      <i class="bi bi-broadcast"></i>
                  </div>
                  <a href="service-details.html" class="stretched-link">
                    <h3>Digital Marketing</h3>
                    <h4>Pt Dragon Amaan</h4>
                  </a>
                  <p>ngi shibut anchiang mo, SMA/SMK, pengalaman kerja 16 tahun, fresh graduate.</p>
                </div>
              </div><!-- End Service Item -->
    
              <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item item-teal position-relative">
                  <div class="icon">
                    <i class="bi bi-easel"></i>
                  </div>
                  <a href="service-details.html" class="stretched-link">
                    <h3>Pelukis Handal</h3>
                    <h4>Ibu dewi Sardihoe</h4>
                  </a>
                  <p>butuh guru seni yang ngajarin anak saya lukis, minimal pernah melukis monalisa.</p>
                </div>
              </div><!-- End Service Item -->
    
              <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item item-red position-relative">
                  <div class="icon">
                    <i class="bi bi-bounding-box-circles"></i>
                  </div>
                  <a href="service-details.html" class="stretched-link">
                    <h3>Video Editing</h3>
                    <h4>Yt Willie Salim</h4>
                  </a>
                  <p>pengalaman edit video youtube mantap.</p>
                  <a href="service-details.html" class="stretched-link"></a>
                </div>
              </div><!-- End Service Item -->
            </div>

            <section id="featured-services" class="featured-services section">

              <div class="container">
        
                <div class="row gy-4">
        
                  <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                      <div class="icon">
                        <i class="bi bi-activity"></i>
                      </div>
                      <a href="service-details.html" class="stretched-link">
                        <h3>Staff Admin</h3>
                        <h4>Pt Willie Wonka</h4>
                      </a>
                      <p>SMA/SMK, kontrak 1 - 2 tahun fresh graduate.</p>
                    </div>
                  </div><!-- End Service Item -->
        
                  <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item item-orange position-relative">
                        <div class="icon">
                          <i class="bi bi-broadcast"></i>
                      </div>
                      <a href="service-details.html" class="stretched-link">
                        <h3>Digital Marketing</h3>
                        <h4>Pt Dragon Amaan</h4>
                      </a>
                      <p>ngi shibut anchiang mo, SMA/SMK, pengalaman kerja 16 tahun, fresh graduate.</p>
                    </div>
                  </div><!-- End Service Item -->
        
                  <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item item-teal position-relative">
                      <div class="icon">
                        <i class="bi bi-easel"></i>
                      </div>
                      <a href="service-details.html" class="stretched-link">
                        <h3>Pelukis Handal</h3>
                        <h4>Ibu dewi Sardihoe</h4>
                      </a>
                      <p>butuh guru seni yang ngajarin anak saya lukis, minimal pernah melukis monalisa.</p>
                    </div>
                  </div><!-- End Service Item -->
        
                  <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item item-red position-relative">
                      <div class="icon">
                        <i class="bi bi-bounding-box-circles"></i>
                      </div>
                      <a href="service-details.html" class="stretched-link">
                        <h3>Video Editing</h3>
                        <h4>Yt Willie Salim</h4>
                      </a>
                      <p>pengalaman edit video youtube mantap.</p>
                      <a href="service-details.html" class="stretched-link"></a>
                    </div>
                  </div><!-- End Service Item -->
                </div>

                <section id="featured-services" class="featured-services section">

                  <div class="container">
            
                    <div class="row gy-4">
            
                      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item item-cyan position-relative">
                          <div class="icon">
                            <i class="bi bi-activity"></i>
                          </div>
                          <a href="service-details.html" class="stretched-link">
                            <h3>Staff Admin</h3>
                            <h4>Pt Willie Wonka</h4>
                          </a>
                          <p>SMA/SMK, kontrak 1 - 2 tahun fresh graduate.</p>
                        </div>
                      </div><!-- End Service Item -->
            
                      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item item-orange position-relative">
                            <div class="icon">
                              <i class="bi bi-broadcast"></i>
                          </div>
                          <a href="service-details.html" class="stretched-link">
                            <h3>Digital Marketing</h3>
                            <h4>Pt Dragon Amaan</h4>
                          </a>
                          <p>ngi shibut anchiang mo, SMA/SMK, pengalaman kerja 16 tahun, fresh graduate.</p>
                        </div>
                      </div><!-- End Service Item -->
            
                      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item item-teal position-relative">
                          <div class="icon">
                            <i class="bi bi-easel"></i>
                          </div>
                          <a href="service-details.html" class="stretched-link">
                            <h3>Pelukis Handal</h3>
                            <h4>Ibu dewi Sardihoe</h4>
                          </a>
                          <p>butuh guru seni yang ngajarin anak saya lukis, minimal pernah melukis monalisa.</p>
                        </div>
                      </div><!-- End Service Item -->
            
                      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item item-red position-relative">
                          <div class="icon">
                            <i class="bi bi-bounding-box-circles"></i>
                          </div>
                          <a href="service-details.html" class="stretched-link">
                            <h3>Tambahin dong</h3>
                            <h4>Tambahin dong</h4>
                          </a>
                          <p>fee masang disini murah, cuma 300 ribu</p>
                          <a href="service-details.html" class="stretched-link"></a>
                        </div>
                      </div><!-- End Service Item -->
                    </div>

        

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://youtu.be/8xsF2c0-7y0?si=a7lMILT9KByCpXpF" class="glightbox pulsating-play-btn"></a>
          </div>
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Guide masang tawaran kamu di page ini!.</h3>
            <p class="fst-italic">
              Fee nya cuma IDR. 300K aja dicari sampai kriteria pekerja yang kamu mau adaa.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> <span>Pekerja yang dicari langsung ketemu.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Dibantuin sampai ttd kontrak.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Bagus dan mantap, dan diberikan fee jika pekerja mengadu ke kita.</span></li>
            </ul>
            <p>
              gatau
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">


      <div class="container">



        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
            <img src="assets/img/features-3.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up">
            <h3>Penyedia forum loker yang bertanggung jawab</h3>
            <p>Memiliki fisi dan misi untuk membuat angka penggangguran menurun!</p>
            <ul>
              <li><i class="bi bi-check"></i> <span>Administrasi cepat.</span></li>
              <li><i class="bi bi-check"></i><span>Bertanggung jawab</span></li>
              <li><i class="bi bi-check"></i> <span>Gak ribet</span>.</li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
            <img src="assets/img/features-4.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
            <h3>Aktif 24/7 buat ngurusin pekerjaan kamu</h3>
            <p class="fst-italic">
              Ngurus pekerjaan dan nambah loker pekerjaan tinggal sat set sat set.
            </p>
            <p>
              Promo fee menaruh loker pekerjaan di hari hari raya, siap buat jadi solusi buat kamu yang udah nyiapin mental di dunia pekerjaan
            </p>
          </div>
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
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">Moderna</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
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
          <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
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

</html> --}}