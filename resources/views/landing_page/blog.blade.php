<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Blog Pendidikan - EduLearn</title>
    <meta content="Blog tentang pendidikan dan pembelajaran" name="description" />
    <meta content="pendidikan, pembelajaran, blog pendidikan" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('assets/main1/img/favicon.png') }}" rel="icon" />
    <link
      href="{{ asset('assets/main1/img/apple-touch-icon.png') }}"
      rel="apple-touch-icon"
    />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="{{ asset('assets/main1/vendor/bootstrap/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('assets/main1/vendor/bootstrap-icons/bootstrap-icons.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('assets/main1/vendor/aos/aos.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('assets/main1/vendor/glightbox/css/glightbox.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('assets/main1/vendor/swiper/swiper-bundle.min.css') }}"
      rel="stylesheet"
    />

    <!-- Main CSS File -->
    <link href="{{ asset('assets/main1/css/main.css') }}" rel="stylesheet" />
  </head>

  <body class="blog-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
      <div
        class="container-fluid position-relative d-flex align-items-center justify-content-between"
      >
        <a
          href="index.html"
          class="logo d-flex align-items-center me-auto me-xl-0"
        >
          <h1 class="sitename">EduLearn</h1>
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="landing_page.index">Beranda</a></li>
            <li><a href="landing_page.blog-details">Tentang Kami</a></li>
            <li><a href="index.html#teachers">Pengajar</a></li>
            <li><a href="landing_page.blog" class="active">Blog</a></li>
            <li><a href="landing_page.portfolio-details">Kontak</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
  
        <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
      </div>
    </header>

    <main class="main">
      <!-- Page Title -->
      <div class="page-title" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <h1>Blog Pendidikan</h1>
                <p class="mb-0">
                  Temukan artikel-artikel menarik seputar dunia pendidikan, tips belajar efektif, dan perkembangan terbaru dalam metode pembelajaran.
                </p>
              </div>
            </div>
          </div>
        </div>
        <nav class="breadcrumbs">
          <div class="container">
            <ol>
              <li><a href="index.html">Beranda</a></li>
              <li class="current">Blog</li>
            </ol>
          </div>
        </nav>
      </div>
      <!-- End Page Title -->

      <!-- Blog Posts Section -->
      <section id="blog-posts" class="blog-posts section">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-4">
              <article>
                <div class="post-img">
                  <img
                    src="assets/img/blog/pendidikan-1.jpg"
                    alt="Metode Pembelajaran Aktif"
                    class="img-fluid"
                  />
                </div>

                <p class="post-category">Metode Pembelajaran</p>

                <h2 class="title">
                  <a href="blog-details.html">Metode Pembelajaran Aktif: Meningkatkan Partisipasi Siswa</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img
                    src="assets/img/blog/guru-1.jpg"
                    alt="Foto Guru"
                    class="img-fluid post-author-img flex-shrink-0"
                  />
                  <div class="post-meta">
                    <p class="post-author">Budi Santoso</p>
                    <p class="post-date">
                      <time datetime="2023-03-15">15 Maret 2023</time>
                    </p>
                  </div>
                </div>
              </article>
            </div>
            <!-- End post list item -->

            <div class="col-lg-4">
              <article>
                <div class="post-img">
                  <img
                    src="assets/img/blog/teknologi-pendidikan.jpg"
                    alt="Teknologi dalam Pendidikan"
                    class="img-fluid"
                  />
                </div>

                <p class="post-category">Teknologi Pendidikan</p>

                <h2 class="title">
                  <a href="blog-details.html">Pemanfaatan Teknologi AR dalam Pembelajaran Sains</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img
                    src="assets/img/blog/guru-2.jpg"
                    alt="Foto Guru"
                    class="img-fluid post-author-img flex-shrink-0"
                  />
                  <div class="post-meta">
                    <p class="post-author">Siti Rahma</p>
                    <p class="post-date">
                      <time datetime="2023-04-22">22 April 2023</time>
                    </p>
                  </div>
                </div>
              </article>
            </div>
            <!-- End post list item -->

            <div class="col-lg-4">
              <article>
                <div class="post-img">
                  <img
                    src="assets/img/blog/pendidikan-karakter.jpg"
                    alt="Pendidikan Karakter"
                    class="img-fluid"
                  />
                </div>

                <p class="post-category">Pendidikan Karakter</p>

                <h2 class="title">
                  <a href="blog-details.html">Membangun Karakter Siswa Melalui Kegiatan Ekstrakurikuler</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img
                    src="assets/img/blog/guru-3.jpg"
                    alt="Foto Guru"
                    class="img-fluid post-author-img flex-shrink-0"
                  />
                  <div class="post-meta">
                    <p class="post-author">Ahmad Fauzi</p>
                    <p class="post-date">
                      <time datetime="2023-05-10">10 Mei 2023</time>
                    </p>
                  </div>
                </div>
              </article>
            </div>
            <!-- End post list item -->

            <div class="col-lg-4">
              <article>
                <div class="post-img">
                  <img
                    src="assets/img/blog/pendidikan-inklusif.jpg"
                    alt="Pendidikan Inklusif"
                    class="img-fluid"
                  />
                </div>

                <p class="post-category">Pendidikan Inklusif</p>

                <h2 class="title">
                  <a href="blog-details.html">Menciptakan Lingkungan Belajar yang Inklusif untuk Semua Siswa</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img
                    src="assets/img/blog/guru-4.jpg"
                    alt="Foto Guru"
                    class="img-fluid post-author-img flex-shrink-0"
                  />
                  <div class="post-meta">
                    <p class="post-author">Dewi Lestari</p>
                    <p class="post-date">
                      <time datetime="2023-06-05">5 Juni 2023</time>
                    </p>
                  </div>
                </div>
              </article>
            </div>
            <!-- End post list item -->

            <div class="col-lg-4">
              <article>
                <div class="post-img">
                  <img
                    src="assets/img/blog/evaluasi-pembelajaran.jpg"
                    alt="Evaluasi Pembelajaran"
                    class="img-fluid"
                  />
                </div>

                <p class="post-category">Evaluasi Pembelajaran</p>

                <h2 class="title">
                  <a href="blog-details.html">Metode Evaluasi Pembelajaran yang Efektif di Era Digital</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img
                    src="assets/img/blog/guru-5.jpg"
                    alt="Foto Guru"
                    class="img-fluid post-author-img flex-shrink-0"
                  />
                  <div class="post-meta">
                    <p class="post-author">Rudi Hartono</p>
                    <p class="post-date">
                      <time datetime="2023-07-18">18 Juli 2023</time>
                    </p>
                  </div>
                </div>
              </article>
            </div>
            <!-- End post list item -->

            <div class="col-lg-4">
              <article>
                <div class="post-img">
                  <img
                    src="assets/img/blog/pendidikan-lingkungan.jpg"
                    alt="Pendidikan Lingkungan"
                    class="img-fluid"
                  />
                </div>

                <p class="post-category">Pendidikan Lingkungan</p>

                <h2 class="title">
                  <a href="blog-details.html">Mengintegrasikan Pendidikan Lingkungan dalam Kurikulum Sekolah</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img
                    src="assets/img/blog/guru-6.jpg"
                    alt="Foto Guru"
                    class="img-fluid post-author-img flex-shrink-0"
                  />
                  <div class="post-meta">
                    <p class="post-author">Rina Wijaya</p>
                    <p class="post-date">
                      <time datetime="2023-08-22">22 Agustus 2023</time>
                    </p>
                  </div>
                </div>
              </article>
            </div>
            <!-- End post list item -->
          </div>
        </div>
      </section>
      <!-- /Blog Posts Section -->

      <!-- Blog Pagination Section -->
      <section id="blog-pagination" class="blog-pagination section">
        <div class="container">
          <div class="d-flex justify-content-center">
            <ul>
              <li>
                <a href="#"><i class="bi bi-chevron-left"></i></a>
              </li>
              <li><a href="#">1</a></li>
              <li><a href="#" class="active">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>...</li>
              <li><a href="#">10</a></li>
              <li>
                <a href="#"><i class="bi bi-chevron-right"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <!-- /Blog Pagination Section -->
    </main>

    <footer id="footer" class="footer position-relative light-background">
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="sitename">EduLearn</span>
            </a>
            <p>
              EduLearn adalah platform pendidikan online yang bertujuan untuk memberikan akses pendidikan berkualitas bagi semua. Kami menyediakan berbagai kursus dan sumber daya pembelajaran untuk membantu Anda meraih potensi terbaik dalam pendidikan.
            </p>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Tautan Berguna</h4>
            <ul>
              <li><a href="#">Beranda</a></li>
              <li><a href="#">Tentang Kami</a></li>
              <li><a href="#">Layanan</a></li>
              <li><a href="#">Syarat dan Ketentuan</a></li>
              <li><a href="#">Kebijakan Privasi</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div
            class="col-lg-3 col-md-12 footer-contact text-center text-md-start"
          >
            <h4>Contact Us</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p>United States</p>
            <p class="mt-4">
              <strong>Phone:</strong> <span>+1 5589 55488 55</span>
            </p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>
      </div>

      <div class="container copyright text-center mt-4">
        <p>
          © <span>Copyright</span> <strong class="sitename">Append</strong>
          <span>All Rights Reserved</span>
        </p>
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
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
