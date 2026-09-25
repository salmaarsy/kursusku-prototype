<?php
$rawName = ' Laravel Fundamental ';

$cleanName = trim($rawName);
$upperName = strtroupper($cleanName);
$lowerName = strtolower($cleanName);
$length = strlen($cleanName);
$short =substr($cleanName, 0, 7);

echo $cleanName . '<br>';
echo $upperName . '<br>';
echo $lowerName . '<br>';
echo $length . '<br>';
echo $short
?>

<?php
$start = new DateTimeImmuTable('2026-09-15');

echo start->format(Y-m-d) . '<br>';
echo start->format(d-m-Y) . '<br>';
echo start->format(d/m/Y);