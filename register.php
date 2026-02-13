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
<title>Register Form</title>
<meta name="description" content=" Register Form">
<meta name="author" content="">

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
                  <h1 class="text-13 text-white fw-600 mb-4">To keep connected with largest shop in the world.</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
      
      <!-- Register Form
      ========================= -->
      <div class="col-md-6 col-lg-5 d-flex flex-column align-items-center">
        <div class="container pt-4">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <div class="logo"> <a class="fw-600 text-6 text-dark" href="index.html" title="Oxyy">REGISTER ACCOUNT</a> </div>
            </div>
          </div>
        </div>
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <h3 class="text-12 mb-4">Sign Up</h3>

              <form id="signupForm" method="post" enctype= "multipart/form-data">

                <?php
                include("db_conn.php");
                date_default_timezone_set("Africa/Lagos");
                $rand= rand(1000,9999);
                $UIN = "NAME" . $rand;
                error_reporting(E_ALL);
                if(isset($_REQUEST["submit"])){
                  $fullname = trim(addslashes($_REQUEST["fullname"]));
                  $number = trim(addslashes($_REQUEST["number"]));
                  $uin = $_REQUEST["uin"];
                  $password = $_REQUEST["password"];

                  $_SESSION["fullname"] = $fullname;

                  /*Client Passport Upload*/
                    $img = $_POST['image'];
                    $folderPath = "photo/";

                    $image_parts = explode(";base64,", $img);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];

                    $image_base64 = base64_decode($image_parts[1]);
                    $fileName = uniqid() . '.png';

                    $file = $folderPath . $fileName;
                    file_put_contents($file, $image_base64);
                  
                  // UPDATING FULLNAME,NUMBER,PASSWORD,UIN AMD EMAIL ON SAME TABLE IN THE DATABASE.
                   $sql="UPDATE otpver SET fullname='$fullname', phone = '$number', `password`=PASSWORD('$password'), uin = '$uin', photo = '$fileName' WHERE email='$email'";
                    $result=mysqli_query($conn, $sql);
                    if($result){

                      echo "<script>alert('Dear $fullname, your registration was successful!');
                      window.location.href='thankyou.php'</script>";
                    }
                    // END

                
                }

                ?>
                
                <label class="form-label fw-500" for="webcam">Photo Capture</label>
                <div class="mb-3 icon-group icon-group-end">
                  <div id="my_camera"></div>
                    <input class="btn btn-primary" type="button" value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                </div>

                <label class="form-label fw-500" for="webcam">Photo Result</label>
                <div class="mb-3 icon-group icon-group-end">
                  <div id="results"> Your captured image will appear here.</div>
                </div>

                 <script src="js/webcam.min.js"></script>

            <script language="JavaScript">

    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 100
    });

    Webcam.attach( '#my_camera' );

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>

                <label class="form-label fw-500" for="fullName">Full Name</label>
                <div class="mb-3 icon-group icon-group-end">
                  <input type="text" class="form-control bg-light border-light" id="fullName" required="" placeholder="Full Name" name="fullname">
                  <span class="icon-inside text-muted"><i class="fas fa-user"></i></span>
                </div>

                <label class="form-label fw-500" for="fullName">Email Address</label>
                <div class="mb-3 icon-group icon-group-end">
                  <input type="text" class="form-control bg-light border-light" id="email" readonly="" name="email" value="<?php echo $email; ?>">
                  <span class="icon-inside text-muted"><i class="fas fa-user"></i></span>
                 </div>

                <label class="form-label fw-500" for="emailAddress">Phone Number</label>
                <div class="mb-3 icon-group icon-group-end">
                  <input type="number" class="form-control bg-light border-light" id="emailAddress" required="" placeholder="Phone Number" name="number">
                  <span class="icon-inside text-muted"><i class="fas fa-phone"></i></span>
                 </div>

                <div class="mb-3 icon-group icon-group-end">
                  <input type="hidden" class="form-control bg-light border-light" id="uin" required="" placeholder="uin" value="<?php echo"$UIN"; ?>" name="uin">
                  <span class="icon-inside text-muted"><i class="fas fa-envelope"></i></span>
                 </div>

                <label class="form-label fw-500" for="loginPassword">Password</label>
                <div class="mb-3 icon-group icon-group-end">
                  <input type="password" class="form-control bg-light border-light" id="loginPassword" required="" placeholder="Password" name="password">
                  <span class="icon-inside text-muted"><i class="fas fa-eye"></i></span>
				        </div>

                <div class="form-check my-4">
                  <input id="agree" name="agree" class="form-check-input" type="checkbox">
                  <label class="form-check-label" for="agree">I agree to the <a href="#">Terms</a> and <a href="#">Privacy</a>.</label>
                </div>

				<div class="d-grid my-4">
					<button class="btn btn-dark btn-lg" type="submit" name="submit" onclick="return confirm('Are you sure submit this form?')">Sign Up</button>
				</div>

                <p class="text-2 text-muted text-center">Already a member? <a href="login-18.html">Sign In</a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- Register Form End --> 
      
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