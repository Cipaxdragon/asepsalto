<?php 
    include_once "function.php";



    $dataPagination = pagination_data();

    echo "Jumlah Halaman: " . $dataPagination['jumlahHalaman'];
    echo "Halaman Aktif: " . $dataPagination['halamanAktif'];
    echo "Awal Data: " . $dataPagination['awalData'];
    

?>