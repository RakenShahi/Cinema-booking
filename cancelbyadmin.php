<?php
session_start();
include 'dbconnect.php';

$u_id=$_SESSION['userid'];
$id=$_GET['booking_id'];



	$book="SELECT * from booking where booking_id='$id' AND user_id='$u_id' ";
	$bq=mysqli_query($conn,$book);
	$result=mysqli_fetch_array($bq);
	$date=$result['Datee'];
	$time=$result['Timee'];
	$a_id=$result['a_id'];


	$sql1="DELETE  FROM seats where user_id ='$u_id' AND Dateee='$date' AND Timeee='$time' AND auditorium_id='$a_id'  ";
	$qury1=mysqli_query($conn,$sql1);


		 		$sql="DELETE  FROM booking where booking_id ='$id' ";
		$qury=mysqli_query($conn,$sql);
			if($qury){

		 	$message = "Tickets Canceled. Thank You!";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'ticketsbooked.php';</script>";
}

		 ?>