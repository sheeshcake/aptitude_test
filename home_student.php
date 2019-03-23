<?php
	include "connect.php";
	session_start();
	unset($_SESSION['rate']);
	unset($_SESSION['submit']);
	if(!empty($_SESSION["row"]["name"])){
	}
	else{
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<div class="subject_col" id="main_content">
			<script type="text/javascript">
				function start(id){
					r_id = id;
					document.cookie = "rate_id=" + r_id;
					document.getElementById("main_content").innerHTML = "<?php out_question(); ?>";
				}
			</script>
			<?php
				if(isset($_POST['comment'])){
					$ones = 0;
					$twos = 0;
					$threes = 0;
					$fours = 0;
					$fives = 0;
					for($i = 0; $i < $_SESSION['counter']; $i++){
						switch($_POST["rad" . $i . ""]){
							case 1: $ones++; break;
							case 2: $twos++; break;
							case 3: $threes++; break;
							case 4: $fours++; break;
							case 5; $fives++; break;
						}
						$query = "INSERT INTO questionare_line_t(rating_id,answer,question_id,admin_id) VALUES((SELECT rating_id FROM rating_line_t WHERE rating_id=" . $_SESSION['rating_line']['rating_id']. ")," . $_POST["rad" . $i . ""] . ",(SELECT question_id FROM question_t WHERE question_id=" . $_SESSION['question_id'][$i] . "),(SELECT admin_id FROM admin_t WHERE admin_id=1))";
						if(!mysqli_query($conn,$query)){
							echo "Something is very bad happened! :(";
						}
					}
					$grand_total = ($ones + $twos + $threes + $fours + $fives)/(($ones)+($twos*2)+($threes*3)+($fours*4)+($fives*5));
					$query = "UPDATE rating_line_t SET score=" . $grand_total . " WHERE rating_id=" . $_SESSION['rate_id'];
					if(!mysqli_query($conn,$query)){
						echo "Something is very bad happened! :(";
					}
					else{
						echo "<center><h3 style='color:green;'>RATING SUCCESSFUL!</h3></center>";
						unset($_COOKIE['rate_id']);
					}


				}
				function out_question(){
					include 'connect.php';
					if(isset($_COOKIE['rate_id'])){
						$_SESSION['rate_id'] = $_COOKIE['rate_id'];
					}
					$query = "SELECT * FROM question_t";
					$result = mysqli_query($conn,$query);
					$title_counter = 0;
					$question_counter = 1;
					$_SESSION['counter'] = 0;
					echo "<form method='post'>";
					// while($_SESSION['counter'] < 5){
					while($row =mysqli_fetch_assoc($result)){
						// $row = mysqli_fetch_assoc($result);
						if($row['type'] == 'title'){
							echo "<h1> " . $row['question'] . "</h1>";
							$question_counter = 1;
							$title_counter++;
						}
						if($row['type'] == "title1"){
							echo "<h3>" . $row['question'] . "</h3>";
						}
						else{
							echo "<h5>" . $question_counter . ". " . $row['question'] . "</h5>";
							echo "<center><p><input type='radio' name='rad" . $_SESSION['counter'] . "' value='1' required>1";
							echo "<input type='radio' name='rad" . $_SESSION['counter'] . "' value='2' required>2";
							echo "<input type='radio' name='rad" . $_SESSION['counter'] . "' value='3' required>3";
							echo "<input type='radio' name='rad" . $_SESSION['counter'] . "' value='4' required>4";
							echo "<input type='radio' name='rad" . $_SESSION['counter'] . "' value='5' required>5</p></center>";
							$question_counter++;
							$_SESSION['question_id'][$_SESSION['counter']] = $row['question_id'];
							$_SESSION['counter']++;
						}
					}
					echo "<input type='text' name='comment' placeholder='Comment' required>";
					echo "<center><input type='button' name='done' value='SUBMIT'></center>";
					echo "</form>";
				}
				if(!isset($_POST['submit']) || isset($_POST['comment']) && !isset($_COOKIE['rate_id'])){
					echo "<center><h1>Subjects</h1></center>",
					'<table id="subj_table">',
						"<tr>",
							"<th>Subject Code</th>",
							"<th>Subject Name</th>",
							"<th>Subject Teacher</th>",
							"<th></th>",
						"</tr>";
					$query = "SELECT * FROM rating_line_t WHERE student_id='" . $_SESSION['row']['student_id'] . "'";
					$result = mysqli_query($conn,$query);
					while($row = mysqli_fetch_assoc($result)) {
						$_SESSION["rating_line"] = $row;
						if($row['score'] == null){
							$query0 = "SELECT * FROM subject_line_t WHERE subject_line_id = '" . $row['subject_line_id'] . "'";
							$result0 = mysqli_query($conn,$query0);
							$_SESSION['subjln_row'] = mysqli_fetch_array($result0,MYSQLI_ASSOC);
							$query1 = "SELECT * FROM subject_t WHERE subject_id = " . $_SESSION['subjln_row']['subject_id'] . "";
							$result1 = mysqli_query($conn,$query1);
							$_SESSION['subj_row'] = mysqli_fetch_array($result1,MYSQLI_ASSOC);
							$query2 = "SELECT * FROM teacher_t WHERE teacher_id = " . $_SESSION['subjln_row']['teacher_id'] . "";
							$result2 = mysqli_query($conn,$query2);
							$_SESSION['tchr_row'] = mysqli_fetch_array($result2,MYSQLI_ASSOC);
							echo "<tr>";
							echo "<td>" . $_SESSION['subjln_row']['subject_id'] . "</td>";
							echo "<td>" . $_SESSION['subj_row']['subject_name'] . "</td>";
							echo "<td>" . $_SESSION['tchr_row']['teacher_name'] . "</td>";
							echo "<form method='post'>";
							echo "<td><input type='button' value='Rate This!' name='rate' onclick='start(" . $row['rating_id'] . ");'></td>";
							echo "</form>";
							echo "</tr>";
						}
					}
					echo "</table>";
					unset($_POST['comment']);
				}
			?>
		</div>
		<div class="profile_col">
			<?php
				echo "<center><h1>Hello, " . $_SESSION["row"]["name"] . "</h1></center>";
			?>
		</div>
	</div>
	
</body>

</html>