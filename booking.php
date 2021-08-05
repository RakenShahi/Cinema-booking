<?php
session_start();
include 'dbconnect.php';
$id=$_SESSION['userid'];
$username=$_SESSION['username'];
$movie_name=$_POST['movie_name'];
$date=$_POST['date'];
$time=$_POST['time'];
$counter= $_POST["counterliney"];
$m_id=$_POST['movie_id'];
$u_id=$_SESSION['userid'];
$a_id=$_GET['a_id'];
$seat = $_POST['seat'];

$seat1= explode(",",$seat);






  	//for limiting 8 seats

$sql2="SELECT * from seats where user_id='$id' and Timeee='$time' and Dateee='$date' and auditorium_id='$a_id' ";
$qury2=mysqli_query($conn,$sql2);
$c=0;
while($result=mysqli_fetch_array($qury2)){

$c=count($result['user_id'])+$c;

}
 $sqlbook = "SELECT * from booking";
      $sqlbook=mysqli_query($conn,$sqlbook);
      $book=mysqli_fetch_array($sqlbook);
      
if($book['user_id']==$u_id AND $book['booked_movie_name']==$movie_name)

 

 if(($c+$counter)<=10)	{ 
for ($x = 1; $x < count($seat1); $x+=2) {
  	$col=$seat1[$x+1];
  	echo $col;
  	$row=$seat1[$x];
  	echo $row;
 // echo $c;


$sqlseat="INSERT into seats (row,col,auditorium_id,Dateee,Timeee,user_id) values ('$row','$col','$a_id','$date','$time','$id')";
$qury1=mysqli_query($conn,$sqlseat);
}
$sql="INSERT into booking (movie_id,user_id,a_id,username,booked_movie_name,datee,timee,no_of_seats) values ('$m_id','$u_id','$a_id','$username','$movie_name','$date','$time','$counter')";
$qury=mysqli_query($conn,$sql);

if($qury){
		header("Location:mytickets.php");
		//header("Location:voucher.php?m_name=$movie_name");


}
else
{
	echo $m_id;
	echo $u_id;
}
}
else{
	 $message = "You can book only 10 tickets\\nThis is booking error.";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'bookticket.php?movie_id=$m_id';</script>";
}



?>