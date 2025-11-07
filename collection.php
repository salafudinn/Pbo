<?php

// CARA 1: Install dulu dengan Composer
// Jalankan di terminal: composer require illuminate/collections

require 'vendor/autoload.php';

use Illuminate\Support\Collection;

// Buat collection
$angka = collect([1, 2, 3, 4, 5]);

// Filter angka genap
$genap = $angka->filter(function ($n) {
    return $n % 2 == 0;
});
print_r($genap->all()); // [2, 4]

// Jumlahkan semua
echo $angka->sum(); // 15


// ============================================
// CARA 2: Pakai Array biasa (tanpa install)
// ============================================

$angka = [1, 2, 3, 4, 5];

// Filter angka genap
$genap = array_filter($angka, function ($n) {
    return $n % 2 == 0;
});
print_r($genap); // [2, 4]

// Jumlahkan semua
echo array_sum($angka); // 15

?>