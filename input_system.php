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
		<form method="POST">
			<p>Teacher id: <input type="number" name="teachr"></p>
			<p>Subject id: <input type="number" name="subj"></p>
			<p><input type="submit" name="submit" value="SubjLine"></p>
		</form>
	</div>
	<div>
		<h1>Input Subjects</h1>
		<form method="POST">
			<p>Subject name<input type="text" name="subj_name"></p>
			<p>Subject Section<input type="text" name="subj_section"></p>
			<p><input type="submit" name="submit" value="Subject"></p>
		</form>
	</div>
	<div>
		<h1>Input Teachers</h1>
		<form method="POST">
			<p>Teacher name<input type="text" name="teacher_name"></p>
			<p>Teacher Department<input type="text" name="department"></p>
			<p>Teacher username<input type="text" name="username"></p>
			<p>Teacher password<input type="text" name="password"></p>
			<p>Teacher user type<input type="text" name="user_type"></p>
			<p><input type="submit" name="submit" value="Teachers"></p>
		</form>
	</div>
	<div>
		<h1>Input for rating_line_t</h1>
		<form method="POST">
			<p>Student id: <input type="text" name="stdnt_id"></p>
			<p>Subject id: <input type="number" name="subj"></p>
			<p><input type="submit" name="submit" value="RatingLine"></p>
		</form>
	</div>
</body>

<?php
	include 'connect.php';
		if(isset($_POST["submit"])){
				switch ($_POST["submit"]) {
			case "SubjLine":
				subject_line();
				break;
			case "Subject":
				subject();
				break;
			case "Teachers":
				teacher();
				break;
			case "RatingLine":
				rating_line();
				break;
			default:
				echo "<script>alert('error!!')</script>";
				break;
		}
	}



	function subject_line(){
		include 'connect.php';
		$query = "INSERT INTO subject_line_t(teacher_id, subject_id)(SELECT teacher_t.teacher_id, subject_t.subject_id FROM teacher_t, subject_t WHERE  subject_t.subject_id = " . $_POST["subj"] . " AND teacher_t.teacher_id = ".$_POST["teachr"] . ");";
		if(mysqli_query($conn,$query)){
			unset($_POST["submit"]);
			echo "<script>alert('Subject Recored!!')</script>";
		}
		else{
			echo "<script>alert('error')</script>";
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

	function teacher(){
		include 'connect.php';
		$query = "INSERT INTO teacher_t(teacher_name,department,username,password,user_type) values('" . $_POST["teacher_name"] . "','" . $_POST["department"] ."','". $_POST["username"] . "','" . $_POST["password"] . "','" . $_POST["user_type"] .  "');";
		if(mysqli_query($conn,$query)){
			unset($_POST["submit"]);
			echo "<script>alert('teacher Recored!!')</script>";
		}
		else{
			echo "<script>alert('error')</script>";
		}
	}


	function rating_line(){
		include 'connect.php';
		$query = "INSERT INTO rating_line_t(subject_line_id, student_id)(SELECT subject_line_t.subject_line_id, student_t.student_id FROM subject_line_t, student_t WHERE  subject_line_t.subject_line_id = " . $_POST["subj"] . " AND student_t.student_id = '" . $_POST["stdnt_id"] . "');";
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