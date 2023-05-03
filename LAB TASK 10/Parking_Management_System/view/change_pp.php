<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include 'navbar_logged.php';?>

	<fieldset>
		<table border="1" width="100%">
			<tr>
				<td width="25%">
					Account<hr><br>
								<ul style="list-style-type:disc;">
                                <li><a href="dashboard.php">Dashboard</a></li><br>
								<li><a href="view_profile.php">View Profile</a></li><br>
								<li><a href="edit_profile.php">Edit Profile</a></li><br>
								<li><a href="change_pp.php">Change Profile Picture</a></li><br>
								<li><a href="change_pass.php">Change Password</a></li><br>
								<li><a href="locations.php">View Locations</a></li><br>
                           
                                <li><a href="about_us.php">About Us</a></li><br>
						<form method="POST" action="logout.php">
							<button type="submit" name="logout_btn">Log out</button>
						</form>
						
					</ul>
				</td>
				<td width="75%">
					<fieldset>
						<legend>CHANGE PROFILE PICTURE</legend>
						<form method="post" action="../control/picture_upload.php" enctype="multipart/form-data">

							<table>
							<label>ID</label>
								<input type="text" name="id" id="id" onblur="checkId()" onkeyup="checkId()" value="<?= $_SESSION['id']?>">
								<span id="idErr" style="color: red;"></span>
								<hr>
							<tr><td><img src="../uploads/<?php echo $_SESSION['image']; ?>" height="200" width="200"></td></tr>
								<tr><td><input type="file" name="fileToUpload" value="Choose a file"></td></tr>	
							</table>
							<hr>
							<input type="submit" name="submit" value="Submit">

						</form>
						
					</fieldset>
				</td>
			</tr>
		</table>
	</fieldset>

	<?php include 'footer.php';?>

</body>
</html>