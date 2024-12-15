<?php
include_once("adminconnect.php");
include_once("adminsession.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ShuShap Online | Philippines</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">

        header {
          height: 50px;
          width:100%;
          padding:10px;
          background-color: #39212C;
          font-family: times new roman;
          font-size: 50px;
          color: white;

        }
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
        </style>
    </head>
    <body>
        
        <!--------------- 
             NAVBAR
        ---------------->
        <header>
           <ul>
                 <li class="left"><a href="viewuser.<?php  ?>">ValoGEEKS</a></li>
                 <li class="right"><a href="viewuser.php">Go Back</a></li>
            </ul>
        </header>

        <!--------------- 
          ADMIN CONTROL
        ---------------->

        <main>
            
            <div class="title">Your Cart</div>
            <div class="products">
                <div class="product-container">
                    <table border>
                        <tr class="head">
                            <th>Product Image</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>EDIT</th>
                        </tr>
                    
                        <?php
                        $viewQuery = $pdo->prepare("SELECT * FROM cart_tbl ORDER BY userID DESC");
                        $viewQuery->execute();
                        
                        $totalRecords = $viewQuery->rowCount();

                        $viewQuary = $pdo->prepare("SELECT SUM(productPrice) FROM cart_tbl WHERE");
                        $viewQuery->execute();
                        

                        
                        while($rows = $viewQuery->fetch()){
                            $productId = $rows['productID'];
                            $productCategory = $rows['productCat'];
                            $productName = $rows['productName'];
                            $productPrice = $rows['productPrice'];
                            $productQuantity = $rows['productQty'];
                            $productDescription = $rows['productDes'];
                            $productImage = $rows['productImg'];
            
                        ?>
                            <tr>
                                <div class="prod">
                                    <td><img src="pimg/<?php echo $productImage;?>" alt="Profile Picture" width="100"/></th>
                                    <td>
                                        <div class="prod-info">
                                            <div class="product-cat"><?php echo $productCategory;?></div>
                                            <div class="product-name"><?php echo $productName;?></div>
                                            <div class="product-qty">Stock: <?php echo $productQuantity;?></div>
                                            <div class="product-des"><?php echo $productDescription;?></div>
                                        </div>
                                    </td>
                                    <td><div class="product-pricee">₱ <?php echo $productPrice;?></div></td>
                                    <td><a href="delete.php?pid=<?php echo $productId;?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                                </div>
                        <?php } ?>
                            </tr>
                        <?php 
                        
                        $sumQuery = $pdo->prepare("SELECT SUM(productPrice) AS totalSum FROM cart_tbl");
                        $sumQuery->execute();
                        
                        while($dataSum = $sumQuery->fetch()){
                            $sum = $dataSum['totalSum']
                        

                        ?>
                            <tr class="head">
                                <th></th>
                                <th>TOTAL PRICE</th>
                                <th>₱ <?php echo $sum;?></th>
                                <th></th>
                            </tr>

                        <?php } ?>
                    </table>
                        <div class="icons"><a href="#"><i class="fa fa-shopping-basket"></i> CHECK OUT</a></div>
	                <strong>Total Records: <?php echo $totalRecords;?></strong>
                </div>
            </div>
        </main>

    </body>
</html>
