<?php
	include "connect.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
</head>
<body>
	<center>
		<?php
			echo "Hello " . $_SESSION['row']['name'];
		?>
	</center>
</body>
</html>