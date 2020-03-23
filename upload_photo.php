<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	<script src='dropdown.js'></script>
</head>
<body>
		<table cellpadding='3' cellspacing='3' class='tab_main'>
			<!--Logo-->
			<tr>
				<td  colspan='5'><img src='images/logo.png' height='65%' width='100%' ></td> <!--1350x160-->
			</tr>
			<!--Nav_Tabs-->
			<tr align='center' bgcolor='lightgrey' class='td_bor'>
				<td width='5%'> <?php Session_start(); if(IsSet($_SESSION["user_id"])) {echo "<a href='user_page.php'>"; } else {echo "<a href='home.php'>";}?>Home </a></td>
				<td width='5%'> 
					<div class='dropdown'>
						<button onClick='dropDown()' class='dropbtn'>Messages</button>
						<div id='myDropdown' class='dropdown-content'>
							<a href='send_message.php'>Send Message </a>
							<a href='inbox.php'>Inbox (Only Recent Message) </a>
						</div>
					</div>
				</td>
				<td width='5%'> 
					<div class='dropdown'>
						<button onClick='dropDown()' class='dropbtn'>Friends</button>
						<div class="dropdown-content">
							<a href='friend_list.php'>Friend List</a>
							<a href='friends.php'>Search Friends </a></td>
						</div>
					</div>
				</td>
				<td width='5%'> 
					<div class='dropdown'>
						<button onClick='dropDown()' class='dropbtn'>Post</button>
						<div class="dropdown-content">
							<a href='update_status.php'> Status Update</a>
							<a href='upload_photo.php'> Upload Photos </a>
							<a href='photo_gallery.php'> Photo Gallery</a></td>
						</div>
					</div>
				</td>
				<td width='5%'> 
					<div class='dropdown'>
						<button onClick='dropDown()' class='dropbtn'>Settings</button>
						<div class="dropdown-content">
							<a href='view_profile.php'>View Profile </a>
							<a href='signout.php'>Signout </a></td>
						</div>
					</div>
				</td>
			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
			</tr>
			<tr><td colspan='5' align='center'><form method="post" enctype="multipart/form-data">
				Choose your image<input type="file" name="file"/><br/>
				<input type="submit" value="upload image" name="upd"/>
				</form>
			<?php
			$target_dir="gallery/";
			$target_file=$target_dir.basename($_FILES["fileToUplad"]["name"]);
			$uploadOK=1;
			$imageFileType=strtolower(pathinfo($target_file,PATHINGO_EXTENSION));
			if(isset($_POST["submit"])) 
			{
				
				$check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
			{
				echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
				$uploadOk = 0;
			}
			
			if($uploadOk == 0)
			{
				echo "Sorry, your file was not uploaded.";
			}
			else{
				if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
				{
					echo "The file ".basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
				}
				else{
					echo "Sorry, there was an error uploading your file.";
				}
			}
			
			?></td>
			</tr>
			
		</table>
		<footer align='center'>
			&copy; All Rights Reserved.	https://github.com/abhn/simple-php-mysql-project
			</footer>
			
</body>
</html>