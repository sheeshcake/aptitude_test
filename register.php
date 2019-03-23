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
			<li style="float:right;" class="active"><a href="login.php">Login</a></li>
			<li style="float:right;background-color: #69b6ff;"><a href="#">Register</a></li>
		</ul>
	</div>
	<div id="rgstr" class="register">
		<center><h1>Register</h1></center>
		<form method="post" id="frm" >
			<div class="comp">
				<p>Name<input style="float: right;" type="text" name="student_name" required></p>
				<p>Departpemt
					<select name="dept" style="float: right; width: 145px;">
						<option value="CECS">CECS</option>
						<option value="CBAA">CBAA</option>
						<option value="COC">COC</option>
						<option value="CHRM">CHRM</option>
						<option value="CON">CON</option>
						<option value="CED">CED</option>
						<option value="CAS">CAS</option>
					</select>
				</p>
				<p>ID-Number<input style="float: right;" type="text" oninput="clear_view();" id="id_num" name="id_num" placeholder="C16-XXXX" required></p>
				<?php
					include "connect.php";
					session_start();
					if(isset($_SESSION['occ'])){
						if(isset($_SESSION['id_num'])){
							echo "<script>document.getElementById('id_num').value = '" . $_SESSION["id_num"] . "';</script>";
							echo "<center><p style='color:red; font-size:10px;' id='i'>ID NUMBER IS ALREADY REGISTERED</p></center>";
						}
					}
				?>
				<p>Username<input style="float: right;" type="text" name="usrnm" required></p>
				<p>Password<input style="float: right;" id="psswrd" oninput="validate_pass();" type="password" name="password" required></p>
				<center><p id="con"></p></center>
				<?php
					include "connect.php";
					if(isset($_POST["submit"])){
						$_SESSION["id_num"] = $_POST['id_num'];
						$query = "SELECT student_id FROM student_t WHERE student_id='" . $_POST['id_num'] . "'";
						$result = mysqli_query($conn,$query);
						if(mysqli_num_rows($result)){
							echo "<script>alert('ID NUMBER IS ALREADY REGISTERED!!')</script>";
							$_SESSION['occ'] = true;
						}
						else{
							$_SESSION['reg'] = true;
							$query = "INSERT INTO student_t (name,username,password,student_id,department) values('". $_POST['student_name'] . "','" . $_POST['usrnm'] . "','" . $_POST['re_password'] . "','" . $_POST['id_num'] . "','" . $_POST['dept'] . "')";
							if(mysqli_query($conn,$query)){
								unset($_SESSION['occ']);
								header("Location: login.php");
							}
							else{
								echo "<script>alert('An Error Occured!');</script>";
							}
						}
					}
				?>
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
				document.getElementById("con").innerHTML = "<p class='re' style='color:red'>Password Does not Match!</p>";
				document.getElementById("re_password").setCustomValidity("Passwords Don't Match");
				
			}
			else if(pass == "" || re_pass == ""){
				document.getElementById("con").innerHTML = "<p class='re'>Please Re-type Password</p>";
				document.getElementById("re_password").setCustomValidity("Passwords Don't Match");
			}
			else{
				document.getElementById("con").innerHTML = "<p class='re' style='color:green'>Password Matched!</p>";
				document.getElementById("re_password").setCustomValidity('');
			}
		}

		function clear_view(){
			document.getElementById("i").innerHTML = "";
		}
	</script>
</body>
</html>