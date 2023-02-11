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
        <a href='service-in.php?cat=".$getCat."'><img src='images/".$image."' class='card-img-top' style='height: 380px;'></a>
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
  
<!-- carousel -->
  <div class="container-fluid">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/event_wedding.jpg" alt="wedding" class="w-100 d-block"></div>
        <div class="swiper-slide"><img src="images/birthday.jpg" alt="birthday jumpshot" class="w-100 d-block"></div>
        <div class="swiper-slide"><img src="images/concert.jpg" alt="live band concert" class="w-100 d-block" style='max-height: 691px;'></div>
        <div class="swiper-slide"><img src="images/conference.jpg" alt="business conference" class="w-100 d-block"></div>
      </div>
    </div>
  </div>
<!-- carousel end -->

  <!-- check available events -->
  <div class="container availability-form align-content-lg-center mb-lg-4">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5 class="text-center mb-4">Check Booking Availability</h5>
        <br>
        <form>
          <div class="row align-items-end">
            <div class="col">
              <label class="form-label" style="font-weight: 500;">Start date</label>
              <input type="date" class="form-control shadow-none mb-3">
            </div>
            <div class="col">
              <label class="form-label" style="font-weight: 500;">Time</label>
              <input type="time" class="form-control shadow-none mb-3">
            </div>
            <div class="col">
              <label class="form-label" style="font-weight: 500;">End date</label>
              <input type="date" class="form-control shadow-none mb-3">
            </div>
            <div class="col">
              <label class="form-label" style="font-weight: 500;">Time</label>
              <input type="time" class="form-control shadow-none mb-3">
            </div>
            <div class="col-lg-2">
              <label class="form-label" style="font-weight: 500;">Pax</label>
              <input type="text" class="form-control shadow-none mb-3">
            </div>
            <div class="col-auto d-grid gap-2 mx-auto mb-3">
            <a href="contact-in.php"><button type="button" class="btn btn-outline-success rounded-2 px-lg-3 text-bg-success">BOOK NOW</button></a>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- check available events END -->
<br><br>
<!-- about -->
<div class="container-xxl py-5 mt-lg-1 mb-lg-5">
  <div class="container">
      <div class="row g-5 align-items-center">
          <div class="col-lg-6">
              <h4 class="section-title text-center text-success text-uppercase">About Us</h4>
              <h1 class="mb-4">Welcome to <span class="text-success text-uppercase">Arclights</span></h1>
              <p class="mb-4">
                Find your perfect event with Arclights, where every event shines brightly.<br>
                Your one-stop shop for unforgettable experiences, bringing the brightest events to you. For all your event needs, from small gatherings to the large festivals, our event booking system has you covered.
              </p> 
              <div class="row g-3 pb-4">
                  <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                      <div class="border rounded p-1">
                          <div class="border rounded text-center p-4">
                              <i class="fa fa-calendar-day fa-2x text-success mb-2"></i>
                              <h2 class="mb-1" data-toggle="counter-up">1000+</h2>
                              <p class="mb-0">Events</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                      <div class="border rounded p-1">
                          <div class="border rounded text-center p-4">
                              <i class="fa fa-users-cog fa-2x text-success mb-2"></i>
                              <h2 class="mb-1" data-toggle="counter-up">50+</h2>
                              <p class="mb-0">Staffs</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                      <div class="border rounded p-1">
                          <div class="border rounded text-center p-4">
                              <i class="fa fa-users fa-2x text-success mb-2"></i>
                              <h2 class="mb-1" data-toggle="counter-up">100+</h2>
                              <p class="mb-0">Clients</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="text-center">
                <a class="btn btn-success py-3 px-5 mt-2" href="#">Explore More</a>
              </div> 
          </div>
          <div class="col-lg-6">
              <div class="row g-3">
                  <div class="col-6 text-end">
                      <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="images/about-1.jpg" style="margin-top: 25%;">
                  </div>
                  <div class="col-6 text-start">
                      <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="images/about-2.jpg">
                  </div>
                  <div class="col-6 text-end">
                      <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="images/about-3.jpg">
                  </div>
                  <div class="col-6 text-start">
                      <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="images/about-4.jpg">
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- about END -->

<!-- Services -->
<div class="container mt-lg-5">
  <h1 class="text-center w-90 mt-5">What We Do</h1>
      <div class="row justify-content-center mt-5">
        <?php echo $displaySrvc;?>
      </div>
</div>
<!-- Services -->

<!-- Testimonials/Reviews -->
<section class="review" id="review">
  <h1 class="heading mb-4 text-center">Client Testimonials</h1>
  <div class="box-container">
      <div class="box">
          <div class="stars text-success">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <p>The best event planning company around! I was able to witness first hand their attention to detail. The location, food, DJ, host, theme, photo booth and other vendors were amazing! The crowd must have been at least 300 people and was very very impressed  I specifically like the way they keeping us engaged with entertainment and not having any hiccups.. highly recommend! Arclights ran the show smoothly and professionally from beginning to end!
          </p>
          <div class="user">
              <img src="images/pic-1.jpg" alt="woman picture">
              <div class="user-info">
                  <h3>Alice Batumbakal</h3>
                  <span>Entrepreneur</span>
              </div>
          </div>
      </div>
  
      <div class="box">
          <div class="stars text-success">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <p>The event went wonderful – Arclights was awesome in the planning phase and definitely in the execution of the event. They did an outstanding job! The DJ selected the perfect music for the night. The food was awesome. Even the coffee was great and my wife is a super picky coffee drinker!! Our staff has been raving about how much fun they had. It would not have been possible w/out Arclights. I appreciate it and wanted to let you know how pleased we are with how things went.</p>
          <div class="user">
              <img src="images/pic-2.jpg" alt="picture of a man with glasses">
              <div class="user-info">
                  <h3>Jefferson Bautista</h3>
                  <span>Client</span>
              </div>
          </div>
      </div>
  
      <div class="box">
          <div class="stars text-success">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <p>I really enjoyed working with Arclights! They were professional, available, flexible, and extremely organized. The catering was delicious and wasn’t pre-made. The tri-tip was even cooked on-site over a large grill with oak wood! OMG and the details!  From the menus in decorative frames at each buffet station, to the festive décor, everything went together perfectly. I’ve worked on a lot of events in the past, and a great event lead really makes all the difference, really takes you to another place. I would definitely recommend them.</p>
          <div class="user">
              <img src="images/pic-3.jpg" alt="picture of a woman">
              <div class="user-info">
                  <h3>Jane Cruz</h3>
                  <span>Brand Manager</span>
              </div>
          </div>
      </div>

      <div class="box">
        <div class="stars text-success">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Arclights helped us plan our company’s summer and holiday party in 2022. They were extremely responsive and took initiative on everything which made the planning and execution a breeze for our company. The venues they suggested were a hit with our employees and everyone had nothing but great things to say about the venue, activities, and food; all of which were suggested and setup with Arclights team’s guidance. We will most definitely be using Arclights for future events.</p>
        <div class="user">
            <img src="images/pic-4.jpg" alt="man">
            <div class="user-info">
                <h3>Clyde Tyler</h3>
                <span>Manager</span>
            </div>
        </div>
    </div>
  </div>     
</section>
<!-- Testimonials/Reviews END -->

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    
    <script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        }
      });
    </script>
</body>
</html>
