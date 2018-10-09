<?php
		
		require_once("functions.php"); 
		require_once("session.php");
		// new_header("sada");
	$mysqli = db_connection();
	?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset='UTF-8'>
    <meta name='keywords' content='academic, university, universities, Mississippi, University of Mississippi, The University of Mississippi, Ole Miss, college, colleges, Oxford' />
    <meta name='description' content='This document and its local links copyright 2011 by the University of Mississippi.  Use for non-profit and educational purposes explicitly granted.' />
    <meta name='author' content='University of Mississippi - School of Engineering' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />-->

	<title>School of Engineering &bull; Information Hub</title>

	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' />
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' />
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' />

	<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
	<link rel='stylesheet' href='_css/style.css'>
    <link rel='stylesheet' href='custom.css'>


</head>
<body class='secondary'>
	

	<div  id="secmid">
		<div  id="innercontent">

		


	<?php  
// readfile("Login.php");
	if (($output = message()) !== null) {
		echo $output;
	}

	if (isset($_POST["submit"])) {
	  if (isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "") {
	    $username = $_POST["username"];
	    $password = $_POST["password"];

			$query = "select * from ";	
			$query .= "SOEIHuser where ";	
			$query .= "username = '".$username."'";
			$query .= "LIMIT 1;";

			$result = $mysqli->query($query);

			if ($result && $result->num_rows > 0) {

				$row = $result->fetch_assoc();		
				if(password_check($password,$row["password"])){
					$_SESSION["username"]=$row["username"];
							if($row["isAdmin"]==1){
								$_SESSION["isAdmin"]=$username;
								redirect_to("admin.php");
							}
							else{
								redirect_to("User_dashboard.php");
							}
				}
			else {
			  $_SESSION["message"] = "Wrong Password not found";
			  redirect_to("index.php");
			}
		   
	  }
	  else {
		$_SESSION["message"] = "Username/Password not found";
		redirect_to("index.php");
	  }
	 }
	}
?>
		<center>
			<h3>Login Page TODO: Make it a modal</h3>
			<label  for='center-label' class='center'>
				<form action="index.php" method="post">
				<p>&nbsp;&nbsp;Username:&nbsp;&nbsp;
					<input type="text" name="username"/>
				</p>
				<p>&nbsp;&nbsp;Password:&nbsp;&nbsp;
					<input type="password" name="password" value="" />
				</p>
				<input type="submit" name="submit" value="Submit" />
				</form>
			</label>
		</center>
			</div>
			
	</div>
</div>


