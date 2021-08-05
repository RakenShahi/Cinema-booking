<?php
include 'dbconnect.php';
session_start();
?>
<?php

$uname=ucfirst($_POST['username']);
//$email=$_POST['Email'];
$pass=$_POST['password'];

$input = $pass;

$encrypted = encryptIt( $input );




function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

$sql="SELECT * FROM users WHERE username='$uname' AND password='$encrypted'";
$qury=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($qury);
		


if ($result)
{
	if($result['access']== 'admin'){

		$_SESSION['admin']=1;
	}

	if($result['access']== 'accountant'){

		$_SESSION['accountant']=3;
	}

		$_SESSION['normal']=4;
		$_SESSION['username']=$result['user_name'];
		$_SESSION['userid']=$result['user_id'];
		$_SESSION['code']=$result['Confirmation_code'];
		
		header('location: index.php');
} else{	
			 $message = "Username or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'index.php';</script>";

			
			
			}
			
?>
