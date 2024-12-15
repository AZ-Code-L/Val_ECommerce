<?php
include_once("connection.php");
if(isset($_POST['Add'])){
	$firstname = $_POST['fname'];
	$middlename = $_POST['mname'];
	$lastname = $_POST['lname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = sha1($_POST['pword']);
	
	// image process
	
	$profile = $_FILES['profile_image']['name'];
	$tempName = $_FILES['profile_image']['tmp_name'];
	$size = $_FILES['profile_image']['size'];
	
	//UPLOAD PATH
	$path = 'profile/';
	
	//TO GET THE IMAGE EXTENTION
	$imgExt = strtolower(pathinfo($profile, PATHINFO_EXTENSION));
	
	//acceptable file ext
	$validExt = array('jpg','jpeg','png','gif');
	
	//new name once uploaded
	$newname = rand(1000, 99999).".".$imgExt;
	
	if(in_array($imgExt,$validExt)){
		if($size < 5000000){ // 5 MB
			move_uploaded_file($tempName,$path.$newname);
		} else {
			echo "<script>alert('Sorry! your file is to large')</script>";
			echo "<script>window.open('register.php','_self')</script>";
		}
	} else {
		echo "<script>alert('Sorry! Invalid Extension')</script>";
		echo "<script>window.open('register.php','_self')</script>";
	}
	
	
	//end image process
	
	$insertQuery = $pdo->prepare("INSERT INTO users (userIMG, userFN, userMN, userLN, userADD, userEMAIL, userNAME, userPASS) 
	VALUES (:profile,:fname,:mname, :lname, :address, :email, :uname, :pword)");
	$insertQuery->bindParam(':fname',$firstname);
	$insertQuery->bindParam(':mname',$middlename);
	$insertQuery->bindParam(':lname',$lastname);
	$insertQuery->bindParam(':address',$address);
	$insertQuery->bindParam(':email',$email);
	$insertQuery->bindParam(':uname',$username);
	$insertQuery->bindParam(':pword',$password);
	$insertQuery->bindParam(':profile',$newname);
	$insertQuery->execute();
	
	echo "<script>alert('Successfully Register')</script>";
	echo "<script>window.open('login.php','_self')</script>";
}
?>