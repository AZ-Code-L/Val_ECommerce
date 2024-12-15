<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="ipstyle.css">
	<title> Insert Product </title>
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
	</style>

</head>

<body>
	<header>
		<ul>
			 <li class="left"><a href="viewuser.<?php  ?>">ValoGEEKS</a></li>
			 <li class="right"><a href="logout.php">Sign Out</a></li>
		 	 <li class="right"><a href="viewadmin.php">Products</a></li>
		</ul>
	</header>

	<br> <br> <br>
	<center>
	<div class="title">
		<h2> INSERT PRODUCT </h2>
	</div>
	
	<form action="insertprod.php" method="post" enctype="multipart/form-data" >
	<div>

		<center>
		<table>
		<br>
			<tr>
				<td class="head"> <b> Product Category: </td>
			</tr>
			<tr>
				<td><input type="text" name="pdcategory" placeholder="Enter Category" /></td>
			</tr>
			<tr>
				<td class="head"> <b> Product Name: </td>
			</tr>
			<tr>
				<td><input type="text" name="pdname" placeholder="Enter Product Name" /></td>
			</tr>
			<tr>
				<td class="head"> <b> Product Description: </td>
			</tr>
			<tr>
				<td><input type="text" name="pddescription" placeholder="Enter Product Description" /></td>
			</tr>
			<tr>
				<td class="head"> <b> Product Price: </td>
			</tr>
			<tr>
				<td><input type="text" name="pdprice" placeholder="Enter Product Price" /></td>
			</tr>
			<tr>
				<td class="head"> <b> Product Quantity: </td>
			</tr>
			<tr>
				<td><input type="text" name="pdquantity" placeholder="Enter Product Quantity" /></td>
			</tr>	
			<tr>
                <td class="file"><input type="file" name="productimage" accept="image/*" /></td>
			</tr>				
			<tr>
				<td><button type="submit" name="Add" class="btn"> Add </button>
			</tr>
		</table>
	</div>
	</form>
</body>
</html>