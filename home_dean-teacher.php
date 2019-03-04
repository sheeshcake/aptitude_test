<?php
	include "connect.php";
	session_start();
	if(empty($_SESSION["row"]["teacher_name"])){
		header("Location: login.php");
	}
	else if($_SESSION["row"]["user_type"] != "dean-teacher"){
		header("Location: home_" . $_SESSION["row"]["user_type"] . ".php");
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
			<li><a href="index.php">Home</a></li>
			<li><a href="show_dept.php">Rating
			s</a></li>
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
					<th>Rating</th>
				</tr>
				<tr>
					<td><a href="#">123<a></td>
					<td><a href="#">Test Lorem Ipsum<a></td>
					<td><a href="#">80%<a></td>
				</tr>
			</table>
		</div>
		<div class="profile_col">
			<?php
				echo "<center><h1>Hello, Maam " . $_SESSION["row"]["teacher_name"] . "</h1></center>";
			?>
		</div>
	</div>
	
</body>
</html>