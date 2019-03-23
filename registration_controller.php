<?php
	include "connect.php";

	if(isset($_POST["submit"])){
		$query = "SELECT student_id FROM student_t WHERE student_id='" . $_POST['id_num'] . "'";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result) == 0){
			$query = "INSERT INTO student_t (name,username,password,student_id,department) values('". $_POST['student_name'] . "','" . $_POST['usrnm'] . "','" . $_POST['re_password'] . "','" . $_POST['id_num'] . "','" . $_POST['dept'] . "')";
			if(mysqli_query($conn,$query)){
				echo "<script>alert('Registered Successfully!');window.location.href = 'login.php';</script>";
			}
			else{
				echo "<script>alert('An Error Occured!');</script>";
			}
		}
		else{
			echo "<script>alert('Already Registered!!');</script>";
		}
	}
?>