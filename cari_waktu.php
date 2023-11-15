<?php 
// Tanggal dan waktu dari database
$timestamp_from_database =  $hasil[0]['waktu'];

// Ubah format menggunakan strtotime dan date
$new_format = date("h:i A d F Y", strtotime($timestamp_from_database));

// Tampilkan hasil
echo $new_format;
?>