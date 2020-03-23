<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	<script type='text/javascript'>
		function sec() {
			var name=document.f1.n1.value;
			var email=document.f1.e1.value;
			var age=document.f1.a1.value;
			var password=document.f1.p1.value;
			var confirm_password=document.f1.p2.value; //gotcha4
			var security_question=document.f1.q1.value; //gotcha4
			var security_answer=document.f1.q2.value; //gotcha4
			
			if(name.length==0||email.length==0||age.length==0||password.length==0||confirm_password.length==0||security_answer.length==0) {
				
				if(name.length==0) {
				s1.innerHTML="<font color='red'>Field is Required</font>";
				
				}
				
				if(email.length==0) {
				s2.innerHTML="<font color='red'>Field is Required</font>";
				
				}
				
				if(age.length==0) {
				s3.innerHTML="<font color='red'>Field is Required</font>";
				
				}
				
				if(password.length==0) {
				s4.innerHTML="<font color='red'>Field is Required</font>";
				
				}

				if(confirm_password.length==0){
				s5.innerHTML="<font color='red'>Field is Required</font>";
				}
				
				if(security_answer.length==0){
				s10.innerHTML="<font color='red'>Field is Required</font>";
				}
			}
			
			else if (name.length>50||email.length>50||password.length>50||security_answer.length>50) {
				
				if(name.length>50) {
					s6.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
					
				if(email.length>50) {
					s7.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
				
				if(password.length>50) {
					s8.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
				
				if(security_answer.length){
					s11.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				}
			}

			//gotch4
			else if (password!=confirm_password){
				s9.innerHTML="<font color='red'>Passwords do not match </font>";
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
								<td> Name:- </td>
								<td> <input type='text' name='n1' maxlength='50'> </td> 
								<td> <span id='s1'> </span> </td> 
								<td> <span id='s6'> </span> </td>
							</tr>
							<tr>
								<td> Email:- </td> 
								<td> <input type='email' name='e1' maxlength='50'> </td> 
								<td> <span id='s2'> </span> </td> 
								<td> <span id='s7'> </span> </td>
							</tr>
							<tr>
								<td> Age:- </td> 
								<td> <input type='number' name='a1' min='18' max='27'> </td> 
								<td> <span id='s3'> </span> </td>
							</tr>
							<tr>
								<td> Gender:- </td>  
								<td> <select name='g1'> <option value='M'>Male<option value='F'>Female</select> </td>
							</tr>
							
							<tr>
								<td> Password:- </td> 
								<td> <input type='password' name='p1' maxlength='50'> </td> 
								<td> <span id='s4'> </span> </td> 
								<td> <span id='s8'> </span> </td>
							</tr>

							<tr> <!-- gotcha4 -->
								<td> Confirm Password:- </td> 
								<td> <input type='password' name='p2' maxlength='50'> </td> 
								<td> <span id='s5'> </span> </td> 
								<td> <span id='s9'></span> </td>
							</tr>
				
							<tr>
                                                                <td> Security Question:- </td>
                                                                <td> <select name='q1'> <option value='pet'>What was the name of your first pet?<option value='school'>What elementary school did you go to?<option value='street'>What was the street you grew up on?</select> </td>
                                                        </tr>

                                                        <tr>
                                                                <td> Security Answer:- </td>
                                                                <td> <input type='password' name='q2' maxlength='50'></td>
                                                                <td> <span id='s10' </span> </td>
                                                                <td> <span id ='s11'> </span> </td>
                                                        </tr>

							
							<tr>
								<td> <br> <input type='button' class='btn btn-primary' value='Sign-up' name='s1' onclick='sec()'> </td> 
								<td> <br>OR  <a href='login.php'>Login</a></td>
							</tr> 
							
						</table>
					</form>
				</td>
			</tr>
	<?php
	$config=parse_ini_file('./private/config.ini');
	$name=$email=$age=$gender=$password=$count=$count_id="";
	if($_SERVER["REQUEST_METHOD"]=="POST") {
		function sec($data) {
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		$name=sec($_POST["n1"]);
		$email=sec($_POST["e1"]);
		$age=sec($_POST["a1"]);
		$gender=sec($_POST["g1"]);
		$password=sec($_POST["p1"]);
		$confirm_password=sec($_POST["p2"]);
		$security_question=sec($_POST["q1"]);
		$security_answer=sec($_POST["q2"]);
	
		//$query="INSERT INTO studs VALUES('$name','$email',$age);";
		//MySQL Magic :D
		//Getting Resource ID
		$resid=MySQLi_Connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
		if(MySQLi_Connect_Errno()) {
			echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
		}
		else {
			$check_email=MySQLi_Query($resid,"select name from students where email='".$email."'");
			$r_email=MySQLi_Fetch_Row($check_email);

			if($r_email) {
				echo "<tr align='center'> <td colspan='5'> <font color='red'> Email already Registered, Registration Failed!  </font>  </td> </tr>";
			}
			
			else {
				$count=MySQLi_Query($resid,"select (max(id)+1) as count from students");
				$count_id=MySQLi_Fetch_Assoc($count);
				if($count_id["count"]) {
					$query="insert into students values (".$count_id["count"].",'$name','$email',$age,'$gender','$password','$security_question','$security_answer')";
				}
				else {
					$query="insert into students values (1,'$name','$email',$age,'$gender','$password','$security_question','$security_answer')";
					echo "<tr align='center'> <td colspan='5'> <font color='red'>  Attempted Primary Insert! </font> </td> </tr>";
				}
				$res=MySQLi_Query($resid,$query);
				if($res) {
					echo "<tr align='center'> <td colspan='5'> <font color='green'> Registration Successful! </font> You may login now from here:- <a href='login.php'>Login</a></td> </tr>";
				}
				else {
					echo "<tr align='center'> <td colspan='5'> <font color='red'> Registration Failed! </font> </td> </tr>";
				}	
			}
			MySQLi_Close($resid);
		}
			
	}
	?> 			
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	https://github.com/abhn/simple-php-mysql-project
			</footer>
</body>
</html>





















