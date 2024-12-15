<?php
include_once("Connection.php");
include_once("session.php");
?>

<table border>
	<tr>
		<th>Images</th>
		<th>Firstname</th>
		<th>Middlename</th>
		<th>Lastname</th>
		<th>Address</th>
		<th>Email</th>
		<th>Username</th>
	</tr>
	<?php
		$viewQuery = $pdo->prepare("SELECT * FROM users ORDER BY userID DESC");
		$viewQuery->execute();
		
		$totalRecords = $viewQuery->rowCount();
		
		
		while($rows = $viewQuery->fetch()){
			$profile = $rows['userIMG'];
			$fname = $rows['userFN'];
			$mname = $rows['userMN'];
			$lname = $rows['userLN'];
			$address = $rows['userADD'];
			$email = $rows['userEMAIL'];
			$uname = $rows['userNAME'];
			$upass = $rows['userPASS'];
			//unique id (data)
			$userid = $rows['userID'];
		
	?>
	<tr>
		<td><img src="profile/<?php echo $profile;?>" alt="Profile Picture" width="100"/></td>
		<td><?php echo $fname;?></td>
		<td><?php echo $mname;?></td>
		<td><?php echo $lname;?></td>
		<td><?php echo $address;?></td>
		<td><?php echo $email;?></td>
		<td><?php echo $uname;?></td>
		<td><a href="del.php?uid=<?php echo $userid;?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a> | <a href="update.php?uid=<?php echo $userid;?>">Update</a></td>
	</tr>
	
		<?php } ?>

</table>
	<strong>Total Records: <?php echo $totalRecords;?></strong>
	
	<br>
	<a href="logout.php">Logout</a>