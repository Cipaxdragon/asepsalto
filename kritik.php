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
    
</body>