<?php 
   if(!isset($_COOKIE['user'])){
     setcookie("user", uniqid(), time() + (30 * 24 * 60 * 60));
     header("Location: index.php");
     exit;
   }
   include_once "function.php";
   $dataPagination = pagination_data();
   $awal = $dataPagination['awalData'];
   $dataperhalaman = $dataPagination['jumlahDataPerHalaman'];
   $dataPerPage = $dataPagination['jumlahDataPerHalaman'];
   $hasil=kueri("SELECT * FROM `sambarang` ORDER BY waktu DESC LIMIT $awal, $dataperhalaman");
   if (isset($_POST['kritik'])) {
     tambah_saran($_POST);
     header("Location: index.php?#kritik");
     exit;
   }
   
   if(isset($_POST['submit'])){
     tambah($_POST);
     header("Location: index.php?#list");
     exit;
   }
   
   include_once "header.php";
?>

<!-- Hero Image Section -->
<div class="hero-image">
   <div class="container">
      <h1 class="hero-title">Welcome Coy</h1>
      <p> Selamat datang di website asal asalan hanya untuk latihan php native aing dan kebutuhan kuliah <br> Silahkan Input text online  jika ingin transer text antar device tanpa buka WA modal buka web ini saja</p>
      <div class="custom-form">
         <?php if (janganspam('sambarang')): ?>
         <!-- Form Input and Link -->
         <form method="post">
            <div class="form-group">
               <!-- <input type="text" autocomplete="off" class="form-control" name="teks" placeholder="Tulis text nu sambarang"> -->
               <textarea type="text" autocomplete="off" class="form-control" name="teks" placeholder="Tulis text nu sambarang" rows="" cols=""></textarea>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block" name="submit"> kirim mi</button>
            </div>
         </form>
         <?php else: ?>
         <div class="alert alert-info" role="alert" id="countdown_sambarang">Jangan Spam</div>
         <?php include_once "countdown_sambarang.php" ?>
         <?php endif; ?>
      </div>
   </div>
</div>
<br>
<br>
<br>
<hr>

<!-- List Section -->
<div id="list" class="container list-text">
   <h2 class="list-heading d-flex justify-content-center">Daftar Text ka</h2>
   <form action="#list" method="get" class="mb-3">
      <div class="input-group">
         <input type="text" class="form-control" placeholder="Cari teks..." name="cari" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
         <button class="btn btn-primary" type="submit">Cari</button>
      </div>
   </form>
   <ul class="list-group">
      <?php  
         if(isset($_GET['cari'])&& cari($_GET['cari'])){
           $cariki = ($_GET['cari']);
           $hasil = cari($cariki);
           $hsl = waktu_konversi($hasil[0]['waktu']);
         }
         ?>
      <?php if(isset($_GET['cari'])&& cari($_GET['cari'])): ?>
      <div class="alert alert-success">Kudapaki data na cuy di up pada <?php echo $hsl; ?> </div>
      <?php else :?>
      <?php if(isset($_GET['cari'])): ?>
      <div class="alert alert-danger">Nda ada "<?php echo $_GET['cari']; ?>" anu</div>
      <?php endif?>
      <?php endif?>
      <?php if(isset($_GET['i'])): ?>
      <div class="alert alert-success">Data  Berhasil Di tambahkan cok</div>
      <?php endif?>
      <?php foreach ($hasil as $row) :?>
      <li class="list-group-item list-group-item-action"><?php echo $row["teks"]?>
         <span class="float-right small-text text-muted"><?php echo $row["user"] . ' - ' . waktu_konversi($row["waktu"]); ?></span>
      </li>
      <?php  endforeach?>
   </ul>
   <!-- Pagination -->
   <ul class="pagination justify-content-center mt-2">
      <?php paginasisambgarang()?>
      <!-- ... -->
   </ul>
</div>

<!-- List Section -->
<div id="aplikasi" class="container list-text ">
   <h2 class="list-heading d-flex justify-content-center">Daftar File Andalan</h2>
   <ul class="list-group">
      <?php include_once "format_laporan.php"?>
      <?php foreach ($format_laporan as $row) :?>
      <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
         <?= $row['nama'] ?>
         <a href="<?= $row['link'] ?>" target="_blank" class="btn btn-sm btn-primary">Donglod</a>
      </li>
      <?php endforeach?>
   </ul>
</div>

<?php include_once "aplikasi.php"?>
<div class="container mt-5">
    <h2 class="list-heading d-flex justify-content-center">Daftar Aplikasi Andalan</h2>

    <div class="row justify-content-center">
        <?php foreach ($aplikasi_links as $aplikasi) : ?>
            <div class="col-md-4 col-sm-6 mb-4 rounded">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="<?= $aplikasi['icon']; ?>" class="img-fluid mb-3 p-3" alt="<?php echo $aplikasi['nama_aplikasi']; ?>">
                        <h5 class="card-title"><?= $aplikasi['nama_aplikasi']; ?></h5>
                        <p class="card-text"><?=  $aplikasi['deskripsi']; ?></p>
                        <a href="<?= $aplikasi['link']; ?>" class="btn btn-primary" target="_blank"><i class="fas fa-download"></i> Download</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<div class="container mt-5 border p-3 d-flex justify-content-center align-items-center flex-column">
   <h3>Daftar Format Laporan </h3>
   <h5>Coming Soon</h5>
</div>
</div>
<div id="kritik" class="container mt-5">
   <div class="row">
      <div class="col-md-6">
         <h2>Ini Website To</h2>
         <p>
            Untuk Belajar php native ku ji Sama untuk kebutuhan berbagi text langsung saat kuliah dan kumpul kumpulan software itu ji aowkaowk
            masi dalam tahap perkembangan ji ini kodong
         </p>
      </div>
      <div class="col-md-6 mt-4">
         <h4>Berikan Kritik Dan Saran Tod</h4>
         <?php if (janganspam('kritik_saran')): ?>
         <form action="" method="post" class="w-100">
            <div class="form-group">
               <textarea class="form-control" id="kritik" name="kritik" rows="4" placeholder="Minta Saran ta fitur apa bagus dan Kritik ta siapa tau bagus klo ada juga bug mohon tulis hehe supaya bisa ku solve anjay "></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
            <?php else: ?>
            <div class="alert alert-info" role="alert" id="countdown_kritik">Jangan Spam Cuy </div>
            <?php include_once "countdown_kritik.php" ?>
            <?php endif; ?>
         </form>
      </div>
   </div>
</div>
<br>
<br>
<br>
<br>
<?php 
   include_once "footer.php"
   ?>