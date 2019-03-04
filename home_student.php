<?php
	include "connect.php";
	session_start();
	if(!empty($_SESSION["row"]["name"])){
	}
	else{
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stdnt_style.css">
	<title>Home</title>
</head>
<body>
	<div class="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li style="float:right;"><a href="logout.php">Logout</a></li>
		</ul>
	</div>

	<div class="row">
		<div class="subject_col">
			<center><h1>Subjects</h1></center>
			<table id="subj_table">
				<tr>
					<th>Subject Code</th>
					<th>Subject Name</th>
					<th>Subject Teacher</th>
					<th>Done?</th>
					<th></th>
				</tr>
				<?php
					$query = "SELECT * FROM subject_line_t WHERE student_id='" . $_SESSION['row']['student_id'] . "'";
					$result = mysqli_query($conn,$query);
					$_SESSION['subj_row'] = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$subj_counter = mysqli_num_rows($result);
					for($i = 0; $i < $subj_counter; $i++){
						$query = "SELECT subject_name FROM subject_t WHERE subject_id=" . $_SESSION['subj_row']['subject_id'];
						$result1 = mysqli_query($conn,$query);
						$subject_name = mysqli_fetch_array($result1,MYSQLI_ASSOC);
						$query = "SELECT teacher_name FROM teacher_t WHERE teacher_id=" . $_SESSION['subj_row']['teacher_id'];
						$result1 = mysqli_query($conn,$query);
						$teacher_name = mysqli_fetch_array($result1,MYSQLI_ASSOC);
						echo "<tr>";
						echo "<td>" . $_SESSION['subj_row']['subject_id'] . "</td>";
						echo "<td>" . $subject_name['subject_name'] . "</td>";
						echo "<td>" . $teacher_name['teacher_name'] . "</td>";
						echo "<td>NO</td>";
						echo "<td><button onclick='location.href=" . '"#"' . "'>Rate This!</button></td>";
						echo "</tr>"; 
					}
				?>
			</table>
		</div>
		<div class="profile_col">
			<?php
				echo "<center><h1>Hello, " . $_SESSION["row"]["name"] . "</h1></center>";
			?>
		</div>
	</div>
	
</body>
</html>