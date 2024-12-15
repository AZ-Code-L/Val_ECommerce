<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "useraccount";

try{
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connection success";
} catch(PDOException $e){
	echo "Connection failed: " .$e->getMessage();
}

?>