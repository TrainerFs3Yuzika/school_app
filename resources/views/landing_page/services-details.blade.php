<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Index - Append Bootstrap Template</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

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

  <body class="services-details-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
      <div
        class="container-fluid position-relative d-flex align-items-center justify-content-between"
      >
        <a
          href="index.html"
          class="logo d-flex align-items-center me-auto me-xl-0"
        >
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">Append</h1>
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
                <h1>Services Details</h1>
                <p class="mb-0">
                  Odio et unde deleniti. Deserunt numquam exercitationem.
                  Officiis quo odio sint voluptas consequatur ut a odio
                  voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi
                  ratione sint. Sit quaerat ipsum dolorem.
                </p>
              </div>
            </div>
          </div>
        </div>
        <nav class="breadcrumbs">
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li class="current">Services Details</li>
            </ol>
          </div>
        </nav>
      </div>
      <!-- End Page Title -->

      <!-- Service Details Section -->
      <section id="service-details" class="service-details section">
        <div class="container">
          <div class="row gy-5">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="service-box">
                <h4>Serices List</h4>
                <div class="services-list">
                  <a href="#" class="active"
                    ><i class="bi bi-arrow-right-circle"></i
                    ><span>Web Design</span></a
                  >
                  <a href="#"
                    ><i class="bi bi-arrow-right-circle"></i
                    ><span>Web Design</span></a
                  >
                  <a href="#"
                    ><i class="bi bi-arrow-right-circle"></i
                    ><span>Product Management</span></a
                  >
                  <a href="#"
                    ><i class="bi bi-arrow-right-circle"></i
                    ><span>Graphic Design</span></a
                  >
                  <a href="#"
                    ><i class="bi bi-arrow-right-circle"></i
                    ><span>Marketing</span></a
                  >
                </div>
              </div>
              <!-- End Services List -->

              <div class="service-box">
                <h4>Download Catalog</h4>
                <div class="download-catalog">
                  <a href="#"
                    ><i class="bi bi-filetype-pdf"></i
                    ><span>Catalog PDF</span></a
                  >
                  <a href="#"
                    ><i class="bi bi-file-earmark-word"></i
                    ><span>Catalog DOC</span></a
                  >
                </div>
              </div>
              <!-- End Services List -->

              <div
                class="help-box d-flex flex-column justify-content-center align-items-center"
              >
                <i class="bi bi-headset help-icon"></i>
                <h4>Have a Question?</h4>
                <p class="d-flex align-items-center mt-2 mb-0">
                  <i class="bi bi-telephone me-2"></i>
                  <span>+1 5589 55488 55</span>
                </p>
                <p class="d-flex align-items-center mt-1 mb-0">
                  <i class="bi bi-envelope me-2"></i>
                  <a href="mailto:contact@example.com">contact@example.com</a>
                </p>
              </div>
            </div>

            <div
              class="col-lg-8 ps-lg-5"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <img
                src="assets/img/services.jpg"
                alt=""
                class="img-fluid services-img"
              />
              <h3>
                Temporibus et in vero dicta aut eius lidero plastis trand lined
                voluptas dolorem ut voluptas
              </h3>
              <p>
                Blanditiis voluptate odit ex error ea sed officiis deserunt.
                Cupiditate non consequatur et doloremque consequuntur.
                Accusantium labore reprehenderit error temporibus saepe
                perferendis fuga doloribus vero. Qui omnis quo sit. Dolorem
                architecto eum et quos deleniti officia qui.
              </p>
              <ul>
                <li>
                  <i class="bi bi-check-circle"></i>
                  <span>Aut eum totam accusantium voluptatem.</span>
                </li>
                <li>
                  <i class="bi bi-check-circle"></i>
                  <span
                    >Assumenda et porro nisi nihil nesciunt voluptatibus.</span
                  >
                </li>
                <li>
                  <i class="bi bi-check-circle"></i>
                  <span>Ullamco laboris nisi ut aliquip ex ea</span>
                </li>
              </ul>
              <p>
                Est reprehenderit voluptatem necessitatibus asperiores neque sed
                ea illo. Deleniti quam sequi optio iste veniam repellat odit.
                Aut pariatur itaque nesciunt fuga.
              </p>
              <p>
                Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam
                aut consequuntur recusandae mollitia doloremque est architecto
                cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex
                repellendus eveniet velit sint quia sapiente cumque. Et ipsa
                perferendis ut nihil. Laboriosam vel voluptates tenetur nostrum.
                Eaque iusto cupiditate et totam et quia dolorum in. Sunt
                molestiae ipsum at consequatur vero. Architecto ut pariatur
                autem ad non cumque nesciunt qui maxime. Sunt eum quia impedit
                dolore alias explicabo ea.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- /Service Details Section -->
    </main>

    <footer id="footer" class="footer position-relative light-background">
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="sitename">Append</span>
            </a>
            <p>
              Cras fermentum odio eu feugiat lide par naso tierra. Justo eget
              nada terra videa magna derita valies darta donna mare fermentum
              iaculis eu non diam phasellus.
            </p>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
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
