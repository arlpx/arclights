<?php 
session_start();
include('connection.php');
$warning = "";

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

if (isset($_POST['btnLogin'])){
  $recname = $_POST['txtUsername'];
  $password = $_POST['txtPassword'];

  if (!empty($recname) AND !empty($password)){
    $getClient = mysqli_query($conn, "SELECT * FROM `customer` WHERE `USERNAME` = '$recname' AND `PASSWORD` = '$password'");
    $countResult = mysqli_num_rows($getClient);
    if($countResult > 0){
        while($row = mysqli_fetch_assoc($getClient)){
          $hashPass = $row['PASSWORD'];
          $recname = $row['USERNAME'];
          $fname = $row['FIRSTNAME'];
          $lname = $row['LASTNAME'];
        }
        $_SESSION['password'] = $hashPass;
        $_SESSION['username'] = $recname;
        $_SESSION['firstname'] = $fname;
        $_SESSION['lastname'] = $lname;
        header('Location: home.php');

        if(password_verify($password, $hashPass)){
            $activeSession = 1;
            $_SESSION['USERNAME'] = $recname;
            header('Location: index.php');
            exit();
        } $notif = "Login successful.";
    } 
    else{
        $warning = 'Account does not exist. Please try again.';
    }  
  }
  else{
    $warning = 'Email and password is required. Please try again.';
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
  <br>
  <!-- login -->
  <div class="container space-1 mx-auto space-md-2 mt-md-5 justify-content-center">
    <div class="row justify-content-center mt-lg-3">
      <div class="col-md-6">

      <form action="login.php" method="POST">
          <div class="header text-center">
            <h6 class="title fs-3 mb-lg-3">
                <i class="bi bi-person-circle fs-3 me-2 "></i>
              Welcome, Guest
            </h6>
            <br>
            <p class="text-center" style="font-style: 15px; font-style: italic; color: red;"><?php echo $warning;?></p>
          </div>
          <div class="form-group mb-3">
            <label for="exampleInputUser1">Username</label>
            <input name="txtUsername" type="text" class="form-control form-control-lg" id="exampleInputUser1" aria-describedby="userHelp" placeholder="Enter username">
          </div>
          <div class="form-group mb-3">
            <label for="exampleInputPassword1">Password</label>
            <input name="txtPassword" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="text-center">
            <a id="forgot_password_link" class="link-muted text-transform-none font-weight-normal gap-3 d-md-flex justify-content-md-end" href="register.php">Don't have an account?</a>
          </div>
          <br>
          <div class="text-center my-1">
            <button name="btnLogin" type="submit" class="btn btn-primary btn-lg text-bg-success">Login</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- login end-->

  <br><br><br><br><br><br>
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