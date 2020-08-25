<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
  <!--Bootstrap Link-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!--External Css Link-->
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>  
  <center>
	<u><h1 class='margintop marginbottom'>Home Page</h1></u>
  <?php
    require 'dbconnection.php';
    session_start();
    if(!isset($_SESSION['Email']))
    { 
      echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginmodel">Login</button><div class="modal fade" role="dialog" id="loginmodel"><div class="modal-dialog"><div class="modal-content">
      <form method="post" action="loginphp.php">
        <div class="modal-header">
        <h1 class="modal-title">Login</h1>
        <button class="close" type="button" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body">
      <div class="form-group">
      <input type="email" name="loginemail" id="loginemail" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" placeholder="Email" required>
      </div>
      <div class="form-group">
      <input type="password" name="loginpassword" id="loginpassword" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" placeholder="Password" required>
      </div>
      <div class="form-group">
      <select name="usertype" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
        <option value="">Login As</option>
        <option value="Student">Student</option>
        <option value="Teacher">Teacher</option>
        <option value="Admin">Admin</option>
      </select>
      </div>  
      </div>
      <div class="modal-footer">
      <input type="submit" name="login" class="btn btn-success" id="login" value="Login">
      </div></div></div></div>';
    }
    if (isset($_SESSION['User_Type']) && $_SESSION['User_Type']==="Student") {
      require 'display_user_profile_pic.php';
      echo "<h1>Select Your Course ( Student )</h1>";
      echo "Your Semester ".$_SESSION['semester'];
      $sqlquery20 = "SELECT * FROM semester_course_project2 WHERE Semester_No='{$_SESSION['semester']}'";
      $resultsqlquery20 = mysqli_query($connect,$sqlquery20);
      if(mysqli_num_rows($resultsqlquery20)==0){echo "This Semester Is Not Registered";}
      elseif(mysqli_num_rows($resultsqlquery20)>1){
        echo '<form method="post" action="homephp.php"><select name="course" class="height btn btn-secondary col col-xs-12 col-sm-12 col-md-5 col-lg-5" required><option value="">Select Course</option>';
         while($row=mysqli_fetch_assoc($resultsqlquery20))
              {
                echo '<option value="'.$row["Course_No"].'">'.$row["Course_No"].'</option>';
              }
          echo '</select><input type="submit" name="submit" class="height btn btn-secondary col col-xs-12 col-sm-12 col-md-5 col-lg-5" value="Select"></form>';
        }
        //echo '<a href="logout.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-10 col-lg-10">Logout</button></a>';
      }
    if (isset($_SESSION['User_Type']) && $_SESSION['User_Type']==="Teacher") {
      require 'display_user_profile_pic.php';
      echo "<h1>Select Your Course ( Teacher )</h1>";
      echo "Your Semester ".$_SESSION['semester'];
      $sqlquery20 = "SELECT * FROM semester_course_project2 WHERE Semester_No='{$_SESSION['semester']}'";
      $resultsqlquery20 = mysqli_query($connect,$sqlquery20);
      if(mysqli_num_rows($resultsqlquery20)==0){echo "This Semester Is Not Registered";}
      elseif(mysqli_num_rows($resultsqlquery20)>1){
        echo '<form method="post" action="homephp.php"><select name="course" class="height btn btn-secondary col col-xs-12 col-sm-12 col-md-5 col-lg-5" required><option value="">Select Course</option>';
         while($row=mysqli_fetch_assoc($resultsqlquery20))
              {
                echo '<option value="'.$row["Course_No"].'">'.$row["Course_No"].'</option>';
              }
          echo '</select><input type="submit" name="submit" class="height btn btn-secondary col col-xs-12 col-sm-12 col-md-5 col-lg-5" value="Select"></form>';
        }
        //echo '<a href="logout.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-10 col-lg-10">Logout</button></a>';
    }
    if (isset($_SESSION['User_Type']) && $_SESSION['User_Type']==="Admin") {
      header("location: admin/admin_panel.php");
    }
  ?>
  </center>
  <?php
  if (isset($_GET['message'])) {
    $message = $_GET['message'];
    if($message="Wrong Email Or Password")
    {
    echo '<script>alert("Wrong Email Or Password");</script>';
    }
    elseif ($message="string") {
      echo "string";
    }
  }
  ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>