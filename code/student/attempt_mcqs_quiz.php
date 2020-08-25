<!DOCTYPE html>
<html>
<head>
    <title>Mcq's</title>
    <!--Bootstrap Link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--External Css Link-->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style type="text/css">
    #bubblebox
{ 
    width:1190px; 
    height:350px; 
    margin:10px auto; 
    border:1px solid #AAA; 
}
#bubbles
{ 
    width:auto;
    margin:0px auto;
    text-align:center; 
}
#bubbles > div
{ 
    display:inline-block; 
    width:10px; 
    height:10px; 
    margin:24px 10px 0px 10px; 
    background:rgba(0,0,0,.1); 
    text-align:center;
    border:2px solid #999;
    border-radius:100%; 
    font-size:17px; 
    text-decoration:none; 
    transition: background 0.3s linear 0s; 
    cursor:pointer;  
}
#bubblecontent
{ 
    margin:0px auto; 
    transition:opacity 0.3s linear 0s; 
    font-family: Arial;
}
#bubblecontent > h2
{ 
    text-align:center; 
    color:#7EA800; 
}
#bubblecontent > p
{ 
    font-size:17px; 
    line-height:1.5em; 
    padding:20px 50px; 
    color:#777; 
}
</style>
    <script type="text/javascript">
    
// This simple function returns object reference for elements by ID
function _(x){return document.getElementById(x);}
// Variables for bubble array, bubble index, and the setInterval() variable
var ba, bi=0, intrvl;
// This function is triggered by the bubbleSlide() function below
function bubbles(bi){
    // Fade-out the content
    _("bubblecontent").style.opacity = 0;
    // Loop over the bubbles and change all of their background color
    for(var i=0; i < ba.length; i++){
        ba[i].style.background = "rgba(0,0,0,.1)";
    }
    // Change the target bubble background to be darker than the rest
    ba[bi].style.background = "#999";
    // Stall the bubble and content changing for just 300ms
    setTimeout(function(){
        // Change the content
        _("bubblecontent").innerHTML = bca[bi];
        // Fade-in the content
        _("bubblecontent").style.opacity = 1;
    }, 300);
}
// This function is set to run every 5 seconds(5000ms)
function bubbleSlide(){
    bi++; // Increment the bubble index number
    // If bubble index number is equal to the amount of total bubbles
    if(bi == ba.length){
        bi = 0; // Reset the bubble index to 0 so it loops back at the beginning
    }
    // Make the bubbles() function above run
    bubbles(bi);
}
// Start the application up when document is ready
window.addEventListener("load", function(){
    // Get the bubbles array
    ba = _("bubbles").children;
    // Set the interval timing for the slideshow speed
   // intrvl = setInterval(bubbleSlide, 5000);
});
</script>
</head>
<body onload="bubbles(0);">
    <center>
        <?php
        	session_start();
            require_once('../dbconnection.php');
            require 'verify_user_logged_in.php';
            require 'display_user_profile_pic.php';
            echo "<h1 class='margintop marginbottom'>Attempt MCQ's Quiz</h1>";
        	$sqlquery9 ="SELECT * FROM questionpapers_project2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}'";
        	$resultsqlquery9=mysqli_query($connect,$sqlquery9);
        	if (mysqli_num_rows($resultsqlquery9)>0) {
                //echo "<h1>MCQ's Quiz</h1>";
                $serialno=1;?><script type="text/javascript">// bca - Bubble Content Array. Put your content here.
                var bca=[];<?php
        		while($row = mysqli_fetch_assoc($resultsqlquery9)){
        			$i = $row["Q_Id"];
                    //?>
                    

                     bca.push("<table class='table'><thead class='thead-light'><tr><th><?php echo $serialno;?>-: <?php echo $row['Question'];?></th><th></th></tr></thead></tbody><tr><td><label><input type='radio' name='<?php echo $i;?>' value='1'> <?php echo $row['Op1'];?></label></td><td><label><input type='radio' name='<?php echo $i;?>' value='2'> <?php echo $row['Op2'];?></label></td></tr><tr><td><label><input type='radio' name='<?php echo $i;?>' value='3'> <?php echo $row['Op3'];?></label></td><td><label><input type='radio' name='<?php echo $i;?>' value='4'> <?php echo $row['Op4'];?></label></td></tr></tbody></table>");
                    
                    <?php
                    $serialno++;
                    //
                }
                ?>console.log(bca);</script>
                <?php
                echo "<form method='post' action=''>";
                ?><script type="text/javascript">document.write("<div style='width:630px;'>"+bca+"</div>");</script>
                <?php
                echo "<input type='submit' name='submit' id='submit' class='height btn btn-primary col col-xs-5 col-sm-5 col-md-5 col-lg-5' value='Submit' style='margin-bottom:100px;'></form>";
        	}
        	elseif (mysqli_num_rows($resultsqlquery9)==0) {
        		echo "No questionpapers_project2 questions found of the current subject";
        	}
        ?>
        <?php
            if (isset($_POST['submit'])) {
               //echo "posting";
                $sqlquery10 = "SELECT *  FROM questionpapers_project2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}'";
                $resultsqlquery10 = mysqli_query($connect,$sqlquery10);
                if (mysqli_num_rows($resultsqlquery10)==0) {
                    echo "No Results Found";
                }
                elseif (mysqli_num_rows($resultsqlquery10)>0) {
                    $res = "";
                    $sql = "DELETE FROM answerpapers_projects2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' AND U_Id='{$_SESSION['Id']}'";
                        $reslt =mysqli_query($connect,$sql);
                    while ($row=mysqli_fetch_assoc($resultsqlquery10)) {
                    // first insert the answers given by the student
                        $questions = $row["Q_Id"] ;
                        $answer = $row["Answer"] ;
                        $chosenoption = $_POST[$questions];
                        //echo "<br>question no ".$questions ." with answer option chosen ". $chosenoption." having the correct option of ".$answer;
                        if ($chosenoption===$answer) {
                            $res = "RIGHT";
                        }
                        elseif ($chosenoption!=$answer) {
                            $res = "WRONG";
                        }
                        $sqlquery11 = "INSERT INTO answerpapers_projects2 (Semester_No,Course_No ,U_Id  ,Q_Id,Chosen_Answer,Actual_Answer,Result) VALUES ('{$_SESSION['semester']}','{$_SESSION['course']}','{$_SESSION['Id']}','$questions','$chosenoption','$answer','$res')";
                        $resultsqlquery11 = mysqli_query($connect,$sqlquery11);
                        if ($resultsqlquery11) {
                            //echo "++";
                        }
                        elseif (!$resultsqlquery11) {
                            //echo "**";
                        }
                    }
                    
                }
            }
        ?>
    </center>
    
</body>
</html>