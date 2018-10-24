<?php
//    if(isset($_FILES['image'])){
//       $errors= array();
//       $file_name = $_FILES['image']['name'];
//       $file_size = $_FILES['image']['size'];
//       $file_tmp = $_FILES['image']['tmp_name'];
//       $file_type = $_FILES['image']['type'];
//       $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
//       $extensions= array("jpeg","jpg","png");
      
//       if(in_array($file_ext,$expensions)=== false){
//          $errors[]="extension not allowed, please choose a JPEG or PNG file.";
//       }
      
//       if($file_size > 2097152) {
//          $errors[]='File size must be excately 2 MB';
//       }
      
//       if(empty($errors)==true) {
//          move_uploaded_file("_images/uploads/".$file_name);
// 		 echo "Success";
// 		 echo$file_tmp,"_images/".$file_name;
//       }else{
//          print_r($errors);
//       }
//    }


   $uploaddir = "";
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

		echo '<pre>';
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			echo "Success.\n";
		} else {
			echo "Failure.\n";
		}

		echo 'Here is some more debugging info:';
		print_r($_FILES);
		print "</pre>";
?>
<html>
   <body>
	  
   <form enctype="multipart/form-data" action="playground.php" method="POST">
  <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
  <input name="userfile" type="file" />
  <input type="submit" value="Go" />
</form>

      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
			
      </form>
      
   </body>
</html>