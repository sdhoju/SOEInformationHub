
	<?php 
		require_once("../functions.php");
		new_header(""); 
		$mysqli = db_connection();
		// if (($output = message()) !== null) {
		// 	echo $output;
		// }
		// readfile("header.html");

	?>
	<div  id="secmid">
		<div  id="innercontent">
		<div style="text-align:center; font-size:large; ">
	
		</div>

		<?php	
			if(isset($_GET['id'])&&$_GET['id']!==""){
					$ID = $_GET["id"];

					$query ="SELECT * FROM announcement where announcement_ID =".$ID;

					$result = $mysqli->query($query);
					
				}
				if ($result && $result->num_rows > 0)  {
					$row = $result->fetch_assoc();

					echo '<div class="announcement-items announcement-post" id="'.$row['announcement_ID'].'">';

					echo "<h3 class='announcement-post-title'>".$row['announcement_Title']."</h3>";
					echo'<img id="myImg"  class="announcement-post-image-header" src="'.$row['announcement_media'].'"alt='.$row['announcement_Title'].'>';
					echo'<div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01"><div id="caption"></div></div><script src="_js/imagemodal.js"></script>';

					echo '<p>'. $row['announcement_Text'].'</p>';
				
					echo"</div>";
				}		
				else{
					print_r($query);
					echo "There is no Announcements";
				}
			echo "</div>";
		?>


	</div>
		</div>
	</div>

	</body>
</html>

