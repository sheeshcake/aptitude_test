<?php
	include "connect.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input system</title>
</head>
<body>
	<div>
		<h1>Input for subject_line_t</h1>
		<form method="POST" action="input_controller.php">
			<p>Teacher id: <input type="number" name="teachr"></p>
			<p>Subject id: <input type="number" name="subj"></p>
			<p>Student id:<input type="number" name="stnd"></p>
			<input type="button" name="subj_line" value="submit">
		</form>
	</div>
	<div>
		<h1>Input Subjects</h1>
		<form method="POST" action="input_controller.php">
			<p>Subject name<input type="text" name="subj_name"></p>
			<input type="button" name="subject" value="submit">
		</form>
	</div>
</body>
</html>