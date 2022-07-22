<?php
include 'connect.php';
$id=$_GET['id'];
$select="select * from signup where regid='$id'";
$select_q=mysqli_query($con,$select);
$fetch=mysqli_fetch_assoc($select_q);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
  
  
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

  <h1>Attendance Management System <br>Update</h1>
  <div class="navbar">
<a href="user.php" style="text-decoration:none;">Back</a>

</div>


</header>
<center>
<div class="content">
        <form  method="post" enctype="multipart/form-data" class="form-horizontal col-md-6 col-md-offset-3">

    <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Full Name</label>
          <div class="col-sm-7">
            <input type="text" name="fname"  class="form-control" value="<?php echo $fetch["fname"]; ?>" id="input1" placeholder="Fullname" required/>
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-7">
            <input type="email" name="email" value="<?php echo $fetch["email"]; ?>" class="form-control" id="input1" placeholder="Your Email" required/>
          </div>
      </div>

      <div class="form-group">
        <label for="input1" class="col-sm-3 control-label">Upload Picture</label>
        <div class="col-sm-7">
        <img src="img/<?php echo $fetch['picture'] ?>" width="70px">
          <input type="file" name="picture"  class="form-control" id="input1" placeholder="Upload" />
          
        </div>
    </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Username</label>
          <div class="col-sm-7">
            <input type="text" name="username" value="<?php echo $fetch["username"]; ?>"  class="form-control" id="input1" placeholder="Choose Username" required/>
          </div>
      </div>
<input type="submit" style="border-radius:0%" class="btn btn-primary col-md-2 col-md-offset-8" id="input1" value="Update" name="update_btn" />
</form>
</center>

<?php
if(isset($_POST['update_btn']))
{
$fullname=$_POST['fname'];
$email=$_POST['email'];
$picture=$_FILES['picture']['name'];
$tmp_picture=$_FILES['picture']['tmp_name'];
$username=$_POST['username'];
$destination="img/".$picture;

if($picture !="")
{
  move_uploaded_file($tmp_picture,$destination);
  $update="UPDATE signup set fname='$fullname', email='$email', picture='$picture', username='$username' where regid='$id'"; 
  $update_q=mysqli_query($con,$update);
  
  header('location:user.php');
}
else{
echo "Please select the image!!!";
}
}
?>

</body>
</html>

