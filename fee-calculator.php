<?php
$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;
$isActive = True;
?>

<?php
$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee;
?>

<?php
echo 'Biaya: Rp ' . number_format($fee, 0, ',', '.') . '<br';
echo 'Subtotal: Rp ' . number_format($subtotal, 0, ',', '.') . '<br';
echo 'Diskon: Rp ' . number_format($discount, 0, ',', '.') . '<br';
echo 'Admin: Rp ' . number_format($adminFee, 0, ',', '.') . '<br';
echo 'Total: Rp ' . number_format($total, 0, ',', '.') . '<br';
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kalkulator Biaya - KursusKu</title>
</head>
<body>
<h1>Kalkulator Estimasi Biaya KursusKu</h1>
<p>Kursus: <?= $courseName ?></p>
<table border="1" cellpadding="8">
    <tr><th>Komponen</th><th>Nilai</th></tr>
    <tr><td>Biaya per peserta</td><td>Rp <?= number_format($fee, 0, ',', '.') ?></td></tr>
    <tr><td>Jumlah peserta</td><td><?= $participantCount ?></td></tr>
    <tr><td>Subtotal</td><td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td></tr>
    <tr><td>Diskon (<?= $discountPercent ?>%)</td><td>Rp <?= number_format($discount, 0, ',', '.') ?></td></tr>
    <tr><td>Biaya admin</td><td>Rp <?= number_format($adminFee, 0, ',', '.') ?></td></tr>
    <tr><th>Total akhir</th><th>Rp <?= number_format($total, 0, ',', '.') ?></th></tr>
    </table>
</body>
</html>