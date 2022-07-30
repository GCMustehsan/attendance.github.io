<?php
include 'connect.php';
session_start();
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="select * from  login where username='$username' and password='$password'";
	$result=mysqli_query($con,$sql);
	if($result->num_rows>0)
	{
			$row=mysqli_fetch_assoc($result);
			$_SESSION['username']=$row['username'];
			
			header('location:admin.php');
			
	}
	else{
		echo "<script>alert('Enter wrong information!!') </script>";
	}

}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Attendance Management System</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	 
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
	 
	 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
	<center>

<header>

  <h1>Attendance Management System</h1>

</header>

<h3>Admin Login Panel</h3>
<header>


<div class="navbar">
<a href="../index.php" style="text-decoration:none;">Home</a>
</div>

</header>

<div class="content">
	<div class="row">

		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<div class="form-group">
			    <label for="input1" class="col-sm-3 control-label">Username</label>
			    <div class="col-sm-7">
			      <input type="text" name="username"  class="form-control" id="input1" placeholder="Your Username" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-3 control-label">Password</label>
			    <div class="col-sm-7">
			      <input type="password" name="password"  class="form-control" id="input1" placeholder="Your Password" />
			    </div>
			</div>
			<a href="user.php"><input type="submit" class="btn btn-success col-md-3 col-md-offset-7" style="border-radius:0%" value="Login" name="login" id="login"/>
		</form>
	</div>
</div>
</center>
</body>
</html>