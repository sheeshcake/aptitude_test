<?php
	require "connect.php";
	session_start();
	if($_POST["department"] == "student"){
		$sql = "SELECT * FROM student_t WHERE username='" . "C" . $_POST['yr'] . "-" .  $_POST['num'] . "'" . " AND password='" . $_POST['password'] . "'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION['row'] = mysqli_fetch_array($result,MYSQLI_ASSOC);
			header("Location: home_student.php");
		}
		else{
			echo "<script type='text/javascript'>alert('ERROR!!');</script>";
		}
	}
	else if($_POST['department'] == "other"){
		$sql1 = "SELECT * FROM teacher_t WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] . "'";
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1) == 1){
			$_SESSION['row'] = mysqli_fetch_array($result1,MYSQLI_ASSOC);
			header("Location: home_teacher.php");
		}
		else{
			echo "<script type='text/javascript'>alert('ERROR!!');</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>alert('ERROR!!');</script>";
	}

?>