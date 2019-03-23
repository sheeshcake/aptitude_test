<?php
	include "connect.php";
	session_start();
	$_SESSION["admin"] = false;
	if(!empty($_SESSION['row']['user_type'])){
		header("Location: home_" . $_SESSION["row"]["user_type"] .  ".php");
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
		<?php
			include 'connect.php';
			if(isset($_SESSION['reg'])){
				if($_SESSION['reg']){
					echo "<center><p style='color:green'>Account Successfully Registered!</p></center>";
				}
			}
		?>
		<form method="post" action="login_controller.php" id="lgn_form">
			<center class="comp">
				<p id="entry"></p>
				<p id="pass_entry"></p>
				<center><p>
					<select name="department" onchange="changed(this.value);">
						<option value="" disabled selected>User-Type</option>
						<option value="student">I'm a student</option>
						<option value="other">I'm a Dean or Teacher</option>
					</select>
<!-- 					<input type="radio" onclick="student_entry();" name="department" id="student" value="student" required>I'm a Student
					<input type="radio" onclick="other_entry();" id="other" name="department" value="other" required>I'm a Dean or Teacher -->
				</p></center>
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
			document.getElementById("entry").innerHTML = "<p>ID-Number: C<input type='text' pattern='\\d*' maxlength='2' style='width:50px' name='yr'>-<input type='text' style='width:70px' name='num' pattern='\\d*' maxlength='4'></p>";
			pass_entry = true;
			add_pass();
		}
		function changed(val){
			if(val == 'other'){
				other_entry();
			}
			else{
				add_lgn_option();
			}
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