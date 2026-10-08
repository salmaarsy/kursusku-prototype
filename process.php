<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

// ==================================================
// AMBIL DATA DARI FORM
// ==================================================

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');

$courseCode = $_POST['course_code'] ?? '';
$participantType = $_POST['participant_type'] ?? '';

$interests = $_POST['interests'] ?? [];

$learningMode = $_POST['learning_mode'] ?? '';
$packageCount = (int) ($_POST['package_count'] ?? 1);

$notes = trim($_POST['notes'] ?? '');

$source = $_POST['source'] ?? '';


// ==================================================
// PASTIKAN INTERESTS BERBENTUK ARRAY
// ==================================================

if (!is_array($interests)) {
    $interests = [];
}


// ==================================================
// FILTER MINAT YANG DIIZINKAN
// ==================================================

$allowedInterestKeys = array_keys($interestOptions);

$interests = array_values(
    array_intersect($interests, $allowedInterestKeys)
);


// ==================================================
// VALIDASI DATA
// ==================================================

$errors = [];


// Validasi nama
if ($name === '') {
    $errors[] = 'Nama wajib diisi';
}

// Validasi email
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email tidak valid';
}


// Validasi kursus
$course = findCourse($courses, $courseCode);

if ($course === null) {
    $errors[] = 'Kursus tidak ditemukan.';
}


// Validasi tipe peserta
if (!in_array(
    $participantType,
    ['mahasiswa', 'guru', 'umum'],
    true
)) {
    $errors[] = 'Tipe peserta tidak valid.';
}


// Validasi metode belajar
if (!in_array(
    $learningMode,
    ['offline', 'online', 'hybrid'],
    true
)) {
    $errors[] = 'Metode belajar tidak valid.';
}


// Validasi jumlah paket
if (!in_array(
    $packageCount,
    [1, 2, 3],
    true
)) {
    $errors[] = 'Jumlah paket tidak valid.';
}


// ==================================================
// JIKA TERDAPAT ERROR
// ==================================================

if ($errors !== []) {
    ?>

    <!doctype html>
    <html lang="id">

    <head>

        <meta charset="utf-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        >

        <title>Data Belum Valid - KursusKu</title>

        <link
            rel="stylesheet"
            href="assets/css/style.css"
        >

    </head>

    <body>

        <main class="container result-page">

            <section class="alert-error">

                <h1>
                    Data Belum Dapat Diproses
                </h1>

                <p>
                    Silakan periksa kembali data yang Anda masukkan.
                </p>

                <ul>

                    <?php foreach ($errors as $error): ?>

                        <li>
                            <?= e($error) ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

                <a
                    class="btn-link"
                    href="registration.php"
                >
                    Kembali ke Form
                </a>

            </section>

        </main>

    </body>

    </html>

    <?php

    exit;
}


// ==================================================
// HITUNG BIAYA PENDAFTARAN
// ==================================================

$discountPercent = getDiscountPercent($participantType);

$grossTotal = $course['fee'] * $packageCount;

$discountAmount = intdiv(
    $grossTotal * $discountPercent,
    100
);

$finalTotal = $grossTotal - $discountAmount;


// ==================================================
// UBAH LABEL METODE BELAJAR
// ==================================================

$learningModeLabel = getLearningModeLabel($learningMode);


// ==================================================
// UBAH DATA MINAT MENJADI TEKS
// ==================================================

$interestLabels = [];

foreach ($interests as $interest) {

    if (isset($interestOptions[$interest])) {
        $interestLabels[] = $interestOptions[$interest];
    }

}

$interestText = $interestLabels !== []
    ? implode(', ', $interestLabels)
    : 'Tidak ada';


// ==================================================
// TAMPILKAN HASIL PENDAFTARAN
// ==================================================

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Hasil Pendaftaran - KursusKu</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>


    <!-- ================= HEADER ================= -->

    <header class="site-header">

        <div class="container nav-wrap">

            <a
                class="brand"
                href="index.php"
            >
                KursusKu
            </a>

            <nav aria-label="Navigasi utama">

                <a href="index.php">
                    Beranda
                </a>

                <a href="index.php#katalog">
                    Katalog
                </a>

                <a href="fee-calculator.php">
                    Biaya
                </a>

            </nav>

        </div>

    </header>


    <!-- ================= HASIL PENDAFTARAN ================= -->

    <main class="container result-page">

        <section class="alert-success">

            <h1>
                Pendaftaran Berhasil Diproses
            </h1>

            <p>
                Berikut adalah data pendaftaran kursus Anda.
            </p>

        </section>


        <!-- ================= DATA PESERTA ================= -->

        <section class="summary-card">

            <h2>
                Data Peserta
            </h2>

            <dl class="summary-list">

                <dt>
                    Nama Lengkap
                </dt>

                <dd>
                    <?= e($name) ?>
                </dd>


                <dt>
                    Email
                </dt>

                <dd>
                    <?= e($email) ?>
                </dd>


                <dt>
                    Nomor HP
                </dt>

                <dd>
                    <?= e($phone) ?>
                </dd>


                <dt>
                    Program Studi
                </dt>

                <dd>
                    <?= e($studyProgram) ?>
                </dd>


                <dt>
                    Tipe Peserta
                </dt>

                <dd>
                    <?= e(ucfirst($participantType)) ?>
                </dd>

            </dl>

        </section>


        <!-- ================= DETAIL KURSUS ================= -->

        <section class="summary-card">

            <h2>
                Detail Kursus
            </h2>

            <dl class="summary-list">

                <dt>
                    Kode Kursus
                </dt>

                <dd>
                    <?= e($course['code']) ?>
                </dd>


                <dt>
                    Nama Kursus
                </dt>

                <dd>
                    <?= e($course['name']) ?>
                </dd>


                <dt>
                    Harga per Paket
                </dt>

                <dd>
                    <?= formatRupiah($course['fee']) ?>
                </dd>


                <dt>
                    Metode Belajar
                </dt>

                <dd>
                    <?= e($learningModeLabel) ?>
                </dd>


                <dt>
                    Jumlah Paket
                </dt>

                <dd>
                    <?= e($packageCount) ?> Paket
                </dd>


                <dt>
                    Minat Belajar
                </dt>

                <dd>
                    <?= e($interestText) ?>
                </dd>


                <dt>
                    Catatan
                </dt>

                <dd>
                    <?= $notes !== ''
                        ? e($notes)
                        : 'Tidak ada catatan'
                    ?>
                </dd>

            </dl>

        </section>


        <!-- ================= RINGKASAN BIAYA ================= -->

        <section class="summary-card">

            <h2>
                Ringkasan Biaya
            </h2>

            <dl class="summary-list">

                <dt>
                    Total Awal
                </dt>

                <dd>
                    <?= formatRupiah($grossTotal) ?>
                </dd>


                <dt>
                    Diskon
                </dt>

                <dd>
                    <?= e($discountPercent) ?>%
                </dd>


                <dt>
                    Potongan
                </dt>

                <dd>
                    <?= formatRupiah($discountAmount) ?>
                </dd>


                <dt>
                    Total Pembayaran
                </dt>

                <dd>
                    <strong>
                        <?= formatRupiah($finalTotal) ?>
                    </strong>
                </dd>

            </dl>

        </section>


        <!-- ================= TOMBOL ================= -->

        <div class="form-actions">

            <a
                class="btn-link"
                href="registration.php"
            >
                Kembali ke Form
            </a>

            <a
                class="btn-link"
                href="index.php"
            >
                Kembali ke Beranda
            </a>

        </div>

    </main>

</body>

</html>