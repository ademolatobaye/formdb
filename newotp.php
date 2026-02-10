<?php
session_start();
// if(!isset($_SESSION['email'])){
//   header("Location: index.php");
//   exit();

// }

 include("db_conn.php");
  $sql="SELECT * FROM otpver WHERE email='$_SESSION[email]'";
  $result=mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($result);
  $dbotp=$row['otp'];
  $email=$row['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon">
<title>OTP</title>
<meta name="description" content="Login and Register Form Html Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='../../css.css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#">
</head>
<body>

<!-- Preloader -->
<div class="preloader">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register">
  <div class="container-fluid px-0">
    <div class="row g-0 min-vh-100"> 
      
      <!-- Welcome Text
      ========================= -->
      <div class="col-md-6 col-lg-7 bg-light">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('images/login-bg-7.jpg');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="container">
              <div class="row g-0 mt-5">
                <div class="col-11 col-md-10 col-lg-9 mx-auto">
                  <h1 class="text-13 text-white fw-600 mb-4">We care about your account security.</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
      
      <!-- OTP Form
      ========================= -->
      <div class="col-md-6 col-lg-5 d-flex flex-column align-items-center">
        <div class="container pt-4">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <div class="logo"> <a class="fw-600 text-6 text-dark" href="index.html" title="Oxyy">OTP</a> </div>
            </div>
          </div>
        </div>
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <h3 class="text-12 mb-4">Verify OTP</h3>
              <p class="mb-4 text-muted">Enter the verification code we sent to <span class="text-dark text-3"><?php echo $email; ?></span></p>
              <p><img class="img-fluid" src="images/otp-icon.png" alt="verification"></p>


              <form id="otp-screen" method="post">
                <?php 
                include('db_conn.php');
                if(isset($_REQUEST["verify"])){
                  $n1=$_REQUEST["n1"];
                  $n2=$_REQUEST["n2"];
                  $n3=$_REQUEST["n3"];
                  $n4=$_REQUEST["n4"];
                  $newotp=$n1.$n2.$n3.$n4;

                  if($dbotp != $newotp){
                    echo "<script>alert('Invalid OTP!')</script>";
                  }
                  else{

                  
                  // UPDATING NEW OTP STATUS FROM PENDING TO VERIFIED AND REDIRECTING TO A NEW PAGE.
                    $sql="UPDATE otpver SET `status`='Verified' WHERE email='$email'";
                    $result=mysqli_query($conn, $sql);
                    if($result){
                      echo "<script>alert('OTP successfully Verified!');
                      window.location.href='newpassword.php'</script>";
                    }
                    // END
                  }

                }
                ?>
                <label class="form-label fw-500">Enter 4 digit code </label>
                <div class="row g-3">

                  <div class="col">
                    <input type="text" name="n1" class="form-control bg-light border-light text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                  </div>

                  <div class="col">
                    <input type="text" name="n2" class="form-control bg-light border-light text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                  </div>

                  <div class="col">
                    <input type="text" name="n3" class="form-control bg-light border-light text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                  </div>

                  <div class="col">
                    <input type="text" name="n4" class="form-control bg-light border-light text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                  </div>

                </div>

                <div class="d-grid my-4">
                  
                  <button class="btn btn-dark btn-lg"  type="submit" name="verify">Verify</button>
                </div>

              </form>


              <p class="text-2 text-muted text-center">Not received your code? <a href="resendotp.php">Resend</a></p>
            </div>
          </div>
        </div>
      </div>
      <!-- OTP Form End --> 
      
    </div>
  </div>
</div>



<!-- Script --> 
<script src="vendor/jquery/jquery.min.js"></script> 
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="js/switcher.min.js"></script> 
<script src="js/theme.js"></script>
</body>
</html>