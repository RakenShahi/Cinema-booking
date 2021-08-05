<?php
include 'dbconnect.php';
session_start();
?>
<?php

// $uname=ucfirst($_POST['username']);
$id=$_POST['id'];
$ac=$_POST['access'];
$sql="UPDATE users Set access='$ac' WHERE user_id='$id'";
$qury=mysqli_query($conn,$sql);

		


if ($qury)
{
	
		
		header('location:allusers.php');
} 

else{	
			 $message = "Update not successful\\nTry again.";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'allusers.php';</script>";

			
			
			}
			
?>