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
	<?php  require_once("functions.php"); 
	require_once("session.php");
	$mysqli = db_connection();
	readfile('header.html')
	?>


	<div  id="secmid">
		<div  id="innercontent">
			<?php
			echo "<div class='form'><center>";
			echo "<h1>Tell us about Your announcement</h1>";
			if (isset($_POST["submit"])) {
				if( (isset($_POST["created_by"]) && $_POST["created_by"] !== "") && (isset($_POST["announcement_Title"]) && $_POST["announcement_Title"] !== "") && (isset($_POST["announcement_Text"]) && $_POST["announcement_Text"] !== "") &&(isset($_POST["announcement_Location"]) && $_POST["announcement_Location"] !== "") ){
					
					$_POST["created_by"] = $mysqli->real_escape_string($_POST["created_by"]);
					$_POST["announcement_Title"] = $mysqli->real_escape_string($_POST["announcement_Title"]);
					$_POST["announcement_Text"] = $mysqli->real_escape_string($_POST["announcement_Text"]);
					$_POST["announcement_Location"] = $mysqli->real_escape_string($_POST["announcement_Location"]);
					$announcement_ID=time();
					$query = "insert into announcement values('";
					$query .= $announcement_ID."', ";
					$query .= "'".$_POST["created_by"]."', ";
					$query .= "'".$_POST["announcement_Title"]."', ";
					$query .= "'".$_POST["announcement_Text"]."', ";
					$query .= "'".$_POST["announcement_Location"]."', ";
					$query .= "'".$_POST['announcement_media']."');";

					$result = $mysqli->query($query); 
					// print_r($result." Nothing ".$query);

					if($result) {
		
						$_SESSION["message"] = $_POST["announcement_Title"]." has been created";
							header('Location: https://turing.cs.olemiss.edu/~sdhoju/SeniorProject/announcement.php?id='.$announcement_ID);
							exit;
					}
					else {
		
						$_SESSION["message"] = "Error! Could not change ".$_POST["announcement_Title"].$query;
					}

				}
				else {
					$_SESSION["message"] = "Unable to create Announcement. Fill in all information!";
					exit;
				}
			}
			else {
				echo "<form action='fill_Form.php' method='post'>";
				echo"<table id='t01'>";
					echo "<tr><td>Creater : </td><td><input type = text name ='created_by' value= '' /></td></tr>";
					echo "<tr><td>Title: </td><td><input type = text name ='announcement_Title' value='' /></td></tr>";
					echo "<tr><td>Description : </td><td><textarea   name ='announcement_Text' value=''></textarea></td></tr>";
					echo "<tr><td>Location: </td><td><input type = text name ='announcement_Location' value='' /></td></tr>";
					echo "<tr><td>Poster: </td><td><input type = text name ='announcement_media' value='' /></td></tr>";
					echo "<td ></td><td><input type= 'submit' name= 'submit' value= 'Submit'  />    <a href='index.php'>Cancel</a><td>";
					echo "";
				echo"</table>";			
				echo"</form></center>";

			}
			?>
			</div>
		</div>
	</div>
</body>
