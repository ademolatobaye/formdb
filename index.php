<?php
session_start();

// ini_set('display_errors', '1');
// 	require 'includes/PHPMailer.php';
// 	require 'includes/SMTP.php';
// 	require 'includes/Exception.php';
// //Define name spaces
// 	use PHPMailer\PHPMailer\PHPMailer;
// 	use PHPMailer\PHPMailer\SMTP;
// 	use PHPMailer\PHPMailer\Exception;
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon">
<title>Oxyy - Register</title>
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
                  <h1 class="text-13 text-white fw-600 mb-4">To keep connected with largest shop in the world.</h1>
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
              <div class="logo"> <a class="fw-600 text-6 text-dark" href="index.html" title="Oxyy">CREATE AN ACCOUNT</a> </div>
            </div>
          </div>
        </div>
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <h3 class="text-12 mb-4">REGISTER EMAIL</h3>

              <form id="loginForm" method="post">

              <?php
              include("db_conn.php");
              date_default_timezone_set("Africa/Lagos");
              $OTP = rand(1000,9999);
              error_reporting(E_ALL);
              if(isset($_REQUEST["submit"])){
                $email = trim(addslashes($_REQUEST["email"]));
                $otp = $_REQUEST["otp"];

                $_SESSION["email"] = $email;

                // CHECKING FOR DUPLICATE RECORD
                $check = mysqli_query($conn, "SELECT * FROM otpver WHERE otp='$otp' OR email='$email'");
                $checkrows = mysqli_num_rows($check);

                if($checkrows > 0){
                  echo "<script>alert('Member already exists in database.')</script>";
                }
                else{
                  // END


                  // INSERTING EMAIL AND OTP INTO DATABASE
                $sql = "INSERT INTO otpver(email, otp, `status`) VALUES('$email', '$otp', 'Pending')";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $num = mysqli_insert_id($conn);
                if(mysqli_affected_rows($conn)!= 1){
                  $message = "Error inserting record into database.";
                }
                // END

//                 //Create instance of PHPMailer
// 	$mail = new PHPMailer();
// //Set mailer to use smtp
// 	$mail->isSMTP();
// //Define smtp host
// 	$mail->Host = "mail.wetindey.com.ng";
// //Enable smtp authentication
// 	$mail->SMTPAuth = true;
// //Set smtp encryption type (ssl/tls)
// 	$mail->SMTPSecure = "tls";
// //Port to connect smtp
// 	$mail->Port = "587";
// //Set gmail username
// 	$mail->Username = "ademola@wetindey.com.ng";
// //Set gmail password
// 	$mail->Password = "Omomejih08";
// //Email subject
// 	$mail->Subject = "Verification OTP";
// //Set sender email
// 	$mail->setFrom('ademola@wetindey.com.ng', 'THEADEMOLA');
// //Enable HTML
// 	$mail->isHTML(true);
// //Attachment


// //Email body
// 	$mail->Body = "<style>
//         html,
//         body {
//             margin: 0 auto !important;
//             padding: 0 !important;
//             height: 100% !important;
//             width: 100% !important;
//             font-family: 'Roboto', sans-serif !important;
//             font-size: 14px;
//             margin-bottom: 10px;
//             line-height: 24px;
//             color: #8094ae;
//             font-weight: 400;
//         }
//         * {
//             -ms-text-size-adjust: 100%;
//             -webkit-text-size-adjust: 100%;
//             margin: 0;
//             padding: 0;
//         }
//         table,
//         td {
//             mso-table-lspace: 0pt !important;
//             mso-table-rspace: 0pt !important;
//         }
//         table {
//             border-spacing: 0 !important;
//             border-collapse: collapse !important;
//             table-layout: fixed !important;
//             margin: 0 auto !important;
//         }
//         table table table {
//             table-layout: auto;
//         }
//         a {
//             text-decoration: none;
//         }
//         img {
//             -ms-interpolation-mode:bicubic;
//         }
//     </style>

//     <center style='width: 100%; background-color: #f5f6fa;'>
//         <table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#f5f6fa'>
//             <tr>
//                <td style='padding: 40px 0;'>
//                     <table style='width:100%;max-width:620px;margin:0 auto;'>
//                         <tbody>
//                             <tr>
//                                 <td style='text-align: center; padding-bottom:25px'>
//                                     <a href='#'><img style='height: 60px' src='https://wetindey.space/logo.png' alt='logo'></a>
//                                 </td>
//                             </tr>
//                         </tbody>
//                     </table>
//                     <table style='width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;'>
//                         <tbody>
//                             <tr>
//                                 <td style='padding: 30px 30px 15px 30px; text-align: center;'>
//                                     <h2 style='font-size: 18px; color: #84B700; font-weight: 600; margin: 0;'>One Time Password</h2>
//                                 </td>
//                             </tr>
//                             <tr>
//                                 <td style='padding: 0 30px 20px; text-align: center;'>
//                                     <p style='margin-bottom: 10px;'>Hi,</p>
//                                     <p style='margin-bottom: 10px;'>Your OTP to complete your registration on THEADEMOLA is:</p>
//                                     <h1 style='font-size: 35px; color: #84B700; font-weight: 600; margin: 0;'> $otp</h1>
                                
//                                 </td>
//                             </tr>
                           
                           
//                         </tbody>
//                     </table>
//                     <table style='width:100%;max-width:620px;margin:0 auto;'>
//                         <tbody>
//                             <tr>
//                                 <td style='text-align: center; padding:25px 20px 0;'>
//                                     <p style='font-size: 13px;'>Copyright © 2026 THEADEMOLA. All rights reserved. <br> </p>
                                    
//                                 </td>
//                             </tr>
//                         </tbody>
//                     </table>
//                </td>
//             </tr>
//         </table>
//     </center>";
// //Add recipient
// 	$mail->addAddress("$email");
// //Finally send email
// 	if ( $mail->send() ) {

                echo "<script>alert('OTP sent to $email');
                window.location.href= 'otp.php'</script>";
                
              }
                }
                
                  
              

              ?>


                <label class="form-label fw-500" for="emailAddress">Email Address</label>
                <div class="mb-3 icon-group icon-group-end">

                  <input type="email" name="email" class="form-control bg-light border-light" id="emailAddress" required="" placeholder="Email or Username">
                  <span class="icon-inside text-muted"><i class="fas fa-envelope"></i></span>
				</div>

                <div class="mb-3 icon-group icon-group-end">
                  <input type="hidden" class="form-control form-control-lg bg-light border-light" id="loginPassword" required="" placeholder="Password" name= "otp" value="<?php echo "$OTP"; ?>">
                  <span class="icon-inside text-muted"><i class="fas fa-lock"></i></span>
				</div>
               
                <div class="d-grid my-4">
                  <button class="btn btn-dark btn-lg" type="submit" name= "submit">Sign In</button>
                </div>
                <p class="text-2 text-muted text-center">Not a member? <a href="register-18.html">Sign Up now</a></p>
              </form>
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