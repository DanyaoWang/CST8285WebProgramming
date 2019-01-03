<!DOCTYPE html>
<html>
	<head>
		<title>Hash Test</title>
	</head>
	<body>
<?php
	if(isset($_POST['action'])){

      if($_POST['name'] != '' && $_POST['email'] != ''){
         $email = $_POST['email'];
         echo "This is the email supplied by the user - <b>$email</b>";
         //Now we are going to hash the password
         $hash = password_hash($email, PASSWORD_DEFAULT);
         echo "<p>This is that same value after we use the password_hash function - <b>$hash</b> - <i>This is the value we should store in the database</i>.";

         // Now we need to deal with the file upload
         //the target_path is where we want the file moved too
    	 $target_path = "files/";
    	 $target_path = $target_path . basename( $_FILES['myfile']['name']);

	     if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
	        $fileUploaded = "The file ".  basename( $_FILES['myfile']['name']). " has been uploaded";
	        echo "<p>$fileUploaded</p>";
	     } else{
	        echo "There was an error uploading the file, please try again!";
	     }

      }

	}else
	{
	   echo '<p>No good</p>';
	}
?>


</body>
</html>


