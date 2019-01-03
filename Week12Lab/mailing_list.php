<?php
/*
 *  @author:Danyao Wang
 */
 
require_once('header.php');
require_once('dao/customerDAO.php');
require_once('WebsiteUser.php');


session_start();
session_regenerate_id(false);


if(isset($_SESSION['AdminID'])){
    if(!$_SESSION['websiteUser']->isAuthenticated()){
       header('Location:userlogin.php'); 
    }
} else {
    header('Location:userlogin.php');
}


$customerDAO = new customerDAO;
$customers = $customerDAO->getCustomers();
/*
if ($customers) {
    echo '<h3>'.'<span style=\'color:red\'>'.'You signned up successfully! '.'</span>'.'</h3>';
    echo '<table border = \'1\'>';
    echo '<tr>';
    echo '<th>customer</th>';
    echo '<th>phone number</th>';
    echo '<th>email address</th>';
    echo '<th>referrer</th>';
    echo '</tr>';

    foreach ($customers as $customer) {
        echo '<tr>';
        echo '<td>' . $customer->getName() . '</td>';
        echo '<td>' . $customer->getPhone() . '</td>';
        echo '<td>' . $customer->getEmail() . '</td>';
        echo '<td>' . $customer->getReferrer() . '</td>';
        echo '</tr>';
    
    }
    echo '</table>';
}
else{ 
		echo '<h3>'.'There is no mailing in the list now'.'</h3>';
}
*/
		
		echo '<div>'.'Session AdminID = ' . $_SESSION['websiteUser']->getID().'</div>';
		if ($_SESSION['websiteUser']->getLastLogin()!=null){
			date_default_timezone_set('America/Toronto');
			$_SESSION['Lastlogin'] = date('m/d/Y');
			echo '<div>'.'Last Login Date = '. $_SESSION['Lastlogin'] .'</div>';
		}else{
			echo '<div>'.'This is your first time to login in'.'</div>';
		}
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		$connect = mysqli_connect("127.0.0.1","wp_eatery", "password","wp_eatery");
		$query= 'SELECT *FROM MailingList';
		$result = $connect->query($query);
		echo '<table style= \"text-align：center;\" border ="1">';
		echo '<tr>';
		echo '<th>Customer name</th>';
		echo '<th>Phone</th>';
		echo '<th>Email</th>';
		echo '<th>Referrer</th>';
		echo '</tr>';
		while ($row=mysqli_fetch_array($result)){
			echo '<tr>';
			echo '<td style = "text-align：center">'.$row['customerName'].'</td>';
			echo '<td style = "text-align：center">'.$row['phoneNumber'].'</td>';
			echo '<td style = "text-align：center">'.$row['emailAddress'].'</td>';
			echo '<td style = "text-align：center">'.$row['referrer'].'</td>';
			echo '</tr>';
		}
			echo '<table>';
			mysqli_close($connect);
?>

<?php include 'footer.php';?>