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
<?php
$config=parse_ini_file('./private/config.ini');
	$user_id = $_SESSION["user_id"];
	include 'mysql.php';
	if($resid) {
	
	
	$count = MySQLi_Query($resid,"select frnd_two_id from are_friends where frnd_one_id = $user_id union select frnd_one_id from are_friends where frnd_two_id = $user_id");
	
	echo "<tr align='center'> <td colspan='5'>Your Friends:- </td> </tr> <tr align='center'> <td colspan='5'><table align='center' >";
	
	echo " <table align='center' cellspacing='5' cellpadding='5'> 
				<tr> <th> Name: </th> <th> Email: </th> <th> Gender: </th> </tr>";
				
	while(($rows=MySQLi_Fetch_Row($count))==True) {

	$query = "select name,email,gender from students where id = $rows[0] ";
	$result = MySQLi_Query($resid,$query);

	if($result) {

				while(($rows=MySQLi_Fetch_Row($result))==True) {



				echo "<tr align='center'>";
				echo "<td> $rows[0] </td> <td> $rows[1] </td> <td> $rows[2] </td>";
				echo "</tr>";
				}
				
		}
	}
	
	echo "</table> ";
}
	
	
?>
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	https://github.com/abhn/simple-php-mysql-project
			</footer>
</body>
</html>		
