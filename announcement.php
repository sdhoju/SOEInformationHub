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

	<?php 
		require_once("functions.php");
		// new_header("Dhoju Sameer Final Project !", ""); 
		$mysqli = db_connection();
		// if (($output = message()) !== null) {
		// 	echo $output;
		// }
		readfile("header.html");

	?>
	<div  id="secmid">
		<div  id="innercontent">
		<div style="text-align:center; font-size:large; ">
		
		<span><a href="index.php">Feed</a></span>
		<span><a href="fill_Form.php">Fill FORM</a></span>
		<span><a href="User_dashboard.php">List Announcemnts</a></span>
	
		</div>
		<?php
		echo "<div class='row'>";
			
		if(isset($_GET['id'])&&$_GET['id']!==""){
				$ID = $_GET["id"];
				$query = "SELECT * FROM announcement  where announcement_ID =".$ID;
				$result = $mysqli->query($query);
				
			}
			if ($result && $result->num_rows > 0)  {
				$row = $result->fetch_assoc();


				echo '<div class="announcement-items announcement-post" id="'.$row['announcement_ID'].'">';
				echo '<img alt="" class="announcement-post-image-header" src="'.$row['announcement_media'].'">';
				echo "<h3 class='announcement-post-title'>".$row['announcement_Title']."</h3>";
				echo '<div class="announcement-items announcement-post-creater" >Created by: '.$row['created_by']."</div>";
				echo '<div class="announcement-items announcement-post-location">At: '.$row['announcement_Location']."</div>";
				echo '<div class="announcement-items announcement-post-text">';
					echo $row['announcement_Text'];
					echo"</div>";
				echo"</div>";
				// echo "<h2>:".$row["announcement_Title"]."</h2>";
			}		
			else{
				echo "There is no Announcement";
			}
		echo "</div>";
	?>
	</div>
		</div>
	</div>
	</body>
</html>

