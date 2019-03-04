<?php
	include "connect.php";
	session_start();
	if(!$_SESSION["admin"]){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
</head>
<body>
	<h1>Hello Admin!! :)</h1>
</body>
</html>