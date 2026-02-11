<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCOUNT</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> -->
</head>
<body>

    <div id="container">

        <div id="home">

        <a href="index.php">HOME</a>

    </div>

    <!-- <div id="left">

    </div> -->

    <div id="right">

        <div id="divform">
            
            <form method="post" onsubmit="return myform()"> <br>

            <?php


            include("db_conn.php");
            date_default_timezone_set("Africa/Lagos");
            $num = rand(1000,9999);
            $today = date("dmy");
            $ID = $num . $today;
            error_reporting(E_ALL);
            if(isset($_REQUEST["submit"])){
                $fullname = $_REQUEST["fullname"];
                $email = $_REQUEST["email"];
                $uin = $_REQUEST["uin"];
                $password = $_REQUEST["password"];
                $regpassword = $_REQUEST["regpassword"];


                  // CHECKING FOR DUPLICATE RECORDS
                $check = mysqli_query($conn, "SELECT * FROM vpay WHERE uin = '$uin' OR email = '$email' OR fullname = '$fullname'");
                $checkrows = mysqli_num_rows($check);
                if($checkrows > 0){
                  echo "<script>alert('Member already exists in database.')</script>";
                }
                else{

                $sql = "INSERT INTO vpay (fullname, email, `password`, confirmpassword, uin) VALUES ('$fullname', '$email', PASSWORD('$password'), PASSWORD('$regpassword'), '$uin')";

                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $num = mysqli_insert_id($conn);

                if(mysqli_affected_rows($conn)!=1){
                $message = "Error inserting record into database";

            }
            // END

                echo"<script>alert('Dear $fullname, your account has been successfully created.')</script>";
            }

            }

            

            

            ?>

                <fieldset>

                <legend>CREATE FREE ACCOUNT</legend> 

                <label for="">FULLNAME</label> <br>
                <input type="text" placeholder="Enter your fullname" id="fullname" name= "fullname" required> <br><br>

                <label for="">EMAIL</label> <br>
                <input type="email" placeholder="Enter your email address" id="email" name= "email" required> 

                <input type="hidden" id="uin" name= "uin" value= "<?php echo"$ID" ?>" required> <br><br>

                <label for="">PASSWORD</label> <br>
                <input type="password" placeholder="Enter your password" id="password" oninput="check()" name= "password" required> <br><br>

                <label for="">CONFIRM PASSWORD</label> <br>
                <input type="password" placeholder="Confirm your passsword" id="regpassword" oninput="check()" name= "regpassword" required>
                <span id="error"></span> <br><br>

                <button type="submit" name= "submit" onclick= "return confirm('Are you sure to create your account?')">SUBMIT</button>

            </fieldset>

            </form>

            <script>

                function check(){
    let password = document.getElementById("password").value;
    let regpassword = document.getElementById("regpassword").value;

    if(!regpassword == password){
        document.getElementById("error").textContent = `Password is incorrect!`;
        document.getElementById("error").style.color = `red`;
    }else{
        document.getElementById("error").textContent = `Password matches correctly!`;
        document.getElementById("error").style.color = `green`;
    }
}
            </script>

            <script>

                function myform(){
    let name = document.getElementById("fullname").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if(name == "" || name == null){
        alert("Fullname cannot be empty!");
        return false;
    }
    
    if(email == "" || email == null){
        alert("Email cannot be empty!");
        return false;
    }

    if(password == "" || password == null){
        alert("Password cannot be empty!");
        return false;
    }

    alert(`Dear ${name}, your registered email address is ${email} while your password is ${password}.`);
}

            </script>

        </div>

    </div>


    </div>

    
</body>
</html>