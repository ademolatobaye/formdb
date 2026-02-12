<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="parent">

        <div id="second">

            <p id="parr">
                <span id="create">Create an account</span> <br>
                <span id="free">It's free and always will be.</span>

            </p>

            <form method="post" id="form">

                <input type="text" placeholder="First name" id="firstname" required>

                <input type="text" placeholder="Surname" id="surname" required> <br><br>

                <input type="text" placeholder="Mobile number or email address" id="mobile" required> <br><br>

                <input type="password" placeholder=" Enter Password" id="newpass" required> <br>

                <!-- <input type="password" placeholder="Confirm Password" id="password2" required> -->

                <script type=>

                </script>

                <p>Birthday</p> 

                <select name="" id="select">

                   <option value="">Day</option>

                   <?php
                   
                   $firstday = 1;
                   $lastday = 31;

                   for($day = $firstday; $day <= $lastday; $day = $day + 1){
                    echo "<option value= '$day'>$day</option>";
                   }

                   ?>


                </select>

                <select name="" id="select2">

                <option value="">Month</option>

                <?php
                
                $monthlist = "January, February, March, April, May, 
                June, July, August, September, October, November, December"; 
                $arrMonths = explode("," , $monthlist);
                $countMonth = count($arrMonths);
                $maincount = $countMonth - 1;

                for($month = 0; $month <= $maincount; $month = $month + 1){
                    echo "<option value= '$arrMonths[$month]'>$arrMonths[$month]</option>";
                }

                ?>

                </select>

                <select name="" id="select3">

                <option value="">Year</option>

                <?php
                
                $startyear = 1960;
                $endyear = date("Y");

                for($year = $startyear; $year <= $endyear; $year = $year + 1){
                    echo "<option value= '$year'>$year</option>";
                }

                ?>

                </select> <br><br>

                <input type="radio" name="male" id="sex"> 
                <label for="text">Female</label>

                <input type="radio" name="male" id="sex"> 
                <label for="text">Male</label> <br>

                <p id="pclick">
                    By clicking Sign Up, you agree to our <a href="" id="terms">Terms, Data Policy</a> and 
                    <a href="" id="terms">Cookie <br>Policy.</a> 
                    You may receive SMS notifications from us and can opt out out at <br>
                    any time. 
                </p> 

                <button type="submit" id="submit">Sign Up</button> <br><br>

                <p id="page">
                    <a href="#" id="terms">Create a Page</a> for celebrity, band or business.
                </p>

            </form>

            <a href="" id="why">Why do I need to provide my <br>
            date of birth</a>

        </div>

        <div id="first">

            <img src="IMAGE/fbicon.png" alt="" id="logo">

            <p id="par">
                <span id="thanks">Thanks for stopping by!</span> <br><br>
                <span id="we">We hope to see you again soon.</span>
            </p>

        </div>

        <div id="overlay">

            <p id="face">facebook</p>

            <form method="post">

                <label for="text" id="email">Email or Phone</label> <br>
                <input type="text" id="email2" required>

                <label for="password" id="pass">Password</label> <br>
                <input type="password" id="pass2" required> <br>

                <button type="submit" id="sub">Log In</button>

            </form>

            <a href="#" id="for">Forgotten Account?</a>

        </div>

    </div>
    
</body>
</html>