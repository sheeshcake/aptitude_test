<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/rgstr_style.css">
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
		<form method="post" id="frm" action="registration_controller.php">
			<div class="comp">
				<p>Name<input style="float: right;" type="text" name="student_name" required></p>
				<p>Departpemt<input style="float: right;" type="text" name="dept" placeholder="E.g CECS" required></p>
				<p>ID-Number<input style="float: right;" type="text" name="id_num" placeholder="C16-XXXX" required></p>
				<p>Username<input style="float: right;" type="text" name="username" required></p>
				<p>Password<input style="float: right;" id="psswrd" oninput="validate_pass();" type="password" name="password" required></p>
				<p id="con">Re-type Password</p>
				<p>Retype Password<input style="float: right;" id="re_password" oninput="validate_pass();" type="password" name="re_password" required></p>
				<center><button name="submit">Submit</button></center>
			</div>



		</form>
	</div>
	<script>
		function validate_pass(){
			var pass = document.getElementById("psswrd").value;
			var re_pass = document.getElementById("re_password").value;
			if(pass != re_pass){
				document.getElementById("con").innerHTML = "<p style='color:red'>Password Does not Match!</p>";
				document.getElementById("re_password").setCustomValidity("Passwords Don't Match");
				
			}
			else{
				document.getElementById("con").innerHTML = "<p style='color:green'>Password Matched!</p>";
				document.getElementById("re_password").setCustomValidity('');
			}
		}

	</script>
</body>
</html>