<?php
session_start();
include 'dbconnect.php';

$u_id=$_GET['user_id'];
$id=$_GET['booking_id'];

echo $u_id;
$sql="UPDATE `seats` SET `seat_status`='Sold' WHERE user_id ='$u_id' ";
$qury=mysqli_query($conn,$sql);

$book="SELECT * from booking where booking_id='$id' AND user_id='$u_id' ";
	$bq=mysqli_query($conn,$book);
	$result=mysqli_fetch_array($bq);
	$m_id=$result['movie_id'];
	$uname=$result['username'];
	$booked_movie_name=$result['booked_movie_name'];
	$date=$result['Datee'];
	$time=$result['Timee'];
	$no_of_seats=$result['no_of_seats'];
	$price=$no_of_seats*450;

		
		$account="INSERT into account (booking_id,movie_id,user_id,username,booked_movie_name,Datee,Timee,no_of_seats,price) values ('$id','$m_id','$u_id','$uname','$booked_movie_name','$date','$time','$no_of_seats','$price')";
		$aqury=mysqli_query($conn,$account);

		// $sql1="DELETE  FROM seats where user_id ='$u_id' ";
		//  $qury1=mysqli_query($conn,$sql1);


		$sql="DELETE  FROM booking where booking_id ='$id' ";
		$qury=mysqli_query($conn,$sql);



		 	if($qury){

		 		$message = "Tickets Reserved.";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'ticketsbooked.php';</script>";

		 // 		alert('Tickets Reserved');
		 // header("Location:index.php");

}
else
{

	echo "fail";
}
		 ?>