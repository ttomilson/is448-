<?php
	session_start();

	if(isset($_SESSION['login_user'])){
		$username = $_SESSION['login_user'];
	}

	?>

<!DOCTYPE HTML>
<!-- code written by Theresa Tomilson. Homepage of the UMBC Study Group Website -->
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title> Welcome to Find Your Study Buddy! </title>

	<link rel ="stylesheet" type="text/css" href="homepage.css" title="style" />
	<script src="confirmLogout.js" type="text/javascript"></script>

</head>

<body>





<!-- if it is set print out this -->

	<?php
	if(isset($username)){
	?>
			<div class = "blackBackground">

			<h1 class = "top"> UMBC Study Group </h1>
				<ul>
					<li> <a class = nav href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/homepage.php?login_user =<?php echo $username ?>" > Home </a> </li>
					<li> <a class = nav href = " https://swe.umbc.edu/~mgupta2/is448/project/scheduledisplay.php?login_user =<?php echo $username ?>" > Schedule </a> </li>
					<li> <a class = nav href = "https://swe.umbc.edu/~kimranr1/is448/finalproj/buddySearch.php?username =<?php echo $username ?>" > Study Buddy Search </a> </li>
					<li> <a class = nav href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/messagenav.php?login_user =<?php echo $username ?>" > Messages </a> </li>
					<li style = "float:right"> <a id = "logout" class = nav href = " https://swe.umbc.edu/~nibrahi1/is448/d5/logout.php" > Logout </a>   </li>
					<li style = "float:right"> <a class = nav href = " https://swe.umbc.edu/~muddin1/is448/deliverable5/myprofile.php?username = <?php echo $username ?>" > Profile </a>  </li>

				</ul>
				<br/>
			</div>
				<br/>
				<br/>

				<div class = "sectionleft">

				<h2> What is "UMBC Study Group"? </h2>
				<p class = "description">
						UMBC Study Group is a web-based application designed to connect UMBC students
						with similar academic needs and motivations. UMBC students are able to register
						for the application, allowing them to search the databases for other students of similar
						academic pursuits to form study groups to improve their academic experience at UMBC.
				</p>
				</div>
				<div class = "sectionright">
				<br/>
				<h2> Welcome <?php echo $username ?>! </h2>

				<a class = "register" href="https://swe.umbc.edu/~muddin1/is448/deliverable5/createprofile.php"> Haven't created a profile yet? Click here to create one!</a>
				</div>
	<?php
	}
		else {
	?>
	<!-- if its not set print out this -->

			<div class = "blackBackground">

			<h1 class = "top"> UMBC Study Group </h1>
			<br/>
		</div>

			<br/>
			<br/>
			<div class = "sectionleft">

		 	<h2> What is "UMBC Study Group"? </h2>
			<p class = "description">
					UMBC Study Group is a web-based application designed to connect UMBC students
				 	with similar academic needs and motivations. UMBC students are able to register
					for the application, allowing them to search the databases for other students of similar
					academic pursuits to form study groups to improve their academic experience at UMBC.
			</p>
			</div>

			<div class = "sectionright">
			<h2> Already Have an Account? Log In. If Not, Sign Up! </h2>
			<p >
					<a class = "login" href="https://swe.umbc.edu/~nibrahi1/is448/d5/login.php"> Log In </a>
		<br/>
					<a class = "register" href="https://swe.umbc.edu/~nibrahi1/is448/d5/reg.html"> Register </a>
		<br/>
				</div>

				<img src="umbc.png" alt="UMBC logo" id = "imgUMBC"/>
	<?php
		}
	?>

</body>
</html>
