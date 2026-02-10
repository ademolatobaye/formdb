<?php
session_start();
if(!isset($_SESSION["email"])){
  header("Location: index.php");
  exit();
}


 include("db_conn.php");
  $sql="SELECT * FROM otpver WHERE email='$_SESSION[email]'";
  $result=mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($result);
  $email=$row['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon">
<title>Oxyy - New Password</title>
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
<link rel="stylesheet" href="style.css">
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
                  <h1 class="text-13 text-white fw-600 mb-4">Did you forget your password? Don't worry, we're here to help you recover it.</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
      
      <!-- Login Form
      ========================= -->


      <div class="col-md-6 col-lg-5 d-flex flex-column align-items-center">
        <div class="container pt-4">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <div class="logo"> <a class="fw-600 text-6 text-dark" href="index.html" title="Oxyy">CREATE NEW PASSWORD</a> </div>
            </div>
          </div>
        </div>
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <h3 class="text-8 mb-4 fw-600">NEW PASSWORD</h3>

              <form id="loginForm" method="post" onsubmit="return check()">

              <?php
              include("db_conn.php");
              date_default_timezone_set("Africa/Lagos");
              error_reporting(E_ALL);
              if(isset($_REQUEST["submit"])){
                $password1 = trim(addslashes($_REQUEST["password"]));
                $password = trim(addslashes($_REQUEST["conpassword"]));

                $_SESSION["password"] = $password;

                // UPDATING NEWLY CREATED PASSWORD ON DATABASE.
                $sql = "UPDATE otpver SET `password`= PASSWORD('$password') WHERE email = '$email'";
                $result=mysqli_query($conn, $sql);
                    if($result){
                      
                      echo "<script>alert('Password successfully changed!');
                      window.location.href='login.php'</script>";
                    }
                    else {
                      // END
                      
                    }
                
              }
                

              ?>


                <label class="form-label fw-500" for="newpassword">Create new password</label>
                <div class="mb-3 icon-group icon-group-end">

                  <input type="password" name="password" class="form-control bg-light border-light" id="password" required="" placeholder="Enter new password" oninput="return check()">
                  <span class="icon-inside text-muted"><i class="fas fa-lock"></i></span>
				</div>

                <label class="form-label fw-500" for="newpassword">Confirm Password</label>
                <div class="mb-3 icon-group icon-group-end">
                  <input type="password" class="form-control form-control-lg bg-light border-light" id="conpassword" required="" placeholder="Confirm your password" name= "conpassword" oninput="return check()">
                  <span class="icon-inside text-muted"><i class="fas fa-lock"></i></span>
				</div>
               
                <div class="d-grid my-4">
                  <button class="btn btn-dark btn-lg" type="submit" name= "submit">Submit</button>
                </div>

              </form>
              
              <span id="error"></span>


              
              <script>
                // CHECKING IF PASSWORD MATCHES.
                function check(){
                    let password = document.getElementById("password").value;
                    let conPassword = document.getElementById("conpassword").value;

                    if(conPassword !== password){
                        document.getElementById("error").textContent = `Password does not match!`;
                        document.getElementById("error").style.color = `red`;
                        return false;
                    }else if(conPassword == password){
                        document.getElementById("error").textContent = `Password matches correctly!`;
                        document.getElementById("error").style.color = `green`;
                        return true;
                    }
                    // END
                }
                
              </script>
              
            </div>
          </div>
        </div>
      </div>
      <!-- Login Form End --> 
      
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