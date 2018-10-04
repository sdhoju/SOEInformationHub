<?php  
	require_once("functions.php"); 
	//require_once("session.php");

	new_header(); 
	$mysqli = db_connection();
	if (($output = message()) !== null) {
		echo $output;
	}

	if (isset($_POST["submit"])) {
	  if (isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "") {
	    $username = $_POST["username"];
	    $password = $_POST["password"];
////////////////////////////////////////////////////////////////////////////////////
//IMPLEMENT TAKE-HOME Part c.
//  Define and execute the query to verify that this username is in the database table login2017 
		//USE the variables $query and $result

			$query = "select * from ";	
			$query .= "login2017 where ";	
			$query .= "username = '".$username."'";
			$query .= "LIMIT 1;";
		
		
		
		//Execute query
		$result = $mysqli->query($query);
///////////////////////////////////////////////////////////////////////////////////
		
	  //Check whether the username is found - if so, $result will have a value
      if ($result && $result->num_rows > 0) {
			$row = $result->fetch_assoc();		
			if(password_check($password,$row["password"])){
				$_SESSION["username"]=$row["username"];
				if($row["management"]==1){
					$_SESSION["management"]=$username;
					redirect_to("management.php");
				}
				else{
					redirect_to("renter.php");
					}
				}
			
			else {
			  $_SESSION["message"] = "Wrong Password not found";
			  redirect_to("index2017.php");
			}
		   
	  }
	  else {
		$_SESSION["message"] = "Username/Password not found";
		redirect_to("index2017.php");
	  }
	 }
	}
?>

	
			<h3>Welcome to Hooper Hollow Cottages!</h3>
			<label  for='center-label' class='center'>

			<form action="index2017.php" method="post">
			  <p>&nbsp;&nbsp;Username:&nbsp;&nbsp;
				<input type="text" name="username"  />
			  </p>
			  <p>&nbsp;&nbsp;Password:&nbsp;&nbsp;
				<input type="password" name="password" value="" />
			  </p>
			  <input type="submit" name="submit" value="Submit" class="tiny round button" />
			</form>
			</label>
			</div>
	</div>
</div>

<?php new_footer($mysqli); ?>
