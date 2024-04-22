<?php
function binarySearch($angka, $cari) {
    $low = 0;
    $high = count($angka) - 1;

    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);
        
        if ($angka[$mid] == $cari) {
            return $mid; // Jika angka ditemukan, kembalikan indeksnya
        } elseif ($angka[$mid] < $cari) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }

    return -1; // Jika angka tidak ditemukan, kembalikan -1
}

// Contoh input
$angka = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20];
$cari = 12;

// Panggil fungsi binarySearch
$indeks = binarySearch($angka, $cari);

// Tampilkan output
echo "Contoh output 1: " . $indeks . "\n";

// Contoh input 2
$cari = 3;

// Panggil fungsi binarySearch untuk input kedua
$indeks = binarySearch($angka, $cari);

// Tampilkan output kedua
echo "Contoh output 2: " . $indeks . "\n";
?>
