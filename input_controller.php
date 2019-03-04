<?php
	include "connect.php";
	if(isset($_POST["teachr"])){
		$query = "INSERT INTO subject_line_t(student_id, teacher_id, subject_id)(SELECT student_t.student_id, teacher_t.teacher_id, subject_t.subject_id FROM student_t, teacher_t, subject_t WHERE student_t.student_id = " . $_POST["stnd"] . " AND subject_t.subject_id = " . $_POST["subj"] . " AND teacher_t.teacher_id = ".$_POST["teachr"] . ");";
		mysqli_query($conn,$query);
	}
	else if(isset($_POST["subj_name"])){
		$query = "INSERT INTO subject_t(subject_name) values('" . $_POST["subj_name"] . "');";
		if(mysqli_query($conn,$query)){
			echo "Subject Recorded!!";
		}
	}
	else{
		echo "NO RECORD RECORDED!!";
	}
?>