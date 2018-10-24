
<?php
	require_once("functions.php"); 
	new_header("header.html");
	require_once("session.php");
	require_once("Mailer.php");


	$mysqli = db_connection();

		if (isset($_POST["submit"])) {
			
			if( (isset($_POST["contact_Name"]) && $_POST["contact_Name"] !== "") 
			&&(isset($_POST["email"]) && $_POST["email"] !== "") 

			&&(isset($_POST["announcement_Title"]) && $_POST["announcement_Title"] !== "") 
			&& (isset($_POST["announcement_Text"]) && $_POST["announcement_Text"] !== "")
			&&(isset($_POST["announcement_Location"]) && $_POST["announcement_Location"] !== "")
			&&(isset($_POST["announcement_date"]) && $_POST["announcement_date"] !== "")
			&&(isset($_POST["announcement_time"]) && $_POST["announcement_time"] !== "")
			){
			
				$_POST["contact_Name"] = $mysqli->real_escape_string($_POST["contact_Name"]);
				$_POST["email"] = $mysqli->real_escape_string($_POST["email"]);
				$_POST["phone"] = $mysqli->real_escape_string($_POST["phone"]);
				$_POST["S_organization"] = $mysqli->real_escape_string($_POST["S_organization"]);

				$_POST["announcement_Title"] = $mysqli->real_escape_string($_POST["announcement_Title"]);
				$_POST["announcement_Text"] = $mysqli->real_escape_string($_POST["announcement_Text"]);
				$_POST["announcement_Location"] = $mysqli->real_escape_string($_POST["announcement_Location"]);
				
				$announcement_ID=time();
				$query = "insert into announcement values('";
				$query .= $announcement_ID."', ";
				$query .= "'".$_POST["contact_Name"]."', ";
				$query .= "'".$_POST["email"]."', ";
				$query .= "'".$_POST["phone"]."', ";
				$query .= "'".$_POST["S_organization"]."', ";
				$query .= "'".$_POST["announcement_Title"]."', ";
				$query .= "'".$_POST["announcement_Text"]."', ";
				$query .= "'".$_POST["announcement_Location"]."', ";
				$query .= "'".$_POST["announcement_date"]."', ";
				$query .= "'".$_POST["announcement_time"]."', ";
				$query .= "'".$_POST['announcement_media']."', 0);";

				$result = $mysqli->query($query); 
				// print_r($result." Nothing ".$query);

				if($result) {
					$_SESSION["message"] = $_POST["announcement_Title"]." has been created";
					
						$to=array(
							array(
								'name'=>$_POST["contact_Name"],
								'email'=>$_POST["email"]
							),
						);
						$subject="Sumbission Received";
						$html='Thank you for submitting about'.$_POST["announcement_Title"].'. SOE will get to it soon.';
						$from=array('name'=>'School of Engineering','email'=>'samee.dhoju@gmail.com');
						$replyto=array('name'=>'Sameer Dhoju','email'=>'samee.dhoju@gmail.com');

						$newMailer = new Mailer(true);
						$newMailer->mail($to,$subject,$html,$from,$replyto);
					
					header("Location: index.php");	
				}
				// else {
				// 	$_SESSION["message"] = "Error! Could not change ".$_POST["announcement_Title"].$query;
				// 	redirect_to('announcement1.php?id='.$announcement_ID);
				// 	exit;
				// }
		}
		else {
			
			$_SESSION["message"] = "Required information Missing";
			// redirect_to('fill_Form.php');
			header("Location: fill_Form.php");
			// exit;
		}
}
?>
		
	<div  id="secmid">
		<div  id="innercontent">
		<div class='form'>
            <center>
			<form action='' method='post'>
				<?php
					if (($output = message()) !== null) {
						echo '<center>'.$output.'</center>';
						$output=null;
					}
				?>
                     <h3 style="font-size: 2em;">Tell us about Your announcement</h3>
				<table id='t01'>
					<tr><td>Creater's Name <span class="asterisk">*</span> </td><tr></tr><td><input type = text name ='contact_Name' value= '' /></td></t>
					<tr><td>Contact Email <span class="asterisk">*</span></td><tr></tr><td><input type = text name ='email' value= '' /></td></tr>
					<tr><td> ContactPhone  </td><tr></tr><td><input type = text name ='phone' value= '' /></td></tr>
					<tr><td>Organization  </td><tr></tr><td><input type = text name ='Organization' value= '' /></td></tr>

					<tr><td>Event's Title <span class="asterisk">*</span> </td><tr></tr><td><input type = text name ='announcement_Title' value='' /></td></tr>
					<tr><td>Event's Description <span class="asterisk">*</span> </td><tr></tr><td><textarea   name ='announcement_Text' value=''></textarea></td></tr>
					<!-- // echo "<tr><td>Major</td>";
					// 	echo '<td>';
					// 		echo' <input type="checkbox" name="major" value="Chemical Engineering" checked="checked"> Chemical Engineering<br>';
					// 		echo' <input type="checkbox" name="major" value="Computer Science" checked="checked"> Computer Science<br>';
					// 		echo' <input type="checkbox" name="major" value="Electrical Engineering" checked="checked"> Electrical Engineering<br>';
					// 		echo' <input type="checkbox" name="major" value="General Engineering" checked="checked"> General Engineering<br>';
					// 		echo' <input type="checkbox" name="major" value="Mechanical Engineering" checked="checked"> Mechanical Engineering<br>';
					// 		echo' <input type="checkbox" name="major" value="Biomedical Engineering" checked="checked"> Biomedical Engineering<br>';
					// 		echo' <input type="checkbox" name="major" value="Civil Engineering" checked="checked"> Civil Engineering<br>';
					// 		echo' <input type="checkbox" name="major" value="Geological Engineering" checked="checked"> Geological Engineering<br>';
					// 		echo' <input type="checkbox" name="major" value="Geology" checked="checked"> Geology<br>';
					// 	echo '</td>';
					// echo "</tr>";  -->
					<tr><td>Location <span class="asterisk">*</span> </td><tr></tr><td><input type = text name ='announcement_Location' value='' /></td></tr>
					<tr><td>Date <span class="asterisk">*</span> </td><tr></tr><td><input type = text name ='announcement_date' value='' /></td></tr>
					<tr><td>Time <span class="asterisk">*</span> </td><tr></tr><td><input type = text name ='announcement_time' value='' /></td></tr>

					<tr><td>Attachment </td><tr></tr><td><input type = text name ='announcement_media' value='' /></td></tr>
					<td><input class="form_submit_button" type= 'submit' name= 'submit' value= 'Submit'/> &nbsp;&nbsp;&nbsp;&nbsp;  <a href='index.php'>Cancel</a> <td>
					
					
				</table>		
            </form> 
            </center>
		</div>
	</div>
</div>
<?php new_footer(""); ?>
