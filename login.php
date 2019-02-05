<?php
	if(!empty($_SESSION['row'])){
		header("Location: home_students.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<center>
		<form method="post" action="login_controller.php">
			<p id="entry">What the fuck are you?</p>
			<p>
				<input type="radio" onclick="student_entry();" name="department" id="student" value="student" required>I'm a fucking Student
				<input type="radio" onclick="other_entry();" id="other" name="department" value="other" required>I'm a fucking Dean or Teacher
			</p>
			<p>Password<input type="password" name="password" id="password" required></p>
			<button type="submit" id="submit">Log-in</button>
		</form>
	</center>


	<script>
		function student_entry(){

			document.getElementById("entry").innerHTML = "ID-Number: C<input type='number' min='01' max='99'style='width:30px' name='yr'>-<input type='number' style='width:50px' name='num'>";
		}
		function other_entry(){
			document.getElementById("entry").innerHTML = "Username<input type='username' id='username' id='username'>";
		}


	</script>
</body>
</html>