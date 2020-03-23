<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	<!-- gotcha4 -->	
	<script type='text/javascript'>
		function sec() {
			var email=document.f1.e1.value;
			var security_question=document.f1.q1.value;
			var security_answer=document.f1.q2.value;
			
			
			if(email.length==0||security_answer.length==0) {

				if(email.length==0) {
				s1.innerHTML="<font color='red'>Field is Required</font>";
				
				}

				
				if(security_answer.length==0) {
				s2.innerHTML="<font color='red'>Field is Required</font>";
				
				}
			}
			
			else if (email.length>50||security_answer.length>50) {

				if(email.length>50) {
				s3.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
				
				if(security_answer.length>50) {
				s4.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
			}
			
			else {
				document.f1.submit();
			}
			
			
			
						
			
		}
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
				<td width='5%'> <a href='home.php'> Home </a></td>
				<td width='5%'> <a href='login.php'>Login </a></td>
				<td width='5%'> <a href='secure_signup.php'>Sign-up </a></td> 
				<td width='5%'> <a href='contact-us.html'>Contact-Us </a></td>
				<td width='5%'> <a href='about-us.html'>About-us </a></td>
			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
			</tr>
			
			<tr align='center'> 
				<td colspan='5'>
					<form method='POST' name='f1' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
						<table>
							<tr>
								<td> Email:- </td> 
								<td> <input type='email' name='e1' maxlength='50'> </td> 
								<td> <span id='s1'> </span> </td>  
								<td> <span id='s3'> </span> </td>
							</tr>
							
							<tr>
                                <td> Security Question:- </td>
                                    <td> <select name='q1'> <option value='pet'>What was the name of your first pet?<option value='school'>What elementary school did you go to?<option value='street'>What was the street you grew up on?</select> </td>
                            </tr>

							<tr>
                                <td> Security Answer:- </td>
                                <td> <input type='password' name='q2' maxlength='50'></td>
                                <td> <span id='s2' </span> </td>
                                <td> <span id ='s4'> </span> </td>
                            </tr>

							<tr>
								<td> </td> <td> <input type='hidden' name='h1' value='holla'>  </td>
							</tr>
							
							<tr>
								<td> <br> <input type='button' class='btn btn-primary'  value='Recover Password' name='s1' onclick='sec()'> </td> <td> <br> OR <a href='secure_signup.php'>Sign-up</a></td> 
							</tr>
						</table>
					</form>
				</td>
			</tr>
		<?php
			$config=parse_ini_file('./private/config.ini');
			function sec($data) {
				$data=trim($data);
				$data=stripslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}
			
			$email=sec($_POST["e1"]);
			$security_question=sec($_POST["q1"]);
			$security_answer=sec($_POST["q2"]);
			$resid=MySQLi_Connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
			
			if(MySQLi_Connect_Errno()) {
				echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
			}
			else {
				//$check_email=MySQLi_Query($resid,"select email from students");
				$check_sq=MySQLi_Query($resid,"select security_question from students where email=".$email"");
				$check_sa=MySQLi_Query($resid,"select security_answer from students where email=".$email"");
				
				if($security_question==$check_sq)
				{
					if($security_answer==$check_sa)
					{
						$password=MySQLi_Query($resid, "select password from students where email="$email""); 
						echo"<tr align='center'>
								<td align='right'>Password:- </td> 
								<td align='left'>".$password."  </td> 
							</tr>"; 
					}
				}
				else{
					echo "<tr align='center'> <td colspan='5'> <font color='red'> Recovery Failed! </font> Email and question did not match </td> </tr>";
				}
				
			}
			MySQLi_Close($resid);	
			
		?>
		</table>
		<footer align='center'>
			&copy; All Rights Reserved.	https://github.com/abhn/simple-php-mysql-project
			</footer>
</body>
</html>
