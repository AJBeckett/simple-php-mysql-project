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
				<td width='5%'> <a href='home.php'>Home </a></td>
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
			
			<?php
			Session_start();
				if(IsSet($_SESSION["user_id"])) {
					session_unset();
					session_destroy();
					
					//echo "<tr align='center'> <td colspan='5'> <font color='green'> Logged out Successfully! </font> Login again:- <a href='login.php'>Login</a> </td> </tr>";
					if(IsSet($_SESSION['user_id'])) {
						}
					else {
						Header("Location: home.php");
					}
				}
				else {
					echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again:- <a href='login.php'>Login</a> </td> </tr>";
				}
			?>
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	https://github.com/abhn/simple-php-mysql-project
			</footer>
</body>
</html>
