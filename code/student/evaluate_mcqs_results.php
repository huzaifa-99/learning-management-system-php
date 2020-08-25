<!DOCTYPE html>
<html>
<head>
    <title>Mcq's</title>
    <!--Bootstrap Link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--External Css Link-->
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <center>
        <?php
            session_start();
            require_once('../dbconnection.php');
            require 'verify_user_logged_in.php';
            require 'display_user_profile_pic.php';
            echo "<h1 class='margintop marginbottom'>Evaluate MCQ's Results</h1>";
                    $sqlquery12 = "SELECT * FROM answerpapers_projects2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' AND U_Id='{$_SESSION['Id']}'";
                    $resultsqlquery12 = mysqli_query($connect,$sqlquery12);
                    if ($row=mysqli_num_rows($resultsqlquery12)==0) {
                       echo "You Have Not Attempted Any Quiz Yet";
                    }
                    elseif ($row=mysqli_num_rows($resultsqlquery12)>0) {
                        $RIGHT=0;
                        $WRONG=0;
                        $TOTAL=0;
                        while ($row=mysqli_fetch_assoc($resultsqlquery12)) {
                            $results = $row["Result"];
                            if ($results==="WRONG") {
                                $WRONG++;
                            }
                            if ($results==="RIGHT") {
                                $RIGHT++;
                            }    
                        }
                        $TOTAL=$RIGHT+$WRONG;
                        //echo "<h1>MCQ's Results</h1>";
                        echo $WRONG." ANSWERS WERE WRONG AND ".$RIGHT." ANSWERS WERE RIGHT <br><br> Out of the total ".$TOTAL." Questions Attempted Over Time";
                    }
        ?>
</center>
</body>
</html>