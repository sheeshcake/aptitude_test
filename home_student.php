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
	<title>Home</title>
</head>
<body>
	<?php
		echo "<center><h1>Hello, " . $_SESSION["row"]["name"] . "</h1>";
	?>
	<a href="logout.php">Logout</a>
	</center>
</body>
</html>