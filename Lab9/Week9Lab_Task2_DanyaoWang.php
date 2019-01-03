<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Week 9 Lab - CST8285</title>
        <meta charset="utf-8">
	</head>
	<body>		
					
		<form method="post" action="Week9Lab_Task2_DanyaoWang.php" >
		<table>
			<tr>
				<td>Temperature</td>
				<td><input type= "text" name = "temperature" id= "temperature"></td>
			</tr>
			
			<tr>
				<td>unit</td>
				<td>fahrenheit<input type="radio" name= "unit" id="unitF" value ="fahrenheit" ><br>
				celsius<input type = "radio" name = "unit" id = "unitC" value = "celsius"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name ="btnSubmit" id = "btnSubmit" value = "convert"></td>
			</tr>
			
		</table>
		</form>
		
		<?php
			$temp = @$_POST['temperature'];
			$unt = @$_POST['unit'];
			function ConvertFunction($temp, $unt){
				if($unt === 'fahrenheit'){
					$tempafter = $temp * 1.8 +32;
					print($temp. ' degrees in celsius is equal to '. $tempafter. ' degrees in farenheit!</br>');
				}
				if($unt === 'celsius'){
					$tempafter = ($temp -32)/1.8;
					print($temp.' degrees in Farenheit is equal to '. $tempafter. ' degrees in celsius!</br>');
				}	
			}
			
			if(isset($_POST['btnSubmit'])&& isset($temp)){
					if(!(is_numeric($temp))){
						echo "You must input a number to be converted.";
					}else{
						if(isset($unt))
							ConvertFunction($temp, $unt);
						else
							echo "You must choose a temperature unit first.";
					}
			}
			
			?>
		</body>
</html>						