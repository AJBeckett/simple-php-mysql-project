<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	<script src='dropdown.js'></script>
	<script src='jquery.js'></script>
	<script type='text/javascript'>
	
		function sec() {
			var stat=document.f1.status.value;
			stat = stat.trim();

			if(stat.length==0) {
				check.innerHTML="<font color='red'> Field is Required </font>";
			}
			else if(stat.length>300) {
				check.innerHTML="<font color='red'> Maximum 300 Characters!</font>";
			
			}
			else {
				
				document.f1.submit();
			}
		}
	
	$(document).ready(function() 
	{
		$("#sam").hide(2000);
	});
	</script>

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
			if(IsSet($_SESSION["user_id"])) {
			?>

<tr align='center'> 
	<td colspan='5'> 
		<form name='f1' method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
			<table>
				<tr>
					<td> Update your Status:- </td> <td> <textarea rols='20' cols='45' maxlength='300' name='status'> </textarea> </td> <td> (MAX 300 Characters) </td>
				</tr>
				<tr>
					<td colspan='2'> <input type='button' class='btn btn-primary' value='Update' onclick='sec()' > </td> <td> <span id='check'> </span> </td>
				</tr>
			</table>  
		</form>
	</td> 
</tr>
		<!-- Updating status -->
		<?php
		$config=parse_ini_file('./private/config.ini');
		if($_SERVER["REQUEST_METHOD"]=="POST") {
		$status = $_POST["status"];
		//$status = trim("$_POST['status']");
		//$status = stripslashes("$_POST['status']");
		//$status = htmlspecialchars("$_POST['status']");
	
		include 'mysql.php';
		
		if($resid) {
		$user_id = $_SESSION['user_id'];
		$query = "insert into status_here (status,user_id,timestamp,future_use) values ('$status',$user_id,NOW(),NULL)";
		$qwer = MySQLi_Query($resid,$query);
		if($qwer) {
			?>
			<script type="text/javascript" src="notify.js"></script>
			<script>
			$(document).ready(function() {
			  $.notify(
			  "Status Updated!","success");
			});
			</script>
			<?php
		}
		else {
			echo "<tr align='center'> <td colspan='5'> <font color='green'> Sorry, Something went wrong! Refresh the page and try again! </font> </td> </tr>";
		}
		MySQLi_Close($resid);
			}
		}
		?>
		
		<?php
		$config=parse_ini_file('./private/config.ini');
		if($_SESSION['user_id']) {
			$user_id = $_SESSION['user_id'];
			include 'mysql.php';
				//Displaying past statuses
			if($resid) {
				$query1 = "select status,time_format(timestamp,'%l:%i:%s %p') as time,date_format(timestamp,'%D of %M,%Y') as date from status_here where user_id = $user_id order by id desc";
				$result = MySQLi_Query($resid,$query1);
				$f=1;
				while(($rows=MySQLi_Fetch_Row($result))==True) {
				$f++;
				if($f==2) {
				echo "<tr align='center'> <td colspan='5'>Your statuses till now:-</td> </tr> <tr align='center'> <td colspan='5'><table align='center' align='center' cellspacing='5' cellpadding='5' width='100%' style='table-layout:fixed'> <col style='width:25%'> <col style='width:25%'>  <col style='width:25%'>";
				
				echo "<thead> <tr> <th> Status: </th> <th> Updated on: </th> <th> Time: </th> </tr> </thead>";
				}
				echo " <tbody> <tr align='center' style='border-bottom:1pt solid black'>";
				echo "<td style='word-wrap:break-word'> $rows[0] </td> <td> $rows[2] </td> <td> $rows[1] </td>";
				echo "</tr> </tbody>";
				}
				
				echo "</table>";
			}
			MySQLi_Close($resid);
		}
		
		?>
		
<?php }
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
		
		




