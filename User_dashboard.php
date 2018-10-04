<?php  require_once("functions.php"); 
	//require_once("session.php");

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
		<center>
		<span><a href="index.php">Feed</a></span>
		<span><a href="fill_Form.php">Fill FORM</a></span>
		<span><a href="User_dashboard.php">List Announcemnts</a></span>
	
		</center>
		<div class='row'>
			<?php
			$query ="SELECT * FROM announcement";
			$result=$mysqli->query($query);
			echo "<table>";
			echo "<tr><th>Title</th>
					<th>Created By</th>
					<th>Text</th>
					<th>Location</th>
					<th></th>
				</tr>";

				// echo "<td>&nbsp;<a href = 'ViewResident.php?id=".urldecode($row["Student_id"])."'>View</a>&nbsp;&nbsp;</td>";

				while ($row = $result->fetch_assoc())  {
					echo '<tr ">';
					$string=$row["announcement_Text"];
					echo "<td>&nbsp;<a href = 'announcement.php?id=".urldecode($row["announcement_ID"])."'>".$row['announcement_Title']."</a>&nbsp;&nbsp;</td>";

					echo "<td>".$row['created_by']."</td>";

						echo "<td>";
						echo (strlen($string) >= 500) ? 
							substr($string, 0, 500).'<a href="#">... Read more</a>':$string;
						echo"</td>";
						
						echo "<td>".$row['announcement_Location']."</td>";
						echo "<td>&nbsp;<a href = 'delete.php?id=".urldecode($row["announcement_ID"])." ' onclick='return confirm('Are you sure?');'><i class='fa fa-trash'></i>
						</a>&nbsp;&nbsp;</td>";

					echo "</tr>";
				}
			echo "</table>";
			?>
			</div>
		</div>
	</div>
</body>
