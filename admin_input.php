<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN INPUT</title>
</head>
<body>
	<div>
		<form method='post'>
			<h1>SEARCH ID-NUMBER</h1>
			<input type="text" name="idnum">
			<input type="button" name="submit" value="IDNUMBER">
		</form>
	</div>

	<div>
		<?php
			function idnumber(){
				include "connect.php";
				$query = "SELECT * FROM rating_line_t WHERE student_id = " . $_POST["idnum"];
				$result = mysqli_query($conn,$query);
				while($row = mysqli_fetch_assoc($result)){
					
				}	
			}
		?>
	</div>

	<div>

		
	</div>


	<div>
		<h1>Input Subjects</h1>
		<form method="POST">
			<p>Subject name<input type="text" name="subj_name"></p>
			<p>Subject Section<input type="text" name="subj_section"></p>
			<p><input type="submit" name="submit1" value="SUBJECT"></p>
		</form>
	</div>

</body>

<?php

	if(isset($_POST["submit"])){
		switch($_POST['submit']){
			case "IDNUMBER": idnumber(); break;
			case "SUBJECT": subject(); break;
		}
	}

	function subject(){
		include 'connect.php';
		$query = "INSERT INTO subject_t(subject_name,subject_section) values('" . $_POST["subj_name"] . "','" . $_POST["subj_section"] . "');";
		if(mysqli_query($conn,$query)){
			unset($_POST["submit"]);
			echo "<script>alert('Subject Recored!!')</script>";
		}
		else{
			echo "<script>alert('error')</script>";
		}
	}
?>
</html>