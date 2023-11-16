<?php 

date_default_timezone_set('Asia/Makassar');

// Now you can use date and time functions with the specified time zone
$conn = mysqli_connect("sql311.infinityfree.com", "if0_35432091", "tDCWcyZd6kU2", "if0_35432091_asepsalto");
// $conn = mysqli_connect("localhost", "root", "", "asepsalto");
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
	$waktu = date("Y-m-d H:i:s");

	$query = "INSERT INTO sambarang
				VALUES
			  ('$user', '$teks','$waktu');
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
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
        if ($currentDateTime > ($targetDateTime + 60)) {
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
    
    $anjay = 60- $secondsDifference;
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
    
    $anjay = 60- $secondsDifference;
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