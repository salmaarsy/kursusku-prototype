<?php

$registrationHistory = [
    [
        'id' => 'R-27188',
        'name' => 'Alifa',
        'course' => 'Web Dasar',
        'method' => 'Online',
        'status' => 'Diproses',
    ],
    [
        'id' => 'R-27189',
        'name' => 'Bila',
        'course' => 'PHP Dasar',
        'method' => 'Tatap Muka',
        'status' => 'Menunggu Pembayaran',
    ],
    [
        'id' => 'R-27190',
        'name' => 'Cantika',
        'course' => 'Laravel Fundamental',
        'method' => 'Hybrid',
        'status' => 'Dikonfirmasi',
    ],
    [
        'id' => 'R-27191',
        'name' => 'Dita',
        'course' => 'Web Dasar',
        'method' => 'Hybrid',
        'status' => 'Diproses',
    ],
];

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>History Dummy - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/polish.css">
</head>

<body>

<header class="site-header">

    <nav class="site-nav container" aria-label="Navigasi utama">

        <a class="brand" href="index.php">
            KursusKu
        </a>

        <a href="index.php">
            Beranda
        </a>

        <a href="registration.php">
            Daftar
        </a>

        <!---<a class="is-active" href="history.php">
            History
        </a>--->

        <a href="loop-lab.php">
            Loop Lab
        </a>

    </nav>

</header>


<main class="container">

    <!-- INTRODUKSI HALAMAN -->

    <section class="page-intro">

        <p class="eyebrow">
            Data 
        </p>

        <h1>
            History Pendaftaran
        </h1>

    <!--- <p>
            Halaman ini menampilkan contoh riwayat pendaftaran
            kursus beserta metode belajar dan status pendaftarannya.
            Data yang ditampilkan merupakan data dummy.
        </p>--->

    </section>


    <!-- RINGKASAN RIWAYAT -->

    <section class="summary-card history-card">

        <div class="history-heading">

            <div>
                <h2>Riwayat Pendaftaran</h2>

                <p>
                    Total <?= count($registrationHistory) ?>
                    data pendaftaran
                </p>
            </div>

        </div>


        <!-- TABEL RIWAYAT -->

        <div class="table-scroll">

            <table class="history-table">

                <thead>
                    <tr>
                        <th>ID Pendaftaran</th>
                        <th>Nama Peserta</th>
                        <th>Nama Kursus</th>
                        <th>Metode Belajar</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($registrationHistory as $registration): ?>

                        <?php
                        $statusClass = '';

                        if ($registration['status'] === 'Terkonfirmasi') {
                            $statusClass = 'history-status-confirmed';
                        } elseif ($registration['status'] === 'Diproses') {
                            $statusClass = 'history-status-processing';
                        } elseif ($registration['status'] === 'Menunggu Pembayaran') {
                            $statusClass = 'history-status-pending';
                        }
                        ?>

                        <tr>

                            <td>
                                <?= e($registration['id']) ?>
                            </td>

                            <td>
                                <?= e($registration['name']) ?>
                            </td>

                            <td>
                                <?= e($registration['course']) ?>
                            </td>

                            <td>
                                <?= e($registration['method']) ?>
                            </td>

                            <td>
                                <span class="history-status <?= e($statusClass) ?>">
                                    <?= e($registration['status']) ?>
                                </span>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>


        <!-- KETERANGAN -->

        <div class="history-note">

            <p>
                <!---<strong>Catatan:</strong>--->
                
            </p>

        </div>


        <!-- TOMBOL KEMBALI -->

        <div class="history-actions">

            <a class="btn-link" href="registration.php">
                Kembali ke Form Pendaftaran
            </a>

        </div>

    </section>

</main>

</body>

</html>