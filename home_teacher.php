<?php
	include "connect.php";
	session_start();
	if(empty($_SESSION["row"]["teacher_name"])){
		header("Location: login.php");
	}
	else if($_SESSION["row"]["user_type"] != "teacher"){
		header("Location: home_" . $_SESSION["row"]["user_type"] . ".php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/tchr_style.css">
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
					<th>Subject Section</th>
					<th>Rating</th>
				</tr>
				<?php
					$query = "SELECT * FROM subject_line_t WHERE teacher_id=" . $_SESSION["row"]["teacher_id"];
					$result = mysqli_query($conn,$query);
					while($row =mysqli_fetch_assoc($result)){
						$query1 = "SELECT * FROM subject_t WHERE subject_id=" . $row['subject_id'];
						$result1 = mysqli_query($conn,$query1);
						$subject_t = mysqli_fetch_array($result1,MYSQLI_ASSOC);
						$query2 = "SELECT score FROM rating_line_t WHERE subject_line_id=" . $row['subject_line_id'];
						$result2 = mysqli_query($conn,$query2);
						$rating_line_t = mysqli_fetch_array($result2,MYSQLI_ASSOC);
						echo "<tr>";
						echo "<td>" . $subject_t['subject_id'] . "</td>";
						echo "<td>" . $subject_t['subject_name'] . "</td>";
						echo "<td>" . $subject_t['subject_section'] . "</td>";
						if($rating_line_t['score'] != null){
							echo "<td>" . $rating_line_t['score'] . "</td>";
						}
						else{
							echo "<td>0</td>";
						}
						echo "</tr>";
					} 
				?>
			</table>
		</div>
		<div class="profile_col">
			<center>
				<img src="img/dean_teacher(default).jpg" alt="John" style="width:100%; ima">
				<?php
					echo "<h1>" . $_SESSION["row"]["teacher_name"] . "</h1>";
				?>
				<p class="title">User-Type: <?php echo $_SESSION['row']['user_type'] ?></p>
				<p>Department: <?php echo $_SESSION['row']['department']; ?></p>
			</center>
		</div>
	</div>
	
</body>
</html>