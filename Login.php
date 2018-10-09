
<?php  
	// require_once("functions.php"); 
	// require_once("session.php");

	// new_header(); 
	// $mysqli = db_connection();
	if (($output = message()) !== null) {
		echo $output;
	}

	if (isset($_POST["submit"])) {
	  if (isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "") {
					$username = $_POST["username"];
					$password = $_POST["password"];
					$query = "select * from ";	
					$query .= "SOEIHuser where ";	
					$query .= "username= '".$username."'";
					$query .= "LIMIT 1;";

					$result = $mysqli->query($query);

						if ($result && $result->num_rows > 0) {

							$row = $result->fetch_assoc();		
							if(password_check($password,$row["password"])){
								$_SESSION["username"]=$row["username"];
										if($row["isAdmin"]==1){
											$_SESSION["isAdmin"]=$username;
											redirect_to("admin.php");
										}
										else{
											redirect_to("User_dashboard.php");
										}
							}
						else {
							$_SESSION["message"] = "Wrong Password not found";
							redirect_to("index.php");
						}
					}
	  else {
		$_SESSION["message"] = "Username/Password not found";
		redirect_to("index.php");
	  }
	 }
	}
?>

<link rel='stylesheet' href='_css/login.css'>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">

  <script src='js/login.js'></script>
  <form class="modal-content animate" action="index.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Username" name="username" required floating>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Password" name="password" required  floating>
        
      <button type="submit" name="submit" value="Submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

