
<?php
	require_once("functions.php"); 
	require_once("session.php");
	new_header("header.html");
	$mysqli = db_connection();

?>
	<div  id="secmid">
		<div  id="innercontent">

			<?php
			$query ="SELECT * FROM announcement where published =1";
			$result=$mysqli->query($query);
			echo "	<div class='announcement-items'>";
				while ($row = $result->fetch_assoc())  {
					echo '<div class="announcement-items announcement-post" id="'.$row['announcement_ID'].'">';
						echo'<div id="attachment_377" style="width: 480px" class="wp-caption alignleft">';
							echo'<img class="announcement-post-image-header" src="'.$row['announcement_media'].'" alt="'.$row['announcement_Title'].'">';
							echo'<div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01"><div id="caption"></div></div><script src="_js/imagemodal.js"></script>';
						echo'</div>';
						echo "<a href = 'announcement1.php?id=".urldecode($row["announcement_ID"])."'>";
							echo "<h3 class='announcement-post-title'>".$row['announcement_Title']."</h3>";
						echo'</a>';
						// echo '<div class="announcement-items announcement-post-location">Location: '.$row['announcement_Location'].
						// '</br>Date and time: '.$row['announcement_date']." at ".$row['announcement_time']."</div>";
						echo'<b>'.$row['announcement_Location'].'<br><br>'.$row['announcement_date']." at ".$row['announcement_time'].' </b>';
						echo'<b> <br><br>CONTACT:<br>'.$row['contact_Name'].'<br>'.$row['email']." </br> ".$row['phone'].' </b>';
						echo '<p>';
						echo (strlen($row['announcement_Text']) >= 500) ? 
									substr($row['announcement_Text'], 0, 500)."<a href ='announcement.php?id=".urldecode($row["announcement_ID"])."'>... Read more</a>":$row['announcement_Text'];
								echo'</p>';

						// echo '<div class="announcement-items announcement-post" id="'.$row['announcement_ID'].'">';
						// 	echo "<a href = 'announcement1.php?id=".urldecode($row["announcement_ID"])."'>";
						// 		echo "<h3 class='announcement-post-title'>".$row['announcement_Title']."</h3>";
						// 		echo '<div class="announcement-items announcement-box" >';
						// 		echo '<img alt="" style=""class="announcement-post-image-header" src="'.$row['announcement_media'].'">
								
						echo '</div>';
							
				
					echo"</div>";
				}
			echo "</div>";
			?>

		</div>
	</div>

	
<?php new_footer(""); ?>



// if(isset($_GET['id'])&&$_GET['id']!==""){
// 					$ID = $_GET["id"];
// 					$query ="SELECT * FROM announcement where announcement_ID =".$ID;
// 					$result = $mysqli->query($query);
// 				}
// 				if ($result && $result->num_rows > 0)  {
// 					$row = $result->fetch_assoc();

// 					echo '<div class="announcement-items announcement-post" id="'.$row['announcement_ID'].'">';

// 					echo "<h3 class='announcement-post-title'>".$row['announcement_Title']."</h3>";
// 					echo'<div id="attachment_377" style="width: 320px" class="wp-caption alignright">';
// 						echo'<img id="myImg"  class="announcement-post-image-header" src="'.$row['announcement_media'].'"alt='.$row['announcement_Title'].'>';
// 					echo'<div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01"><div id="caption"></div></div><script src="_js/imagemodal.js"></script>';
// 					echo'</div>';

// 					echo '<p>'. $row['announcement_Text'].'</p>';
				
// 					echo"</div>";
// 				}		
// 				else{
// 					echo "There is no Announcement";
// 				}
// 			echo "</div>";