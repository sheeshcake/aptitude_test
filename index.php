<?php
	include "connect.php";
	session_start();
	$_SESSION["admin"] = false;
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
	<title>Aptitude Test Home</title>
</head>
<body>
	<div class="nav">
		<ul>
			<li><a href="#home" class="active" onclick="remove_set();set(this.id);" id="hm">Home</a></li>
			<li><a href="#info" onclick="remove_set();set(this.id);" id="nfo">Info</a></li>
			<li><a href="#about" onclick="remove_set();set(this.id);" id="abt">About</a></li>
			<li id="lgged" class="right" style="float:right;"> </li>
			<li id="prof" class="right" style="float:right;"><a href="register.php">Register</a></li>
		</ul>
	</div>
	<section id="home">
		<div class="main">
			<center><h1>SMC Aptitude Test</h1></center>
			<p>
				Where can I get some?
				There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
			</p>
						<p>
				Where can I get some?
				There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
			</p>
		</div>
	</section>

	<section id="info">
		<div class="main">
			<center><h1>What is Aptitude test?</h1></center>
			<p>
				Where can I get some?
				There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
			</p>
						<p>
				Where can I get some?
				There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
			</p>
		</div>
	</section>


	<section id="about">
		<div class="main">
			<center><h1>About</h1></center>
						<p>
				Where can I get some?
				There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
			</p>
						<p>
				Where can I get some?
				There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
			</p>
		</div>
	</section>
	<script type="text/javascript">
		var tag_id = "hm";
		function set(id){
			tag_id = id;
			document.getElementById(id).className = "active";
		}
		function remove_set(){
			document.getElementById(tag_id).className = "notactive";
		}
	</script>
	<?php
		if(isset($_SESSION['row'])){
			echo "<script type='text/javascript'>";
			if(isset($_SESSION['row']['user_type'])){
				if($_SESSION['row']['user_type'] == "dean"){
					echo "document.getElementById('prof').innerHTML = " . '"' . "<a href='" . "home_dean.php" . "'>Show Rates</a>" . '";';
				}
				else if($_SESSION['row']['user_type'] == "teacher"){
					echo "document.getElementById('prof').innerHTML = " . '"' . "<a href='" . "home_teacher.php" . "'>Profile</a>" . '";';
				}
				else if($_SESSION["row"]["user_type"] == "dean-teacher"){
					echo "document.getElementById('prof').innerHTML = " . '"' . "<a href='" . "home_dean-teacher				.php" . "'>Profile</a>" . '";';
				}
			}
			else{
				echo "document.getElementById('prof').innerHTML = " . '"' . "<a href='" . "home_student.php" . "'>Rate Now</a>" . '";';
			}
			echo "document.getElementById('lgged').innerHTML = " . '"' . "<a href='" . "logout.php" . "'>Logout</a>" . '";';
			echo "</script>";

		}
		else{
			echo "<script type='text/javascript'>"; 
			echo "document.getElementById('lgged').innerHTML = " . '"' . "<a href='" . "login.php" . "'>Login</a>" . '";';
			echo "</script>";
		}
	?>
	<footer><center><h3>C 2018 - 2019</h3></center></footer>
</body>
</html>