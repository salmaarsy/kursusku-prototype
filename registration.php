<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Kursus - KursusKu</title>

    <!-- File CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- ================= HEADER ================= -->
    <header class="site-header">

        <div class="container nav-wrap">

            <!-- Logo / Brand -->
            <a class="brand" href="index.php">KursusKu</a>

            <!-- Navigasi -->
            <nav aria-label="Navigasi utama">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="fee-calculator.php">Biaya</a>
                <a href="loop-lab.php">Loop Lab</a>
            </nav>
        </div>
    </header>


    <!-- ================= MAIN CONTENT ================= -->
    <main class="container">

        <!-- Judul halaman -->
        <section class="page-intro">

            <p class="eyebrow">
                Pendaftaran Kursus
            </p>

            <h1>
                Mulai belajar bersama KursusKu
            </h1>

            <p>
                Lengkapi form berikut dengan data Anda untuk melakukan
                pendaftaran kursus.
            </p>

        </section>


        <!-- ================= FORM PENDAFTARAN ================= -->
        <section class="form-card">

            <form
                method="POST"
                action="process.php"
                class="registration-form"
            >

                <!-- Sumber form -->
                <input
                    type="hidden"
                    name="source"
                    value="week-05"
                >


                <!-- ================= NAMA ================= -->
                <div class="form-group">

                    <label for="name">
                        Nama Lengkap
                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        minlength="3"
                        maxlength="100"
                        autocomplete="name"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                </div>


                <!-- ================= EMAIL ================= -->
                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        maxlength="120"
                        autocomplete="email"
                        placeholder="contoh@email.com"
                        required
                    >

                </div>


                <!-- ================= HP + PRODI ================= -->
                <div class="form-grid">

                    <!-- Nomor HP -->
                    <div class="form-group">

                        <label for="phone">
                            Nomor HP
                        </label>

                        <input
                            id="phone"
                            name="phone"
                            type="tel"
                            maxlength="15"
                            autocomplete="tel"
                            placeholder="081234567890"
                            required
                        >

                    </div>


                    <!-- Program Studi -->
                    <div class="form-group">

                        <label for="study_program">
                            Program Studi
                        </label>

                        <input
                            id="study_program"
                            name="study_program"
                            type="text"
                            maxlength="100"
                            placeholder="Contoh: Teknik Informatika"
                            required
                        >

                    </div>

                </div>


                <!-- ================= PILIH KURSUS ================= -->
                <div class="form-group">

                    <label for="course_code">
                        Kursus yang Dipilih
                    </label>

                    <select
                        id="course_code"
                        name="course_code"
                        required
                    >

                        <option value="">
                            -- Pilih kursus --
                        </option>

                        <?php foreach ($courses as $course): ?>

                            <option value="<?= e($course['code']) ?>">
                                <?= e($course['name']) ?>
                                - <?= formatRupiah($course['fee']) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- ================= TIPE PESERTA ================= -->
                <fieldset class="form-group">

                    <legend>
                        Tipe Peserta
                    </legend>

                    <label class="choice">

                        <input
                            type="radio"
                            name="participant_type"
                            value="mahasiswa"
                            required
                        >

                        Mahasiswa

                    </label>

                    <label class="choice">

                        <input
                            type="radio"
                            name="participant_type"
                            value="guru"
                        >

                        Guru

                    </label>

                    <label class="choice">

                        <input
                            type="radio"
                            name="participant_type"
                            value="umum"
                        >

                        Umum

                    </label>

                </fieldset>


                <!-- ================= MINAT BELAJAR ================= -->
                <fieldset class="form-group">

                    <legend>
                        Minat Belajar
                    </legend>

                    <?php foreach ($interestOptions as $value => $label): ?>

                        <label class="choice">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="<?= e($value) ?>"
                            >

                            <?= e($label) ?>

                        </label>

                    <?php endforeach; ?>

                </fieldset>


                <!-- ================= METODE BELAJAR ================= -->
                <div class="form-group">

                    <label for="learning_mode">
                        Metode Belajar
                    </label>

                    <select
                        id="learning_mode"
                        name="learning_mode"
                        required
                    >

                        <option value="">
                            -- Pilih metode --
                        </option>

                        <option value="offline">
                            Tatap Muka
                        </option>

                        <option value="online">
                            Online
                        </option>

                        <option value="hybrid">
                            Hybrid
                        </option>

                    </select>

                </div>


                <!-- ================= JUMLAH PAKET ================= -->
                <div class="form-group">

                    <label for="package_count">
                        Jumlah Paket
                    </label>

                    <select
                        id="package_count"
                        name="package_count"
                        required
                    >

                        <?php for ($i = 1; $i <= 3; $i++): ?>

                            <option value="<?= $i ?>">
                                <?= $i ?> Paket
                            </option>

                        <?php endfor; ?>

                    </select>

                </div>


                <!-- ================= CATATAN ================= -->
                <div class="form-group">

                    <label for="notes">
                        Catatan Tambahan
                    </label>

                    <textarea
                        id="notes"
                        name="notes"
                        rows="5"
                        maxlength="300"
                        placeholder="Tuliskan kebutuhan belajar Anda (opsional)"
                    ></textarea>

                    <small class="help">
                        Maksimal 300 karakter.
                    </small>

                </div>


                <!-- ================= TOMBOL ================= -->
                <div class="form-actions">

                    <button type="submit">
                        Proses Pendaftaran
                    </button>

                </div>

            </form>

        </section>

    </main>

</body>
</html>
