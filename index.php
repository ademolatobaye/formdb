<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon">
<title>REGISTER FORM</title>
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
<link id="color-switcher" type="text/css" rel="stylesheet" href="css/color-orange.css">
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

      <!-- Register Form
	  ========================= -->

    
      <div class="col-md-6 col-lg-5 col-xl-4 d-flex flex-column bg-light shadow-lg order-2 order-md-1">
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-10 col-md-9 mx-auto text-center">
              <div class="logo mb-4"> <a href="index.php" title="Oxyy">
                <img src="images/logo-lg-orange.png" alt=""></a> 
              </div>

              <form id="signupForm" class="form-border" method="post" enctype= "multipart/form-data">

                <?php
              

              include("db_conn.php");
              date_default_timezone_set('Africa/Lagos');
              $rand = rand(1000,9999);
              $today = date("dmyhis");
              $ID = "CSC". $today . $rand;
              error_reporting(E_ALL);
              if(isset($_REQUEST["submit"])){
                $fullname = trim(addslashes($_REQUEST["fullname"]));
                $username = trim(addslashes($_REQUEST["username"]));
                $email = trim(addslashes($_REQUEST["email"]));
                $password = trim(addslashes($_REQUEST["password"]));
                $state = $_REQUEST["state"];
                $uin = $_REQUEST["uin"];
                $agree = $_REQUEST["agree"];
                $ipaddress = $_SERVER["REMOTE_ADDR"];
                $device = $_SERVER["HTTP_USER_AGENT"];

                // FILE UPLOAD
                $picture = $uin . $_FILES["picture"]['name'];
                $target = "picture/";
                $target = $target . $uin . $_FILES["picture"]['name'];

                $cvUpload = $uin . $_FILES["cvupload"]['name'];
                $cvTarget = "cvupload/";
                $cvTarget = $cvTarget . $uin . $_FILES["cvupload"]['name'];

                $certUpload = $uin . $_FILES["certupload"]['name'];
                $certTarget = "certupload/";
                $certTarget = $certTarget . $uin . $_FILES["certupload"]['name'];
                // END

                // CHECKING FOR DUPLICATE RECORDS
                $check = mysqli_query($conn, "SELECT * FROM registerform WHERE uin = '$uin' OR email = '$email' OR username = '$username'");
                $checkrows = mysqli_num_rows($check);
                
                if($checkrows > 0){
                  echo "<script>alert('Member already exists in database.')</script>";
                }
                else{
                  // END
                  
                  // CHECKING FOR DUPLICATE FILE UPLOAD
                if(move_uploaded_file($_FILES["picture"]['tmp_name'], $target) > 0){
                if(move_uploaded_file($_FILES["cvupload"]['tmp_name'], $cvTarget) > 0) {
                if(move_uploaded_file($_FILES["certupload"]['tmp_name'], $certTarget) > 0) {
              //  END

                  

            // INSERTING INTO TABLE(registerform) ON THE DATABASE.
            // Password encryption using md5 or PASSWORD.
            $sql = "INSERT INTO registerform (fullname, username, email, `password`, `state`, uin, agree, ipaddress, device, picture, cvupload, certupload) VALUES ('$fullname','$username','$email', md5('$password'),'$state','$uin', '$agree', '$ipaddress', '$device', '$picture', '$cvUpload', '$certUpload')";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $num = mysqli_insert_id($conn);
            if(mysqli_affected_rows($conn)!=1){
                $message = "Error inserting record into database";

            }
            // END

            echo "<script>alert('Dear $fullname, your account has been successfully created. Thank you!')</script>";
              }

              }

              }

                }

              }

              

              ?>

                  <div class="mb-3">
                  <input type="text" class="form-control" id="fullName" required="" name="fullname" placeholder="Full Name">
                </div>


                <div class="mb-3">
                  <input type="text" class="form-control" id="username" name="username" required="" placeholder="Username">
                </div>


                <div class="mb-3">
                  <input type="email" class="form-control" id="emailAddress" name="email" required="" placeholder="Email Address">
                </div>


                <div class="mb-3">
                  
                  <input type="password" class="form-control" id="loginPassword" name="password" required="" placeholder="Password">

                </div>

                <div class="mb-3">

                  <select name="state" id="state" class="form-control" required="">
                    <option value="">--Select State--</option>
                    
                    <?php
                    
                    $statelist = "Abia, Adamawa, Akwa-Ibom, Anambra, Bauchi, Bayelsa, Benue, Borno, Cross River, Delta, Ebonyi, Edo, Ekiti, Enugu, Gombe, Imo, Jigawa, Kaduna, Kano, Katsina, Kebbi, Kogi, Kwara, Lagos, Nasarawa, Niger, Ogun, Ondo, Osun, Oyo, Plateau, Rivers, Sokoto, Taraba, Yobe, Zamfara, Abuja";
                    $arrStates = explode("," , $statelist);
                    $countState = count($arrStates);
                    $maincount = $countState - 1;

                    for($x = 0; $x <= $maincount; $x = $x +1){
                      echo "<option value= '$arrStates[$x]'>$arrStates[$x]</option>";
                    }

                    ?>

                  </select>
            
                </div>

                 <div class="mb-3">
                  
                  <input type="hidden" class="form-control" id="uin" name="uin" value= "<?php echo "$ID" ?>" required="" readonly>

                </div>
                <div class="mb-3">
                  
                  <input type="file" class="form-control" id="picture" accept= ".jpg,.jpeg,.png,.JPG,.PNG,.JPEG" name="picture" required="">

                </div>

                <div class="mb-3">
                  
                  <input type="file" class="form-control" id="cvupload" accept= ".pdf,.doc,.docx" name="cvupload" required="">

                </div>

                <div class="mb-3">
                  
                  <input type="file" class="form-control" id="certupload" accept= ".pdf,.doc,.docx,.PNG,.png,.JPG,.jpg" name="certupload" required="">

                </div>

                  <div class="form-check text-start my-4">
                    <input id="agree" name="agree" class="form-check-input" type="checkbox" required="">
                    <label class="form-check-label text-2" for="agree">I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</label>
                  </div>

                <div class="d-grid my-4">
					<button class="btn btn-primary text-uppercase" type="submit" name="submit" onclick= "return confirm(`Are you sure to create an account?`)">Create Account</button>
				</div>

        


              </form>

              <p class="text-2">Already have an account? <a href="login-13.html">Sign In!</a></p>
            </div>
          </div>
        </div>
        <div class="container py-2">
          <p class="text-2 text-muted text-center mb-0">Copyright © <script>document.write(new Date().getFullYear())</script>  <a href="#"></a>. All Rights Reserved.</p>
        </div>
      </div>
      
      <!-- Register Form End --> 
      
      <!-- Welcome Text
      ========================= -->
      
      <div class="col-md-6 col-lg-7 col-xl-8 order-1 order-md-2">
        <div class="hero-wrap h-100">
          <div class="hero-bg hero-bg-scroll" style="background-image:url('images/login-bg.jpg');"></div>
          <div class="hero-content w-100 h-100 d-flex flex-column">
            <div class="row g-0 my-auto py-5">
              <div class="col-10 col-lg-9 mx-auto text-center"> 

              </div>
            </div>
          </div>
        </div>

        <!-- Welcome Text End --> 
      </div>

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