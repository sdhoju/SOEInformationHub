<?php 
	require_once("functions.php"); 
	require_once("session.php");
	require_once("Mailer.php");

	new_header(); 
	$mysqli = db_connection();

	if (($output = message()) !== null) {
		echo $output;
		$output=null;
	}
	// if (!isset($_SESSION["username"]) || !isset($_SESSION["isAdmin"])) {
	// 	$_SESSION["message"] = "You must log in first";
	// 	redirect_to("admin.php");
	// }
	
	// new_header("header.html");
	?>

	<div  id="secmid">
		<div  id="innercontent">
		<h1 style="font-size:2em; text-align:center;">ADMIN PAGE Dashboard. More Functionality to be added</h1>
		<div class='row'>
			<?php
			$admin = $_SESSION["isAdmin"];
			echo "Hi ".$admin;
			echo "<a href='logout.php'>  logout</a>";
			$query ="SELECT * FROM announcement order by published;";
			$result=$mysqli->query($query);
			echo "<table class='admin_dashboard'>";
			echo "<tr><th>Title</th>
					<th>Created By</th>
					<th>Text</th>
					<th>Location</th>
					<th>Delete</th>
					<th>Email</th>
				</tr>";

				// echo "<td>&nbsp;<a href = 'ViewResident.php?id=".urldecode($row["Student_id"])."'>View</a>&nbsp;&nbsp;</td>";

				while ($row = $result->fetch_assoc())  {
					echo '<tr ">';
					$string=$row["announcement_Text"];
					echo "<td><a href = 'announcement1.php?id=".urldecode($row["announcement_ID"])."'>".$row['announcement_Title']."</a></td>";

					echo "<td>".$row['contact_Name']."</td>";
						
						echo "<td>";
						echo (strlen($string) >= 500) ? 
							substr($string, 0, 500).'<a href="#">... Read more</a>':$string;
						echo"</td>";
						
						echo "<td>".$row['announcement_Location']."</td>";
						echo "<td>&nbsp;<a href = 'delete.php?id=".urldecode($row["announcement_ID"])." ' onclick='return confirm('Are you sure?');'><i class='fa fa-trash'></i>
						</a>&nbsp;&nbsp;</td>";
						$class='unpublished-button';
						$value = 'Publish';

						if($row["published"]==1){
							$class='published-button';
							$value = 'Unpublish';
						} 
						
						echo '<td><form action="" method="post">';
							echo'<input type="submit" value='.$value.' class='.$class.'>';
							echo'<input type="hidden" name="button_pressed" value='.$row["announcement_ID"].' />';
						echo'</form></td>';
						
					
					echo "</tr>";
				}
			echo "</table>";
			?>
			</div>
		</div>
	</div>
</body>


<?php
if(isset($_POST['button_pressed']))
{	
	$query ="UPDATE announcement SET published = IF(published=1, 0, 1)where announcement_ID=".$_POST['button_pressed'];
	$result=$mysqli->query($query);
	header("Refresh:0");

	// print_r($_POST['button_pressed']);
}

// UPDATE announcement SET published = IF(published=1, 0, 1)where announcement_ID=123457;
// if(isset($_POST['button_pressed']))
			// {
			// 	$to=array(
			// 		array(
			// 			'name'=>$_POST["contact_Name"],
			// 			'email'=>$_POST["email"]
			// 		),
			// 	);
			// 	$subject=$row['announcement_Title'];
			// 	$html=$row["announcement_Text"];
			// 	$from=array('name'=>'School of Engineering','email'=>'samee.dhoju@gmail.com');
			// 	$replyto=array('name'=>'Sameer Dhoju','email'=>'samee.dhoju@gmail.com');

			// 	$newMailer = new Mailer(true);
			// 	$newMailer->mail($to,$subject,$html,$from,$replyto);
			// }

			
?>