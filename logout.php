<?php  
require_once("functions.php"); 
require_once("session.php");

new_header(); 
$mysqli = db_connection();
if (($output = message()) !== null) {
	echo $output;
}
if(!isset($_SESSION["username"])) {
	$_SESSION["message"] = "You must login in first!";
	redirect_to("index.php");
}

 $_SESSION["username"] = NULL;
 redirect_to("index.php");
 ?>
