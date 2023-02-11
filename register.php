<?php
session_start();
include('connection.php');
$notif = "";

if (isset($_POST['btnRegister'])) {
  $fname = $_POST['txtFName'];
  $lname = $_POST['txtLName'];
  $recname = $_POST['txtUsername'];
  $email = $_POST['txtEmail'];
  $location = $_POST['txtLoc'];
  $phone = $_POST['txtCelNum'];
  $password = $_POST['txtPassword'];
  $cpassword = $_POST['txtConfirmPassword'];

  if (!empty($recname)) {
    if (!empty($email)) {
      if (!empty($phone)) {
        if (!empty($password)) {
          if (!empty($cpassword)) {
            if(strlen($password) >= 8){
              if($password == $cpassword){
                  $queryRecord = mysqli_query($conn, "SELECT * FROM `customer` WHERE USERNAME = '$recname'");
                  if(mysqli_num_rows($queryRecord) > 0){
                      $notif = "This username is already taken. Please try another.";
                  } 
                  else {
                      $queryRecordEmail = mysqli_query($conn, "SELECT * FROM `customer` WHERE EMAIL = '$email'");
                    if (mysqli_num_rows($queryRecordEmail) > 0) {
                        $notif = "This email is already taken. Please try another.";
                    }
                    else{
                      //BCRYPT
                      $options = ['cost' => 8];
                      $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

                      $saveRecord = mysqli_query($conn, "INSERT INTO `customer`(`CUSTOMER_NUM`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `CELL_NUM`, `PASSWORD`, `USERNAME`, `ADDRESS`) VALUES ('','$fname','$lname','$email','$phone','$hashPassword','$recname','$location')");
                    }

                  }
                    $notif = "Account successfully registered.";

              } else {
                $notif = "Password and Confirm Password does not match. Please try again.";
              }
            } else {
              $notif = "Password should be at least 8 characters in length. Please try again.";
            }
          } else {
            $notif = "Confirm Password field cannot be blank.";
          }
        } else {
          $notif = "Password field cannot be blank.";
        }
      } else {
        $notif = "Cellphone number field cannot be blank.";
      }
    } else {
      $notif = "Email address cannot be blank.";
    }
  } else {
    $notif = "Username cannot be blank.";
  }
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
  <br><br>
  <!-- sign up -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="register.php" method="POST">
          <div class="header text-center">
            <h6 class="title fs-3 mb-lg-3 justify-content-center">
              <i class="bi bi-person-lines-fill me-2"></i>
              Register for an Account
            </h6>
            <br>
            <p class="text-center" style="font-style: 15px; font-style: italic; color: red;"><?php echo $notif;?></p>
          </div>
          <div class="body">

            <div class="form-group mb-3">
              <label class="form-label">First Name</label>
              <input name="txtFName" type="text" class="form-control shadow-none">
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Last Name</label>
              <input name="txtLName" type="text" class="form-control shadow-none">
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Username</label>
              <input name="txtUsername" type="text" class="form-control shadow-none">
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Email address</label>
              <input name="txtEmail" type="email" placeholder="email@domain.com" class="form-control shadow-none">
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Location</label>
              <input name="txtLoc" type="text" placeholder="Manila, Philippines" class="form-control shadow-none" id="exampleInputNumber">
            </div>

            <div class="form-group mb-3">
              <label class="form-label">Cellphone Number</label>
              <input name="txtCelNum" type="tel" placeholder="ex. 09123456789" class="form-control shadow-none" id="exampleInputNumber">
            </div>

            <div class="form-group mb-3">
              <label class="form-label" for="forms_login_form_password shadow-none">
                <span class="d-flex justify-content-between align-items-centers">
                  Password
                </span>
              </label>
              <input name="txtPassword" class="form-control mb-3" type="password" name="forms_login_form[password]" id="forms_login_form_password">
                
              <label class="form-label" for="forms_login_form_password">
                <span class="d-flex justify-content-between align-items-centers">
                  Confirm Password
                </span>
              </label>
                <input name="txtConfirmPassword" class="form-control mb-3" type="password" name="forms_login_form[password]" id="forms_login_form_password">

                <div class="mb-3 mt-md-4 form-check">
                  <input name="agree" type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">I have read and agree to the <a href="#">Privacy Policy</a> and the <a href="google.com">Terms of Service</a>. </label>
                </div>
                
                <div class="text-center">
                <a id="forgot_password_link" class="link-muted text-transform-none font-weight-normal gap-3 d-md-flex justify-content-md-end" href="login.php">Already have an account?</a>
                </div>
            </div>
            
            <div class="text-center my-1">
              <button name="btnRegister" type="submit" class="btn btn-primary btn-lg text-bg-success">Register</button>
            </div>
          </div>
        </form>
  <!-- sign up end -->  
 
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

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

  </body>
</html>