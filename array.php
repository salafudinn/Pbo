<?php

// ========== 1. ARRAY INDEXED ==========
$buah = ["Apel", "Jeruk", "Mangga"];

echo $buah[0]; // Output: Apel
echo "\n";

// ========== 2. ARRAY ASSOCIATIVE ==========
$mahasiswa = [
    "nama" => "Budi",
    "umur" => 20
];

echo $mahasiswa["nama"]; // Output: Budi
echo "\n";

// ========== 3. LOOPING ARRAY ==========
foreach ($buah as $item) {
    echo "- $item\n";
}

// ========== 4. FUNGSI ARRAY ==========
$angka = [1, 2, 3, 4, 5];

echo count($angka); // Output: 5
echo "\n";

// Filter angka genap
$genap = array_filter($angka, function($n) {
    return $n % 2 == 0;
});
print_r($genap); // Output: [2, 4]

?>