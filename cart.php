<?php
include_once("adminconnect.php");
include_once("adminsession.php");

$id = $_GET['pid'];
$viewQuery = $pdo->prepare("SELECT * FROM products_tbl WHERE productID = :id");
$viewQuery->bindParam(':id',$pid);
$viewQuery->execute();

// SELECTTTTTTTTTTTTTT
$productid = $_GET['pid']; // Get productID
$viewQuery = $pdo->prepare("SELECT * FROM products_tbl WHERE productID='$productid'");
$viewQuery->execute();

$quantity = 1;

// productImage, productName, productPrice
while ($rows = $viewQuery->fetch()) {
    $prodID = $rows['productID'];
    $prodCat = $rows['productCategory'];
    $prodName = $rows['productName'];
    $prodDes = $rows['productDescription'];
    $prodPrice = $rows['productPrice'];
    $prodQty = $rows['productQuantity'];
    $prodImg = $rows['productImage'];
    // $uID variable is from session.php


    // userID, productID, quantity, productImage, productName, productPrice
    $insertQuery = $pdo->prepare("INSERT INTO cart_tbl (productID, productCat, productName, productPrice, productQty, productDes, productImg) 
    VALUES (:PI, :PC, :PN, :PP, :PQ, :PD, :PImg)"); // own variable name

    $insertQuery->bindParam(':PI', $prodID);
    $insertQuery->bindParam(':PC', $prodCat);
    $insertQuery->bindParam(':PN', $prodName);
    // $insertQuery->bindParam(':ctotalPrice',$price);
    $insertQuery->bindParam(':PP', $prodPrice);
    $insertQuery->bindParam(':PQ', $prodQty);
    $insertQuery->bindParam(':PD', $prodDes);
    $insertQuery->bindParam(':PImg', $prodImg);
    $insertQuery->execute();


    echo "<script>alert('Succesfully Added!')</script>";
    echo "<script>window.open('viewuser.php','_self')</script>";
}
?>

