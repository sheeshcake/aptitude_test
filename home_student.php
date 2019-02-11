<?php
	include "connect.php";
	session_start();
	if(!empty($_SESSION["row"]["name"])){
	}
	else{
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stdnt_style.css">
	<title>Home</title>
</head>
<body>
	<div class="nav">
		<ul>
			<li style="float:right;"><a href="logout.php">Logout</a></li>
		</ul>
	</div>

	<div class="row">
		<div class="subject_col">
			<center><h1>Subjects</h1></center>
			<table id="subj_table">
				<tr>
					<th>Subject Code</th>
					<th>Subject Name</th>
					<th>Subject Teacher</th>
					<th>Done?</th>
				</tr>
				<tr>
					<td><a href="#">123<a></td>
					<td><a href="#">Test Lorem Ipsum<a></td>
					<td><a href="#">Jane Doe<a></td>
					<td><a href="#">No<a></td>
				</tr>
			</table>
		</div>
		<div class="profile_col">
			<?php
				echo "<center><h1>Hello, " . $_SESSION["row"]["name"] . "</h1></center>";
			?>
		</div>
	</div>
	
</body>
</html>