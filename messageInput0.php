<?php
session_start();

if(isset($_SESSION['login_user'])){
	$username = $_SESSION['login_user'];
}
?>
<!--Code written by Theresa Tomilson. Connects to database to insert messages into 'message' table. -->
<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title> Send a Message! </title>

	<link rel ="stylesheet" type="text/css" href="message.css" title="style" />
	<script src="confirmLogout.js" type="text/javascript"></script>

</head>

<body>
	<!--navigation bar-->
		<?php

	#appears only if variable username has been set by the session variable
	if (isset($username)){
				?>
				<div class = "blackBackground">
					<h1 class = "top"> UMBC Study Group </h1>
					<ul>
						<li> <a class = nav href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/homepage.php?username =<?php echo $username ?>" > Home </a> </li>
						<li> <a class = nav href = " https://swe.umbc.edu/~mgupta2/is448/project/scheduledisplay.php?username =<?php echo $username ?>" > Schedule </a> </li>
						<li> <a class = nav href = "https://swe.umbc.edu/~kimranr1/is448/finalproj/buddySearch.php?username =<?php echo $username ?>" > Study Buddy Search </a> </li>
						<li> <a class = nav href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/messagenav.php?login_user =<?php echo $username ?>" > Messages </a> </li>
						<li style = "float:right"> <a class = nav id = "logout" href = " https://swe.umbc.edu/~nibrahi1/is448/d5/logout.php" > Logout </a>   </li>
						<li style = "float:right"> <a class = nav href = " https://swe.umbc.edu/~muddin1/is448/deliverable5/myprofile.php?username = <?php echo $username ?>" > Profile </a>  </li>

					</ul>
					<br/>

				</div>
				<br/>
				<br/>

				  <?php
				#connects web browser to the database
					$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nibrahi1","nibrahi1","nibrahi1");

					if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
					#if values have been received in all fields, values are passed to the appropriate variable

					if (isset($_POST['recipient'])  && !empty($_POST['recipient']) &&
							isset($_POST['subject'])  && !empty($_POST['subject']) &&
							isset($_POST['message'])  && !empty($_POST['message'])){

								//html and sql injection sanitation
								$recipient = mysqli_real_escape_string($db, htmlspecialchars($_POST['recipient']));
								$subject = mysqli_real_escape_string($db, htmlspecialchars($_POST['subject']));
								$message = mysqli_real_escape_string($db, htmlspecialchars($_POST['message']));
				        $sender = mysqli_real_escape_string($db, htmlspecialchars($username));

								#insert query is constructed to pass values to the database
				        $constructed_insert = "INSERT INTO message (recipient, sender, subject, message)
				                                VALUES ('$recipient', '$sender', '$subject','$message')";



				        $result = mysqli_query($db, $constructed_insert);

				        if(! $result){
									?>
										<p>Error - message could not be sent. Username does not exist.</p> <br/>
										<p> Click <a href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/messageInput.php">here</a> to try again! <p>
									<?php

											$error = mysqli_error($db);
											exit;
				        }
								#if query is successful, following is printed
				       	else {
				          ?>
									<div class = "textAlignCenter">
				            <p> Your message has been successfully sent! </p>

										<input type="button" onclick="location.href='https://swe.umbc.edu/~kimranr1/is448/finalproj/buddySearch.php?username =<?php echo $username ?>';" value="Search Again" />
 									 <input type="button" onclick="location.href='https://swe.umbc.edu/~mgupta2/is448/project/scheduledisplay.php?username =<?php echo $username ?>';" value="View Personal Schedule" />


									<?php
				        }
					}
								#if fields were left blank, following is printed
				 		else {
										?>
														<br/>
														<br/>

														<p>One or more fields are incomplete. Click <a id = "nofields" href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/messageInput.php">here</a> to re-enter information and try again.</p>
										<?php
					        }
					}

				else{
			       ?>
			       <div class = "blackBackground">
				          <h1 class = "top"> UMBC Study Group </h1>
				          <br/>
			       </div>
				          <br/>
				          <br/>

			            <p> You are not logged in, click <a class = href = "https://swe.umbc.edu/~nibrahi1/is448/d5/login.php">here</a> to log in. </p>`
			        <?php
			    }
?>
</body>
</html>
