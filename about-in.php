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
  
<!-- our business -->
<div class="container-xxl py-5 mt-md-4">
            <div class="container">
                <div class="text-center mx-auto mb-4" style="max-width: 600px;">
                    <h1 class="mb-3">About our company</h1>
                </div>
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6" data-wow-delay="0.1s">
                                <img class="img-fluid rounded w-100" src="images/wed.jpg" alt="">
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h3 class="mb-3">Your Partner – From Start to Finish</h3>
                                    <p>Our entire company wants you to feel relaxed and make the whole process as easy as possible. We’ve hand-selected our entire team to ensure that you not only get the people that are the best at what they do, but who are also truly happy to be a part of your day. It has been our mission to always give our clients 5-star treatment and make them the center of the event. We coordinate the activities, entertainment, transportation, catering, program logistics and much more. We want you to think of us as your silent partner – from start to finish.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!-- our business END -->

  <!-- about us -->
  <div class="container-xxl py-5 mt-md-5 g-3">
            <div class="container">
                <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                    <h1 class="mb-0">Our Team</h1>
                </div>
                
                <div class="row g-4 mx-2">

                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="images/me.jpeg" style="width: auto; height: 400px;">
                            </div>
                            <div class="text-center p-4 mb-0">
                                <h5 class="fw-bold mb-3">Adrianna Rose Lopez</h5>
                                <p class="font-weight-light text-justify" style="font-size:12.5px;">
                                Our Chief Executive Officer, who aligns our company's vision, direction and strategic decisions. She is in charge of coordinating events, developing top talents, managing financial performance, and developing strong client relationships.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="images/jamelle.jpg" style="width: auto; height: 400px;">
                            </div>
                            <div class="text-center p-4 mb-0">
                                <h5 class="fw-bold mb-3">Jamelle Salcedo</h5>
                                <p class="font-weight-light text-justify" style="font-size:12.5px;">
                                Our Head Event Organizer who is responsible for planning events, managing our venues and delivering a superb experience for our clients. She implements the availability of the places, maintains records, and always delivers the event on time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="images/ivan.jpg" style="width: auto; height: 400px;">
                            </div>
                            <div class="text-center p-4 mb-0">
                                <h5 class="fw-bold mb-3">John Ivan Gonzales</h5>
                                <p class="font-weight-light text-justify" style="font-size:12.5px;">
                                  Our Web Developer, who is responsible for maintaining and updating the website. He ensures the website's reliability and convenience while also accommodating more customers for the business. A dedicated, self-driven, and trustworthy website manager. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="images/daniela.jpg" style="width: auto; height: 400px;">
                            </div>
                            <div class="text-center p-4 mb-0">
                                <h5 class="fw-bold mb-3">Daniela Cadayday</h5>
                                <p class="font-weight-light text-justify" style="font-size:12.5px;">
                                  Our Chief Service Officer, who is responsible for the sales, transactions, and event booking assistance. She interacts with customers to provide information in response to inquiries about the processes and services, and to handle and resolve complaints. </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>  
  <!-- about us END -->  

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
