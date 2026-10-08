<?php

$courses = [
    [
        'code' => 'web',
        'name' => 'Web Dasar',
        'fee' => 300000,
    ],
    [
        'code' => 'php',
        'name' => 'PHP Dasar',
        'fee' => 400000,
    ],
    [
        'code' => 'laravel',
        'name' => 'Laravel Dasar',
        'fee' => 500000,
    ],
];

$interestOptions = [
    'frontend' => 'Frontend',
    'backend' => 'Backend',
    'database' => 'Database',
    'uiux' => 'UI/UX',
];

$facilities = [
    'Modul digital',
    'Sertifikat penyelesaian',
    'Forum diskusi kelas',
];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Loop Lab - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<header>

    <nav>

        <a href="index.php">
            Beranda
        </a>

        <a href="registration.php">
            Daftar Kursus
        </a>

        <a href="history.php">
            History
        </a>

        <a href="loop-lab.php">
            Loop Lab
        </a>

    </nav>

</header>


<main>

    <section>

        <p></p>

        <h1>
            Loop Lab KursusKu
        </h1>

    </section>


    <!-- =====================================
         FOREACH
    ====================================== -->

    <section>

        <h2>
            Daftar Kursus
        </h2>

        <?php foreach ($courses as $course): ?>

            <article>

                <h3>
                    <?= htmlspecialchars($course['name']) ?>
                </h3>

                <p>
                    Kode:
                    <?= htmlspecialchars($course['code']) ?>
                </p>

                <p>
                    Biaya:
                    Rp <?= number_format(
                        $course['fee'],
                        0,
                        ',',
                        '.'
                    ) ?>
                </p>

            </article>

        <?php endforeach; ?>

    </section>


    <!-- =====================================
         FOR
    ====================================== -->

    <section>

        <h2>
            Daftar Pertemuan:
        </h2>

        <ol>

            <?php for ($i = 1; $i <= 5; $i++): ?>

                <li>
                    Pertemuan ke-<?= $i ?>
                </li>

            <?php endfor; ?>

        </ol>

    </section>


    <!-- =====================================
         WHILE
    ====================================== -->

    <section>

        <h2>
    Nomor Antrean
        </h2>

        <?php

        $nomor = 1;

        while ($nomor <= 5):

        ?>

            <p>
                Nomor antrean:
                <?= $nomor ?>
            </p>

        <?php

            $nomor++;

        endwhile;

        ?>

    </section>


    <!-- =====================================
         FOREACH INTEREST
    ====================================== -->

    <section>

        <h2>
            Pilihan Minat
        </h2>

        <ul>

            <?php foreach ($interestOptions as $kode => $minat): ?>

                <li>
                    <?= htmlspecialchars($kode) ?>
                    -
                    <?= htmlspecialchars($minat) ?>
                </li>

            <?php endforeach; ?>

        </ul>

    </section>


    <!-- =====================================
         FOREACH FACILITIES
    ====================================== -->

    <section>

        <h2>
            Fasilitas Kursus
        </h2>

        <ul>

            <?php foreach ($facilities as $facility): ?>

                <li>
                    <?= htmlspecialchars($facility) ?>
                </li>

            <?php endforeach; ?>

        </ul>

    </section>


    <!-- =====================================
         FOR + ARRAY
    ====================================== -->

    <section>

        <h2>
            Urutan Fasilitas
        </h2>

        <ol>

            <?php
            for ($i = 0; $i < count($facilities); $i++):
            ?>

                <li>
                    Fasilitas <?= $i + 1 ?>:
                    <?= htmlspecialchars($facilities[$i]) ?>
                </li>

            <?php endfor; ?>

        </ol>

    </section>


    <section>

        <a href="registration.php">
            Kembali ke Pendaftaran
        </a>

    </section>

</main>

</body>

</html>