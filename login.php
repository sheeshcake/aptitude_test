<?php
	include "connect.php";
	session_start();
	$_SESSION["admin"] = false;
	if(!empty($_SESSION['row']['name'])){
		header("Location: home_student.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/lgn_style.css">
	<title>Login</title>
</head>
<body>
	<div class="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li style="float:right;background-color: #69b6ff;" class="active"><a href="#">Login</a></li>
			<li style="float:right;"><a href="register.php">Register</a></li>
		</ul>
	</div>
	<div id="lgn" class="login">
		<center><h1>Login</h1></center>
		<form method="post" action="login_controller.php">
			<center class="comp">
				<p id="entry"></p>
				<center><p>
					<input type="radio" onclick="student_entry();" name="department" id="student" value="student" required>I'm a Student
					<input type="radio" onclick="other_entry();" id="other" name="department" value="other" required>I'm a Dean or Teacher
				</p></center>
				<p id="pass_entry"></p>
				<p id="login_btn"></p>
			</center>
		</form>
	</div>



	<script>
		var pass_entry = false;
		function use_username(){
			document.getElementById("entry").innerHTML = "<p>Username<input type='username' name='usrnm'></p>";
			add_pass();
		}
		function use_idnum(){
			document.getElementById("entry").innerHTML = "<p>ID-Number: C<input type='number' min='01' max='99'style='width:30px' name='yr'>-<input type='number' style='width:50px' name='num'></p>";
			pass_entry = true;
			add_pass();
		}
		function student_entry(){
			add_lgn_option();
		}
		function other_entry(){
			document.getElementById("entry").innerHTML = "Username<input type='text' id='username' name='username'>";
			pass_entry = true;
			add_pass();
		}
		function add_lgn_option(){
			document.getElementById("entry").innerHTML = "<input type='radio' onclick='use_username();'>Use Username<input type='radio' onclick='use_idnum()'>Use ID-Number";
		}
		function add_pass(){
			document.getElementById("pass_entry").innerHTML = "Password<input type='password' name='password' id='password' required>"
			document.getElementById("login_btn").innerHTML = "<button type='submit' id='submit'>Log-in</button>"
		}

	</script>
</body>
</html>