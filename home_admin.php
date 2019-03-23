<?php
	include "connect.php";
	session_start();
	if(!$_SESSION["admin"]){
		header("Location: index.php");
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
			<?php
				if(isset($_GET['succ']) && $_GET['succ'] == true){
					echo "<script> alert('DELETE SUCCESS!!') </script>";
					unset($_GET['succ']);
				}
				$query = "SELECT * FROM question_t";
				$result = mysqli_query($conn,$query);
				$question_counter = 0;
				$title_counter = 1;
				while($question_row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					switch ($question_row['type']) {
						case 'title':
							if($title_counter != 1){
								echo "</div>";
							}
							echo "<h1>$title_counter<input name='$question_counter' value='". $question_row['question'] . "' style='width:75%;height:50px;font-size:20px;'>" ;
							echo "<select style='height:50px;font-size:20px;'>";
							echo "<option disabled>Type</option>";
							echo "<option selected>Title</option>";
							echo "<option>Description</option>";
							echo "<option>Question</option>";
							echo "</select>";
							echo "</h1>";
							echo "<input type='button' onclick='add_new('title$title_counter') value='ADD'></br>";
							echo "<div id='title$title_counter'>";
							$question_counter = 1;
							$title_counter++;
							break;
						case 'title1':
							echo "<h5><input name='$question_counter' value='". $question_row['question'] . "' style='width:85%;height:50px;font-size:20px;'>" ;
							echo "<select style='height:50px;font-size:20px;'>";
							echo "<option disabled>Type</option>";
							echo "<option>Title</option>";
							echo "<option selected>Description</option>";
							echo "<option>Question</option>";
							echo "</select>";
							echo "</h5>";
							break;
						case 'question':
							echo "$question_counter<input name='$question_counter' value='". $question_row['question'] . "' style='width:85%;height:50px;font-size:20px;'>" ;
							echo "<select style='height:50px;font-size:20px;'>";
							echo "<option disabled>Type</option>";
							echo "<option>Title</option>";
							echo "<option>Description</option>";
							echo "<option selected>Question</option>";
							echo "</select>";
							echo "<a href='remove_question.php?id=" . $question_row['question_id'] . "'>REMOVE</a>" ;
							echo "</br>";
							$question_counter++;
							break;
						default:
							# code...
							break;
					}
				}
				echo "<center><input type='button' name='done' value='SUBMIT'></center>";
				echo "</form>";

			?>
		</div>
		<div class="profile_col">
			<center>
				<img src="img/dean_teacher(default).jpg" alt="John" style="width:100%; ima">
				<?php
					echo "<h1>" . $_SESSION["row"]["admin_name"] . "</h1>";
				?>
			</center>
		</div>
	</div>
	

	<script type="text/javascript">
		function add_new(id){
			var div = document.getElementById(id);
			var in = document.createElement("input");
			in.setAttribute('type','text');
			in.style.height = "50px";
			in.style.fontSize = "20px";
			div.
		}
	</script>
</body>
</html>

//maam aurora hortilano mm4E