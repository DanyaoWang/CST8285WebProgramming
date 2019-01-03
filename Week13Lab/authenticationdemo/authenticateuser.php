<?php 
	require_once 'WPEateryDAO.php';
	require_once 'AdminUser.php';
	
	if(isset($_POST['submit'])){
		if(isset($_POST['username']) && isset($_POST['password'])){
			if($_POST['username'] != '' && $_POST['password'] != ''){
				$adminuser = new AdminUser($_POST['username'], $_POST['password']);
				if($adminuser->isAuthenticated()){
					echo '<h3 style=\'color:blue;\'>User is authenticated.</h3>';
				} else {
					echo '<h3 style=\'color:red;\'>User is NOT authenticated.</h3>';
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Authenticate User Test</title>
	</head>
	<body>
	<?php if(isset($userAdded)){
			if($userAdded){
				echo '<h3 style=\'color:blue;\'>User Added!</h3>';
			}
	}?>
		<form name="authenticateuser" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<table>
				<tr>
					<td>Username:</td>
					<td><input name="username" id="username" type="text"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" id="password"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" id="submit" value="Add User"></td>
				</tr>
			</table>
		</form>
	</body>
</html>