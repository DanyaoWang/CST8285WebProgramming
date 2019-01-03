<?php
/*
 *  @author:Danyao Wang
 */
 
require_once('header.php');
require_once('dao/customerDAO.php');


$customerDAO = new customerDAO;
$customers = $customerDAO->getCustomers();

if ($customers) {
    echo '<h3>'.'<span style=\'color:red\'>'.'You signned up successfully! '.'</span>'.'</h3>';
    echo '<table border = \'1\'>';
    echo '<tr>';
    echo '<th>customer</th>';
    echo '<th>phone number</th>';
    echo '<th>email address</th>';
    echo '<th>referrer</th>';
    echo '</tr>';

	//$ID = $customerDAO->getID();
	//$i = 0;
    foreach ($customers as $customer) {
        echo '<tr>';
        echo '<td>' . $customer->getName() . '</td>';
        echo '<td>' . $customer->getPhone() . '</td>';
        echo '<td>' . $customer->getEmail() . '</td>';
        echo '<td>' . $customer->getReferrer() . '</td>';
        echo '</tr>';
       // $i++;
    }
    echo '</table>';
}
else{
		echo '<h3>'.'There is no mailing in the list now'.'</h3>';
}


?>

<?php include 'footer.php';?>