<?php
include_once("Connection.php");

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = sha1($_POST['pword']);
	
	session_start();
	
	$query = $pdo->prepare("SELECT * FROM users WHERE userNAME=:uname AND userPASS =:pword");
	$query->bindParam(':uname',$username);
	$query->bindParam(':pword',$password);
	$query->execute();
	
	$bilang = $query->rowCount();
	
	if($bilang > 0){
		while($row = $query->fetch()){
			$id = $row['userID'];
			$_SESSION["id"] = $id;
			
			header("location: viewuser.php");
		}
		
	} else {
		echo "<script>alert('Sorry Wrong Username or Password')</script>";
		echo "<script>window.open('login.php','_self')</script>";
	}
	
	
}
?>
<html>
	<head>
		<title>Sign In</title>
   		<link rel="stylesheet" href="loginstyle.css" />
   		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	</head>
	
	<body>
		<header>ValoGEEKS</header>

	<form action="" method="post">
		<a href="homepage.html"><img style="width:30p; height: 30px; float: right;" src="images/exit.png"></a>
		<h1>SIGN IN</h1>


		<div class="login">
		<table class="table">
			
			<tr>
				<td>Username:</td>
			</tr>
			<tr>
				<td><input type="text" name="username" placeholder="Enter your Username" />
			</tr>
			<tr>
				<td>Password:</td>
			</tr>
			<tr>
				<td><input type="password" name="pword" placeholder="Enter your Password" />
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><button type="submit" name="login"> SIGN IN </button>
			</tr>

			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr class="center">
				<td> <a href="register.php"> CREATE ACCOUNT </a></td>
			</tr>
		</table>
	</div>
	</form>
	</body>
</html>