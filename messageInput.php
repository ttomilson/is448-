<?php
	session_start();

	if(isset($_SESSION['login_user'])){
		$username = $_SESSION['login_user'];
	}

?>

<!-- code written by Theresa Tomilson. Creates forms to be used by user to collect information regarding a sent message -->
<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title> Get In Contact With Your Study Buddy! </title>

	<link rel ="stylesheet" type="text/css" href="message.css" title="style" />
	<script src="messageinput.js" type="text/javascript"></script>

	<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>


</head>
<body>
<!--navigation bar-->
	<?php

#appears only if variable username has been set by the session variable
	if (isset($username)){
	?>
	<div class = "blackBackground">;
		<h1 class = "top"> UMBC Study Group </h1>
		<ul>
			<li> <a class = nav href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/homepage.php?username =<?php echo $username ?>" > Home </a> </li>
			<li> <a class = nav href = " https://swe.umbc.edu/~mgupta2/is448/project/scheduledisplay.php?username =<?php echo $username ?>" > Schedule </a> </li>
			<li> <a class = nav href = "https://swe.umbc.edu/~kimranr1/is448/finalproj/buddySearch.php?username =<?php echo $username ?>" > Study Buddy Search </a> </li>
			<li> <a class = nav href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/messagenav.php?login_user =<?php echo $username ?>" > Messages </a> </li>
			<li style = "float:right"> <a id = "logout"  class = nav href = " https://swe.umbc.edu/~nibrahi1/is448/d5/logout.php" > Logout </a>   </li>
			<li style = "float:right"> <a class = nav href = " https://swe.umbc.edu/~muddin1/is448/deliverable5/myprofile.php?username = <?php echo $username ?>" > Profile </a>  </li>

		</ul>
		<br/>
	</div>

		<br/>
		<br/>

	<h1 class = "textAlignCenter"> Get in Contact with Your Study Buddy! </h1>

	<div style = float:right>
 			<div class = "messageBorder2">
 				<form action ="" method = "">
 					<p>Enter username of recipient to quick view their profile</p>
 					<textarea name = "usernameinfo" rows = "1" cols = "20" class = "profileText" id = "usernameInfo"></textarea>
					<input type = "button" name = "View Profile" id = "viewbutton" value = "View Quick Profile"/>
				</form>
					<div id = "inputProfile"></div>
 			</div>
 		</div>
 <!-- creates forms for user to send message to another user -->
	<div class = "textAlignCenter">

		<form method="POST" action = "messageInput0.php">
			<p>
				<span class = "margins"> Recipient (username) </span> <br/>
				<textarea name="recipient" rows="1" cols="90" class = "recipientText" id="recipientname"></textarea>

				<br/>
				<br/>

				<span class = "margins">Subject</span> <br/>
					<textarea name="subject" rows="1" cols="90" class = "subjectText" id= "subjectcontent"></textarea>

				<br/>
				<br/>

				<span class = "margins">Message</span> <br/>
					<textarea name="message" rows="10" cols="90" class  = "messageText" id= "messagecontent"></textarea>

				<br/>
				<br/>

				<input type = "submit" name = "Send Message" id = "submitbutton" value = "Send Message"/>



			</p>

		</form>
	</div>

	<div id = messagedisplay> </div>





<?php
	}

	else{
	?>
		<div class = "blackBackground">

		<h1 class = "top"> UMBC Study Group </h1>
		<br/>
	</div>

		<br/>
		<br/>

			<p class = "textAlignCenter"> You are not logged in, click <a class = href = "https://swe.umbc.edu/~nibrahi1/is448/d5/login.php" >here</a> to log in. </a> </p>
		<?php
	}

?>



</body>

</html>
