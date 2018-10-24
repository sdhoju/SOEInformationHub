<?php
	require_once("functions.php"); 
	require_once("session.php");

	new_header();
	$mysqli = db_connection();
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
						redirect_to("dashboard.php");
							// if($row["isAdmin"]==1){
							// 	$_SESSION["isAdmin"]=$username;
							// 	redirect_to("dashboard.php");
							// }
							// else{
							// 	redirect_to("dashboard.php");
							// }
				}
				else {
				$_SESSION["message"] = "Wrong Password not found";
				redirect_to("admin.php");
			}
		}
		else {
			$_SESSION["message"] = "Username/Password not found";
			redirect_to("admin.php");
	 	}
	 }
	}
?>

<div  id="secmid">
	<div  id="innercontent">
			<h3>Login Page TODO: Make it a modal</h3>
			<label  for='center-label' class='center'>
				<form action="admin.php" method="post">
					<p>&nbsp;&nbsp;Username:&nbsp;&nbsp;
						<input type="text" name="username"/>
					</p>
					<p>&nbsp;&nbsp;Password:&nbsp;&nbsp;
						<input type="password" name="password" value="" />
					</p>
					<input type="submit" name="submit" value="Submit" />
				</form>
			</label>
		</div>
	</div>
</div>


