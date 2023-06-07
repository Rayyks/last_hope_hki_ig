<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Sistem Informasi Manajement Sentra HKI</title>

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon" />
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/index" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="" />
                <span>SentraHKI</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class="nav-link scrollto active" href="#hero">Beranda</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#about">Tentang SentraHKI</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#services">Layanan</a>
                    </li>
                    <li></li>
                    <li>
                        <a class="nav-link scrollto" href="#contact">Kontak</a>
                    </li>
                    <li>
                        <!--Tombol login nanti bang Rayyand buat-->
                        <a class="getstarted scrollto" href="{{route('login')}}">Login</a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat Datang di Sentra<b>HKI</b></h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        Solusi terbaik untuk melindungi dan mengelola kekayaan intelektual
                        Anda.
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Pelajari Lebih Lanjut</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0 lines">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <div class="container mt-4 ms-1">
                            <h3>Tentang Sentra HKI</h3>
                            <h2>Efisiensi dalam Pengelolaan Kekayaan Intelektual</h2>
                            <p>
                                Dengan Sistem Manajemen Sentra HKI, Anda dapat dengan mudah
                                melakukan pendaftaran dan pengajuan permohonan hak kekayaan
                                intelektual secara online.
                            </p>
                            <p>
                                Anda dapat mengunggah dokumen-dokumen yang diperlukan, mengisi
                                formulir secara digital, dan mengirimkan permohonan dengan
                                cepat dan efisien.
                            </p>
                            <p>
                                Sistem ini dikembangkan khusus untuk mendukung dosen dan
                                mahasiswa dalam perlindungan dan pengelolaan kekayaan
                                intelektual mereka. Sentra HKI adalah platform yang dirancang
                                untuk memudahkan para akademisi dalam melindungi, mengelola,
                                dan memanfaatkan karya dan inovasi mereka.
                            </p>

                            <div class="text-center text-lg-start mb-5">
                                <a href="{{route('login')}}" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Ajukan Permohonan</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center imgeh">

                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Values Section ======= -->

        <!-- End Values Section -->

        <!-- ======= Counts Section ======= -->

        <!-- End Counts Section -->

        <!-- ======= Features Section ======= -->

        <!-- End Features Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Layanan</h2>
                    <p>Informasi Layanan</p>
                </header>

                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Hak Cipta</h3>
                            <p>
                                Apa itu hak cipta? Apa saja karya yang dilindungi oleh hak
                                cipta? Berapa lama hak cipta berlaku?
                            </p>
                            <a href="/hakCipta" class="read-more"><span>Lihat</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Hak Paten</h3>
                            <p>
                                Apa itu hak paten? Apa yang dapat dipatenkan? Berapa lama masa
                                berlaku sebuah paten?
                            </p>
                            <a href="/hakPaten" class="read-more"><span>Lihat</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Pricing Section ======= -->

        <!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->

        <!-- End F.A.Q Section -->

        <!-- ======= Portfolio Section ======= -->

        <!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->

        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->

        <!-- End Team Section -->

        <!-- ======= Clients Section ======= -->

        <!-- End Clients Section -->

        <!-- ======= Recent Blog Posts Section ======= -->

        <!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Hubungi Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-md-6">
                        <div class="info-box ">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Alamat</h3>
                            <p>
                                Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Kontak</h3>
                            <p>+62 21212121<br /></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p>info.sentrahki@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-clock"></i>
                            <h3>Jadwal</h3>
                            <p>Senin - Jumat<br />09:00 - 17:00</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="assets/img/logo.png" alt="" />
                            <span>Sentra<b>HKI</b></span>
                        </a>
                        <p>
                            Sistem Manajemen Sentra HKI adalah solusi inovatif yang
                            dirancang khusus untuk membantu mahasiswa dan dosen dalam
                            mengelola kekayaan intelektual mereka secara efisien dan
                            efektif. Sistem ini memberikan berbagai fitur yang memudahkan
                            pengelolaan hak cipta, merek dagang, paten, dan aset kekayaan
                            intelektual lainnya.
                        </p>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Halaman</h4>
                        <ul>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">Beranda</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Tentang SentraHKI</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">Layanan</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i> <a href="#">Kontak</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Layanan Kami</h4>
                        <ul>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Pendaftaran Hak Cipta</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Pendaftaran Merek Dagang</a>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <a href="#">Pendaftaran Paten</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Hubungi Kami</h4>
                        <p>
                            Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota
                            Batam, Kepulauan Riau 29461 <br /><br />
                            <strong>Phone:</strong> +62 813 6348 3165<br />
                            <strong>Email:</strong> info.sentrahki@gmail.com<br />
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright
                <strong><span>Sentra<b>HKI</b></span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>