<!DOCTYPE html>
<html>
	<head>
		<title>Week 13 Demo Hashing and File Upload</title>
	</head>
	<body>
    <p><b>Week 13 Demo Hashing and File Upload</b></p>

	<form name="login" method="POST" action="password.php" enctype="multipart/form-data">
	<table border="1">
	   <tr>
	      <td>Name:</td>
	      <td><input type="text" name="name" value=""></td>
	   </tr>
	   <tr>
	      <td>
	         Email:
	      </td>
	      <td>
	         <input type="text" name="email" value="">
	      </td>
	   </tr>
	   <tr>
	      <td>
	         File:
	      </td>
	      <td>
	         <input type="file" name="myfile" value="">
	      </td>
	   </tr>
	   <tr>
	      <td colspan="2">
	         <input type="submit" name="action" value="Submit">
	      </td>
	   </tr>
	</table>
	</form>

</body>
</html>