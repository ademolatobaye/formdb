<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
</head>
<body>
    <div id= "parent">

    <div id= "left">

    </div>

    <div id= "right">

        <div id= "divform">

        <form method="post"> <br>

        <?php
        
        include('db_conn.php');
        error_reporting(E_ALL);
        if(isset($_REQUEST["submit"])){
            $fullname = trim(addslashes($_REQUEST["fullname"]));
            $email = $_REQUEST["email"];
            $number = $_REQUEST["number"];
            $date = $_REQUEST["date"];
            $today = date("Y-m-d");
            $age = $today - $date;
            $gender = $_REQUEST["gender"];
            $add = $_REQUEST["add"];
            $state = $_REQUEST["state"];
            $address = $add ."". $state;
            $hobbies = implode("," , $_REQUEST["hobbies"]);
            

            // INSERTING INTO TABLE(personal) ON THE DATABASE
            $sql = "INSERT INTO personal(fullname, dob, gender, phone, email, `address`, `state`, hobbies) VALUES ('$fullname','$date','$gender','$number','$email','$address','$state','$hobbies')";

            $sql2 = "INSERT INTO public(fullname, dob, gender, phone, email, `address`, `state`, hobbies) VALUES ('$fullname','$date','$gender','$number','$email','$address','$state','$hobbies')";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $num = mysqli_insert_id($conn);
            if(mysqli_affected_rows($conn)!=1){
                $message = "Error inserting record into database";

            }

            $result = mysqli_query($conn, $sql2);
                if($result){

                
            // END

            if($gender == "male"){
                $title = "Sir";
                echo "<script>alert(`Dear $title $fullname, your registered email address is $email, your saved phone number is $number, you are $age years old and your home address is $address state. Thank you! `)</script>";
            } else{
                $title = "Ma";
                 echo "<script>alert(`Dear $title $fullname, your registered email address is $email, your saved phone number is $number, you are $age years old and your home address is $address state. Thank you! `)</script>";
            }
        }

        }

        ?>

        

            <fieldset>

        <legend>CREATE AN ACCOUNT</legend>

        <input type="text" name= "fullname" placeholder= "Enter your fullname" required id= "fullname" class="transition"> <br><br>

        <input type="email" name= "email" id= "email" placeholder= "Enter your email" required class="transition"> <br><br>

        <input type="number" name= "number" id= "number" placeholder= "Enter your phone number" required class="transition"> <br><br>

        <input type="date" name="date" id= "date" required class="transition"> <br> <br>

        <input type="radio" name="gender" id="gender" value= "male" required>MALE
        <input type="radio" name="gender" id="gender" value= "female" required>FEMALE <br><br>

        <input type="text" name="add" id= "add" placeholder= "Enter your home address" required class="transition"> <br> <br>


        <select name=" state" id="state" class="transition">

            <option value="">Select State</option>

            <?php
            
            $statelist = "Abia, Adamawa, Akwa-Ibom, Anambra, Bauchi, Bayelsa, Benue, Borno, Cross River, Delta, Ebonyi, Edo, Ekiti, Enugu, Gombe, Imo, Jigawa, Kaduna, Kano, Katsina, Kebbi, Kogi, Kwara, Lagos, Nasarawa, Niger, Ogun, Ondo, Osun, Oyo, Plateau, Rivers, Sokoto, Taraba, Yobe, Zamfara, Abuja";
            $arrStates = explode("," , $statelist);
            $countState = count($arrStates);
            $maincount = $countState - 1;

            for($state = 0; $state <= $maincount; $state = $state + 1){
                echo "<option value= '$arrStates[$state]''>$arrStates[$state]</option>";
            }

            ?>

        </select> <br><br>
        
        <label for="">Hobbies</label> <br>
        <input type="checkbox" name="hobbies[]" value="traveling"> Traveling
        <input type="checkbox" name="hobbies[]" value="coding"> Coding
        <input type="checkbox" name="hobbies[]" value="cooking"> Cooking
        <input type="checkbox" name="hobbies[]" value="dancing"> Dancing
        <input type="checkbox" name="hobbies[]" value="reading"> Reading <br><br>

        <button type="submit" name= "submit" onclick= "return confirm('Are you sure to submit this form?')">Check</button>
        
        </fieldset>

        </form>


        </div>

    </div>

    </div>
    
</body>
</html>