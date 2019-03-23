<?php
	// include "connect.php";
	// session_start();
	// if(empty($_SESSION["row"]["teacher_name"])){
	// 	header("Location: login.php");
	// }
	// else if($_SESSION["row"]["user_type"] != "dean-teacher"){
	// 	header("Location: home_" . $_SESSION["row"]["user_type"] . ".php");
	// }
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
			<li><a href="home_dean-teacher.php">Profile</a></li>
			<li style="float:right;"><a href="logout.php">Logout</a></li>
		</ul>
	</div>

	<div class="row">
		<div class="subject_col">
			<center><h1>Subjects</h1></center>
		</div>
		<div class="profile_col">
			<center><h3>Top 10 Teachers</h3></center>
		</div>
	</div>
	
</body>
</html>