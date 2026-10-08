<?php
require_once __DIR__ . '/helpers.php';

$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28',
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],
];

$siteName = 'KursusKu Salma Arsy';
$tagline = 'Belajar, Daftar, dan Kelola Kursus dalam Satu Tempat.';
$year = date('Y');
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="KursusKu adalah platform pendaftaran dan informasi kursus teknologi."
    >

    <title>
        <?= htmlspecialchars($siteName) ?>
    </title>

    <!-- =========================
         GOOGLE FONT
    ========================== -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <link rel="stylesheet" href="assets/css/style.css">

</head>


<body>


<!-- =====================================================
     HEADER
====================================================== -->

<header>

    <nav aria-label="Navigasi utama">

        <!-- Logo dibuat oleh CSS -->
        <a href="index.php">
            Beranda
        </a>

        <a href="#keunggulan">
            Keunggulan
        </a>

        <a href="#katalog">
            Katalog
        </a>

        <a href="#alur">
            Cara Daftar
        </a>

        <a href="#kontak">
            Kontak
        </a>

        <a href="index.php">Beranda</a>
        <a href="registration.php">Daftar Kursus</a>
        <a href="history.php">History</a>
        <a href="loop-lab.php">Loop Lab</a>

    </nav>

</header>


<main>

<section id="hero">

    <h1>
        <?= htmlspecialchars($tagline) ?>
    </h1>

    <p>
        Temukan berbagai kursus teknologi mulai dari
        Web Dasar, PHP, Laravel, MySQL, hingga UI Web
        untuk meningkatkan keterampilan digital Anda.
    </p>

    <a href="#katalog">
        Lihat Katalog Kursus
    </a>

</section>


<!-- =====================================================
     KEUNGGULAN
====================================================== -->

<section id="keunggulan">

    <h2>
        Mengapa Memilih KursusKu?
    </h2>

    <div class="feature-container">

        <article>

            <h3>
                Materi Terarah
            </h3>

            <p>
                Materi kursus disusun secara bertahap
                mulai dari konsep dasar hingga praktik
                sehingga lebih mudah dipahami.
            </p>

        </article>


        <article>

            <h3>
                Belajar dengan Proyek
            </h3>

            <p>
                Peserta dapat belajar melalui latihan
                dan proyek sederhana untuk menerapkan
                materi yang sudah dipelajari.
            </p>

        </article>


        <article>

            <h3>
                Pendampingan Praktik
            </h3>

            <p>
                Pembelajaran dilengkapi dengan demonstrasi,
                latihan, dan evaluasi agar proses belajar
                menjadi lebih terarah.
            </p>

        </article>

    </div>

</section>


<!-- =====================================================
     KATALOG KURSUS
====================================================== -->

<section id="katalog">

    <h2>
        Katalog Kursus
    </h2>

    <div class="table-container">

        <table>

            <thead>

                <tr>

                    <th>
                        Kode
                    </th>

                    <th>
                        Nama Kursus
                    </th>

                    <th>
                        Biaya
                    </th>

                    <th>
                        Mulai
                    </th>

                    <th>
                        Sisa Kursi
                    </th>

                    <th>
                        Status
                    </th>

                </tr>

            </thead>


            <tbody>

            <?php foreach ($courses as $course): ?>

                <?php

                $status = statusKursus(
                    $course['quota'],
                    $course['registered']
                );

                $statusClass =
                    $status === 'Penuh'
                        ? 'badge-full'
                        : 'badge-available';

                ?>

                <tr>

                    <td>
                        <?= htmlspecialchars(
                            $course['code']
                        ) ?>
                    </td>


                    <td>
                        <?= htmlspecialchars(
                            trim($course['name'])
                        ) ?>
                    </td>


                    <td>
                        <?= rupiah(
                            $course['fee']
                        ) ?>
                    </td>


                    <td>
                        <?= formatTanggal(
                            $course['start_date']
                        ) ?>
                    </td>


                    <td>
                        <?= sisaKursi(
                            $course['quota'],
                            $course['registered']
                        ) ?>
                    </td>


                    <td>

                        <span
                            class="<?= htmlspecialchars($statusClass) ?>"
                        >
                            <?= htmlspecialchars($status) ?>
                        </span>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>


    <!-- Tombol biaya -->

    <div class="fee-link">

        <a href="fee-calculator.php">
            Lihat Estimasi Biaya
        </a>

    </div>

</section>


<!-- =====================================================
     MATERI KURSUS
====================================================== -->

<section id="materi">

    <h2>
        Materi Kursus
    </h2>


    <div class="course-container">


        <article>

            <h3>
                Web Dasar
            </h3>

            <p>
                Mempelajari HTML, struktur halaman,
                elemen web, dan dasar pengembangan
                website.
            </p>

        </article>


        <article>

            <h3>
                PHP Dasar
            </h3>

            <p>
                Mempelajari variabel, operator,
                percabangan, perulangan, array,
                function, dan form PHP.
            </p>

        </article>


        <article>

            <h3>
                Laravel Fundamental
            </h3>

            <p>
                Mengenal framework Laravel,
                route, controller, view,
                database, dan konsep MVC.
            </p>

        </article>

    </div>

</section>


<!-- =====================================================
     ALUR PENDAFTARAN
====================================================== -->

<section id="alur">

    <h2>
        Cara Mendaftar
    </h2>


    <ol>

        <li>
            Pilih kursus yang diminati.
        </li>

        <li>
            Klik menu Daftar dan isi
            formulir pendaftaran.
        </li>

        <li>
            Periksa kembali data yang
            telah dimasukkan.
        </li>

        <li>
            Kirim pendaftaran dan tunggu
            konfirmasi.
        </li>

    </ol>

</section>


<!-- =====================================================
     MEDIA
====================================================== -->

<section id="media">

    <h2>
        Kenali Program Kami
    </h2>


    <!-- Gambar -->

    <img
        src="assets/images/image-kursus.jpeg"
        alt="Program KursusKu"
        width="640"
    >


    <!-- Video -->

    <h3>
        Video Singkat
    </h3>


    <video
        controls
        width="640"
    >

        <source
            src="assets/video/video-kursus.mp4"
            type="video/mp4"
        >

        Browser Anda tidak mendukung
        video HTML5.

    </video>


    <!-- Dokumentasi -->

    <p>

        <a
            href="https://www.php.net/"
            target="_blank"
            rel="noopener noreferrer"
        >
            Dokumentasi PHP
        </a>

    </p>

</section>


<!-- =====================================================
     KONTAK
====================================================== -->

<section id="kontak">

    <h2>
        Kontak
    </h2>


    <p>
        Email:
        salmaarsyaa@gmail.com
    </p>


    <p>
        Alamat:
        Bukittinggi
    </p>

</section>


</main>


<!-- =====================================================
     FOOTER
====================================================== -->

<footer>

    <small>

        &copy;
        <?= $year ?>

        <?= htmlspecialchars($siteName) ?>

        | Semua Hak Dilindungi

    </small>

</footer>


</body>

</html>