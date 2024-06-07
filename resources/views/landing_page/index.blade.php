<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fortune</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="{{ asset('images/logo1.png') }}" alt="Fortune Logo">
          <span class="ms-2" style="color: #cf00ff;">SchoolSync</span>

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
            <li class="nav-item"><a class="nav-link" href="#tutors">Tutors</a></li>
            <li class="nav-item"><a class="nav-link" href="#partners">Partners</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          </ul>
        </div>
        <!-- Search Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button type="button" class="btn btn-outline-secondary me-2" type="submit">Search</button>
                <button type="button" class="btn btn-outline-primary" type="submit">Login</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="wrapper">
      <!-- untuk home -->
      <section id="home" style="padding-top: 70px;"> <!-- Sesuaikan nilai padding-top dengan tinggi navbar -->
        <img src="https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg?size=626&ext=jpg&ga=GA1.2.1769275626.1605867161" />
        <div class="kolom">
            <h2 class="deskripsi">Manajemen Class</h2>
            <h2>Tetap Sehat, Tetap Semangat</h2>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt,
                nobis.
            </p>
            <p><a href="#" class="tbl-pink">Kunjungi</a></p>
        </div>
    </section>
    

      <!-- untuk courses -->
      <section id="courses">
        <div class="kolom">
          <p class="deskripsi">You Will Need This</p>
          <h2>Online Courses</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
            deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis!
            Delectus exercitationem dolores sapiente?
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
            deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis!
            Delectus exercitationem dolores sapiente?
          </p>
          <p><a href="" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
        </div>
        <img
          src="https://img.freepik.com/free-vector/online-learning-isometric-concept_1284-17947.jpg?size=626&ext=jpg&ga=GA1.2.1769275626.1605867161"
        />
      </section>

      {{-- About --}}
      <section id="courses">
        <div class="kolom">
          <h2>Abouts Us</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
            deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis!
            Delectus exercitationem dolores sapiente?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
            deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis!
            Delectus exercitationem dolores sapiente?
          </p>
          <p><a href="" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
        </div>

      </section>
      <!-- untuk courses -->
      <h2>Perpustakaan </h2>
      <div class="row">
        <?php $topSixBooks = $books->sortByDesc('id')->take(6); ?>
        <?php foreach ($topSixBooks as $key => $book): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="https://png.pngtree.com/background/20230604/original/pngtree-library-book-shelves-with-help-desk-education-background-illustration-picture-image_2873053.jpg" class="card-img-top" alt="Perpustakaan">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book->judul ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Penulis: <?= $book->penulis ?></h6>
                        <p class="card-text">Penerbit: <?= $book->penerbit ?></p>
                        <p class="card-text">Tahun Terbit: <?= $book->tahun_terbit ?></p>
                        <p class="card-text">Genre: <?= $book->genre ?></p>
                        <p class="card-text">Stok: <?= $book->stok ?></p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
      <!-- untuk Event -->
      <section id="evet">
        <div class="tengah">
          <div class="kolom">
            <p class="deskripsi">Event Calender</p>
            <h2>Event</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad,
              optio!
            </p>
            <p><a href="" class="tbl-biru">Kunjungi</a></p>
          </div>
        </div>
      </section>

      {{-- Kurikulum --}}

      <section id="courses" style="padding: 50px 0; background-color: #f9f9f9; border-radius: 20px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="course-info" style="padding-right: 20px;">
                <h2 style="color: #333; font-size: 36px; font-weight: bold; margin-bottom: 20px;">Kurikulum Yang Digunakan</h2>
                <h3 style="color: #666; font-size: 24px; margin-bottom: 20px;">Kurikulum Merdeka</h3>
                <p style="color: #666; font-size: 18px; line-height: 1.6;">Kurikulum Merdeka memberikan kebebasan bagi siswa untuk mengeksplorasi minat dan bakat mereka, mempersiapkan mereka untuk tantangan masa depan.</p>
                <a href="#" class="btn btn-primary" style="background-color: #0056b3; color: #fff; padding: 15px 30px; font-size: 18px; text-decoration: none; display: inline-block; margin-top: 20px; border-radius: 30px;">Pelajari Lebih Lanjut</a>
              </div>
            </div>
            <div class="col-md-6 text-center" style="overflow: hidden; border-radius: 0 20px 20px 0;">
              <img src="/images/kr.png" alt="Kurikulum Merdeka Logo" style="max-width: 100%; border-radius: 0 20px 20px 0;">
            </div>
            
          </div>
        </div>
      </section>
      

      <!-- untuk jadwal guru -->
      <section id="jadwal-guru">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="tengah">
                        <div class="kolom">
                            <p class="deskripsi">Jadwal Guru</p>
                            <h2>Jadwal Guru</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!</p>
                        </div>
                        <div class="jadwal-list">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Mata Pelajaran</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Hari</th>
                                            <th scope="col">Waktu Mulai</th>
                                            <th scope="col">Waktu Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($jadwalGuru as $key => $jadwal)
                                      <tr>
                                          <td>{{ ++$key }}</td> <!-- Nomor urut -->
                                          <td>{{ $jadwal->subject->subject_name }}</td> <!-- Mata Pelajaran -->
                                          <td>{{ $jadwal->class }}</td> <!-- Kelas -->
                                          <td>{{ $jadwal->days }}</td> <!-- Hari -->
                                          <td>{{ $jadwal->time_start }}</td> <!-- Waktu Mulai -->
                                          <td>{{ $jadwal->time_end }}</td> <!-- Waktu Selesai -->
                                      </tr>
                                      @endforeach
                                      
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    



      <?php

use App\Models\Teacher; // Menggunakan model Teacher

// Ambil tiga data guru teratas berdasarkan ID paling atas
$teachers = Teacher::orderBy('id', 'desc')->take(3)->get();

?>

<section id="guru">
    <div class="tengah">
        <div class="kolom">
            <h2>Best Teacher</h2>
            <p>
                Dapatkan bimbingan dari para ahli di bidangnya untuk meningkatkan hasil belajar Anda
            </p>
        </div>

        <div class="tutor-list">
            <?php foreach ($teachers as $teacher): ?>
                <div class="kartu-tutor">
                    <p><?= $teacher->full_name ?></p> <!-- Menggunakan field full_name dari model Teacher -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


      <!-- untuk partners -->
      <section id="partners">
        <div class="tengah">
          <div class="kolom">
            <p class="deskripsi">Our Top Partners</p>
            <h2>Partners</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi
              magni tempore expedita sequi. Similique rerum doloremque impedit
              saepe atque maxime.
            </p>
          </div>

          <div class="partner-list">
            <div class="kartu-partner">
              <img
                src="https://img.freepik.com/premium-vector/university-campus-logo_1447-1793.jpg"
              />
            </div>
            <div class="kartu-partner">
              <img
                src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-63.jpg"
              />
            </div>
            <div class="kartu-partner">
              <img
                src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-62.jpg"
              />
            </div>
            <div class="kartu-partner">
              <img
                src="https://img.freepik.com/premium-vector/university-campus-logo_1447-1790.jpg"
              />
            </div>
            <div class="kartu-partner">
              <img
                src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-64.jpg"
              />
            </div>
          </div>
        </div>
      </section>      
      
      {{-- untuk ekstrakulikuller --}}

      <section id="partners">
        <div class="tengah">
          <div class="kolom">
            <h2 class="deskripsi">Ekstrakulikuller Di sekolah Kami</h2>
            <p>
              "Ekskul di sekolah SchoolSync adalah wadah yang luar biasa bagi siswa untuk mengeksplorasi minat dan bakat mereka. Berbagai kegiatan yang menarik dan bermanfaat diselenggarakan di sana, memberikan kesempatan bagi siswa untuk tumbuh dan berkembang. Para siswa dapat menemukan diri mereka sendiri melalui partisipasi aktif dalam ekskul ini, yang juga merupakan bagian integral dari pengalaman belajar mereka di SchoolSync."
            </p>
          </div>

          <div class="partner-list">
            <div class="kartu-partner">
              <img
                src="https://img.freepik.com/premium-vector/university-campus-logo_1447-1793.jpg"
              />
            </div>
            <div class="kartu-partner">
              <img
                src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-63.jpg"
              />
            </div>
            <div class="kartu-partner">
              <img
                src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-62.jpg"
              />
            </div>
            <div class="kartu-partner">
              <img
                src="https://img.freepik.com/premium-vector/university-campus-logo_1447-1790.jpg"
              />
            </div>
            <div class="kartu-partner">
              <img
                src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-64.jpg"
              />
            </div>
          </div>
        </div>
      </section>


        <div class="container" id="nilai_siswa">
          <h2 class="text-center">Best Students</h2>
          <div class="card-container">
              @foreach($topStudents as $score)
                  <div class="card">
                      <div class="card-content">
                          <h3> {{ $score->student->first_name }} {{ $score->student->last_name }}</h3>
                          <p>Nilai: {{ $score->score }}</p>
                          <p>Mata Pelajaran: {{ $score->subject->subject_name }}</p>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
    </div>
          <!-- tambahan untuk Sistem Manajemen Sekolah -->
    {{-- <section id="sistem-manajemen-sekolah">
      <div class="tengah">
        <div class="kolom">
          <p class="deskripsi">Sistem Manajemen Sekolah</p>
          <h2>Sistem Manajemen Sekolah</h2>
          <p>
            Sistem Manajemen Sekolah adalah platform yang membantu sekolah dalam
            mengelola kegiatan sehari-hari, termasuk jadwal pelajaran, absensi
            siswa, dan komunikasi dengan orang tua.
          </p>
        </div>

        <div class="sistem-list">
          <div class="kartu-sistem">
            <div class="card">
              <p>Senin - Matematika</p>
            </div>
          </div>
          <div class="kartu-sistem">
            <div class="card">
              <p>Selasa - Bahasa Inggris</p>
            </div>
          </div>
          <div class="kartu-sistem">
            <div class="card">
              <p>Rabu - Fisika</p>
            </div>
          </div>
          <div class="kartu-sistem">
            <div class="card">
              <p>Kamis - Biologi</p>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
<!-- resources/views/layouts/footer.blade.php -->
<div id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb-4">
        <h3>Company</h3>
        @foreach ($contacts as $contact)
        <p>{{ $contact->name }}</p>
        <p>Your company slogan or description here.</p>
        @endforeach
      </div>
      <div class="col-md-3 mb-4">
        <h3>Contact Information</h3>
        @foreach ($contacts as $contact)
        <p><i class="fas fa-envelope"></i> {{ $contact->email }}</p>
        <p><i class="fas fa-phone"></i> {{ $contact->phone_number }}</p>
        <p><i class="fas fa-map-marker-alt"></i> {{ $contact->address }}</p>
        <p><i class="fab fa-whatsapp"></i> {{ $contact->whatsapp }}</p>
        @endforeach
      </div>
      <div class="col-md-3 mb-4">
        <h3>Social Media</h3>
        @foreach ($contacts as $contact)
        <p><i class="fab fa-twitter"></i> <a href="{{ $contact->twitter }}" target="_blank" style="text-decoration: none;">Twitter</a></p>
        <p><i class="fab fa-facebook"></i> <a href="{{ $contact->facebook }}" target="_blank" style="text-decoration: none;">Facebook</a></p>
        <p><i class="fab fa-instagram"></i> <a href="{{ $contact->instagram }}" target="_blank" style="text-decoration: none;">Instagram</a></p>
        <p><i class="fab fa-github"></i> <a href="{{ $contact->github }}" target="_blank" style="text-decoration: none;">GitHub</a></p>
        @endforeach
      </div>
      <div class="col-md-3 mb-4">
        <h3>Follow Us</h3>
        <p>Connect with us on social media for updates.</p>
      </div>
    </div>
  </div>
</div>



    <div id="copyright">
      <div class="wrapper">
        &copy; 2024. <b>Fortune.</b> All Rights Reserved.
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    // Animasi muncul footer dengan efek slide
    $('.footer-section').hide().each(function(index) {
        $(this).delay(200 * index).slideDown(500);
    });

    // Animasi saat mengarahkan mouse ke ikon
    $('.footer-section a').hover(function() {
        $(this).animate({ fontSize: '1.1em', opacity: 0.8 }, 200);
    }, function() {
        $(this).animate({ fontSize: '1em', opacity: 1 }, 200);
    });

    // Animasi pulsasi saat mengarahkan mouse ke ikon sosial media
    $('.footer-section i').hover(function() {
        $(this).animate({ fontSize: '1.3em' }, 200).animate({ fontSize: '1em' }, 200);
    });

    // Animasi bergoyang pada judul "Social Media"
    $('h3').hover(function() {
        $(this).animate({ fontSize: '1.2em', marginLeft: '5px' }, 200);
    }, function() {
        $(this).animate({ fontSize: '1em', marginLeft: '0px' }, 200);
    });

    $('.social-link').hover(function() {
        $(this).stop().animate({ fontSize: '1.1em', paddingLeft: '10px', color: '#007bff' }, 200);
    }, function() {
        $(this).stop().animate({ fontSize: '1em', paddingLeft: '0px', color: '#333' }, 200);
    });

    // Animasi saat mouse masuk dan keluar dari ikon sosial media
    $('.footer-section i').hover(function() {
        $(this).stop().animate({ fontSize: '1.3em', rotate: '10deg' }, 200);
    }, function() {
        $(this).stop().animate({ fontSize: '1.5em', rotate: '0deg' }, 200);
    });

    // Animasi saat mouse masuk dan keluar dari judul "Social Media"
    $('h3').hover(function() {
        $(this).stop().animate({ fontSize: '1.2em', marginLeft: '5px', color: '#007bff' }, 200);
    }, function() {
        $(this).stop().animate({ fontSize: '1em', marginLeft: '0px', color: '#333' }, 200);
    });

    // Animasi muncul saat halaman dimuat
    $('.footer-section').hide().fadeIn(1000);

    
  });
</script>
<script src="{{ asset('assets/main.js') }}"></script>
  </body>
</html>
