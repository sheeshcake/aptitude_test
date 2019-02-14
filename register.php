<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/register_style.css">
</head>
<body>
	<div class="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li style="float:right;background-color: #69b6ff;" class="active"><a href="#">Login</a></li>
			<li style="float:right;"><a href="register.php">Register</a></li>
		</ul>
	</div>
	<div id="rgstr" class="register">
		<center><h1>Register</h1></center>
		<form method="post" action="registration_controller.php">
			<div class="comp">
				Name<input type="text" name="student_name" required><br>
				Departpemt<input type="text" name="dept" placeholder="E.g CECS" required><br>
				ID-Number<input type="text" name="id_num" placeholder="C16-XXXX" required><br>
				Username<input type="text" name="username" required><br>
				Password<input id="psswrd" oninput="validate_pass();" type="password" name="password" required><br>
				Retype Password<input id="re_password" oninput="validate_pass();" type="password" name="re_password" required><br>
				<center><button name="submit">Submit</button></center>
			</div>



		</form>
	</div>
	<script>
		function validate_pass(){
			var pass = getElementById("psswrd").value;
			var re_pass = getElementById("re_password").value;
			if(pass != re_pass){
				getElementById("con").innerHTML = "<p style='color:red'>Password Does not Match!</p>";
			}
			else{
				getElementById("con").innerHTML = "<p style='color:green'>Password Matched!</p>";
			}
		}
	</script>
</body>
</html>