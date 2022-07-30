<?php
include 'connect.php';
$id=$_GET["id"];
$delete="DELETE FROM signup where regid='$id'";
$delete_q=mysqli_query($con,$delete);
header('location:admin.php');
?>