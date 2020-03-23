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
			//Session_start();
			$config=parse_ini_file('./private/config.ini');
			if(IsSet($_SESSION["user_id"])) {
				$id=$_SESSION["user_id"];
				$query="select * from messages where receiver_id=".$id." order by id desc";
				$resid=MySQLi_Connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
				
				if(MySQLi_Connect_Errno()) {
					echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
				}
				else {
				$result=MySQLi_Query($resid,$query);
				$data=MySQLi_Fetch_Row($result);
				if($data) {
				$query="select name,email from students where id=".$data[1]."";
				$sender=MySQLi_Query($resid,$query);
				$sender=MySQLi_Fetch_Row($sender);
				//if($data) {
				 
				echo "<tr align='center'> <td colspan='5'> <table cellpadding='4' cellspacing='5' width='100%' style='table-layout:fixed'> <col width='100%'> ";
				echo "<td>From:- <font color='blue'>".$sender[0]." </font> [".$sender[1]."] </td> </tr>";
				echo "<tr> <td style='word-wrap:break-word'>Message:-".$data[3]."</td> </tr>";
				echo "</table> </td> </tr>";
				
			}
				else {
				echo "<tr align='center'> <td colspan='5'> <font color=#904C77> No Messages! </font> </td> </tr>";
				}
				MySQLi_Close($resid);
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
		
		
