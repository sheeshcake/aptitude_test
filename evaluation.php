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
			<li><a href="index.php">Home</a></li>
			<li style="float:right;"><a href="logout.php">Logout</a></li>
		</ul>
	</div>

	<div class="row">
		<div class="subject_col">
			
		</div>
		<div class="profile_col">
			<?php
				echo "<center><h1>Hello, " . $_SESSION["row"]["name"] . "</h1></center>";
			?>
		</div>
	</div>
	
</body>
</html>