<?php
//php coded for connection
include 'connect.php';
session_start(); 
$regid=$_SESSION['regid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
//php code for getting id when login
$select="select * from signup  where regid='$regid'";
$select_q=mysqli_query($con,$select);
$data=mysqli_num_rows($select_q);
?> 
<header>

<h1>Attendance Management System</h1>
<div class="navbar">
<a href="index.php" style="text-decoration:none;">Home</a>

<a href="login.php" style="text-decoration:none;">Logout</a>

</div>

</header>
<div class="container mt-3">
<h2 class="card-title"><?php  echo "welcome  ".$_SESSION['username']; ?></h2>
  <p>Click on the button to edit profile</p>
<?php
  while($row=mysqli_fetch_assoc($select_q)){
	?>
<a href="edit.php?id=<?php echo $row['regid']?> "><button type="button" class="btn btn-primary" data-bs-toggle="modal" id="profile" data-bs-target="#myModal" name="profile" >
    Edit Profile
  </button></a>
  <br><br><br>
<tbody>
<tr>
   <form  method='post'>
    <div class="form-group">
  <div class="form-check">
  <input type="radio" class="form-check-input" id="present" name="attendance" value="Present">present
  <label class="form-check-label" for="radio1"></label>
</div>
<div class="form-check">
  <input type="radio" class="form-check-input" id="absent" name="attendance" value="Absent">absent
  <label class="form-check-label" for="radio2"></label>
</div>
</td>
  <td><button type="submit" name="submit_btn" id="submit" class="btn btn-warning">submit</button></td>
</tr>
</div>
</form>

</html>
</body>
<?php } ?>
  
<br><br><br>
<?php

//for attendance
echo "Today is " . date("Y/m/d") . "<br>";
$date=date("Y/m/d");
$chkdate=date("Y/m/d");


if(isset($_POST['submit_btn']))
{   
    $attendance=$_POST['attendance'];
    if($attendance=='Present')
    {
    $q="insert into attendance(regid,attendance,date) values('$regid','$attendance','$date') ";
    $re=mysqli_query($con,$q);
    echo "Present marked";
   
    }
    elseif($attendance=='Absent'){
      $q="insert into attendance(regid,attendance,date) values('$regid','$attendance','$date')";
      $re=mysqli_query($con,$q);
      echo "Absent marked";
     
    }
}
?> 
<!--       
<table class="table table-dark table-hover">

<thead>
  <tr>
  <td>Username</td>
  <td colspan="3" style="text-align:center;">Attendance</td>
  
  </tr>
</thead>
<tbody>
<tr>
  
  <td><?php echo $_SESSION['username']; ?></td>
  <form method='post'>
  <td><input name='present' type="submit" value='Present'>
  <h3><em>Present<?php echo $_SESSION['present'] ?>: </em></h3></td>
  <td><input name='absent' type="submit" value='Absent'>
  <h3><em>Absent<?php echo $_SESSION['absent'] ?>: </em></h3></td>
  <td><a href=""><button type="button" name="add" class="btn btn-warning">Submit</button></a></td>
</tr>
  </form>
</tbody>
</table> 
  <?php
//code for absent present php maarked once if user mark attendance today
// Page was not reloaded via a button press
echo "Today is " . date("Y/m/d") . "<br>";
$date=date("Y/m/d");
$chkdate=date("Y/m/d");

    

    // Page was not reloaded via a button press
   if (isset($_POST['present'])) {
    $q="insert into attendance values('$regid','$present','0')";
    $result=mysqli_query($con,$q);
    $_SESSION['present']++;
    $Present=$_SESSION['present'];
    
}
elseif(isset($_POST['absent']))
{
  $q="insert into attendance values('$regid','0','$Absent')";
$result=mysqli_query($con,$q);
 $_SESSION['absent']++;
 $Absent=$_SESSION['absent'];
}
?>
-->
</body>
</html>




