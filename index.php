<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULT CHECKER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body onload= "greet()">
        <div id="parent">

        <div id="cont1">


            <img src="image/school logo.jpg" alt="" id="img1">


            <span id="prest">PRESTIGE INTERNATIONAL COLLEGE</span>  <br><br>

            <form method="post" name="form" id="form1"> <br><br>
            

            <?php
            
            
            include("db_conn.php");
            date_default_timezone_set("Africa/Lagos");
            error_reporting(E_ALL);
            if(isset($_REQUEST["submit"])){
                $studentname = trim(addslashes($_REQUEST["student"]));
                $class = $_REQUEST["class"];
                $teacher = trim(addslashes($_REQUEST["teacher"]));
                $principal = trim(addslashes($_REQUEST["principal"]));


                // SUBJECT 1
                $subject2 = $_REQUEST["subject2"];
                $test1 = $_REQUEST["test1"];
                $test2 = $_REQUEST["test2"];
                $exam1 = $_REQUEST["exam1"];
                $total1 = $test1 + $test2 + $exam1;

                switch($total1 <= 0){
                    case "":
                    $grade1 = "No Result!";
                    $remark1 = "No Result!";
                    break;
                }

                // END

                


                // SUBJECT 2
                $subject3 = $_REQUEST["subject3"];
                $test3 = $_REQUEST["test3"];
                $test4 = $_REQUEST["test4"];
                $exam2 = $_REQUEST["exam2"];
                $total2 = $test3 + $test4 + $exam2;

                if($total2 <= 0){
                    $grade2 = "No Result!";
                    $remark2 = "No Result!";
                }else if($total2 <=39){
                    $grade2 = "F";
                    $remark2 = "Very Poor!";
                }else if($total2 >= 40 && $total2 <= 44){
                    $grade2 = "E";
                    $remark2 = "Poor!";
                }else if($total2 >= 45 && $total2 <= 49){
                    $grade2 = "D";
                    $remark2 = "Average!";
                }else if($total2 >= 50 && $total2 <= 59){
                    $grade2 = "C";
                    $remark2 = "Good!";
                }else if($total2 >= 60 && $total2 <= 69){
                    $grade2 = "B";
                    $remark2 = "Very Good!";
                }else if($total2 >= 70){
                    $grade2 = "A";
                    $remark2 = "Excellent!";
                }

                // END


                // SUBJECT 3
                $subject4 = $_REQUEST["subject4"];
                $test5 = $_REQUEST["test5"];
                $test6 = $_REQUEST["test6"];
                $exam3 = $_REQUEST["exam3"];
                $total3 = $test5 + $test6 +$exam3;

                if($total3 <= 0){
                    $grade3 = "No Result!";
                    $remark3 = "No Result!";
                }else if($total3 <=39){
                    $grade3 = "F";
                    $remark3 = "Very Poor!";
                }else if($total3 >= 40 && $total3 <= 44){
                    $grade3 = "E";
                    $remark3 = "Poor!";
                }else if($total3 >= 45 && $total3 <= 49){
                    $grade3 = "D";
                    $remark3 = "Average!";
                }else if($total3 >= 50 && $total3 <= 59){
                    $grade3 = "C";
                    $remark3 = "Good!";
                }else if($total3 >= 60 && $total3 <= 69){
                    $grade3 = "B";
                    $remark3 = "Very Good!";
                }else if($total3 >= 70){
                    $grade3 = "A";
                    $remark3 = "Excellent!";
                }

                // END


                // SUBJECT 4
                $subject5 = $_REQUEST["subject5"];
                $test7 = $_REQUEST["test7"];
                $test8 = $_REQUEST["test8"];
                $exam4 = $_REQUEST["exam4"];
                $total4 = $test7 + $test8 + $exam4;

                if($total4 <= 0){
                    $grade4 = "No Result!";
                    $remark4 = "No Result!";
                }else if($total4 <=39){
                    $grade4 = "F";
                    $remark4 = "Very Poor!";
                }else if($total4 >= 40 && $total4 <= 44){
                    $grade4 = "E";
                    $remark4 = "Poor!";
                }else if($total4 >= 45 && $total4 <= 49){
                    $grade4 = "D";
                    $remark4 = "Average!";
                }else if($total4 >= 50 && $total4 <= 59){
                    $grade4 = "C";
                    $remark4 = "Good!";
                }else if($total4 >= 60 && $total4 <= 69){
                    $grade4 = "B";
                    $remark4 = "Very Good!";
                }else if($total4 >= 70){
                    $grade4 = "A";
                    $remark4 = "Excellent!";
                }

                // END


                // SUBJECT 5
                $subject6 = $_REQUEST["subject6"];
                $test9 = $_REQUEST["test9"];
                $test10 = $_REQUEST["test10"];
                $exam5 = $_REQUEST["exam5"];
                $total5 = $test9 + $test10 + $exam5;

                if($total5 <= 0){
                    $grade5 = "No Result!";
                    $remark5 = "No Result!";
                }else if($total5 <=39){
                    $grade5 = "F";
                    $remark5 = "Very Poor!";
                }else if($total5 >= 40 && $total5 <= 44){
                    $grade5 = "E";
                    $remark5 = "Poor!";
                }else if($total5 >= 45 && $total5 <= 49){
                    $grade5 = "D";
                    $remark5 = "Average!";
                }else if($total5 >= 50 && $total5 <= 59){
                    $grade5 = "C";
                    $remark5 = "Good!";
                }else if($total5 >= 60 && $total5 <= 69){
                    $grade5 = "B";
                    $remark5 = "Very Good!";
                }else if($total5 >= 70){
                    $grade5 = "A";
                    $remark5 = "Excellent!";
                }

                // END


                // SUBJECT 6
                $subject7 = $_REQUEST["subject7"];
                $test11 = $_REQUEST["test11"];
                $test12 = $_REQUEST["test12"];
                $exam6 = $_REQUEST["exam6"];
                $total6 = $test11 + $test12 + $exam6;

                if($total6 <= 0){
                    $grade6 = "No Result!";
                    $remark6 = "No Result!";
                }else if($total6 <=39){
                    $grade6 = "F";
                    $remark6 = "Very Poor!";
                }else if($total6 >= 40 && $total6 <= 44){
                    $grade6 = "E";
                    $remark6 = "Poor!";
                }else if($total6 >= 45 && $total6 <= 49){
                    $grade6 = "D";
                    $remark6 = "Average!";
                }else if($total6 >= 50 && $total6 <= 59){
                    $grade6 = "C";
                    $remark6 = "Good!";
                }else if($total6 >= 60 && $total6 <= 69){
                    $grade6 = "B";
                    $remark6 = "Very Good!";
                }else if($total6 >= 70){
                    $grade6 = "A";
                    $remark6 = "Excellent!";
                }

                // END


                // SUBJECT 7
                $subject8 = $_REQUEST["subject8"];
                $test13 = $_REQUEST["test13"];
                $test14 = $_REQUEST["test14"];
                $exam7 = $_REQUEST["exam7"];
                $total7 = $test13 + $test14 + $exam7;

                if($total7 <= 0){
                    $grade7 = "No Result!";
                    $remark7 = "No Result!";
                }else if($total7 <=39){
                    $grade7 = "F";
                    $remark7 = "Very Poor!";
                }else if($total7 >= 40 && $total7 <= 44){
                    $grade7 = "E";
                    $remark7 = "Poor!";
                }else if($total7 >= 45 && $total7 <= 49){
                    $grade7 = "D";
                    $remark7 = "Average!";
                }else if($total7 >= 50 && $total7 <= 59){
                    $grade7 = "C";
                    $remark7 = "Good!";
                }else if($total7 >= 60 && $total7 <= 69){
                    $grade7 = "B";
                    $remark7 = "Very Good!";
                }else if($total7 >= 70){
                    $grade7 = "A";
                    $remark7 = "Excellent!";
                }

                // END


                // SUBJECT 8
                $subject9 = $_REQUEST["subject9"];
                $test15 = $_REQUEST["test15"];
                $test16 = $_REQUEST["test16"];
                $exam8 = $_REQUEST["exam8"];
                $total8 = $test15 + $test16 + $exam8;

                if($total8 <= 0){
                    $grade8 = "No Result!";
                    $remark8 = "No Result!";
                }else if($total8 <=39){
                    $grade8 = "F";
                    $remark8 = "Very Poor!";
                }else if($total8 >= 40 && $total8 <= 44){
                    $grade8 = "E";
                    $remark8 = "Poor!";
                }else if($total8 >= 45 && $total8 <= 49){
                    $grade8 = "D";
                    $remark8 = "Average!";
                }else if($total8 >= 50 && $total8 <= 59){
                    $grade8 = "C";
                    $remark8 = "Good!";
                }else if($total8 >= 60 && $total8 <= 69){
                    $grade8 = "B";
                    $remark8 = "Very Good!";
                }else if($total8 >= 70){
                    $grade8 = "A";
                    $remark8 = "Excellent!";
                }

                // END


                // SUBJECT 9
                $subject10 = $_REQUEST["subject10"];
                $test17 = $_REQUEST["test17"];
                $test18 = $_REQUEST["test18"];
                $exam9 = $_REQUEST["exam9"];
                $total9 = $test17 + $test18 + $exam9;

                if($total9 <= 0){
                    $grade9 = "No Result!";
                    $remark9 = "No Result!";
                }else if($total9 <=39){
                    $grade9 = "F";
                    $remark9 = "Very Poor!";
                }else if($total9 >= 40 && $total9 <= 44){
                    $grade9 = "E";
                    $remark9 = "Poor!";
                }else if($total9 >= 45 && $total9 <= 49){
                    $grade9 = "D";
                    $remark9 = "Average!";
                }else if($total9 >= 50 && $total9 <= 59){
                    $grade9 = "C";
                    $remark9 = "Good!";
                }else if($total9 >= 60 && $total9 <= 69){
                    $grade9 = "B";
                    $remark9 = "Very Good!";
                }else if($total9 >= 70){
                    $grade9 = "A";
                    $remark9 = "Excellent!";
                }

                // END

            // INSERTING INTO TABLE(resultchecker) ON THE DATABASE.
            $sql = "INSERT INTO resultchecker (studentname, class, subject2, test1, test2, exam1, total1, subject3, test3, test4, exam2, total2, subject4, test5, test6, exam3, total3, subject5, test7, test8, exam4, total4, subject6, test9, test10, exam5, total5, subject7, test11, test12, exam6, total6, subject8, test13, test14, exam7, total7, subject9, test15, test16, exam8, total8, subject10, test17, test18, exam9, total9, teacher, principal) VALUES ('$studentname', '$class', '$subject2', '$test1','$test2', '$exam1', '$total1', '$subject3', '$test3', '$test4', '$exam2', '$total2','$subject4',
            '$test5', '$test6', '$exam3', '$total3', '$subject5', '$test7', '$test8', '$exam4',
            '$total4', '$subject6', '$test9', '$test10', '$exam5', '$total5', '$subject7', '$test11',
           '$test12', '$exam6', '$total6', '$subject8', '$test13', '$test14', '$exam7', '$total7',
            '$subject9', '$test15', '$test16', '$exam8', '$total8', '$subject10', '$test17', '$test18',
            '$exam9', '$total9', '$teacher', '$principal')";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $num = mysqli_insert_id($conn);
            if(mysqli_affected_rows($conn)!=1){
                $message = "Error inserting record into database";

            }
            // END

            
            }

            ?>

        
            

            
            

            <!-- STUDENT'S NAME -->
                <input type="text" placeholder="STUDENT'S NAME" id="student1" name="student" required> 


                <!-- CLASS NAME -->

                <select name="class" id="class1">

                                <option value="">CLASS</option>
                                <option value="JSS1">JSS1</option>
                                <option value="JSS2">JSS2</option>
                                <option value="JSS3">JSS3</option>
                                <option value="SS1">SS1</option>
                                <option value="SS2">SS2</option>
                                <option value="SS3">SS3</option>
                                
                            </select>

                            <!-- END -->


                            <!-- SUBJECT NAME -->
                <span for="text" id="subject1">SUBJECT</span> <br><br>
                <!-- END -->


                <!-- SUBJECT 1 OPTION -->
                <select name="subject2" id="subject2" onchange="demo()">
                    <option value="">--Select Subject--</option>

                    <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select> <br><br>

                <!-- END -->


                <!-- SUBJECT 2 OPTION -->
                <select name="subject3" id="subject3" onchange="demo()">

                    <option value="">--Select Subject--</option>

                         <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select> <br>

                <!-- END -->

                <!-- SUBJECT 3 OPTION -->
                <select name="subject4" id="subject4" onchange="demo()">

                    <option value="">--Select Subject--</option>

                      <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select>

                <!-- END -->

                <!-- SUBJECT 4 OPTION -->
                <select name="subject5" id="subject5" onchange="demo()">
                    
                    <option value="">--Select Subject--</option>

                   <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select> 

                <!-- END -->

                <!-- SUBJECT 5 OPTION -->
                <select name="subject6" id="subject6" onchange="demo()">
                    <option value="">--Select Subject--</option>

                           <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select>

                <!-- END -->

                <!-- SUBJECT 6 OPTION -->
                <select name="subject7" id="subject7" onchange="demo()">
                    <option value="">--Select Subject--</option>

                          <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select>

                <!-- END -->


                <!-- SUBJECT 7 OPTION -->
                <select name="subject8" id="subject8" onchange="demo()">
                    <option value="">--Select Subject--</option>

                           <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select> 

                <!-- END -->


                <!-- SUBJECT 8 OPTION -->
                <select name="subject9" id="subject9" onchange="demo()">
                    <option value="">--Select Subject--</option>

                          <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select> 

                <!-- END -->


                <!-- SUBJECT 9 OPTION -->
                <select name="subject10" id="subject10" onchange="demo()">
                    <option value="">--Select Subject--</option>

                           <?php

                    $subjectlist = "Mathematics, English, Chemistry, Physics, Biology, Further Mathematics, Computer Science, Geography, Civic Education, Agricultural Science";
                    $arrSubjects = explode("," , $subjectlist);
                    $countSubjects = count($arrSubjects);
                    $maincount = $countSubjects - 1;

                    for($subject = 0; $subject <= $maincount; $subject = $subject + 1){
                        echo "<option value= '$arrSubjects[$subject]'>$arrSubjects[$subject]</option>";
                    }

                    ?>

                </select> 

                <!-- END -->


                <!-- TEST1, TEST2, EXAM, TOTAL -->
                <table border="0" id="table1">
                    <tr>
                        <th>TEST 1</th>
                        <th>TEST 2</th>
                        <th>EXAM</th>
                        <th>TOTAL</th>
                    </tr>
                        
                </table> 

                
                        
                            <input type="number" id="test1" name= "test1" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test2" name= "test2" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam1" name= "exam1" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall1" name= "totall1" oninput="demo()" readonly> <br><br>

                            <input type="number" id="test3" name= "test3" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test4" name= "test4" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam2" name= "exam2" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall2" name= "totall2" oninput="demo()" readonly> <br><br>

                            <input type="number" id="test5" name= "test5" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test6" name= "test6" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam3" name= "exam3" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall3" name= "totall3" oninput="demo()" readonly> <br><br>

                            <input type="number" id="test7" name= "test7" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test8" name= "test8" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam4" name= "exam4" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall4" name= "totall4" oninput="demo()" readonly> <br><br>

                            <input type="number" id="test9" name= "test9" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test10" name= "test10" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam5" name= "exam5" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall5" name= "totall5" oninput="demo()"readonly> <br><br>

                            <input type="number" id="test11" name= "test11" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test12" name= "test12" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam6" name= "exam6" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall6" name= "totall6" oninput="demo()" readonly> <br><br>

                            <input type="number" id="test13" name= "test13" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test14" name= "test14" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam7" name= "exam7" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall7" name= "totall7" oninput="demo()" readonly> <br><br>

                            <input type="number" id="test15" name= "test15" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test16" name= "test16" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam8" name= "exam8" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall8" name= "totall8" oninput="demo()" readonly> <br><br>

                            <input type="number" id="test17" name= "test17" oninput="demo()" placeholder= "Test1 score">
                            <input type="number" id="test18" name= "test18" oninput="demo()" placeholder= "Test2 score">
                            <input type="number" id="exam9" name= "exam9" oninput="demo()" placeholder= "Exam score">
                            <input type="number" id="totall9" name= "totall9" oninput="demo()" readonly> <br><br>

                             <label for="" id="teach">Class Teacher's Remark</label> <br>
                        <input type="text" id="teacher" name= "teacher" oninput="demo()">

                             <label for="" id="prin" >Principal's Remark</label> <br>
                            <input type="text" id="principal" name= "principal" oninput="demo()">

                            <button type="submit" name= "submit" id= "submit" onclick= "return confirm('Are you sure to check your result?')">Check Result</button>


                        </form>

                        <!-- END -->

                       
                       
                        
                        <!-- TEST AND EXAM CALCULATION WITH JS -->
                        <script type= "text/javascript">
                           function demo(){
                            let test1 = document.getElementById("test1").value;
                            let test2 = document.getElementById("test2").value;
                            let exam1 = document.getElementById("exam1").value;
                            document.getElementById("totall1").value = Number(test1) + Number(test2) + Number(exam1);

                            let test3 = document.getElementById("test3").value;
                            let test4 = document.getElementById("test4").value;
                            let exam2 = document.getElementById("exam2").value;
                            document.getElementById("totall2").value = Number(test3) + Number(test4) + Number(exam2);

                            let test5 = document.getElementById("test5").value;
                            let test6 = document.getElementById("test6").value;
                            let exam3 = document.getElementById("exam3").value;
                            document.getElementById("totall3").value = Number(test5) + Number(test6) + Number(exam3);

                            let test7 = document.getElementById("test7").value;
                            let test8 = document.getElementById("test8").value;
                            let exam4 = document.getElementById("exam4").value;
                            document.getElementById("totall4").value = Number(test7) + Number(test8) + Number(exam4);

                            let test9 = document.getElementById("test9").value;
                            let test10 = document.getElementById("test10").value;
                            let exam5 = document.getElementById("exam5").value;
                            document.getElementById("totall5").value = Number(test9) + Number(test10) + Number(exam5);

                            let test11 = document.getElementById("test11").value;
                            let test12 = document.getElementById("test12").value;
                            let exam6 = document.getElementById("exam6").value;
                            document.getElementById("totall6").value = Number(test11) + Number(test12) + Number(exam6);

                            let test13 = document.getElementById("test13").value;
                            let test14 = document.getElementById("test14").value;
                            let exam7 = document.getElementById("exam7").value;
                            document.getElementById("totall7").value = Number(test13) + Number(test14) + Number(exam7);
                            
                            let test15 = document.getElementById("test15").value;
                            let test16 = document.getElementById("test16").value;
                            let exam8 = document.getElementById("exam8").value;
                            document.getElementById("totall8").value = Number(test15) + Number(test16) + Number(exam8);

                            let test17 = document.getElementById("test17").value;
                            let test18 = document.getElementById("test18").value;
                            let exam9 = document.getElementById("exam9").value;
                            document.getElementById("totall9").value = Number(test17) + Number(test18) + Number(exam9);

                           }
                        </script>

                        <!-- END -->
                
           

        </div>



        <div id="cont2">
            
        <span id= "greet"></span>
        <span id= "time"></span>

         <script>
                setInterval(timer, 1000);

                function timer(){
                    let today = new Date();
                    let time = today.toLocaleTimeString();

                    document.getElementById('time').textContent = time;
                }

                function greet(){
                    let thisDay = new Date();
                    let hour = thisDay.getHours();

                    if(hour >= 0 && hour < 12){
                        document.getElementById("greet").textContent = `Good Morning.`;
                    }else if(hour >= 12 && hour < 16){
                        document.getElementById("greet").textContent = `Good Afternoon.`;
                    }else{
                        document.getElementById("greet").textContent = `Good Evening.`;
                    }
                }

            </script>

          
            

            <img src="image/school logo.jpg" alt="" id="img2">

           <span id="prest2">PRESTIGE INTERNATIONAL COLLEGE</span>

           <span id="result">RESULTS</span>

            <form method="post" id="form4">
                

            </form>
                    





            <!-- TABLE FOR SUBJECT, TOTAL, GRADE AND REMARK -->
                  <table border="0" id="table2">

                  
                      <?php if(isset($_REQUEST["submit"])){
                        echo "<span id= 'stud'>Student's name : $studentname</span>";
                        echo "<span id= 'clas'>Class : $class</span>";
                      }?>
                      
                    <tr>
                        <th>SUBJECT</th>
                        <th>TOTAL</th>
                        <th>GRADE</th>
                        <th>REMARK</th>
                    </tr>

                    <?php
                    
                    
                    if(isset($_REQUEST["submit"])){
                   echo "<tr id= 'tr'>";
                       echo "<td>" .htmlspecialchars($subject2). "</td>";
                       echo "<td>" .htmlspecialchars($total1). "</td>";
                       echo "<td>" .htmlspecialchars($grade1). "</td>";
                       echo "<td>" .htmlspecialchars($remark1). "</td>";
                   echo "</tr>";

                    echo "<tr>";
                       echo "<td>" .($subject3). "</td>";
                       echo "<td>" .($total2). "</td>";
                       echo "<td>" .($grade2). "</td>";
                       echo "<td>" .($remark2). "</td>";
                   echo "</tr>";

                     echo "<tr>";
                       echo "<td>" .($subject4). "</td>";
                       echo "<td>" .($total3). "</td>";
                       echo "<td>" .($grade3). "</td>";
                       echo "<td>" .($remark3). "</td>";
                   echo "</tr>";

                     echo "<tr>";
                       echo "<td>" .($subject5). "</td>";
                       echo "<td>" .($total4). "</td>";
                       echo "<td>" .($grade4). "</td>";
                       echo "<td>" .($remark4). "</td>";
                   echo "</tr>";

                     echo "<tr>";
                       echo "<td>" .($subject6). "</td>";
                       echo "<td>" .($total5). "</td>";
                       echo "<td>" .($grade5). "</td>";
                       echo "<td>" .($remark5). "</td>";
                   echo "</tr>";

                     echo "<tr>";
                       echo "<td>" .($subject7). "</td>";
                       echo "<td>" .($total6). "</td>";
                       echo "<td>" .($grade6). "</td>";
                       echo "<td>" .($remark6). "</td>";
                   echo "</tr>";

                     echo "<tr>";
                       echo "<td>" .($subject8). "</td>";
                       echo "<td>" .($total7). "</td>";
                       echo "<td>" .($grade7). "</td>";
                       echo "<td>" .($remark7). "</td>";
                   echo "</tr>";

                    echo "<tr>";
                       echo "<td>" .($subject9). "</td>";
                       echo "<td>" .($total8). "</td>";
                       echo "<td>" .($grade8). "</td>";
                       echo "<td>" .($remark8). "</td>";
                   echo "</tr>";

                     echo "<tr>";
                       echo "<td>" .($subject10). "</td>";
                       echo "<td>" .($total9). "</td>";
                       echo "<td>" .($grade9). "</td>";
                       echo "<td>" .($remark9). "</td> <br>";
                   echo "</tr> ";

                    }

                    ?>
                        
                </table>

                <!-- END -->


                <!-- CLASS TEACHER AND PRINCIPAL'S REMARK -->
                <?php
                
                if(isset($_REQUEST["submit"])){
                    echo "  <span id= 'classteacher'> Class Teacher's Remark : $teacher </span>";
                    echo "  <span id= 'principalremark'> Principal's Remark : $principal </span>";

                   
                }

              

                ?>
                <!-- END -->



                           

                        



        </div>

    </div>
    
</body>
</html>