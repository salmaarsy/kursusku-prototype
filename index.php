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
      ?>

<?php 
$siteName = 'KursusKu Salma Arsy';
$tagline = 'Belajar, Daftar, dan Kelola Kursus dalam Satu Tempat.';
$year = date('Y'); 
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= htmlspecialchars($siteName) ?></title>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>

    /* ==============================
       RESET & GLOBAL
    ============================== */

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f5ff;
      color: #292333;
      line-height: 1.7;
    }

    a {
      text-decoration: none;
    }

    main {
      overflow: hidden;
    }

    section {
      width: 90%;
      max-width: 1150px;
      margin: auto;
      padding: 80px 0;
    }

    h2 {
      text-align: center;
      font-size: 32px;
      color: #3a2257;
      margin-bottom: 40px;
      font-weight: 800;
    }

    header {
      position: sticky;
      top: 0;
      z-index: 1000;
      background: rgba(58, 34, 87, 0.96);
      backdrop-filter: blur(12px);
      box-shadow: 0 5px 20px rgba(58, 34, 87, 0.2);
    }

    nav {
      width: 90%;
      max-width: 1150px;
      margin: auto;
      min-height: 75px;

      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 30px;
    }

    nav::before {
      content: "KursusKu";
      margin-right: auto;
      font-size: 23px;
      font-weight: 800;
      color: white;
      letter-spacing: .5px;
    }

    nav a {
      color: #ffffff;
      font-size: 14px;
      font-weight: 500;
      transition: .3s;
      position: relative;
    }

    nav a::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -7px;
      width: 0;
      height: 2px;
      background: #d9b8ff;
      transition: .3s;
    }

    nav a:hover {
      color: #d9b8ff;
    }

    nav a:hover::after {
      width: 100%;
    }

    #hero {
      width: 100%;
      max-width: none;
      min-height: 570px;
      padding: 110px 10%;

      display: flex;
      flex-direction: column;
      justify-content: center;

      color: white;

      background:
        radial-gradient(circle at 80% 20%, rgba(218, 181, 255, .35), transparent 25%),
        radial-gradient(circle at 10% 80%, rgba(126, 87, 194, .35), transparent 25%),
        linear-gradient(135deg, #241238 0%, #3a2257 45%, #7048a8 100%);
      
      position: relative;
      overflow: hidden;
    }

    #hero::before {
      content: "";
      position: absolute;
      width: 350px;
      height: 350px;
      border-radius: 50%;
      background: rgba(255,255,255,.06);
      right: 8%;
      top: 15%;
    }

    #hero::after {
      content: "";
      position: absolute;
      width: 180px;
      height: 180px;
      border-radius: 50%;
      background: rgba(255,255,255,.05);
      right: 25%;
      bottom: 5%;
    }

    #hero h1,
    #hero p,
    #hero a {
      position: relative;
      z-index: 2;
    }

    #hero h1 {
      max-width: 750px;
      font-size: clamp(38px, 5vw, 62px);
      line-height: 1.2;
      margin-bottom: 25px;
      font-weight: 800;
    }

    #hero p {
      max-width: 650px;
      font-size: 18px;
      color: #eee5ff;
      margin-bottom: 35px;
    }

    #hero a {
      width: fit-content;
      padding: 14px 28px;
      border-radius: 12px;

      background: linear-gradient(135deg, #ffffff, #eadcff);
      color: #3a2257;

      font-weight: 700;
      box-shadow: 0 10px 25px rgba(0,0,0,.2);
      transition: .3s;
    }

    #hero a:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 30px rgba(0,0,0,.3);
    }

    #keunggulan {
      padding-top: 90px;
    }

    #keunggulan article {
      display: inline-block;
      vertical-align: top;

      width: 31%;
      margin: 1%;

      min-height: 220px;
      padding: 30px;

      border-radius: 20px;
      background: white;

      box-shadow: 0 10px 30px rgba(58, 34, 87, .08);

      border: 1px solid #eee5ff;
      transition: .3s;
    }

    #keunggulan article:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(58, 34, 87, .15);
    }

    #keunggulan h3 {
      color: #5b3190;
      font-size: 20px;
      margin-bottom: 15px;
    }

    #keunggulan p {
      color: #6f6878;
      font-size: 14px;
    }

    #katalog {
      max-width: none;
      width: 100%;
      padding-left: 5%;
      padding-right: 5%;

      background: linear-gradient(
        180deg,
        #f8f5ff 0%,
        #eee5ff 100%
      );
    }

    #katalog table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      overflow: hidden;

      border-radius: 18px;
      box-shadow: 0 15px 40px rgba(58, 34, 87, .1);
    }

    #katalog th {
      background: linear-gradient(
        135deg,
        #3a2257,
        #7048a8
      );

      color: white;
      padding: 18px 15px;
      text-align: left;
      font-size: 14px;
    }

    #katalog td {
      padding: 17px 15px;
      border-bottom: 1px solid #eee8f5;
      font-size: 14px;
    }

    #katalog tr {
      transition: .2s;
    }

    #katalog tbody tr:hover {
      background: #faf7ff;
    }

    #katalog td:nth-child(2) {
      font-weight: 600;
      color: #4b2a70;
    }

    #katalog td:nth-child(3) {
      font-weight: 700;
      color: #5b3190;
    }

    .badge-available,
    .badge-full {
      display: inline-block;
      padding: 5px 12px;
      border-radius: 999px;
      font-weight: 700;
      font-size: 12px;
    }

    .badge-available {
      background: #e7f8ef;
      color: #146c43;
    }

    .badge-full {
      background: #fdeaea;
      color: #a61b1b;
    }

    #katalog table a {
      display: inline-block;
      margin: 20px;
      padding: 12px 20px;
      border-radius: 10px;

      background: linear-gradient(
        135deg,
        #3a2257,
        #7048a8
      );

      color: white;
      font-weight: 600;
      transition: .3s;
    }

    #katalog table a:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(58,34,87,.25);
    }

    #katalog ~ article {
      width: 90%;
      max-width: 350px;
      margin: 20px auto;
      padding: 25px;

      background: white;
      border-radius: 18px;

      box-shadow: 0 10px 25px rgba(58,34,87,.08);
    }

    article h3 {
      color: #3a2257;
      margin-bottom: 10px;
    }

    #alur {
      background: white;
      border-radius: 25px;
      margin-top: 60px;
      margin-bottom: 60px;
      padding: 60px;
      box-shadow: 0 10px 30px rgba(58,34,87,.06);
    }

    #alur ol {
      max-width: 700px;
      margin: auto;
      counter-reset: daftar;
      list-style: none;
    }

    #alur li {
      position: relative;
      padding: 18px 20px 18px 65px;
      margin: 15px 0;

      background: #f8f5ff;
      border-radius: 12px;

      color: #4a4054;
      font-weight: 500;
    }

    #alur li::before {
      counter-increment: daftar;
      content: counter(daftar);

      position: absolute;
      left: 18px;
      top: 12px;

      width: 38px;
      height: 38px;

      display: flex;
      align-items: center;
      justify-content: center;

      border-radius: 50%;

      background: linear-gradient(
        135deg,
        #3a2257,
        #8b5fc4
      );

      color: white;
      font-weight: 700;
    }

    #media {
      text-align: center;
    }

    #media img,
    #media video {
      max-width: 100%;
      height: auto;
      border-radius: 18px;
      margin: 15px 0 30px;

      box-shadow: 0 15px 35px rgba(58,34,87,.15);
    }

    #media h3 {
      color: #3a2257;
      margin-top: 25px;
    }

    #media p a {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 10px;
      background: #3a2257;
      color: white;
      transition: .3s;
    }

    #media p a:hover {
      background: #7048a8;
      transform: translateY(-2px);
    }

    #kontak {
      max-width: none;
      width: 100%;
      text-align: center;

      color: white;

      background:
        radial-gradient(
          circle at 80% 30%,
          rgba(177, 125, 255, .3),
          transparent 30%
        ),
        linear-gradient(
          135deg,
          #241238,
          #3a2257,
          #7048a8
        );
    }

    #kontak h2 {
      color: white;
    }

    #kontak p {
      color: #eee5ff;
      margin: 8px;
    }

    footer {
      padding: 25px;
      text-align: center;

      background: #21102f;
      color: #d9cbea;

      font-size: 13px;
    }

    @media (max-width: 850px) {

      nav {
        gap: 12px;
        flex-wrap: wrap;
        padding: 15px 0;
      }

      nav::before {
        width: 100%;
        margin-bottom: 5px;
      }

      nav a {
        font-size: 12px;
      }

      #hero {
        padding: 80px 7%;
      }

      #keunggulan article {
        width: 100%;
        margin: 10px 0;
      }

      #katalog {
        overflow-x: auto;
      }

      #katalog table {
        min-width: 800px;
      }

      #alur {
        width: 90%;
        padding: 40px 25px;
      }
    }


    @media (max-width: 500px) {

      #hero h1 {
        font-size: 35px;
      }

      #hero p {
        font-size: 15px;
      }

      h2 {
        font-size: 26px;
      }

      nav {
        justify-content: center;
      }

      nav::before {
        text-align: center;
      }
    }

  </style>
</head>

<body> 

  <header>
    <nav aria-label="Navigasi utama">
      <a href="#keunggulan">Keunggulan</a>
      <a href="#katalog">Katalog</a>
      <a href="registration.php">Daftar</a>
      <a href="#alur">Cara Daftar</a>
      <a href="#kontak">Kontak</a>
    </nav>
  </header>

  <main>

    <section id="hero">
      <h1>
        <?= htmlspecialchars($tagline) ?>
      </h1>

      <p>
        Temukan kursus teknologi yang relevan untuk meningkatkan keterampilan Anda.
      </p>

      <a href="#katalog">
        Lihat Katalog Kursus
      </a> 
    </section>


    <section id="keunggulan">

      <h2>Mengapa Memilih KursusKu?</h2>

      <article>
        <h3>Materi Terarah</h3>
        <p>
          Materi disusun bertahap dari dasar hingga praktik.
        </p>
      </article>

      <article>
        <h3>Belajar dengan Proyek</h3>
        <p>
          Setiap tahap menghasilkan bagian nyata dari aplikasi.
        </p>
      </article>

      <article>
        <h3>Pendampingan Praktik</h3>
        <p>
          Mahasiswa belajar melalui demonstrasi, latihan, dan evaluasi.
        </p>
      </article>

    </section> 


    <section id="katalog">

      <h2>Katalog Kursus</h2>

      <table>

        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama Kursus</th>
            <th>Biaya</th>
            <th>Mulai</th>
            <th>Sisa Kursi</th>
            <th>Status</th>
          </tr>
        </thead>

        <tbody>

        <?php foreach ($courses as $course): ?>
          
          <tr>

            <td>
              <?= htmlspecialchars($course['code']) ?>
            </td>

            <td>
              <?= htmlspecialchars(trim($course['name'])) ?>
            </td>

            <td>
              <?= rupiah($course['fee']) ?>
            </td>

            <td>
              <?= formatTanggal($course['start_date']) ?>
            </td>

            <td>
              <?= sisaKursi(
                $course['quota'],
                $course['registered']
              ) ?>
            </td>

            <td>

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

              <span class="<?= $statusClass ?>">
                <?= htmlspecialchars($status) ?>
              </span>

            </td>

          </tr>

        <?php endforeach; ?>

        <tr>
          <td colspan="6">
            <a href="fee-calculator.php">
              Lihat estimasi biaya
            </a>
          </td>
        </tr>

        </tbody>

      </table>

    </section>


    <article>
      <h3>Web Dasar</h3>
      <p>
        Belajar struktur HTML dan dasar pengembangan web.
      </p>
    </article>

    <article>
      <h3>PHP Dasar</h3>
      <p>
        Belajar variabel, operator, percabangan, looping, dan form.
      </p>
    </article>

    <article>
      <h3>Laravel Dasar</h3>
      <p>
        Mengenal framework, route, controller, view, dan database.
      </p>
    </article>


    <section id="alur">

      <h2>Cara Mendaftar</h2>

      <ol>
        <li>Pilih kursus yang diminati.</li>
        <li>Isi form pendaftaran.</li>
        <li>Periksa kembali data.</li>
        <li>Kirim pendaftaran dan tunggu konfirmasi.</li>
      </ol>

    </section>


    <section id="media">

      <h2>Kenali Program Kami</h2>

      <img
        src="assets/images/image-kursus.jpeg"
        alt="gambar"
        width="640"
      >

      <h3>Video Singkat</h3>

      <video controls width="640">
        <source
          src="assets/video/video-kursus.mp4"
          type="video/mp4"
        >
        Browser Anda tidak mendukung video HTML5.
      </video>

      <p>
        <a
          href="https://www.php.net/"
          target="_blank"
          rel="noopener"
        >
          Dokumentasi PHP
        </a>
      </p>

    </section>


    <section id="kontak">

      <h2>Kontak</h2>

      <p>Email: salmaarsyaa@gmail.com</p>
      <p>Alamat: Bukittinggi</p>

    </section>

  </main>


  <footer>

    <small>
      &copy; <?= $year ?>
      <?= htmlspecialchars($siteName) ?>
    </small>

  </footer>

</body>
</html>
?>