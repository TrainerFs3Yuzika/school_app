<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>School manajamen system</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/main1/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/main1/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">


<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/main1/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main1/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main1/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main1/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/main1/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/main1/css/main.css') }}" rel="stylesheet">


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">SchoolSync</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('login') }}">Masuk</a>
    </div>


    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      
      <img src="{{ asset('assets/main1/img/hero-bg.png') }}" alt="" class="img-fluid" data-aos="fade-in">



      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100"> Website SchoolSync</h2>
            <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with SchoolSync</p>
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="sign-up-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('assets/main1/img/clients/client-1.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('assets/main1/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('assets/main1/img/clients/client-3.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('assets/main1/img/clients/client-4.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('assets/main1/img/clients/client-5.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('assets/main1/img/clients/client-6.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">
          <div class="col-xl-5 content">
            <h3>Tentang SchoolSync</h3>
            <h2>Memadukan Pendidikan dan Teknologi untuk Masa Depan</h2>
            <p>SchoolSync adalah platform inovatif yang menghubungkan siswa, guru, dan orang tua dalam satu ekosistem pendidikan yang terintegrasi. Kami berkomitmen untuk meningkatkan kualitas pendidikan melalui teknologi, memudahkan akses informasi, dan mendorong kolaborasi antar semua pihak dalam proses pembelajaran.</p>
            <a href="{{ route('login') }}" class="read-more"><span>Masuk</span><i class="bi bi-arrow-right"></i></a>
          </div>
          

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">
        
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <i class="bi bi-info-circle"></i>
                        <h3>Informasi Yang Cepat</h3>
                        <p>Kami menyediakan informasi terkini dengan cepat dan akurat untuk memenuhi kebutuhan Anda.</p>
                    </div>
                </div> <!-- End Icon Box -->
        
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box">
                        <i class="bi bi-person-check"></i>
                        <h3>Tenaga Pengajar Terbaik di Bidangnya</h3>
                        <p>Tenaga pengajar kami adalah ahli di bidangnya, siap memberikan pembelajaran berkualitas tinggi.</p>
                    </div>
                </div> <!-- End Icon Box -->
        
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="icon-box">
                        <i class="bi bi-calendar-check"></i>
                        <h3>Informasi Jadwal</h3>
                        <p>Informasi jadwal kegiatan dan pelajaran tersedia untuk memastikan Anda tidak melewatkan sesuatu yang penting.</p>
                    </div>
                </div> <!-- End Icon Box -->
        
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box">
                        <i class="bi bi-trophy"></i>
                        <h3>Menghasilkan Lulusan Terbaik</h3>
                        <p>Kami berkomitmen untuk menghasilkan lulusan yang siap menghadapi tantangan dunia dan meraih sukses.</p>
                    </div>
                </div> <!-- End Icon Box -->
        
            </div>
        </div>
        

            </div>
          </div>

        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section" style="background-color: #333; color: #fff; padding: 50px 0;">
      <img src="{{ asset('assets/main1/img/stats-bg.jpg') }}" alt="" style="width: 100%; height: auto; border-bottom: 5px solid #fff;" data-aos="fade-in">

      <div class="container position-relative" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;" data-aos="fade-up" data-aos-delay="100">
          <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
              {{-- <div class="col-lg-3 col-md-6" style="flex: 1 1 calc(25% - 20px); box-sizing: border-box;">
                  <div class="stats-item text-center" style="background: #444; padding: 20px; border-radius: 8px; color: #fff; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                      <span id="clients" style="font-size: 36px; font-weight: bold;">0</span>
                      <p style="margin: 10px 0;">Jumlah Gedung</p>
                  </div>
              </div> --}}

              <div class="col-lg-3 col-md-6" style="flex: 1 1 calc(25% - 20px); box-sizing: border-box;">
                <div class="stats-item text-center" style="background: rgba(230, 229, 229, 0.7); padding: 20px; border-radius: 8px; color: #333; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span id="projects" style="font-size: 36px; font-weight: bold;">0</span>
                    <p style="margin: 10px 0;">Jumlah Guru</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" style="flex: 1 1 calc(25% - 20px); box-sizing: border-box;">
                <div class="stats-item text-center" style="background: rgba(230, 229, 229, 0.7); padding: 20px; border-radius: 8px; color: #fff; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span id="hours" style="font-size: 36px; font-weight: bold;">0</span>
                    <p style="margin: 10px 0;">Jumlah Siswa</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" style="flex: 1 1 calc(25% - 20px); box-sizing: border-box;">
                <div class="stats-item text-center" style="background: rgba(230, 229, 229, 0.7); padding: 20px; border-radius: 8px; color: #fff; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span id="workers" style="font-size: 36px; font-weight: bold;">0</span>
                    <p style="margin: 10px 0;">Jumlah Gedung</p>
                </div>
            </div>
            
          </div>
      </div>
  </section>

  <script>
      // Function to increment the counter
      function incrementCounter(id, endValue, duration) {
          const element = document.getElementById(id);
          let startValue = 0;
          const stepTime = Math.abs(Math.floor(duration / endValue));
          
          const timer = setInterval(() => {
              startValue += 1;
              element.textContent = startValue;
              
              if (startValue >= endValue) {
                  clearInterval(timer);
              }
          }, stepTime);
      }

      // Call the function for each counter
      incrementCounter('clients', 45, 1000);
      incrementCounter('projects', 30, 1000);
      incrementCounter('hours', 1453, 1000);
      incrementCounter('workers', 32, 1000);
  </script>


    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Ekstrakurikuler</h2>
        <p>Beragam kegiatan ekstrakurikuler yang mendukung pengembangan bakat dan minat siswa.</p>
      </div><!-- End Section Title -->
    
      <div class="container">
    
        <div class="row gy-4">
    
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-music-note-beamed"></i></div>
              <div>
                <h4 class="title"><a href="services-details.html" class="stretched-link">Kesenian</a></h4>
                <p class="description">Mengembangkan kreativitas siswa melalui berbagai kegiatan seni seperti musik, tari, dan teater.</p>
              </div>
            </div>
          </div><!-- End Service Item -->
    
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-football"></i></div>
              <div>
                <h4 class="title"><a href="services-details.html" class="stretched-link">Olahraga</a></h4>
                <p class="description">Meningkatkan kesehatan dan kerja sama tim melalui berbagai olahraga seperti sepak bola, basket, dan atletik.</p>
              </div>
            </div>
          </div><!-- End Service Item -->
    
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-lightbulb"></i></div>
              <div>
                <h4 class="title"><a href="services-details.html" class="stretched-link">Klub Akademik</a></h4>
                <p class="description">Mendalami berbagai mata pelajaran dan topik khusus melalui klub seperti matematika, sains, dan bahasa.</p>
              </div>
            </div>
          </div><!-- End Service Item -->
    
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-heart"></i></div>
              <div>
                <h4 class="title"><a href="services-details.html" class="stretched-link">Kegiatan Sosial</a></h4>
                <p class="description">Membantu masyarakat dan lingkungan melalui kegiatan sosial dan kemanusiaan.</p>
              </div>
            </div>
          </div><!-- End Service Item -->
    
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-laptop"></i></div>
              <div>
                <h4 class="title"><a href="services-details.html" class="stretched-link">Teknologi</a></h4>
                <p class="description">Mengembangkan keterampilan teknologi melalui program seperti coding, robotika, dan desain grafis.</p>
              </div>
            </div>
          </div><!-- End Service Item -->
    
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-book"></i></div>
              <div>
                <h4 class="title"><a href="services-details.html" class="stretched-link">Klub Buku</a></h4>
                <p class="description">Mengembangkan minat baca dan diskusi melalui klub buku dan literasi.</p>
              </div>
            </div>
          </div><!-- End Service Item -->
    
        </div>
    
      </div>
    
    </section><!-- /Services Section -->
    

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Motivasi Belajar</h2>
        <p>Temukan dorongan untuk terus belajar dan mencapai tujuan Anda dengan semangat dan dedikasi.</p>
    </div><!-- End Section Title -->
    
    <div class="container">
    
        <div class="row gy-4 align-items-center features-item">
            <div class="col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h3>Semangat Terus Belajar</h3>
                <p>
                    Pendidikan adalah kunci untuk masa depan yang lebih baik. Teruslah belajar dan berkembang untuk mencapai potensi terbaik Anda. Setiap langkah yang diambil adalah investasi untuk kesuksesan Anda di masa depan.
                </p>
                <a href="#" class="btn btn-get-started">Mulai Sekarang</a>
            </div>
            <div class="col-lg-7 order-1 order-lg-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                <div class="image-stack">
                    <img src="{{ asset('assets/main1/img/features-light-1.jpg') }}" alt="" class="stack-front">
                    <img src="{{ asset('assets/main1/img/features-light-2.jpg') }}" alt="" class="stack-back">
                </div>
            </div>
        </div><!-- Features Item -->
    
    </div>
    </div>
    

    {{-- <div class="row gy-4 align-items-stretch justify-content-between features-item">
      <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
          <img src="{{ asset('assets/main1/img/kr.png') }}" class="img-fluid" alt="" style="width: 100%; max-width: 400px; height: auto;">
      </div>
      <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
          <h3>Kurikulum Terbaik</h3>
          <p>Kurikulum kami dirancang untuk memenuhi kebutuhan pendidikan modern dengan pendekatan inovatif dan efektif.</p>
          <ul>
              <li><i class="bi bi-check"></i> <span>Materi pembelajaran yang up-to-date dan relevan.</span></li>
              <li><i class="bi bi-check"></i> <span>Pengajaran dari tenaga ahli dan berpengalaman.</span></li>
              <li><i class="bi bi-check"></i> <span>Fasilitas belajar yang lengkap dan mendukung.</span></li>
          </ul>
          <a href="#" class="btn btn-get-started align-self-start">Mulai Sekarang</a>
      </div>
  </div>
   --}}
  

    </section><!-- /Features Section -->

 <!-- Dokumentasi Section -->
<section id="portfolio" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
      <h2>Dokumentasi Kegiatan Siswa</h2>
      <p>Berikut adalah dokumentasi kegiatan siswa</p>
  </div>

  <div class="container">
      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
              @foreach($dokumentasi as $item)
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                      <img src="{{ asset('storage/gambar_dokumentasi/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->judul }}">
                      <div class="portfolio-info">
                          <h4>{{ $item->judul }}</h4>
                          <p>{{ $item->deskripsi }}</p>
                          <a href="{{ asset('storage/gambar_dokumentasi/' . $item->gambar) }}" title="{{ $item->judul }}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
</section>


<!-- Video Tutorials Section -->
<section id="video-tutorials" class="video-tutorials section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Video Tutorial</h2>
    <p>Tingkatkan pengalaman belajar Anda dengan video tutorial kami yang komprehensif</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="zoom-in" data-aos-delay="100">

    <div class="row g-4">

      <div class="col-lg-4">
        <div class="tutorial-item">
          <h3>Pengenalan E-Learning</h3>
          <div class="icon">
            <i class="bi bi-play-circle"></i>
          </div>
          <p>Pelajari tentang apa itu e-learning dan bagaimana platform ini bekerja.</p>
          <div class="video-container">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/0az0FYhOZJ0?si=3NLHDdk3cbyAIKQp" title="Video Pembelajaran Online" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

          </div>
        </div>
      </div><!-- End Tutorial Item -->

      <div class="col-lg-4">
        <div class="tutorial-item featured">
          <h3>Pengenalan Platform Pembelajaran Online</h3>
          <div class="icon">
            <i class="bi bi-star"></i>
          </div>
          <p>Ketahui lebih lanjut tentang platform pembelajaran online dan cara menggunakannya.</p>
          <div class="video-container">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/MkbXffgDgbw?si=354HMMQoWYWxDa6x" title="Video Pembelajaran Online" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

          </div>
        </div>
      </div><!-- End Tutorial Item -->

      <div class="col-lg-4">
        <div class="tutorial-item">
          <h3>Bagaimana Menggunakan Platform Pembelajaran Online</h3>
          <div class="icon">
            <i class="bi bi-book"></i>
          </div>
          <p>Pelajari cara menggunakan berbagai platform pembelajaran online dengan efektif.</p>
          <div class="video-container">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/IaTT-qg9YA4?si=HcOhUF2bx09jMT3W" title="Video Pembelajaran Online" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

          </div>
        </div>
      </div><!-- End Tutorial Item -->

    </div>

  </div>

</section><!-- /Video Tutorials Section -->




    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="content px-xl-5">
              <h3><span>Pertanyaan yang </span><strong>Sering Diajukan</strong></h3>
              <p>
                Temukan jawaban atas pertanyaan umum tentang sistem pendidikan kami, metode pengajaran, dan fasilitas yang kami sediakan.
              </p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3><span class="num">1.</span> <span>Bagaimana cara mendaftar di sekolah ini?</span></h3>
                <div class="faq-content">
                  <p>Untuk mendaftar, Anda dapat mengunjungi halaman pendaftaran di situs web kami dan mengisi formulir pendaftaran yang tersedia. Tim kami akan menghubungi Anda untuk langkah selanjutnya.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">2.</span> <span>Apa saja fasilitas yang tersedia di sekolah ini?</span></h3>
                <div class="faq-content">
                  <p>Sekolah kami dilengkapi dengan berbagai fasilitas modern seperti laboratorium sains, perpustakaan, ruang komputer, lapangan olahraga, dan ruang seni untuk mendukung kegiatan belajar mengajar.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">3.</span> <span>Bagaimana metode pengajaran yang digunakan?</span></h3>
                <div class="faq-content">
                  <p>Kami menggunakan metode pengajaran yang interaktif dan inovatif, termasuk pembelajaran berbasis proyek, diskusi kelompok, dan penggunaan teknologi dalam kelas untuk meningkatkan pengalaman belajar siswa.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">4.</span> <span>Apakah ada program ekstrakurikuler?</span></h3>
                <div class="faq-content">
                  <p>Ya, kami menawarkan berbagai program ekstrakurikuler seperti klub sains, klub olahraga, klub seni, dan kegiatan sosial untuk mengembangkan bakat dan minat siswa di luar akademik.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">5.</span> <span>Bagaimana cara menghubungi pihak sekolah?</span></h3>
                <div class="faq-content">
                  <p>Anda dapat menghubungi kami melalui halaman kontak di situs web kami, atau langsung mengunjungi kantor administrasi sekolah pada jam kerja. Kami siap membantu Anda dengan segala pertanyaan dan kebutuhan informasi.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Team Section -->
    <section id="team" class="team section light-background">

      <!-- Section Title -->
<!--==================== BEST TEACHERS ====================-->
<?php
        
use App\Models\Teacher; // Menggunakan model Teacher

// Ambil tiga data guru teratas berdasarkan ID paling atas
$teachers = Teacher::orderBy('id', 'desc')->get();

?>
<section class="section team" id="team">
  <div class="container section-title" data-aos="fade-up">
    <h2>Tenaga Pengajar</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-5">
      @foreach ($teachers as $index => $teacher)
        <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
          <div class="member-img">
            <img src="{{ asset('assets/main1/img/team/team-1.jpg') }}" class="img-fluid" alt="Team Image">

            <div class="social">
              @if ($teacher->twitter)
                <a href="{{ $teacher->twitter }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
              @endif
              @if ($teacher->facebook)
                <a href="{{ $teacher->facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
              @endif
              @if ($teacher->instagram)
                <a href="{{ $teacher->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
              @endif
              @if ($teacher->linkedin)
                <a href="{{ $teacher->linkedin }}" target="_blank"><i class="bi bi-linkedin"></i></a>
              @endif
            </div>
          </div>
          <div class="member-info text-center">
            <h4>{{ $teacher->full_name }}</h4>
            <span>{{ $teacher->position }}</span>
            <p>{{ $teacher->description }}</p>
          </div>
        </div><!-- End Team Member -->
      @endforeach
    </div>
  </div>
</section>

<section class="section eskul" id="eskul">
  <div class="container section-title" data-aos="fade-up">
    <h2>Daftar terpaporit Ekstrakurikuler</h2>
    <p>Temukan berbagai kegiatan ekstrakurikuler yang tersedia di sekolah</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-5">
      @foreach ($eskuls as $index => $eskul)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
          <div class="card" style="width: 18rem; height: 100%;">
            <img src="{{ asset('images/' . $eskul->gambar) }}" class="card-img-top" alt="{{ $eskul->nama_eskul }}" style="height: 100%; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">{{ $eskul->nama_eskul }}</h5>
              <p class="card-text">Dipimpin oleh: {{ $eskul->pembina }}</p>
              <p class="card-text">Waktu: {{ $eskul->waktu_eskul }}</p>
              <button class="btn btn-primary" onclick="showLoginAlert('{{ route('eskuls.show', $eskul->id) }}')">Detail</button>
            </div>
          </div>
        </div><!-- End Eskul Card -->
      @endforeach
    </div>
  </div>
</section>

<script>
function showLoginAlert(detailUrl) {
    Swal.fire({
        title: 'Perhatian',
        text: 'Maaf, Anda harus login terlebih dahulu.',
        icon: 'warning',
        confirmButtonText: 'OK',
        // Menambahkan listener untuk tombol OK
        confirmButtonColor: '#3085d6',
        showCancelButton: false,
        backdrop: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '{{ route('login') }}'; // Redirect ke halaman login
        }
    });
}
</script>

<!--==================== TOP STUDENTS ====================-->
<section class="section team" id="top-students">
  <div class="container section-title" data-aos="fade-up">
    <h2>Top 3 Students</h2>
    <p>Discover the top performing students based on their achievements and scores.</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-5">
      @foreach ($topStudents as $index => $score)
        <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
          <div class="member-img">
            <!-- Ganti dengan gambar siswa yang sesuai -->
            <img src="{{ asset('assets/main1/img/team/team-1.jpg') }}" class="img-fluid" alt="Student Image">

            <div class="social">
              <!-- Menambahkan informasi sosial media atau tambahan lainnya jika ada -->
            </div>
          </div>
          <div class="member-info text-center">
            <h4>{{ $score->student->first_name }} {{ $score->student->last_name }}</h4>
            <span>Score: {{ $score->score }}</span>
            <!-- Tambahkan informasi lain jika diperlukan -->
          </div>
        </div><!-- End Team Member -->
      @endforeach
    </div>
  </div>
</section>



<section class="section books" id="books">
  <div class="container section-title" data-aos="fade-up">
    <h2>Buku-Buku Unggulan</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-5">
      @foreach ($books as $index => $book)
        <div class="col-lg-4 col-md-6 book" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
          <div class="book-img">
            <img src="{{ asset('storage/' . $book->gambar) }}" class="img-fluid" alt="{{ $book->judul }}">

            <div class="book-info text-center">
              <h4>{{ $book->judul }}</h4>
              <p>Penulis: {{ $book->penulis }}</p>
              <p>Penerbit: {{ $book->penerbit }}</p>
              <p>Tahun Terbit: {{ $book->tahun_terbit }}</p>
              <p>Genre: {{ $book->genre }}</p>

              <!-- Button Pinjam dengan CSS Inline -->
              <button 
                style="
                  display: inline-block;
                  padding: 10px 20px;
                  font-size: 16px;
                  font-weight: bold;
                  color: #fff;
                  background-color: #007bff;
                  border: none;
                  border-radius: 5px;
                  cursor: pointer;
                  transition: background-color 0.3s ease, transform 0.3s ease;
                "
                onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';"
                onmouseout="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';"
                onclick="checkLogin()"
              >
                Pinjam
              </button>
            </div>
          </div>
        </div><!-- End Book Item -->
      @endforeach
    </div>
  </div>
</section>

<script>
  function checkLogin() {
    @if (auth()->guest())
      Swal.fire({
        title: 'Maaf',
        text: 'Anda harus login terlebih dahulu',
        icon: 'warning',
        confirmButtonText: 'OK',
        confirmButtonColor: '#3085d6',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '{{ route('login') }}';
        }
      });
    @else
      // Logic for borrowing the book goes here
    @endif
  }
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>



    </section><!-- /Team Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="{{ asset('assets/main1/img/cta-bg.jpg') }}" alt="Background Image">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Call To Action</h3>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="#">Call To Action</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->

    <!-- Testimonials Section -->
<!-- Bagian Testimonial -->
<section id="testimonials" class="testimonials section light-background">

  <div class="container">

    <div class="row align-items-center">

      <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
        <h3>Apa Kata Mereka Tentang Sekolah Kami</h3>
        <p>
          Simak pengalaman siswa, orang tua, dan guru tentang dampak pendidikan di sekolah kami. Komunitas sekolah kami dibangun atas dasar nilai bersama dan komitmen terhadap keunggulan.
        </p>
      </div>

      <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

        <div class="swiper init-swiper">
          <!-- Skrip Inisialisasi Swiper JS -->
          <script>
            document.addEventListener('DOMContentLoaded', function () {
              var swiper = new Swiper('.swiper', {
                loop: true,
                speed: 600,
                autoplay: {
                  delay: 5000
                },
                slidesPerView: 'auto',
                pagination: {
                  el: '.swiper-pagination',
                  type: 'bullets',
                  clickable: true
                }
              });
            });
          </script>

          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="d-flex">
                  <img src="{{ asset('assets/main1/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img flex-shrink-0" alt="Gambar Testimonial Siswa">
                  <div>
                    <h3>Anna Smith</h3>
                    <h4>Siswa</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Menjadi siswa di sekolah ini adalah pengalaman yang mengubah hidup saya. Para guru berdedikasi, dan komunitasnya mendukung. Saya merasa siap untuk masa depan, baik secara akademis maupun pribadi.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- Akhir item testimonial -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="d-flex">
                  <img src="{{ asset('assets/main1/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img flex-shrink-0" alt="Gambar Testimonial Orang Tua">
                  <div>
                    <h3>John Doe</h3>
                    <h4>Orang Tua</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Kami telah melihat pertumbuhan yang luar biasa pada anak kami sejak bergabung dengan sekolah ini. Komitmen terhadap keunggulan akademis dan pengembangan pribadi sangat terlihat dalam setiap aspek pendekatan sekolah.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- Akhir item testimonial -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="d-flex">
                  <img src="{{ asset('assets/main1/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img flex-shrink-0" alt="Gambar Testimonial Guru">
                  <div>
                    <h3>Ms. Laura Green</h3>
                    <h4>Guru</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Mengajar di sekolah ini sangat memuaskan. Antusiasme dan dedikasi siswa membuat setiap hari menjadi berarti, dan dukungan dari pihak administrasi sangat luar biasa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- Akhir item testimonial -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="d-flex">
                  <img src="{{ asset('assets/main1/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img flex-shrink-0" alt="Gambar Testimonial Alumni">
                  <div>
                    <h3>Michael Johnson</h3>
                    <h4>Alumni</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Keterampilan dan pengetahuan yang saya peroleh dari sekolah ini sangat berharga dalam karier saya. Pendidikan yang saya terima memberikan dasar yang solid yang mendukung saya sepanjang hidup profesional saya.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- Akhir item testimonial -->

            <!-- Item swiper-slide tambahan dapat ditambahkan di sini -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </div>

  </div>

</section><!-- /Bagian Testimonial -->

    

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Jurusan</h2>
        <p>Jelajahi berbagai jurusan yang tersedia di sekolah kami, mulai dari IPA, IPS, Bahasa, Agama, hingga Kejuruan.</p>
      </div><!-- End Section Title -->
    
      <div class="container">
    
        <div class="row gy-4">
    
          <!-- IPA -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <article>
              <div class="post-img">
                <img src="{{ asset('assets/main1/img/jurusan/ipa.png') }}" alt="Jurusan IPA" class="img-fluid">
              </div>
              <p class="post-category">IPA</p>
              <h2 class="title">
                <a href="jurusan-ipa.html">Jurusan Ilmu Pengetahuan Alam</a>
              </h2>
              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-author">Sekolah Kami</p>
                </div>
              </div>
            </article>
          </div><!-- End post list item -->
    
          <!-- IPS -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <article>
              <div class="post-img">
                <img src="{{ asset('assets/main1/img/jurusan/ips.jpg') }}" alt="Jurusan IPS" class="img-fluid">
              </div>
              <p class="post-category">IPS</p>
              <h2 class="title">
                <a href="jurusan-ips.html">Jurusan Ilmu Pengetahuan Sosial</a>
              </h2>
              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-author">Sekolah Kami</p>
                </div>
              </div>
            </article>
          </div><!-- End post list item -->          
          <!-- olahraga -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <article>
              <div class="post-img">
                <img src="{{ asset('assets/main1/img/jurusan/olg.jpg') }}" alt="Jurusan olahraga" class="img-fluid">
              </div>
              <p class="post-category">Olahraga</p>
              <h2 class="title">
                <a href="jurusan-ips.html">Olahraga</a>
              </h2>
              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-author">Sekolah Kami</p>
                </div>
              </div>
            </article>
          </div><!-- End post list item -->
    
          <!-- Bahasa -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>
              <div class="post-img">
                <img src="{{ asset('assets/main1/img/jurusan/bahasa.jpg') }}" alt="Jurusan Bahasa" class="img-fluid">
              </div>
              <p class="post-category">Bahasa</p>
              <h2 class="title">
                <a href="jurusan-bahasa.html">Jurusan Bahasa</a>
              </h2>
              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-author">Sekolah Kami</p>
                </div>
              </div>
            </article>
          </div><!-- End post list item -->
    
          <!-- Agama -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <article>
              <div class="post-img">
                <img src="{{ asset('assets/main1/img/jurusan/agama.jpg') }}" alt="Jurusan Agama" class="img-fluid">
              </div>
              <p class="post-category">Agama</p>
              <h2 class="title">
                <a href="jurusan-agama.html">Jurusan Agama</a>
              </h2>
              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-author">Sekolah Kami</p>
                </div>
              </div>
            </article>
          </div><!-- End post list item -->
    
          <!-- Kejuruan -->
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <article>
              <div class="post-img">
                <img src="{{ asset('assets/main1/img/jurusan/kejuruan.jpg') }}" alt="Jurusan Kejuruan" class="img-fluid">
              </div>
              <p class="post-category">Kejuruan</p>
              <h2 class="title">
                <a href="jurusan-kejuruan.html">Jurusan Kejuruan</a>
              </h2>
              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-author">Sekolah Kami</p>
                </div>
              </div>
            </article>
          </div><!-- End post list item -->
    
        </div><!-- End recent posts list -->
    
      </div>
    
    </section><!-- /Recent Posts Section -->
    

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Hubungi kami untuk informasi lebih lanjut atau bantuan. Kami siap membantu!</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <!-- Alamat -->
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  @foreach ($contacts as $contact)
                    <p>{{ $contact->address }}</p>
                  @endforeach
                </div>
              </div><!-- End Info Item -->
            
              <!-- Telepon -->
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  @foreach ($contacts as $contact)
                    <p>{{ $contact->phone_number }}</p>
                    <p>{{ $contact->alternate_phone_number }}</p> <!-- Jika ada nomor telepon alternatif -->
                  @endforeach
                </div>
              </div><!-- End Info Item -->
            
              <!-- Email -->
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  @foreach ($contacts as $contact)
                    <p>{{ $contact->email }}</p>
                    <p>{{ $contact->alternate_email }}</p> <!-- Jika ada email alternatif -->
                  @endforeach
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Senin - Sabtu</p>
                  <p>07:00 WIB - 17:00 WIB</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

<!-- resources/views/landing_page/index.blade.php -->
<div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
  <h2 style="text-align: center; margin-bottom: 20px; font-size: 24px;">Send Us a Message</h2>

  @if (session('success'))
      <div style="padding: 15px; margin-bottom: 20px; border: 1px solid #d4edda; border-radius: 4px; background-color: #d4edda; color: #155724;">
          {{ session('success') }}
      </div>
  @endif

  <form action="{{ route('faq.store') }}" method="POST" style="display: flex; flex-direction: column;">
      @csrf
      <div style="margin-bottom: 15px;">
          <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
          <input type="text" name="name" id="name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;" required>
      </div>
      <div style="margin-bottom: 15px;">
          <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
          <input type="email" name="email" id="email" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;" required>
      </div>
      <div style="margin-bottom: 15px;">
          <label for="subject" style="display: block; font-weight: bold; margin-bottom: 5px;">Subject</label>
          <input type="text" name="subject" id="subject" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px;" required>
      </div>
      <div style="margin-bottom: 15px;">
          <label for="message" style="display: block; font-weight: bold; margin-bottom: 5px;">Message</label>
          <textarea name="message" id="message" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px; resize: vertical;" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-danger">Send Message</button>
  </form>
</div>


        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <!-- Bagian Logo dan Deskripsi -->
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            {{-- <img src="{{ asset('assets/img/logo1.png') }}" alt="" class="footer__logo-img" style="width: 120px; height: auto;"> --}}
            <span class="sitename">SchoolSync</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            @foreach ($contacts as $contact)
                @if ($contact->facebook)
                    <a href="{{ $contact->facebook }}" target="_blank" class="d-flex align-items-center">
                        <i class="bi bi-facebook"></i>
                    </a>
                @endif
                @if ($contact->instagram)
                    <a href="{{ $contact->instagram }}" target="_blank" class="d-flex align-items-center">
                        <i class="bi bi-instagram"></i>
                    </a>
                @endif
                @if ($contact->twitter)
                    <a href="{{ $contact->twitter }}" target="_blank" class="d-flex align-items-center">
                        <i class="bi bi-twitter"></i>
                    </a>
                @endif
                @if ($contact->github)
                    <a href="{{ $contact->github }}" target="_blank" class="d-flex align-items-center">
                        <i class="bi bi-github"></i>
                    </a>
                @endif
            @endforeach
          </div>
        </div>

        <!-- Bagian Links Berguna -->
        <div class="col-lg-2 col-6 footer-links">
          <h4>Informasi Kontak</h4>
          @foreach ($contacts as $contact)
              <p><i class="fas fa-envelope"></i> {{ $contact->email }}</p>
              <p><i class="fas fa-phone"></i> {{ $contact->phone_number }}</p>
              <p><i class="fas fa-map-marker-alt"></i> {{ $contact->address }}</p>
              <p><i class="fab fa-whatsapp"></i> {{ $contact->whatsapp }}</p>
          @endforeach
        </div>

        <!-- Bagian Layanan Kami -->
        <div class="col-lg-2 col-6 footer-links">
          <h4>Sosial Media</h4>
          @foreach ($contacts as $contact)
              <p><i class="fab fa-twitter"></i> <a href="{{ $contact->twitter }}" target="_blank" style="text-decoration: none; color: inherit;">Twitter</a></p>
              <p><i class="fab fa-facebook"></i> <a href="{{ $contact->facebook }}" target="_blank" style="text-decoration: none; color: inherit;">Facebook</a></p>
              <p><i class="fab fa-instagram"></i> <a href="{{ $contact->instagram }}" target="_blank" style="text-decoration: none; color: inherit;">Instagram</a></p>
              <p><i class="fab fa-github"></i> <a href="{{ $contact->github }}" target="_blank" style="text-decoration: none; color: inherit;">GitHub</a></p>
          @endforeach
        </div>

        <!-- Bagian Ikuti Kami -->
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Ikuti Kami</h4>
          <p>Tersambung dengan kami pada media sosial untuk informasi baru</p>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="sitename">SchoolSync</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="mailto:Mulqipadilah0101@gmail.com">Mulqi M Padil</a>
      </div>
    </div>

    <!-- Gambar Footer -->
    {{-- <img src="{{ asset('assets/main/img/footer1-img.png') }}" alt="" class="footer__img-one">
    <img src="{{ asset('assets/main/img/footer2-img.png') }}" alt="" class="footer__img-two"> --}}

</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/main1/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/main1/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/main1/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/main1/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/main1/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>

  

  <!-- Main JS File -->
  <script src="{{ asset('assets/main1/js/main.js') }}"></script>

</body>

</html>