
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header>

  <h1>Attendance Management System</h1>
  <div class="navbar">
  <a href="#" style="text-decoration:none;">Home</a>

  <a href="logout.php" style="text-decoration:none;">Logout</a>

</div>

</header>

<div class="container mt-3">
<?php
include 'connect.php';
$select="select * from signup";
$select_q=mysqli_query($con,$select);
$data=mysqli_num_rows($select_q);
?>           
  <table class="table table-dark table-hover">

    <thead>
      <tr>
  <td>Name</td>
	<td>Email</td>
	<td>Picture</td>
	<td>Username</td>
  <td>Student Update</td>
  <td>Delete student</td>
      </tr>
    </thead>
    <tbody>
    <?php
while($row=mysqli_fetch_assoc($select_q)){
	?>
	<tr>
		<td><?php echo $row['fname'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><img src="img/<?php echo $row['picture'] ?>" width="10px" height="100px"></td>
		<td><?php echo $row['username'] ?></td>
    <td><a href="edit.php?id=<?php echo $row['regid']?> "><button type="button" class="btn btn-primary">Update</button></a></td>
    <td><a href="delete.php?id=<?php echo $row['regid']?> "><button type="button" class="btn btn-danger">Delete</button></a></td>
	</tr>
	<?php
}?>
    </tbody>
  </table>
</div>

</body>
</html>
