<?php
session_start();
include 'dbconnect.php';
$user_id=$_SESSION['userid'];

$name=$_POST['Name'];
$pass=$_POST['Password'];
$email=$_POST['Email'];
$mobile=$_POST['mobile'];
$movie_image=$_FILES['movie_image']['tmp_name'];
$input = $pass;
		


						$encrypted = encryptIt( $input );




						function encryptIt( $q ) {
						    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
						    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
						    return( $qEncoded );
						}
	// if (!getimagesize($image)) {
	// 	echo "select images";
	// }else{
		
		// $date=date('20y-m-d');
		$movie_image=addslashes($movie_image);
		$movie_image=file_get_contents($movie_image);
		$movie_image=base64_encode($movie_image);

mysqli_query($conn,"UPDATE users set user_name='$name',user_email='$email',password='$encrypted',mobile='$mobile',user_image='$movie_image' where user_id='$user_id'");
$_SESSION['username'] = $name;


		header("Location: profile.php");


?>