<?php
	session_start();

	if(isset($_SESSION['login_user'])){
		$username = $_SESSION['login_user'];
	}
?>


<!--Code written by Theresa Tomilson. Link in the navigation bar of website. Redirects user to space that allows them to navigate their sent and received messages or create new ones -->
<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title> View Messages </title>

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
							<li style = "float:right"> <a id = "logout"class = nav href = " https://swe.umbc.edu/~nibrahi1/is448/d5/logout.php" > Logout </a>   </li>
							<li style = "float:right"> <a class = nav href = " https://swe.umbc.edu/~muddin1/is448/deliverable5/myprofile.php?username = <?php echo $username ?>" > Profile </a>  </li>

        		</ul>
					</br>
          </div>
          <br/>
          <br/>

              <p>
                <a id = sent href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/sentmessages.php?username =<?php echo $username ?>"> View sent messages</a>
                  <br/>
                  <br/>

                <a id = recieved href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/receivedmessages.php?username =<?php echo $username ?>">View recieved messages</a>
                  <br/>
                  <br/>

                <a id = create href = "https://swe.umbc.edu/~there2/is448/projectCode/deliverable5/messageInput.php?username =<?php echo $username ?>">Create new messages</a>
						</p>
          <?php

  }

  else {
        ?>
        <div class = "blackBackground">

        <h1 class = "top"> UMBC Study Group </h1>
        <br/>
        </div>

        <br/>
        <br/>

          <p> You are not logged in, click <a href = "https://swe.umbc.edu/~nibrahi1/is448/d5/login.php">here</a> to log in. </p>
        <?php
        }
?>
</body>
</html>
