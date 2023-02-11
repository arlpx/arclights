<?php
session_start();
include('connection.php');
$warning = '';
$displaySrvc = '';

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

// display services from database
$getServices = mysqli_query($conn, "SELECT * FROM `services` GROUP BY `CATEGORY`");
while ($array = mysqli_fetch_assoc($getServices)){
  $getCat = $array['CATEGORY'];
  $descr = $array['DESCRIPTION'];
  $image = $array['IMAGE'];

  $displaySrvc .= "<div class='col-12 col-md-6 col-lg-5 mb-3 d-flex' style='position: relative;'>
      <div class='card' >
        <a href='services.php?cat=".$getCat."'><img src='images/".$image."' class='card-img-top' style='height: 380px;'></a>
        <div class='card-body text-center'>
          <h5 class='card-title'>".$getCat."</h5>
          <p class='card-text'>".$descr."</p>
        </div>
      </div>
    </div>";
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
          margin-top: -15px;
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
          <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
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
  
<!-- contact us  -->
<div class="container-fluid">
  <div class="container">
    <div>
      <h2 class="text-center mt-4 mb-md-3 p-3">Contact Us</h2>
    </div>

    <div class="row">
      <div class="col-md-7 shadow rounded p-5 mb-3">
        <div class="row">

          <div class="col mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" required>
          </div>

          <div class="col mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="name@domain.com" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Cellphone Number</label>
            <input type="tel" class="form-control shadow-none" placeholder="ex. 09123456789">
          </div>

          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea type="text" class="form-control shadow-none" placeholder="Write your message here" required></textarea>
          </div> 
          
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success btn-lg mt-3 d-grid gap-2 col-6 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Submit
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                </div>
                <div class="modal-body">
                  Form sent successfully.
                </div>
                <div class="modal-footer">
                  <a href="home.php"><button type="button" class="btn btn-success">Close</button></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

            <div class="col-md-5">
              <img src="images/contact.jpg" class="img-fluid" style="height: 530px; width: 540px;" alt="email">
            </div>

    </div>
  </div>
</div>
<!-- contact us end -->

<!-- Footer -->
  <footer class="container space-top-1 py-5 mt-5">
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
    <script src="js/script.js"></script>

</body>
</html>
