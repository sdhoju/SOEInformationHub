<?php  
	require_once("functions.php"); 
	
	new_header(); 
	$mysqli = db_connection();
	if (($output = message()) !== null) {
		echo $output;
	}


?>