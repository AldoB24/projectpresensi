
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-PRESENSI Karyawan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="/ags.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ags.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('arsha/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('arsha/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('arsha/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('arsha/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <!--  -->


  <!-- Template Main CSS File -->
  <link href="{{ asset('arsha/assets/css/style1.css') }}" rel="stylesheet">
  <link href="{{ asset('arsha/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<style>
  .rectangle-frame {
    width: 175px; /* Sesuaikan lebar sesuai kebutuhan */
    height: 250px; /* Sesuaikan tinggi sesuai kebutuhan */
    overflow: hidden;
    border: 2px solid #ccc; /* Atur warna dan ketebalan garis sesuai kebutuhan */
    border-radius: 10px; /* Atur sudut lengkungan sesuai kebutuhan */
}

.rectangle-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Memastikan gambar tetap di dalam kotak dan diatur agar tidak menjadi pecah-pecah */
}


  </style>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a>
                <img src="{{ asset('tabler/static/ags.png') }}" alt="Logo" class="img-fluid">
                Arsenet Global Solusi
            </a>
        </h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a href="/login" class="btn-get-started scrollto">Admin</a></li>
                
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>
<!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>E-Presensi AGS</h1>
          <h2>Arsenet adalah perusahaan yang bergerak di bidang industri teknologi dan menawarkan layanan jaringan telekomunikasi, Internet Penyedia Layanan (ISP) (Fiber Optic, Wireless dan Satelit) Sejak 2013.
Jangkauan Internet di Indonesia
80%
Akses Individual dan Korporasi
75%</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 ags" data-aos="zoom-in" data-aos-delay="1000">
    <img src="{{ asset('arsha/assets/img/ags.png') }}" class="img-fluid animated" alt="" style="width: 450px; height: 450px;">
</div>

      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('arsha/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="{{ asset('arsha/assets/img/clients/ags.png') }}" alt="Logo" class="img-fluid">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('arsha/assets/img/clients/ags1.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('arsha/assets/img/clients/ags1.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="{{ asset('arsha/assets/img/clients/ags.png') }}" alt="Logo" class="img-fluid">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('arsha/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div>


        </div>

      </div>
    </section><!-- End Cliens Section -->
    
    <!-- About -->
 <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Tentang Aplikasi Presensi</h3>
              <h2>Sistem digital yang digunakan oleh perusahaan untuk mencatat dan memantau kehadiran karyawan secara elektronik.</h2>
              <p>
              "E-Presensi Karyawan merupakan solusi inovatif untuk manajemen presensi karyawan secara efisien dan terintegrasi. Dengan aplikasi web dan mobile yang canggih, karyawan dapat dengan mudah melakukan pencatatan waktu masuk dan keluar secara real-time  serta mengajukan izin dengan cepat dan akurat. Selain itu, admin dapat dengan mudah mengelola data karyawan, mengakses laporan presensi, dan melakukan analisis data untuk meningkatkan produktivitas dan efisiensi operasional perusahaan. E-Presensi Karyawan membawa kemudahan, keandalan, dan transparansi dalam pengelolaan presensi karyawan untuk mencapai kinerja optimal dan kepuasan kerja yang lebih baik."            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('arsha/assets/img/about2.png') }}" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section>
    <!-- End About Section -->

    <!-- ======= About Us Section ======= -->
    <!-- <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
            Sistem digital yang digunakan oleh perusahaan untuk mencatat dan memantau kehadiran karyawan secara elektronik.
          </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Efisiensi Administrasi</li>
              <li><i class="ri-check-double-line"></i> Akurasi dan Keterandalan Data</li>
              <li><i class="ri-check-double-line"></i> Kepatuhan Regulasi</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            Melalui aplikasi atau perangkat lunak khusus, karyawan dapat melakukan absensi atau check-in/check-out secara online. Sistem ini memungkinkan perusahaan untuk lebih efisien dalam mengelola data kehadiran karyawan, mengurangi kesalahan pencatatan, dan meningkatkan akurasi pelaporan. Selain itu, E-Presensi juga dapat memberikan data real-time tentang kehadiran karyawan, yang berguna untuk pengambilan keputusan manajemen dan pengawasan.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section> -->
    <!-- End About Us Section -->

    <!-- Team Section -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team Pengembang Aplikasi</h2>
          <p>Kelompok profesional yang berkomitmen menciptakan solusi digital inovatif untuk mempermudah manajemen kehadiran dengan aplikasi yang aman dan user-friendly. Mereka fokus pada peningkatan produktivitas dan akurasi pencatatan kehadiran, memungkinkan organisasi mengelola sumber daya manusia lebih efektif.</p>
        </div>
        
        <div class="row justify-content-center">
        <div class="col-lg-6 mt-5" data-aos="zoom-in" data-aos-delay="100">
    <div class="member d-flex align-items-start">
        <div class="rectangle-frame"><img src="{{ asset('arsha/assets/img/team/yoga.jpg') }}" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Anang Prayoga</h4>
            <span>Product Manager & Mobile Developer</span>
            
            <div class="social">
                <a href="https://www.instagram.com/anangprayoga24/" target="_blank"><i class="ri-instagram-fill"></i></a>
                <a href="https://www.linkedin.com/in/anangprayoga" target="_blank"><i class="ri-linkedin-box-fill"></i></a>
            </div>
          </div>
      </div>
    </div>



        <div class="row">
          
        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
    <div class="member d-flex align-items-start">
        <div class="rectangle-frame"><img src="{{ asset('arsha/assets/img/team/aldo.jpg') }}" class="img-fluid" alt=""></div>
        <div class="member-info">
            <h4>Aldo Bagas Septyawan</h4>
            <span>Web Developer</span>
            
            <div class="social">
                <a href="https://www.instagram.com/aldobagassx/" target="_blank"><i class="ri-instagram-fill"></i></a>
                <a href="https://www.linkedin.com/in/aldo-bagas-septyawan" target="_blank"><i class="ri-linkedin-box-fill"></i></a>
            </div>
        </div>
    </div>
</div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="member d-flex align-items-start">
              <div class="rectangle-frame"><img src="{{ asset('arsha/assets/img/team/Veni.jpg') }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Veni Kurnia Dewi</h4>
                <span>Web Developer</span>
                
                <div class="social">
                  <a href="https://www.instagram.com/veny_agassi" target="_blank"><i class="ri-instagram-fill"></i>
                  </a>
                  <a href="https://www.linkedin.com/in/veni-kurnia-dewi-696885232/" target="_blank"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="member d-flex align-items-start">
              <div class="rectangle-frame"><img src="{{ asset('arsha/assets/img/team/husnul.jpg') }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Husnul Putri Candra Buana</h4>
                <span>Mobile Developer</span>
                <div class="social">
                  
                <a href="https://www.instagram.com/husnulputricandra_" target="_blank">
    <i class="ri-instagram-fill"></i>
</a>

                  <a href="https://www.linkedin.com/in/husnul-putri-candra-buana-12395b208" target="_blank">
    <i class="ri-linkedin-box-fill"></i>
</a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="member d-flex align-items-start">
              <div class="rectangle-frame"><img src="{{ asset('arsha/assets/img/team/lala.jpg') }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Lailatul Khusnia</h4>
                <span>Dokumentasi dan Testing</span>
                
                <div class="social">
                  <a href="https://www.instagram.com/syalalakh_21" target="_blank">
    <i class="ri-instagram-fill"></i>
</a>

                  <a href="https://www.linkedin.com/in/lailatul-khusnia-5049451b6/" target="_blank">
    <i class="ri-linkedin-box-fill"></i>
</a>

                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

  <!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Contact</h2>
    </div>
           
    <div class="row">
      <div class="col-lg-4 mt-5 mt-lg-0 d-flex align-items-stretch">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Lokasi kami:</h4>
            <p>Rukan, Jl. Semeru Utama No.4, Tegal Boto Kidul, Sumbersari, Jember Regency, East Java 68121</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 mt-5 mt-lg-0 d-flex align-items-stretch">
        <div class="info">
          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>info@arsenet.co.id</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mt-5 mt-lg-0 d-flex align-items-stretch">
        <div class="info">
          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>No Telepon:</h4>
            <p>+62 811-3821-1212</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>E-Presensi</h3>
                    <p>
                        Jl. Mastrip PO BOX 164, Jember<br>
                        Jawa Timur<br>
                        Indonesia <br><br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
                    </ul>
                </div>
                <!-- Pindahkan iframe ke dalam div dengan class "col-lg-6" untuk menempatkannya di sebelah kanan -->
                <div class="col-lg-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.479502531568!2d113.720513!3d-8.176305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7b1bfae3eeb55%3A0x3a74696b38f90783!2sPT.%20Arsenet%20Global%20Solusi!5e0!3m2!1sen!2sid!4v1649746321592!5m2!1sen!2sid&z=50" frameborder="5" style="border:0; width: 100%; height: 200px;" allowfullscreen></iframe>
</div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Kelompok 2 PLJ TIF 2024</span></strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('arsha/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('arsha/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('arsha/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('arsha/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('arsha/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('arsha/assets/js/main.js') }}"></script>

</body>

</html>