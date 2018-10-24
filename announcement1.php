
<?php
		// $meta_include=<<<EOD;
		require_once("functions.php");
		require_once("Mailer.php");
		new_header($meta_include); 
		$mysqli = db_connection();
	?>
<div id="secmid">
	<div  id="innercontent">
		<?php	
			if(isset($_GET['id'])&&$_GET['id']!==""){
			
					$ID = $_GET["id"];
					$query ="SELECT * FROM announcement where announcement_ID =".$ID;
					$result = $mysqli->query($query);
				}
				$url='https://turing.cs.olemiss.edu/~sdhoju/SeniorProject/announcement1.php?id='.$ID;
				// $string=$row["announcement_Text"];
				// $meta_include ='
				// 	<meta property="og:url"           content='.$url.' />
				// 	<meta property="og:type"          content="website" />
				// 	<meta property="og:title"         content='.$row["announcement_Title"].' />
				// 	<meta property="og:description"   content='.substr($string, 0, 500).' />
				// 	<meta property="og:image"         content='.$row['announcement_media'].' />
				// ';
				// EOD;
				echo $meta_include;

				if ($result && $result->num_rows > 0)  {
					$row = $result->fetch_assoc();

					echo '<div class="announcement" id="'.$row['announcement_ID'].'">';

					echo "<h3 class='announcement-post-title'>".$row['announcement_Title']."</h3>";
					echo'<div id="attachment_377" style="width: 320px" class="wp-caption alignright">';
						echo'<img id="myImg"  class="announcement-post-image-header" src="'.$row['announcement_media'].'"alt='.$row['announcement_Title'].'>';
					echo'<div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01"><div id="caption"></div></div><script src="_js/imagemodal.js"></script>';
					echo'</div>';

					echo '<p>'. $row['announcement_Text'].'</p>';

					echo '<form action="" method="post">';
						echo'<input type="submit" value="Send Email" />';
						echo'<input type="hidden" name="button_pressed" value="1" />';
					echo'</form>';
					echo'<a class="facebook-share-button" href="https://www.facebook.com/sharer/sharer.php?u='.urlencode($url).'" target="_blank">Share it in facebook</a>';
					echo'<br><a class="twitter-share-button" href="http://twitter.com/share?url='.urlencode($url).'" target="_blank">Share it in Twitter</a>';

					if(isset($_POST['button_pressed'])){
						$to=array(
							
							array(
								'name'=>'Srijana Panta',
								'email'=>'spanta1@go.olemiss.edu'
							),
						);
						$subject=$row['announcement_Title'];
						$html='<h3>'.$row['announcement_Title'].'</h3>
							<img id="myImg"  class="announcement-post-image-header" src="'.$row['announcement_media'].'"alt='.$row['announcement_Title'].'>		
							<p>'. $row['announcement_Text'].'</p>';
						$from=array('name'=>'Sameer Dhoju','email'=>'samee.dhoju@gmail.com');
						$replyto=array('name'=>'Sameer Dhoju','email'=>'samee.dhoju@gmail.com');

						$newMailer = new Mailer(true);
						$newMailer->mail($to,$subject,$html,$from,$replyto);
					}
				
					echo"</div>";
				}		
				else{
					echo "There is no Announcement";
				}
			echo "</div>";
			
		?>




				<!-- <style>
				.facebook-share-button {
					background-image: url("/_images/facebook-share-button.png");
					display: inline-block;
					height: 32px;
					width: 32px;
				}

				.facebook-share-button:active,
				.facebook-share-button:focus,
				.facebook-share-button:hover {
					background-image: url("/img/facebook-share-button-hover.png");
				}
				</style> -->
	<div class="aside">
	<div class="infoside">
		<nav id="nav_menu-2" class="sidebar contactblock widget_nav_menu">
			<h2>Sidebar Contactblock</h2><div id="menu-location-" class="menu-sidebar-contactblock-container">
				<ul id="menu-sidebar-contactblock" class="menu">
					<li id="menu-item-58" class="assist menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-58">
						<a>Contact:</a>
						<ul class="sub-menu">
							<li id="menu-item-59" class="email menu-item menu-item-type-custom menu-item-object-custom menu-item-59">
								<a href="mailto:asb@go.olemiss.edu">placeholder@go.olemiss.edu</a>
							</li>
							<li id="menu-item-60" class="phnumber menu-item menu-item-type-custom menu-item-object-custom menu-item-60">
								<a href="tel:662-000-4524">000-000-0000</a>
							</li>
							<li id="menu-item-61" class="location menu-item menu-item-type-custom menu-item-object-custom menu-item-61">
								<a href="http://map.olemiss.edu/?id=562&amp;mrkIid=11521517">Minor Hall</a>
							</li>
							<li id="menu-item-62" class="fax menu-item menu-item-type-custom menu-item-object-custom menu-item-62">
								<a>Share this:</a>
							</li>
							<li id="menu-item-63" class="twit menu-item menu-item-type-custom menu-item-object-custom menu-item-63">
								<a href="http://twitter.com/">Twitter</a>
							</li>
							<li id="menu-item-86" class="ig menu-item menu-item-type-custom menu-item-object-custom menu-item-86">
								<a href="https://www.instagram.com">Instagram</a>
							</li>
							<li id="menu-item-87" class="fb menu-item menu-item-type-custom menu-item-object-custom menu-item-87">
								<a href="http://www.facebook.com">Facebook</a>
							</li>
						</ul>
					</li>
			</ul>
			</div>
		</nav> 
	</div><!--  infoside  -->   
		<div class="infoside">

		</div><!--  infoside  -->



		<nav id="nav_menu-4" class="sidebar otherlinks widget_nav_menu">
			<h2>Sidebar Secondary Links</h2>
			<div id="menu-location-" class="menu-sidebar-secondary-links-container">
				<ul id="menu-sidebar-secondary-links" class="menu">
					<li id="menu-item-506" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-506">
						<a href="http://asb.olemiss.edu/resources/bills-resolutions/">Bills &amp; Resolutions</a>
					</li>
					<li id="menu-item-507" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-507">
						<a href="http://asb.olemiss.edu/resources/calendar-of-events/">Calendar of Events</a>
					</li>
					<li id="menu-item-508" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-508">
						<a href="http://asb.olemiss.edu/resources/applications/">Applications and Forms</a>
					</li>
				</ul>
			</div>
		</nav> 
	</div>	
<!--  aside  -->
</div>
	</div>	
	
	
</div><!-- secmid  -->



				



<?php new_footer(""); ?>