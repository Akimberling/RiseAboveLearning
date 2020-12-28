<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<title>Rise Above Learning</title>
		<meta name="description" content="Take quizzes, educate yourself on subjects to prepare yourself for exams in school or gain knowledge on a topic you may be interested in.">
		<meta name="keywords" content="education quizzes categories rise above learning success classroom students teachers preparation">
		<meta name="author" content="Amber Lynn Kmberling">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="_css/ral.css">
		<script src="_jquery/jquery.js"></script>
		<script src="_jquery/ral.js"></script>
		<script type="text/javascript">
			//11/07/18 - AK -jquery function for a dropdown menu
			$(document).ready(function(){
				$(".hamburger").on("click", function(){
			   		$(".menu").animate({
			    		height: 'toggle'
			    	});
				});

			});
		</script>
	</head>
	<body>
		<header>
			<img class="logo" src="_images/logo.jpg" alt="RISE ABOVE LEARNING LOGO">
			<nav>
				<ul>
					<div class="nav">
						<li><a href="index.php">HOME</a></li>
						<li><a href="index.php?about">ABOUT</a></li>
						<li class = "dropdown">
							<button class="dropbtn" onclick="myFunction()">USER</button>
							<div class= "dropdown_content" id="drop">
								<a href="index.php?quiz/list" >QUIZZES</a>
								<a href="index.php?category/list" >CATEGORIES</a>
							</div>
						</li>
						<li class = "dropdown">
							<button class="dropbtn1" onclick="myFunction()">ADMIN</button>
							<div class= "dropdown_content" id="drop2">
								<a href="index.php?category/edit" >CATEGORY</a>
								<a href="index.php?quiz/edit" >QUIZZES</a>
								<a href="index.php?user/list" >USER</a>
							</div>
						</li>
						<li><a href="index.php?user/register" >REGISTER</a></li>
						<?php if ($loggedIn): ?>   
							<li><a href="index.php?logout">SIGN-OUT</a></li>
						<?php else: ?>
						  <li><a href="index.php?login">SIGN-IN</a></li>
						<?php endif; ?>
						<li><a href="index.php?qa">Q/A</a></li>
						<li><a href="index.php?contact">CONTACT</a></li>
					</div>
				</ul>
				<div class="nav2">
				    <a class="hamburger"><img src="_images/hamburger.jpg" alt="hamburger icon" height="40px" width="40px"></a>
				    <div class="clear"></div>
				    <ul class="menu">
					    <li><a href="index.php">HOME</a></li>
						<li><a href="index.php?about">ABOUT</a></li>
						<li><a href="index.php?quiz/list" >QUIZZES</a></li>
						<li><a href="index.php?category/list" >CATEGORIES</a></li>
						<li><a href="index.php?category/edit" > ADMIN CATEGORY</a></li>
						<li><a href="index.php?quiz/edit" >ADMIN QUIZZES</a></li>
						<li><a href="index.php?user/list" >ADMIN USER</a></li>
						<li><a href="index.php?user/register" >REGISTER</a></li>
						<?php if ($loggedIn): ?>   
						<li><a href="index.php?logout">SIGN-OUT</a></li>
						<?php else: ?>
						  <li><a href="index.php?login">SIGN-IN</a></li>
						<?php endif; ?>
						<li><a href="index.php?qa">Q/A</a></li>
						<li><a href="index.php?contact">CONTACT</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="contain">
			<?=$output?>

		</div>
		<footer>
			<ul>
			    <li><a href="index.php">HOME</a></li>
				<li><a href="index.php?about">ABOUT</a></li>
				<li><a href="index.php?quiz/list" >QUIZZES</a></li>
				<li><a href="index.php?category/list" >CATEGORIES</a></li>
				<li><a href="index.php?category/edit" > ADMIN CATEGORY</a></li>
				<li><a href="index.php?quiz/edit" >ADMIN QUIZZES</a></li>
				<li><a href="index.php?user/list" >ADMIN USER</a></li>
				<li><a href="index.php?user/register" >REGISTER</a></li>
				<?php if ($loggedIn): ?>   
				<li><a href="index.php?logout">SIGN-OUT</a></li>
				<?php else: ?>
				  <li><a href="index.php?login">SIGN-IN</a></li>
				<?php endif; ?>
				<li><a href="index.php?qa">Q/A</a></li>
				<li><a href="index.php?contact">CONTACT</a></li>
			</ul>
			
			<p>
				<hr class="thefoot">
				&copy; FALL 2018 RISE ABOVE LEARNING &nbsp; | &nbsp;<a href="mailto:riseabovelearning@gmail.com" >RISEABOVELEARNING@GMAIL.COM</a> &nbsp; | &nbsp;WEB DEVELOPER - AMBER KIMBERLING</p>
				<p>LAST MODIFIED: 12/07/18 @ 12:36 &nbsp; | &nbsp; BEST VIEWED IN CHROME
		</footer>
	</body>
</html>