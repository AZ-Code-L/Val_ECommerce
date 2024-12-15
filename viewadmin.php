<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="vustyle.css">
	<title> ValoGEEKS Shop </title>
	<style type="text/css">
		ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		}

		li {
		  float: right;
		}

		li a {
		  display: block;
		  color: white;
		  text-decoration: none;
		  padding-right: 10px;
		}

		li a:hover{
		  background-color: #111;
		}

		.left
		{
			float: left;
			font-size: 40px;
		}

		.right {
			font-size: 30px;
			margin-top: 10px;
			margin-right: 50px;
		}

		.title {
			text-shadow: 0 -1px 4px #FFF, 0 -2px 10px #53212B, 0 -10px 20px #53212B, 0 -18px 40px #F00, 2px 2px 2px rgba(143,27,27,0);
			

		
		}

		button {
		    width: 150px;
		    background: linear-gradient(to bottom right, #53212B, #000000);
		    border: 0;
		    border-radius: 12px;
		    color: #FFFFFF;
		    cursor: pointer;
		    font-family: Arial;
		    font-size: 16px;
		    font-weight: 500;
		    line-height: 2.5;
		    outline: transparent;
		    padding: 0 1rem;
		}

		button a {
			text-decoration: none;
			color: white;
		}

		button:hover {
		  	border: 0.5px solid white;
		}


	</style>
</head>
<?php
include_once("connection.php");
include_once("adminconnect.php");
include_once("adminsession.php")
?>
	<body>
		<header>
			<ul>
				 <li class="left"><a href="viewuser.<?php  ?>">ValoGEEKS</a></li>
			 	 <li class="right"><a href="insertproduct.php">Add Products</a></li>
			</ul>
		</header>
		
<br> 
	<center>
	<div class="title">
		<h1> LIST OF PRODUCT </h1>
	</div>

<br> 
<br>

<table border>
	<tr class="head">
		<th> &nbsp; Product Image &nbsp; </th>
		<th> &nbsp; Product Name &nbsp; </th>
		<th> &nbsp; Product Description &nbsp; </th>
		<th> &nbsp; Product Type &nbsp; </th>
		<th> &nbsp; Price &nbsp; </th>
		<th> &nbsp; Quantity &nbsp; </th>
		<th> &nbsp; Action &nbsp; </th>
	</tr>

	<?php
		$viewQuery = $pdo->prepare("SELECT * FROM products_tbl ORDER BY productID DESC");
		$viewQuery->execute();
		
		$totalRecords = $viewQuery->rowCount();
		
		
		while($rows = $viewQuery->fetch()){
			$productCategory = $rows['productCategory'];
			$productName = $rows['productName'];
			$productDescription = $rows['productDescription'];
			$productPrice = $rows['productPrice'];
			$productQuantity = $rows['productQuantity'];
			$productImage = $rows['productImage'];
			//unique id (data)
			$productid = $rows['productID'];
		
	?>
	<tr>
		<td><img src="pimg/<?php echo $productImage;?>" alt="image" width="100"/></td>
		<td><?php echo $productCategory;?></td>
		<td><?php echo $productName;?></td>
		<td><?php echo $productDescription;?></td>
		<td><?php echo $productPrice;?></td>
		<td><?php echo $productQuantity;?></td>
		<td><button><a href="del.php?pid=<?php echo $productid;?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a> </button>| <button><a href="update.php?pid=<?php echo $productid;?>">Update</a></button></td>
		</td>
	</tr>
	
		<?php } ?>

</table>
	<strong>Total Records: <?php echo $totalRecords;?></strong>
</body>
</html>