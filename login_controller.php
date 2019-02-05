<?php
	require "connect.php";
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "SELECT * FROM student_t WHERE username=" . $_POST['yr'] .  $_POST['num'] . " AND password='" . $_POST['password'] . "'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION['row'] = mysqli_fetch_array($result,MYSQLI_ASSOC);
			// $_SESSION["type"] = $row["type"];
			// if($_SESSION["type"] == "teacher"){
			// 	header("Location: home_teacher.php");
			// }
			// else if($_SESSION["type"] == "student"){
				header("Location: home_student.php");
			// }
			// else if($_SESSION["type"] == "dean"){
			// 	header("Location: home.php");
			// }
		}
		else{
			echo "LOGIN ERROR!!";
		}
	}

?>