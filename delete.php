<?php 
	require_once("functions.php");
	require_once("session.php");
	
	$mysqli = db_connection();
	if (($output = message()) !== null) {
		echo $output;
	}

  	if (isset($_GET["id"]) && $_GET["id"] !== "") {
 		$ID = $_GET["id"];
		$query = "Delete FROM announcement where announcement_ID =".$ID;
		$result = $mysqli->query($query); 
				
		if ($result && $mysqli->affected_rows === 1) {
			$_SESSION["message"] = "Person successfully deleted!";
			$output = message();
			echo $output;
			redirect_to("dashboard.php");
			// echo "<br /><br /><p>&laquo:<a href='index.php'>Back to Main Page</a>";

		}
		else {
		$_SESSION["message"] = "Person could not be deleted!";
		redirect_to("dashboard.php");
		exit;
		}
	}
	else {
		$_SESSION["message"] = "Person could not be found!";
		redirect_to("dashboard.php");
		exit;
	}			
?>		
						