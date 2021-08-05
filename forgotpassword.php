<?php
include 'dbconnect.php';
session_start();

$email=$_POST['email'];
$ques=ucwords($_POST['question']);
$ans=ucwords($_POST['answer']);


$sql="SELECT * from users where user_email='$email'";
$query=mysqli_query($conn,$sql);
$user=mysqli_fetch_array($query);

if($user['question']==$ques && $user['answer']==$ans){

	header("location: passwordreset.php?email=$email");
}
else
{

	$message = "Question or answer wrong.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'forgot.php';</script>";

}



// echo $email.'......';
// echo $ques.'........';
// echo $ans.'........';


?>