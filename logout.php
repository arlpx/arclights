<?php
require 'connection.php';
$_SESSION = [];
session_start();
session_unset();
session_destroy();

if (isset($_POST['btnLogout'])){
  header('Location: logout.php');
  $warning = 'You are now logged out.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arclights Events</title>

    <!-- web icon -->
    <link rel="icon" type="images/png" href="images/logo.png">

    <!-- link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
        .h-font{
            font-family: 'Monserrat', sans-serif;
        } 
        .custom-bg:hover{
            background-color: #4b6043;
        }
        .availability-form{
          margin-top: -100px;
          z-index: 2;
          position: relative;
        }
        .footer.container{
          display:block
        }
    </style>
</head>
<body class="bg-light">

  <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand me-3" href="index.php">
          <img src="images/logo.png" class="me-3">
          <img src="images/lname.png" alt="logo name"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active me-2" aria-current="page" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active me-2" aria-current="page" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active me-5" aria-current="page" href="contact.php">Contact Us</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
              <a href="login.php"><button type="button" class="btn btn-success me-2 text-bg-success">Log in</button></a> 
              <a href="register.php"><button type="button" class="btn btn-outline-success shadow-none me-lg-3 me-3" type="submit">Sign up</button></a>
          </form>
        </div>
      </div>
  </nav>
  <!-- navbar end -->
  <br>
  
  <!-- logout notif -->
  <div class="container">
      <div class="column">
        <div class="row text-center">
            <i class="bi bi-check-circle" style="font-size: 250px;"></i>
            <h1 class='g-3'>You have been logged out</h1>
            <p class="mb-3 g-3" style='font-size: 20px;'>Thank you</p>
              <a id="forgot_password_link" class="link-muted text-transform-none font-weight-normal g-3" href="login.php">Back to login page</a>
        </div>
      </div>
  </div>
  <!-- logout notif -->

  <br><br><br>
  <div class="d-flex flex-column flex-md-row justify-content-center py-4 py-md-7 border-top">
  <!-- Copyright -->
  <div class="order-2 order-md-0">
      <p class="small text-muted text-center">
        © Copyright 2022 - Arclights Ltd
      </p>
    </div>
    <!-- End Copyright -->
  </div>

    <script src="js/script.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  </body>
</html>