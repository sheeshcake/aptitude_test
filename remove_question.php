<?php
	include "connect.php";
	if(isset($_GET['del_id'])){
		$query = "DELETE FROM question_t WHERE question_id=" . $_GET['id'] ;
		if(mysqli_query($conn,$query)){
			header("Location: home_admin.php?succ=true");
		}
	}
	if(isset($_GET['update'])){
		
	}

?>