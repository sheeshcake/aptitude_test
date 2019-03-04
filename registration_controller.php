<?php
	include "connect.php";
	if(isset($_POST["submit"])){
		$query = "INSERT INTO student_t (name,username,password,student_id,department) values('". $_POST['student_name'] . "','" . $_POST['usrnm'] . "','" . $_POST['re_password'] . "','" . $_POST['id_num'] . "','" . $_POST['dept'] . "')";
		if(mysqli_query($conn,$query)){
			echo "<script>alert('Registered Successfully!');</script>";
			header("Location: login.php");
		}
		else{
			echo "<script>alert('An Error Occured!');</script>";
		}
	}
?>