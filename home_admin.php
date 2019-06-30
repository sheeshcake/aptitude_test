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
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
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
			<!-- <form method="POST"> -->
				<?php
					add_all();
				?>
			<!-- </form> -->
		</div>
		<div class="profile_col">
			<center>
				<img src="img/dean_teacher(default).jpg" alt="John" style="width:100%;">
				<?php
					echo "<h1>" . $_SESSION["row"]["admin_name"] . "</h1>";
				?>
			</center>
		</div>
	</div>

	<script type="text/javascript">
		// var counter[][2] = {};
		var counter = 0;
		var last_id;
		function add_new(id,num){

			if(id == last_id){
				counter++;
			}
			else{
				counter = 1;
			}
			var div = document.getElementById(id);
			var new_p = document.createElement('p');
			var new_a = document.createElement('a');
			var newText = document.createElement('input');
			new_a.appendChild(document.createTextNode("REMOVE"));
			new_p.appendChild(document.createTextNode(counter));
			new_a.setAttribute("href","remove_question.php?id=" + counter);
			newText.setAttribute("name",num + "q" + counter);
			new_p.appendChild(newText);
			new_p.appendChild(new_a);
			// if (div.nextSibling) {
			//   div.parentNode.insertAfter(new_p, div.nextSibling);
			// }
			// else {
			  div.appendChild(new_p);
			// }
			last_id = id;
		}
	</script>
</body>
<?php
	if(isset($_POST['done'])){
		$new_id = 0;
		for($i = 0; $i < $_SESSION['title_counter']; $i++){
			$c = 0;
			$query = "INSERT INTO question_t(question_id,question,type) VALUES($new_id,'".$_POST['$i']."','title')";
			if($result = mysqli_query($conn,$query)){
				$new_id++;
				while (isset($_POST[$i . 'q' . $c])) {
					$query1 = "INSERT INTO question_id(question_id,question,type) VALUES($new_id,'" . $_POST[$i . 'q' . $c] . "','question')";
					if($result1 = mysqli_query($conn,$query1)){
						$c++;
					}
				}
			}
		}
	}

	function add_all(){
		include "connect.php";
		$query = "SELECT * FROM question_t";
		$result = mysqli_query($conn,$query);
		$question_counter = 0;
		$title_counter = 1;
		echo "<form method='post'>";
		while($question_row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			switch ($question_row['type']) {
				case 'title':
					if($title_counter != 1){
						echo "</div>";
						echo "<button type='button' onclick=" . "'" . 'add_new("title' . $title_counter . '",' . $title_counter . ')' . "'" . ">ADD QUESTION</button></br></br></br>";
						
					}
					echo "<h1>$title_counter<input name='$question_counter' value='". $question_row['question'] . "' style='width:70%;height:50px;font-size:20px;'>" ;
					echo "<select style='height:50px;font-size:20px;'>";
					echo "<option disabled>Type</option>";
					echo "<option selected>Title</option>";
					echo "<option>Description</option>";
					echo "<option>Question</option>";
					echo "</select>";
					echo "</h1>";
					$question_counter = 1;
					$title_counter++;
					echo "<div id='title$title_counter'>";

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
					echo "<p>$question_counter<input name='$question_counter' value='". $question_row['question'] . "' style='width:70%;height:50px;font-size:20px;'>" ;
					echo "<a href='remove_question.php?id=" . $question_row['question_id'] . "'>REMOVE</a>" ;
					echo "<select style='height:50px;font-size:20px;'>";
					echo "<option disabled>Type</option>";
					echo "<option>Title</option>";
					echo "<option>Description</option>";
					echo "<option selected>Question</option>";
					echo "</select></p>";
					$question_counter++;
					break;
				default:
					# code...
					break;
			}
		}
		echo "<center><input type='submit' name='done' value='SUBMIT'></center>";
		echo "</form>";
		echo "</div>";
		$_SESSION['title_counter'] = $title_counter;
	}
?>
</html>

