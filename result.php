 <?php
        
        error_reporting(E_ALL);
        if($_POST){
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
            //  $hobbies = ;
            $hobbies = implode("," , $_REQUEST["hobbies"]);

            if($gender == "male"){
                $title = "Sir";
                echo "Dear $title $fullname, your registered email address is $email, your saved phone number is $number, you are $age years old, your hobbies are $hobbies and your home address is $address state.";
            } else{
                $title = "Ma";
                 echo "Dear $title $fullname, your registered email address is $email, your saved phone number is $number, you are $age years old, your hobbies are $hobbies and your home address is $address state. Thank you!";
            }
        }

        ?>