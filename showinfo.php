<?php
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","nibrahi1","nibrahi1","nibrahi1");

if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
	$user=$_GET["username"];
	//create select statement that pulls profile information from preferences

	$select_query = "SELECT major, year, housing, studyGroupSize, studyEnvironment from preferences where username = '$user'";
	$result = mysqli_query($db, $select_query);

	$select_name = "SELECT fname, lname, email FROM users where username = '$user'";
	$result2 = mysqli_query($db, $select_name);

	if(!$result || !$result2){
		?>
			<p class = "textAlignCenter"> Sorry, this user doesn't have a profile! Please check to make sure the correct username was entered. </p>
		<?php
			$error = mysqli_error($db);
			print "<p> . $error . </p>";
			exit;
		}

else {
	$num_rows =  mysqli_num_rows($result);
		if($num_rows != 0){

			for($row_num = 0; $row_num < $num_rows; $row_num++){
				$row_array = mysqli_fetch_array($result);
				$row_array2 = mysqli_fetch_array($result2);
		?>
				<div id = "messagecolor">
					<br/>
							<h2 style = text-align:center> Profile </h3>
								<p>
							<div style = text-align:left>
													<span class = "underlineText">Name:</span> <?php echo $row_array2["fname"];?> <?php echo $row_array2["lname"];?>  <br/> <br/>
													<span class = "underlineText">Email:</span>    <?php echo $row_array2["email"]; ?> <br/><br/>
												 <span class = "underlineText">Major:</span>    <?php echo $row_array["major"]; ?> <br/><br/>
												 <span class = "underlineText">Year:</span>  <?php echo $row_array["year"]; ?> <br/><br/>
												 <span class = "underlineText">Housing:</span>	<?php echo $row_array["housing"]; ?> <br/><br/>
												 <span class = "underlineText">Preferred Study Environment:</span> 		<?php echo $row_array["studyEnvironment"]; ?> <br/><br/>
												 <span class = "underlineText">Preferred Study Group Size:</span> 		<?php echo $row_array["studyGroupSize"]; ?> <br/>

								</p>
							</div>
				</div>



<?php
}

}
}


?>

</body>
</html>
