
<?php 

  if(!isset($_COOKIE['user'])){
    setcookie("user", uniqid(), time() + (30 * 24 * 60 * 60));
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



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .small-text {
  font-size: 0.6em; /* Adjust the font size as needed */
}

.text-muted {
  color: #6c757d; /* Adjust the color as needed */
}

    @media (max-width: 768px) {
  /* Other styles for mobile view */

  /* Reduce the size of the hamburger button/icon */
  .navbar-toggler-icon {
    font-size: 0.5rem; /* Adjust the font size as needed */
  }
}
        .btn-primary {
            background-color: #1245ba;
        }

        .btn-primary:hover {
            background-color: #0e2c73;
        }
          ::-webkit-scrollbar {
         display: fixed;
         background-color: white;
         width: 7px;
      }

      ::-webkit-scrollbar-thumb {
         background: #EBEBEB;
         border-radius: 10px;
      }

      ::-webkit-scrollbar-thumb:hover {
         background: #D6D6D6;
      }
    /* Custom CSS styling */

    /* Add animation to the navigation bar */
    .navbar {
      animation: fadeInDown 1s ease-out;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero-image {
        margin-top: 57px;
        /* height: 1014px; */
        background-image: url('!.png');
        background-size: cover;
        background-position: center;
        color: #ffffff;
        text-align: center;
        padding: 150px 0;
        animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .hero-title {
      font-size: 3em;
      margin-bottom: 20px;
      /* Add animation to the hero title */
      animation: slideInLeft 1s ease-out;
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-20px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .custom-form {
      max-width: 400px;
      margin: 0 auto;
      /* Add animation to the form */
      animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .list-text {
      margin-top: 50px;
      /* Add animation to the list section */
      animation: fadeIn 1s ease-out;
    }

    .list-heading {
      /* Add animation to the list heading */
      animation: fadeInUp 1s ease-out;
    }

    /* New class for list heading animation */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Bootstrap navigation bar */
    /* ... */

    /* Bootstrap JS and Popper.js */
    /* ... */

    /* Tambahkan media query untuk perangkat seluler */
@media (max-width: 768px) {
  /* Pengaturan untuk perangkat seluler */

  /* Penyesuaian pada navigasi */
  .navbar {
    animation: none; /* Hilangkan animasi pada navigasi */
  }

  /* Margin atas pada gambar hero dikurangi untuk memberikan lebih banyak ruang */
  .hero-image {
    margin-top: 20px;
  }

  /* Margin atas pada judul hero dikurangi */
  .hero-title {
    margin-top: 10px;
  }

  /* Margin atas pada daftar diperkecil */
  .list-text {
    margin-top: 20px;
  }

  /* Mengatur tinggi gambar hero menjadi lebih kecil */
  .hero-image {
    height: 500px;
  }

  /* Menyesuaikan margin dan ukuran font pada judul hero */
  .hero-title {
    font-size: 2em;
    margin-bottom: 10px;
  }

  /* Menyesuaikan margin pada elemen formulir */
  .custom-form {
    margin-top: 20px;
  }

      ::-webkit-scrollbar {
         display: fixed;
         background-color: white;
         width: 7px;
      }

      ::-webkit-scrollbar-thumb {
         background: #EBEBEB;
         border-radius: 10px;
      }

      ::-webkit-scrollbar-thumb:hover {
         background: #D6D6D6;
      }
  
}

  </style>
  <title>Welcome to Asepsalto</title>
</head>
<body>

  <!-- Navigation Bar -->
  <!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#list">List</a>
          </li>
          <!-- Add more navigation links as needed -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Hero Image Section -->
  <div class="hero-image">
    <div class="container">
      <h1 class="hero-title">Welcome to Asepsalto</h1>
      <p> Selamat datang di website asal asalan hanya untuk latihan php native aing dan kebutuhan kuliah</p>



      <div class="custom-form">
        <?php if (janganspam()): ?>
        <!-- Form Input and Link -->
        <form method="post">
          <div class="form-group">
              <input type="text" autocomplete="off" class="form-control" name="teks" placeholder="Tulis text nu sambarang">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block" name="submit"> kirim mi</button>
            </div>
          </form>
          <?php else: ?>
            <div class="alert alert-info" role="alert" id="countdown">Jangan Spam</div>
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
<div id="list" class="container list-text ">
    <h2 class="list-heading d-flex justify-content-center">Daftar Aplikasi Andalan</h2>
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
        Adobe Photoshop CC
        <a href="https://drive.google.com/file/d/1LJPtwIH_iqpKk6OsNln4kjma-s4kjR0f/view" target="_blank" class="btn btn-sm btn-primary">Download</a>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
        Corel Draw
        <a href="https://drive.google.com/file/d/1YSw9ALCrxNkn_6Zl1A17dD9EKAj939an/view"  target="_blank" class="btn btn-sm btn-primary">Download</a>
      
    </ul>
  </div>

  </div>
  <div id="kritik" class="container mt-5">
      <div class="row">
         <div class="col-md-6">
            <h2>Ini Website To</h2>
            <p>
               Untuk Belajar php native ku ji Sama untuk kebutuhan berbagi text langsung saat kuliah dan kumpul kumpulan software itu ji aowkaowk
            </p>
     
         </div>
       <div class="col-md-6 d-flex flex-column align-items-center">
    <h4>Berikan Kritik Dan Saran Tod</h4>
    
    <form action="" method="post" class="w-100">
        <div class="form-group">
            <textarea class="form-control" id="kritik" name="kritik" rows="4" placeholder="Tulis kritik Anda"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

      </div>
   </div>

  

  <br>
  <br>
  <br>
  <br>
  <!-- Footer Section -->
<footer class="bg-light py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>Menu</h4>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#list">List</a></li>
            <!-- Add more menu links as needed -->
          </ul>
        </div>
        <div class="col-md-6">
          <h4>Follow Us</h4>
          <!-- Add your social media links here -->
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <!-- Add more social media links as needed -->
          </ul>
        </div>
      </div>
      <hr class="my-4">
      <div class="row">
        <div class="col-md-6">
          <p>&copy; 2023 Asepsalto. All rights reserved.</p>
          <p>Designed by Cet gi pi ti</p>
          <p>Backend By Ghazali</p>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
// Set the countdown time in seconds
var countdownTime = <?php echo selisihspam()?>;

// Update the countdown every second
var countdownElement = document.getElementById('countdown');
var countdownInterval = setInterval(function() {
    // Display the remaining time
    countdownElement.innerHTML = 'Jangan Spam Cuy Tunggu dalam waktu ' + countdownTime + ' detik';

    // Check if the countdown has reached zero
    if (countdownTime <= 0) {
        clearInterval(countdownInterval); // Stop the countdown
        countdownElement.innerHTML = 'Nah Bisa Mako Input Refresh ki rong aokwoawk';
    } else {
        countdownTime--; // Decrement the countdown time
    }
}, 1000); // Update every 1000 milliseconds (1 second)
</script>

</body>
</html>