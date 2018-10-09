<?php  
require_once("final_functions.php"); 
require_once("session.php");
new_header(); 
$mysqli = db_connection();
if (($output = message()) !== null) {
	echo $output;
}
if (isset($_POST["submit"])) {
			if( (isset($_POST["username"]) && $_POST["username"] !== "") && (isset($_POST["password"]) && $_POST["password"] !== "")  ) {
				$username = $_POST["username"];
				$password = password_encrypt($_POST["password"]);
				$query = "select * from ";	
				$query .= "login2017 where ";	
				$query .= "username = '".$username."'";
				$query .= "LIMIT 1;";
			
				$result =$mysqli->query($query);
				if($result && $result->num_rows>0){
					$_SESSION["message"]= "The username already exists";
					redirect_to("addManager.php");
				}
				else {
				$query = "Insert into login2017 ";	
				$query .= "(username,password,management) ";	
				$query .= "VALUES ('".$username."', '".$password."',1);";
			
				$result =$mysqli->query($query);
				if($result){
					$_SESSION["message"]="User sucessfully created";
					redirect_to("addManager.php");
				}
				else{
					$_SESSION["message"]="Couldnt add User";
					redirect_to("addManager.php");
				}	
			}
		
			}}

if (!isset($_SESSION["username"])) {
	$_SESSION["message"] = "You must log in first";
	redirect_to("index2017.php");
}



?>

   <div id="page">
   <br /><br />
   	<div class='row'>
		<label for='left-label' class='left inline'>

		<h2>Add a Manager</h2>

<!--//////////////////////////////////////////////////////////////////////////////////////////////// -->
<!--    Step 2. Create a form with textboxes for adding both a username and password -->
	
		<form action="addManager.php" method="post">
				<p>Username:<input type="text" name="username" value="" /></p>
				<p>Password:<input type="password" name="password" value="" /></p>
			
			<input type="submit" name="submit" class="button tiny round" value="Add Administrator" />
		</div>
		</form>	
	
			<p><br /><br /><hr />
			<h2>Current Managers</h2>

			<?php
			$query = "Select * from login2017 where management=1;";
			$result =$mysqli->query($query);
	
			if($result && $result->num_rows>0){
			
				echo "<table>";
			
					while($row=$result->fetch_assoc()){
					echo"<tr>";
					echo "<td>".$row["username"]."</td>";
					//echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='deleteLogin.php?id=".$row["id"]."'> Delete </a></td>";
					echo"</tr>";
					
					}
					echo"</table><hr /><br /><br />";
			}
				
			
			
			?>

	</div>
	</label>
   
   
   	<br /><p>&laquo:<a href='management.php'>Back to Manage Content</a>

   	</div>

<?php new_footer($mysqli); ?>
