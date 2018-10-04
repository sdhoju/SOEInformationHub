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
	readfile("header.html");

	?>


	<div  id="secmid">
		<div  id="innercontent">
		<div style="text-align:center; font-size:large; ">
		
		
		</div>
			<?php
			$query ="SELECT * FROM announcement";
			$result=$mysqli->query($query);
			echo "	<div class='announcement-items'>";
				while ($row = $result->fetch_assoc())  {
					
					echo '<div class="announcement-items announcement-post" id="'.$row['announcement_ID'].'">';
					echo "<h3 class='announcement-post-title'>".$row['announcement_Title']."</h3>";

					echo "<a href = 'announcement.php?id=".urldecode($row["announcement_ID"])."'>";
					echo '<img alt="" style=""class="announcement-post-image-header" src="'.$row['announcement_media'].'">';
					echo '</a>';
					echo '<div class="announcement-items announcement-post-creater" >Created by: '.$row['created_by']."</div>";
					echo '<div class="announcement-items announcement-post-location">At: '.$row['announcement_Location']."</div>";
					echo '<div class="announcement-items announcement-post-text">';
						echo (strlen($row['announcement_Text']) >= 500) ? 
							substr($row['announcement_Text'], 0, 500)."<a href ='announcement.php?id=".urldecode($row["announcement_ID"])."'>... Read more</a>":$row['announcement_Text'];
						echo"</div>";
					echo"</div>";
				}
			echo "</div>";
			?>
			</div>
		</div>
	</div>
</body>
