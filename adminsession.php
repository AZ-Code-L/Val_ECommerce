<?php
session_start();

if(isset($_SESSION["id"])){
	
	$pid = $_SESSION["id"];
	
	$query = $pdo->prepare("SELECT * FROM products_tbl WHERE productID = :pid");
	$query->bindParam(':pid',$pid);
	$query->execute();
	
	while($row = $query->fetch()){
			$pangalan = $row['productName'];
	}
	
	
} else {
	header("location: login.php");
	die();
}
?>