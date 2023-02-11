<?php
session_start();
include('connection.php');
$warning = '';
$displaySrvc = '';
$viewSrvc = '';

// display services from database
$getServices = mysqli_query($conn, "SELECT * FROM `services` GROUP BY `CATEGORY`");
while ($array = mysqli_fetch_assoc($getServices)){
  $getCat = $array['CATEGORY'];
  // $getDesc = $array['DESCRIPTION'];

  $displaySrvc .= "<div class='card'>
        <a href='#'><img src='images/wed.jpg' class='card-img-top'></a>
        <div class='card-body text-center'>
          <h5 class='card-title'>".$getCat."</h5>
          <p class='card-text'>
          </p>
        </div>
      </div>";
}

// get service category
$capCat = $_GET['cat'];
$showSrvc = mysqli_query($conn, "SELECT * FROM `services` WHERE `CATEGORY` = '$capCat' ORDER BY RAND()");
while($get =  mysqli_fetch_assoc($showSrvc)){
  $prodName = $get['PRODUCT_NAME'];
  $descr = $get['DESCRIPTION'];
  $image = $get['IMAGE'];

  $viewSrvc .= "<div class='col-12 col-md-6 col-lg-5 mb-3 d-flex' style='position: relative;'>
    <div class='card'>
      <img src='images/".$image."' class='card-img-top' style='height: 380px;'></a>
      <div class='card-body text-center'>
        <h5 class='card-title'>".$prodName."</h5>
        <p class='card-text'>".$descr."</p>
      </div>
    </div>
  </div>";
}

// show login credentials
$recname = $_SESSION['username'];
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];

if(isset($_SESSION['USERNAME'])){
  $activeSession = 1;
  $uname = $_SESSION['USERNAME'];
  $getUserInfo = mysqli_query($conn, "SELECT * FROM `customer` WHERE `USERNAME` = '$uname'");
  while($newRow = mysqli_fetch_assoc($getUserInfo)){
    $newUserName = $newRow['USERNAME'];
    $newEmail = $newRow['EMAIL'];
    $newFName = $newRow['FIRSTNAME'];
    $newLName = $newRow['LASTNAME'];
     }
  }
  else{
  $activeSession = 0;
}

if(!empty($_SESSION["id"])){
  $id = $_SESSION["CUSTOMER_NUM"];
  $result = mysqli_query($conn, "SELECT * FROM `customer` WHERE CUSTOMER_NUM = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header('Location. index.php');
}

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
        <a class="navbar-brand me-3" href="home.php">
          <img src="images/logo.png" class="me-3">
          <img src="images/lname.png" alt="logo name"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active me-2" aria-current="page" href="faq-in.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active me-2" aria-current="page" href="about-in.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active me-5" aria-current="page" href="contact-in.php">Contact Us</a>
            </li>
          </ul>

          <form class="d-flex"> 
            <i class="bi bi-person text-success fs-2 me-2 mt-2"></i>
            <p style="font-size: 22px;" class="mt-3">Welcome, <?php echo $fname;?> <?php echo $lname;?>!
            <button type="submit" name="btnLogout" class="btn btn-link"><a href="logout.php">Logout</a></button>
            </p>
          </form>

        </div>
      </div>
  </nav>
<!-- navbar end -->

<!-- Services -->
<div class="container">
  <h1 class="text-center w-90 mt-5">Our Services</h1>
    <div class="row justify-content-center mt-5">
        <?php echo $viewSrvc;?>
    </div>
</div>
<!-- Services -->

<!-- Footer -->
<footer class="container space-top-1 py-5">
    <div class="row mb-7">

  <div class="col-sm-6 col-lg-3 mb-6 mb-sm-4 text-center text-sm-left">
    <h2 class="h6 font-weight-semi-bold mb-3">
      Services
    </h2>

    <!-- List Group -->
    <div class="list-group list-group-flush list-group-borderless mb-3">
        <a class="list-group list-group-item-action mb-2" href="#">Event Booking System</a>
        <a class="list-group list-group-item-action mb-2" href="#">Conference Booking System</a>
        <a class="list-group list-group-item-action mb-2" href="#">Activity Booking System</a>
        <a class="list-group list-group-item-action mb-2" href="#">Features</a>
    </div>
    <!-- End List Group -->
  </div>

  <div class="col-sm-6 col-lg-3 mb-6 mb-sm-4 text-center text-sm-left">
    <h2 class="h6 font-weight-semi-bold mb-3">
      Resources
    </h2>

    <!-- List Group -->
    <div class="list-group list-group-flush list-group-borderless mb-3">
        <a class="list-group list-group-item-action mb-2" href="#">Blogs</a>
        <a class="list-group list-group-item-action mb-2" href="#">Donation Pages</a>
        <a class="list-group list-group-item-action mb-2" href="#">Brand</a>
        <a class="list-group list-group-item-action mb-2" href="#">Partnerships</a>
    </div>  

    <!-- End List Group -->
    </div>

  <div class="col-sm-6 col-lg-3 mb-6 mb-sm-4 mb-md-0 text-center text-sm-left">

    <h2 class="h6 font-weight-semi-bold mb-3">
      Arclights
    </h2>


    <div class="list-group list-group-flush list-group-borderless mb-3">
        <a class="list-group list-group-item-action mb-2" href="#">About us</a>
        <a class="list-group list-group-item-action mb-2" href="#">Careers</a>
        <a class="list-group list-group-item-action mb-2" href="#">Contact us</a>
        <a class="list-group list-group-item-action mb-2" href="#">Affiliates</a>
    </div>
    <!-- End List Group -->
  </div>

  <div class="col-sm-6 col-lg-3 mb-6 mb-sm-4 mb-md-0 text-center text-sm-left">
    <h2 class="h6 font-weight-semi-bold mb-3">
      Legal
    </h2>

    <!-- List Group -->
    <div class="list-group list-group-flush list-group-borderless mb-3">
        <a class="list-group list-group-item-action mb-2" href="google.com">Terms &amp; Conditions</a>
        <a class="list-group list-group-item-action mb-2" href="google.com">Privacy Statement</a>
    </div>
    <!-- End List Group -->
  </div>
</div>

  <div class="d-flex flex-column flex-md-row justify-content-center py-4 py-md-7 border-top">
    <!-- Copyright -->
    <div class="order-2 order-md-0">
      <p class="small text-muted text-center">
        © Copyright 2022 - Arclights Ltd
      </p>
    </div>
    <!-- End Copyright -->
  </div>
</footer>
<!-- Footer exit -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
