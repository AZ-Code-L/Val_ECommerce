<?php
include_once("adminconnect.php");
if(isset($_POST['Add'])){
	$pdcategory = $_POST['pdcategory'];
	$pdname = $_POST['pdname'];
	$pddescription = $_POST['pddescription'];
	$pdprice = $_POST['pdprice'];
	$pdquantity = $_POST['pdquantity'];

	
	// image process
	
	$profile = $_FILES['productimage']['name'];
	$tempName = $_FILES['productimage']['tmp_name'];
	$size = $_FILES['productimage']['size'];
	
	//UPLOAD PATH
	$path = 'pimg/';
	
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
			echo "<script>window.open('insertproduct.php','_self')</script>";
		}
	} else {
		echo "<script>alert('Sorry! Invalid Extension')</script>";
		echo "<script>window.open('insertproduct.php','_self')</script>";
	}
	
	
	//end image process
	
	$insertQuery = $pdo->prepare("INSERT INTO products_tbl (productCategory, productName, productDescription, productPrice, productQuantity, productImage) 
	VALUES (:pcat,:pname,:pdesp, :pprice, :pqty, :pimg)");
	$insertQuery->bindParam(':pcat',$pdcategory);
	$insertQuery->bindParam(':pname',$pdname);
	$insertQuery->bindParam(':pdesp',$pddescription);
	$insertQuery->bindParam(':pprice',$pdprice);
	$insertQuery->bindParam(':pqty',$pdquantity);
	$insertQuery->bindParam(':pimg',$newname);
	$insertQuery->execute();
	
	echo "<script>alert('Successfully Register')</script>";
	echo "<script>window.open('insertproduct.php','_self')</script>";
}
?>