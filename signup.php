<?php
session_start();
include "dbconnect.php";

						$name=ucwords($_POST['name']);
						$uname=ucwords($_POST['username']);
						$email=$_POST['email'];
						$password=$_POST['password'];
						$Gender=$_POST['Gender'];
						$Mobile=$_POST['Mobile'];
						$Location=$_POST['Location'];
						$input = $password;
						$que=ucwords($_POST['question']);
						$ans=ucwords($_POST['answer']);
						//$movie_image=<img src="data:image/jpeg;base64,image/default.png">
	// if (!getimagesize($image)) {
	// 	echo "select images";
	// }else{
		
		// $date=date('20y-m-d');
		$movie_image=addslashes($movie_image);
		$movie_image=file_get_contents($movie_image);
		$movie_image=base64_encode($movie_image);
		


						$encrypted = encryptIt( $input );
						echo $encrypted;




						function encryptIt( $q ) {
						    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
						    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
						    return( $qEncoded );
						}


						
						$code=rand()*99;
						

				$sql="INSERT into users(user_name,username,user_email,password,gender,location,mobile,access,Confirmation_code,question,answer)
				 values('$name','$uname','$email','$encrypted','$Gender','$Location','$Mobile','normal','$code','$que','$ans')";
		 $qury=mysqli_query($conn,$sql);

		 $sql1="SELECT * FROM users WHERE username='$uname'";
		 $result=mysqli_fetch_array($data=mysqli_query($conn,$sql1));

			if($qury){	
			$_SESSION['username'] = $name;
			$_SESSION['userid']= $result['user_id'];
			$_SESSION['code']=$result['Confirmation_code'];
			

			header("Location: index.php");

		}
		else{

			header("Location: register.php");

		}


?>