<?php
	require "connect.php";
	session_start();
	unset($_SESSION['reg']);
	if($_POST["department"] == "student"){
		if(isset($_POST["usrnm"])){
			$sql = "SELECT * FROM student_t WHERE username='" . $_POST["usrnm"]. "' AND password='" . $_POST['password'] . "'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) == 1){
				$_SESSION['row'] = mysqli_fetch_array($result,MYSQLI_ASSOC);
				header("Location: home_student.php");
			}
			else{
				echo "<script type='text/javascript'>alert('ERROR!!');</script>";
			}
		}
		else if(isset($_POST["yr"]) && isset($_POST["num"])){
			$sql = "SELECT * FROM student_t WHERE student_id='" . "C" . $_POST['yr'] . "-" .  $_POST['num'] . "'" . " AND password='" . $_POST['password'] . "'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) == 1){
				$_SESSION['row'] = mysqli_fetch_array($result,MYSQLI_ASSOC);
				header("Location: home_student.php");
			}
			else{
				echo "<script type='text/javascript'>alert('ERROR!!');</script>";
			}
		}
	}
	else if($_POST['department'] == "other"){
		$sql1 = "SELECT * FROM teacher_t WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] . "'";
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1) == 1){
			$_SESSION['row'] = mysqli_fetch_array($result1,MYSQLI_ASSOC);
			if($_SESSION["row"]["user_type"] == "dean"){
				header("Location: home_dean.php");
			}
			else if($_SESSION["row"]["user_type"] == "dean-teacher"){
				header("Location: home_dean-teacher.php");
			}
			else{
				header("Location: home_teacher.php");
			}
		}
		else{
			$sql2 = "SELECT * FROM admin_t WHERE admin_username='" . $_POST['username'] . "' AND admin_password='" . $_POST['password'] . "'";
			$_SESSION["admin"] = true;
			$result2 = mysqli_query($conn,$sql2);
			$_SESSION['row'] = mysqli_fetch_array($result2,MYSQLI_ASSOC);
			if(mysqli_num_rows($result2) == 1){
				header("Location: home_admin.php");
			}
		}
	}
	else{
		echo "<script type='text/javascript'>alert('ERROR!!');</script>";
	}

?>