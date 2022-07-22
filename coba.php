<?php 

$tgl1    = "2018-01-23"; // menentukan tanggal awal
$tgl2    = date('Y-m-d', strtotime('+7 days', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
echo $tgl2; // cetak tanggal
