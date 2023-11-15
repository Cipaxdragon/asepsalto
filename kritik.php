
<?php 

  if(!isset($_COOKIE['user'])){
    setcookie("user", uniqid(), time() + (30 * 24 * 60 * 60));
  }
  include_once "function.php";


  $dataPagination = pagination_data();
  $awal = $dataPagination['awalData'];
  $dataperhalaman = $dataPagination['jumlahDataPerHalaman'];
  $dataPerPage = $dataPagination['jumlahDataPerHalaman'];
  $hasil=kueri("SELECT * FROM `kritik_Saran` ORDER BY waktu DESC ");
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
  <div class="container">
        
    </div>
<br>
<br>
<br>
  <!-- List Section -->
  <div id="list" class="container list-text">
    <h2 class="list-heading d-flex justify-content-center">Kritik</h2>
    <form action="#list" method="get" class="mb-3">
      <div class="input-group">

        <input type="text" class="form-control" placeholder="Cari teks..." name="cari" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
      <button class="btn btn-primary" type="submit">Cari</button>
    </div>
  </form>
    <ul class="list-group">
  <?php  
    if(isset($_GET['cari'])&& cari_kritik($_GET['cari'])){
      $cariki = ($_GET['cari']);
      $hasil = cari_kritik($cariki);
      $hsl = waktu_konversi($hasil[0]['waktu']);
    }
  ?>
      <?php if(isset($_GET['cari'])&& cari_kritik($_GET['cari'])): ?>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  </div>

  <?php 
include_once "footer.php"
?>