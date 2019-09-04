<?php
	session_start();

	if(isset($_SESSION['login_user'])){
		$username = $_SESSION['login_user'];
	}
?>
<!-- Written by Theresa Tomilson. Displays all messages sent to the user-->
<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>


  <title> View Received Messages </title>

	<link rel ="stylesheet" type="text/css" href="message.css" title="style" />
	<script src="sentmessage.js" type="text/javascript"></script>


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
      //query messages to be displayed. messages sent to user only

          $db = mysqli_connect("studentdb-maria.gl.umbc.edu","nibrahi1","nibrahi1","nibrahi1");

          if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");


          //create select statement that pulls all messages

          $select_query = "SELECT * from message where recipient = '$username'";

          $result = mysqli_query($db, $select_query);


          if(!$result){
          ?>
            <p class = "textAlignCenter"> Sorry, you have no messages! </p>
          <?php
            $error = mysqli_error($db);
            print "<p> . $error . </p>";
            exit;
          }

          $num_rows =  mysqli_num_rows($result);
            if($num_rows != 0){
        ?>
                <h1> Received Messages </h1>
        <?php
            }

            for($row_num = 0; $row_num < $num_rows; $row_num++){
              $row_array = mysqli_fetch_array($result);
        ?>
              <div id = "messagebackground" class  = "messageBorder">

                      <p class = "message">
                               <span id = "subjectmatter" class = "underlineText">Subject:</span>    <?php echo $row_array["subject"]; ?> <br/> <br/>
                               <span id = "sender" class = "underlineText">Sent from:</span>  <?php echo $row_array["sender"]; ?> <br/> <br/>
                               <span class = "underlineText">Message:</span><br/><br/> 		<?php echo $row_array["message"]; ?> <br/>
                      </p>

              </div>
							<br/>
							<br/>
							<br/>
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

              <p> You are not logged in, click <a href = "https://swe.umbc.edu/~nibrahi1/is448/d5/login.php">here</a> to log in. </p>`
          <?php
      }
			?>
</body>
</html>
