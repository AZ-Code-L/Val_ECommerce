<?php
include_once("adminconnect.php");
include_once("adminsession.php");
$pid = $_GET['pid'];

$select = $pdo->prepare("SELECT * FROM products_tbl WHERE productID = '$pid'");
$select->execute();
while($rows = $select->fetch()){
	$pdcategory = $rows['productCategory'];
	$pdname = $rows['productName'];
	$pddescription = $rows['productDescription'];
	$pdprice = $rows['productPrice'];
	$pdquantity = $rows['productQuantity'];
	}
if(isset($_POST['update'])){
	$updcategory = $_POST['pdcategory'];
	$updname = $_POST['pdname'];
	$upddescription = $_POST['pddescription'];
	$updprice = $_POST['pdprice'];
	$updquantity = $_POST['pdquantity'];
	
	$updateQuery = $pdo->prepare("UPDATE products_tbl SET productCategory=:pcat, 
	productName=:pname, productDescription=:pdesp,productPrice=:pprice,productQuantity=:pqty WHERE productID = '$pid'");
	$updateQuery->bindParam(':pcat',$updcategory);
	$updateQuery->bindParam(':pname',$updname);
	$updateQuery->bindParam(':pdesp',$upddescription);
	$updateQuery->bindParam(':pprice',$updprice);
	$updateQuery->bindParam(':pqty',$updquantity);
	$updateQuery->execute();
	
	echo "<script>alert('Successfully Updated')</script>";
	echo "<script>window.open('viewadmin.php','_self')</script>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
	
		<table>
			<tr>
				<td>Product Categor</td>
				<td><input type="text" name="pdcategory" value="<?php echo $pdcategory;?>" required />
			</tr>
			<tr>
				<td>Product Name</td>
				<td><input type="text" name="pdname" value="<?php echo $pdname;?>" />
			</tr>
			<tr>
				<td>Product Description</td>
				<td><input type="text" name="pddescription" value="<?php echo $pddescription;?>" />
			</tr>
			<tr>
				<td>Product Price</td>
				<td><input type="text" name="pdprice" value="<?php echo $pdprice;?>" />
			</tr>
			<tr>
				<td>Product Quantity</td>
				<td><input type="text" name="pdquantity" value="<?php echo $pdquantity;?>" />
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="update" value="Update Records"/>
			</tr>
		</table>
	</form>
