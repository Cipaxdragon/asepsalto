<?php 

date_default_timezone_set('Asia/Makassar');
include_once "koneksi.php";
function kueri($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	$user = $_COOKIE["user"];
	$teks = htmlspecialchars($data["teks"]);
	$teks = nl2br($teks);
	$waktu = date("Y-m-d H:i:s");

	$query = "INSERT INTO sambarang
				VALUES
			  ('$user', '$teks','$waktu');
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function anti_nol($n){

    if($n-1){
        return $n+1;
    }
    return$n;

}

function tambah_gambar() {
	global $conn;

	$user = $_COOKIE["user"];
    
	$gambar = upload();
    if( !$gambar ) {
		return false;
	}
	$waktu = date("Y-m-d H:i:s");

	$query = "INSERT INTO gambar
				VALUES
			  ('$user', '$gambar','$waktu');
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// // cek jika ukurannya terlalu besar
	// if( $ukuranFile > 1000000 ) {
	// 	echo "<script>
	// 			alert('ukuran gambar terlalu besar!');
	// 		  </script>";
	// 	return false;
	// }

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'upload/' . $namaFileBaru);

	return $namaFileBaru;
}



function aplikasi($data) {
	global $conn;

	$user = $_COOKIE["user"];
	$teks = htmlspecialchars($data["teks"]);
	$waktu = date("Y-m-d H:i:s");

	$query = "INSERT INTO sambarang
				VALUES
			  ('$user', '$teks','$waktu');
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function tambah_saran($data) {
	global $conn;

	$user = $_COOKIE["user"];
	$teks = htmlspecialchars($data["kritik"]);
	$teks = nl2br($teks);
	$waktu = date("Y-m-d H:i:s");

	$query = "INSERT INTO kritik_saran
				VALUES
			  ('$user', '$teks','$waktu');
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM sambarang WHERE teks LIKE '%$keyword%'";
	return kueri($query);
}
function cari_kritik($keyword) {
	$query = "SELECT * FROM `kritik_Saran` WHERE teks LIKE '%$keyword%'";
	return kueri($query);
}

function waktu_konversi($a){
    $timestamp_from_database =  $a;

    // Ubah format menggunakan strtotime dan date
    $new_format = date("h:i A d F Y", strtotime($timestamp_from_database));
    
    // Tampilkan hasil
    
    return $new_format;
}


function janganspam($tabel){
    // echo "<br>";
    if(!isset($_COOKIE['user'])){
        return true;
    }
    $user = $_COOKIE['user'];
    $hasil=kueri("SELECT * FROM $tabel WHERE user = '$user' ORDER BY waktu DESC ");
    if(!$hasil){
        return true;
    }else{

        date_default_timezone_set('Asia/Makassar');
        // echo $user;
        // echo "<br>";
        // echo $hasil[0]['waktu'];
        // echo "<br>";
        $targetDateTime = strtotime($hasil[0]['waktu']);
        
        // Waktu sekarang
        $currentDateTime = time();
        
        // Periksa apakah sudah lewat 1 menit
        if ($currentDateTime > ($targetDateTime + 10)) {
            $lewat = true;
            return  $lewat;
        } else {
            $lewat = false;
            return  $lewat;
        }
    }
}

function selisihspam(){
    $user = $_COOKIE['user'];
    $hasil=kueri("SELECT * FROM `sambarang` WHERE user = '$user' ORDER BY waktu DESC ");
    // Waktu dari database (misalnya dari hasil query)
    $targetDateTime = strtotime($hasil[0]['waktu']);
    
    // Waktu sekarang
    $currentDateTime = time();
    
    // Menghitung selisih waktu
    $timeDifference = $currentDateTime - $targetDateTime;
    
    // Konversi selisih waktu ke dalam format yang diinginkan (misalnya dalam detik, menit, jam, dll.)
    $secondsDifference = $timeDifference % 60;
    
    $anjay = 10 - $secondsDifference;
    // Menampilkan hasil
    return "$anjay";
}

function selisihspamkritik(){
    $user = $_COOKIE['user'];
    $hasil=kueri("SELECT * FROM `kritik_saran` WHERE user = '$user' ORDER BY waktu DESC ");
    // Waktu dari database (misalnya dari hasil query)
    $targetDateTime = strtotime($hasil[0]['waktu']);
    
    // Waktu sekarang
    $currentDateTime = time();
    
    // Menghitung selisih waktu
    $timeDifference = $currentDateTime - $targetDateTime;
    
    // Konversi selisih waktu ke dalam format yang diinginkan (misalnya dalam detik, menit, jam, dll.)
    $secondsDifference = $timeDifference % 60;
    
    $anjay = 60 - $secondsDifference;
    // Menampilkan hasil
    return "$anjay";
}

function jumlahtabelsambarang(){
    global $conn;
    $sql = "SELECT COUNT(*) AS total FROM sambarang;";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $totalRows = $row['total'];
    // Mengambil hasil
    return $totalRows;

}

function dataperhalamansambrang($angka){
    return $angka;
}

function paginasisambgarang(){
    global $dataPerPage ;
    // Jumlah total data
    $totalData = jumlahtabelsambarang();
    
    
    // Menghitung jumlah halaman
    $totalPages = ceil($totalData / $dataPerPage);
    
    // Halaman saat ini
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    
    // Menentukan batas data yang akan ditampilkan pada halaman saat ini
    $start = ($currentPage - 1) * $dataPerPage;
    
    // Simulasi data (gantilah dengan pengambilan data sesuai kebutuhan)
    $dummyData = range(1, $totalData);
    
    // Mengambil data sesuai halaman saat ini
    $currentPageData = array_slice($dummyData, $start, $dataPerPage);
    
    // Membuat link pagination
    echo '<li class="page-item ' . ($currentPage == 1 ? 'disabled' : '') . '"><a class="page-link" href="?page=' . ($currentPage - 1) . '">&lt;</a></li>';
    
    // Batas untuk menampilkan maksimal 5 link
    $maxLinks = 5;
    
    // Menentukan range halaman yang akan ditampilkan
    $startPage = max(1, $currentPage - floor($maxLinks / 2));
    $endPage = min($totalPages, $startPage + $maxLinks - 1);
    
    for ($page = $startPage; $page <= $endPage; $page++) {
        $activeClass = ($currentPage == $page) ? 'active' : '';
        echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $page . '#list">' . $page . '</a></li>';
    }

    echo '<li class="page-item ' . ($currentPage == $totalPages ? 'disabled' : '') . '"><a class="page-link" href="?page=' . ($currentPage + 1) . '#list">&gt;</a></li>';

}




function getFolderSize($folderPath) {
    $totalSize = 0;

    $files = scandir($folderPath);

    foreach ($files as $file) {
        // Periksa apakah itu file atau folder
        $filePath = $folderPath . '/' . $file;

        if (is_file($filePath)) {
            // Jika itu file, tambahkan ukurannya ke totalSize
            $totalSize += filesize($filePath);
        } elseif ($file != '.' && $file != '..' && is_dir($filePath)) {
            // Jika itu folder, rekursif panggil fungsi untuk folder tersebut
            $totalSize += getFolderSize($filePath);
        }
    }

    return $totalSize;
}

function penyimpanan(){
    // Contoh penggunaan
    $folderPath = getcwd();
    $sizeInBytes = getFolderSize($folderPath);
    
    // Ubah ukuran ke dalam KB, MB, GB, dll.
    $sizeInKB = intval($sizeInBytes / 1024);
    $sizeInMB = intval($sizeInKB / 1024);
    $sizeInGB = intval($sizeInMB / 1024);
    
    
    // Menghitung selisih
    $selisih = 5120 - $sizeInMB;
    
    // Menghitung persentase
    $persen = ($selisih / 5120) * 100;
    $persen =100 - $persen;
    
    return  $hasil= array(
        'persen' => $persen,
        'terpakai' => $sizeInMB,
        'bebas' => $selisih,
        'total' => 5120
    ); ;
}






function pagination_data(){
    // Konfigurasi
    $jumlahDataPerHalaman = 5;
    $jumlahData = jumlahtabelsambarang();
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    // Menyimpan informasi dalam array
    $paginationData = array(
        'jumlahDataPerHalaman' => $jumlahDataPerHalaman,
        'jumlahHalaman' => $jumlahHalaman,
        'halamanAktif' => $halamanAktif,
        'awalData' => $awalData
    );

    return $paginationData;
}


?>