<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Week 9 Lab - CST8285</title>
        <meta charset="utf-8">
	</head>

	<body>		
					
		<form method="get" action="Week9Lab_Task1_DanyaoWang.php" >
		<table>
			<tr>
				<td>First Name</td>
				<td><input type = "text" name = "firstName" id = "firstName" size = "30"></td>
			</tr>
			
			<tr>
				<td>Last Name</td>
				<td><input type = "text" name = "lastName" id = "lastName" size= "30"></td>
			</tr>
			
			<tr>
				<td><input type = "submit" name = "btnSubmit" id="btnSubmit" value = "Submit form"></td>
				<td><input type = "reset" name = "btnReset" id="btnReset" value = "Reset form"></td>
			</tr>
			</table>
		</form>
		<?php
				$fn = @$_GET['firstName'];
				$ln = @$_GET['lastNam'];
				
				if(isset($_GET['btnSubmit'])){
					if((isset($fn)&& $fn != "")&& (!isset($ln)|| $ln == ""))
						echo "Hello ".$_GET['firstName'];
					else if((isset($ln)&& $ln != "")&& ((!isset($fn))||$fn == ""))
						echo "Welcome";
					else if((!isset($fn)&& (!isset($ln)))|| ($fn == "" && $ln==""))
						echo "Welcome";	
				}
		?>
	</body>
</html>