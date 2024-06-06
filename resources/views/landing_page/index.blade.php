<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fortune</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <<<<<<< HEAD=======<link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        >>>>>>> b21b1077030f1b6895935f08b4d59f16910ce1ad

</head>

<body>
    <!-- navbar -->
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="">Fortune</a></div>
            <div class="menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#tutors">Tutors</a></li>
                    <li><a href="#partners">Partners</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <a href="/auth/login" class="tbl-biru">Login</a>

                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <img
                src="https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg?size=626&ext=jpg&ga=GA1.2.1769275626.1605867161" />
            <div class="kolom">
                <p class="deskripsi">Manajemen Class</p>
                <h2>Tetap Sehat, Tetap Semangat</h2>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt,
                    nobis.
                </p>
                <p><a href="" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
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
                src="https://img.freepik.com/free-vector/online-learning-isometric-concept_1284-17947.jpg?size=626&ext=jpg&ga=GA1.2.1769275626.1605867161" />
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
                    <img src="https://png.pngtree.com/background/20230604/original/pngtree-library-book-shelves-with-help-desk-education-background-illustration-picture-image_2873053.jpg"
                        class="card-img-top" alt="Perpustakaan">
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

        <!-- untuk jadwal guru -->
        <section id="jadwal-guru">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Jadwal Guru</p>
                    <h2>Jadwal Guru</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad,
                        optio!
                    </p>
                </div>

                <div class="jadwal-list">
                    <div class="kartu-jadwal">
                        <div class="card">
                            <p>Senin - Matematika</p>
                        </div>
                    </div>
                    <div class="kartu-jadwal">
                        <div class="card">
                            <p>Selasa - Bahasa Inggris</p>
                        </div>
                    </div>
                    <div class="kartu-jadwal">
                        <div class="card">
                            <p>Rabu - Fisika</p>
                        </div>
                    </div>
                    <div class="kartu-jadwal">
                        <div class="card">
                            <p>Kamis - Biologi</p>
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
                    <h2>Guru Terbaik</h2>
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
                        <img src="https://img.freepik.com/premium-vector/university-campus-logo_1447-1793.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-63.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-62.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img src="https://img.freepik.com/premium-vector/university-campus-logo_1447-1790.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-64.jpg" />
                    </div>
                </div>
            </div>
        </section>

        <!-- tambahan untuk Sistem Manajemen Sekolah -->
        <div class="container" id="nilai_siswa">
            <h2 class="text-center">Top Students</h2>
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
    <section id="sistem-manajemen-sekolah">
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
    </section>

    <div id="contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>Fortune</h3>
                    <p>
                        Xample Xample Xample Xample Xample Xample Xample Xample Xample
                        Xample
                    </p>
                </div>
                <div class="footer-section">
                    <h3>Xample</h3>
                    <p>
                        Xample Xample Xample Xample Xample Xample Xample Xample Xample
                        Xample
                    </p>
                </div>
                <div class="footer-section">
                    <h3>Xample</h3>
                    <p>
                        Xample Xample Xample Xample Xample Xample Xample Xample Xample
                        Xample
                    </p>
                    <p>
                        Xample Xample Xample Xample Xample Xample Xample Xample Xample
                        Xample
                    </p>
                </div>
                <div class="footer-section">
                    <h3>Xample</h3>
                    <p>
                        <b>Xample: </b>Xample Xample Xample Xample Xample Xample Xample
                        Xample
                    </p>
                </div>
            </div>
        </div>
    </div>
    =======
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
                    <p><i class="fab fa-twitter"></i> <a href="{{ $contact->twitter }}" target="_blank"
                            style="text-decoration: none;">Twitter</a></p>
                    <p><i class="fab fa-facebook"></i> <a href="{{ $contact->facebook }}" target="_blank"
                            style="text-decoration: none;">Facebook</a></p>
                    <p><i class="fab fa-instagram"></i> <a href="{{ $contact->instagram }}" target="_blank"
                            style="text-decoration: none;">Instagram</a></p>
                    <p><i class="fab fa-github"></i> <a href="{{ $contact->github }}" target="_blank"
                            style="text-decoration: none;">GitHub</a></p>
                    @endforeach
                </div>
                <div class="col-md-3 mb-4">
                    <h3>Follow Us</h3>
                    <p>Connect with us on social media for updates.</p>
                </div>
            </div>
        </div>
    </div>


    >>>>>>> b21b1077030f1b6895935f08b4d59f16910ce1ad

    <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>Fortune.</b> All Rights Reserved.
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <<<<<<< HEAD=======<script>
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
        >>>>>>> b21b1077030f1b6895935f08b4d59f16910ce1ad
</body>

</html>