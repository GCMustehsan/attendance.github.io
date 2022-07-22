<?php
include 'connect.php';

if(isset($_POST['signup']))
{
$fullname=$_POST['fname'];
$email=$_POST['email'];
$picture=$_FILES['picture']['name'];
$tmp_picture=$_FILES['picture']['tmp_name'];
$username=$_POST['username'];
$password=$_POST['password'];
$destination="img/".$picture;
move_uploaded_file($tmp_picture,$destination);

$insert="insert into  signup (fname,email,picture,username,password) values ('$fullname','$email','$picture','$username','$password') ";
$insert_q=mysqli_query($con,$insert);

if($insert_q){
?>
<script type="text/javascript">
alert("Data saved succesfuuly");

</script>

<?php

session_start();
session_destroy();
header('location: login.php');
}
else{
    ?>
    <script>
        alert("Data not saved succesfully!!!");
    </script>
    <?php
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
  
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="main.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<header>

  <h1>Attendance Management System</h1>

</header>
<center>
<h1>Signup</h1>
<div class="content">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal col-md-6 col-md-offset-3">

    <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Full Name</label>
          <div class="col-sm-7">
            <input type="text" name="fname"  class="form-control" id="input1" placeholder="Fullname" required/>
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-7">
            <input type="email" name="email"  class="form-control" id="input1" placeholder="Your Email" required/>
          </div>
      </div>

      <div class="form-group">
        <label for="input1" class="col-sm-3 control-label">Upload Picture</label>
        <div class="col-sm-7">
          <input type="file" name="picture"  class="form-control" id="input1" placeholder="Upload" />
        </div>
    </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Username</label>
          <div class="col-sm-7">
            <input type="text" name="username"  class="form-control" id="input1" placeholder="Choose Username" required/>
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-7">
            <input type="password" name="password"  class="form-control" id="input1" placeholder="Enter Password" required/>
          </div>
      </div>



      <a href="login.php"><input type="submit" style="border-radius:0%" class="btn btn-primary col-md-2 col-md-offset-8" id="sinup"value="Signup" name="signup" /></a>
    </form>
  </div>
    <br>
    <p><strong>Already have an account? <a href="login.php">Login</a> here.</strong></p>

</div>

</center>

</body>
</html>