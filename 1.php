<?php 
  include_once "function.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
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
      <p><?php

  $hasil=kueri("SELECT * FROM `sambarang` ");
  var_dump($hasil);
?></p>
      <div class="custom-form">
        <!-- Form Input and Link -->
        <form>
          <div class="form-group">
            <input type="hidden" class="form-control" name="user" readonly >
            <input type="text" autocomplete="off" class="form-control" name="text" placeholder="Tulis text nu sambarang">
          </div>
          <div class="form-group">
            <a href="#" class="btn btn-primary btn-block">Kirim mi</a>
          </div>
        </form>
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
    <ul class="list-group">
      <li class="list-group-item list-group-item-action">Cras justo odio</li>
      <li class="list-group-item list-group-item-action">Dapibus ac facilisis in</li>
      <li class="list-group-item list-group-item-action">Morbi leo risus</li>
      <li class="list-group-item list-group-item-action">Porta ac consectetur ac</li>
      <li class="list-group-item list-group-item-action">Vestibulum at eros</li>
    </ul>
  </div>
<!-- List Section -->
<div id="list" class="container list-text ">
    <h2 class="list-heading d-flex justify-content-center">Daftar Aplikasi Andalan</h2>
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
        Cras justo odio
        <a href="#" class="btn btn-sm btn-primary">Download</a>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
        Cras justo odio
        <a href="#" class="btn btn-sm btn-primary">Download</a>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
        Cras justo odio
        <a href="#" class="btn btn-sm btn-primary">Download</a>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
        Cras justo odio
        <a href="#" class="btn btn-sm btn-primary">Download</a>
      </li>
      
    </ul>
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
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
