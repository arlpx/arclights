<?php 

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

<!-- FAQ section -->
<section id="faq" class="py-md-6 mb-md-4">
  <h2 class="text-center w-90 mt-lg-4">Frequently Asked Questions</h2>
  <div class="container my-5">
    <div class="accordion w-75 mx-auto" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              How much these services costs?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Our services costs may vary depending on the event or activities. You may have the quotation costs by filling up the Check Booking Availability section on the homepage.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Do I need to create an account to make a purchase?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>No, to make a purchase or booking through ArcLights you do not need to pre-register or create an account. 
              Accounts are only used to access certain services. 
              A confirmation email will be sent to you on completion of booking so that you have a record.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Can I make a change with my reservation or booking?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
              <p>Yes you can, though it is recommended that you made contact with the us as soon as possible to increase the likelihood of these changes being made before the nearing of the event date.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Who do I ask for a query about the event or venue? 
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>For queries relating to the event or the venue where the event is being held, you can contact us using our official email or hotlines(Tolls may apply). </p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              I haven’t received yet my confirmation or I can't find my bookings?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>On completion of booking, you are sent a confirmation email that has your tickets and receipt attached as a PDF. 
              If you're not able to locate your confirmation email, you can have it resent to you by contating us using our official email or hotlines(Tolls may apply).</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              Where can I do refunds or cancellation?
          </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>To inquire about obtaining a refund, you will find a Inquiries button on the event and within your confirmation email. 
              The reservation fee, which may apply to a booking for some events, is not refundable as outlined within our T&Cs.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSeven">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            Any assurance about the legitimacy of your services?
          </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
          <div class="accordion-body">
          <p>As much as we can assure you with words, we believe that our reviews, testimonies and recommendations say more about the legitimacy and quality of our services. 
            Feel free to vouch us with our clients to have an assurance of our services.
          </p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingEight">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
            Where are the locations where we can book an event?
          </button>
        </h2>
        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>As of now, we are only offering services in the Philippines. We may have plans to expand to offer our services in different locations but it is not yet official. 
              Stay tuned for updates. Thanks for your support!</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FAQ section END -->

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
<script src="js/script.js"></script>
</body>
</html>
