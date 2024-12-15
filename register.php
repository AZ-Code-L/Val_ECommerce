
<html>
	<head>
		<title>Register</title>
   		<link rel="stylesheet" href="regstyle.css" />
	</head>
	
	<body>
	<form action="insert.php" method="post" enctype="multipart/form-data">
		<a href="login.php"><img style="width:30p; height: 30px; float: right;" src="images/exit.png"></a>
		<h1> SIGN UP </h1>
	
		<table class="center">
			<tr>
				<td>Profile:</td>
				<td><input type="file" name="profile_image" accept="image/*" />				
			
			<td>&nbsp;</td>

				<td>Firstname:</td>
				<td><input type="text" name="fname" placeholder="Enter your Firstname" required />
			</tr>
			<tr>
				<td>Middlename:</td>
				<td><input type="text" name="mname" placeholder="Enter Your Middlename" />

					<td>&nbsp;</td>		
						
				<td>Lastname:</td>
				<td><input type="text" name="lname" placeholder="Enter your Lastname" />
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name="address" placeholder="Enter your Address" />

				<td>&nbsp;</td>

				<td>Email:</td>
				<td><input type="email" name="email" placeholder="Enter your Email" />
			</tr>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" placeholder="Enter your Username" />

				<td>&nbsp;</td>

				<td>Password:</td>
				<td><input type="password" name="pword" placeholder="Enter your Password" />
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td class="button"><button type="submit" name="Add"> CONFIRM </button>
				<br>
			</tr>


		</table>
	</form>
	</body>
</html>