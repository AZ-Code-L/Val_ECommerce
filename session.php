<?php
session_start();

if(isset($_SESSION["id"])){
	
	$uid = $_SESSION["id"];
	
	$query = $pdo->prepare("SELECT * FROM users WHERE userID = :uid");
	$query->bindParam(':uid',$uid);
	$query->execute();
	
	while($row = $query->fetch()){
			$pangalan = $row['userNAME'];
	}
	
	
} else {
	header("location: login.php");
	die();
}
?>