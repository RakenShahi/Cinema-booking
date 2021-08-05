
<?php
include 'dbconnect.php';
session_start();
$email=$_POST['email'];
$newp=$_POST['newp'];
$conp=$_POST['conp'];
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

// echo $email.",,,,,,".$newp.".....".$conp;
if($newp==$conp){

	$input = $conp;

$encrypted = encryptIt( $input );

$sql="UPDATE users SET password='$encrypted' where user_email='$email'";
$query=mysqli_query($conn,$sql);
	$message = "Change success";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'index.php';</script>";

}
else
{

	$message = "Password mismatched\\nTry again.";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'forgot.php';</script>";

}

?>