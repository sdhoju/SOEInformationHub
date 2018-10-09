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
		require_once("session.php");
		new_header("header.html");

	$mysqli = db_connection();
	?>

	<div  id="secmid">
		<div  id="innercontent">


		<div style="text-align:center; font-size:large; ">
		</div>
			<?php
			$query ="SELECT announcement_ID,announcement_Title,announcement_Text,announcement_Location,
							announcement_date,announcement_time,announcement_media,
							first_name, last_name,email,phone,Student_organization FROM announcement natural join SOEIHuser";
			$result=$mysqli->query($query);
			echo "	<div class='announcement-items'>";
				while ($row = $result->fetch_assoc())  {
					
					echo '<div class="announcement-items announcement-post" id="'.$row['announcement_ID'].'">';
					
						echo "<a href = 'announcement.php?id=".urldecode($row["announcement_ID"])."'>";
							echo "<h3 class='announcement-post-title'>".$row['announcement_Title']."</h3>";
							echo '<div class="announcement-items announcement-box" >';
							echo '<img alt="" style=""class="announcement-post-image-header" src="'.$row['announcement_media'].'"></a>';
					
						echo '<div class="announcement-items announcement-post-creater" >';
							echo'Created by: '.$row['first_name']." ".$row['last_name'].'('.$row['Student_organization'].')';
							echo'</br>'.$row['email'];
							echo "</br> ".$row['phone'];

						echo"</div>";

						echo '<div class="announcement-items announcement-post-location">Location: '.$row['announcement_Location'].'</br>Date and time: '.$row['announcement_date']." at ".$row['announcement_time']."</div>";
						echo '</div>';
					
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
