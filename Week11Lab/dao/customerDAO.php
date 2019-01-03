<?php
require_once('abstractDAO.php');
require_once('./model/customer.php');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 *  @author:Danyao Wang
 */
class customerDAO extends abstractDAO{

    function __construct()
    {
        try {
            parent::__construct();
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    /*
     * This is an example of how to use the query() method of a mysqli object.
     * 
     * Returns an array of <code>Customer</code> objects. If no customers exist, returns false.
     */
    public function getCustomers()
    {
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM mailingList');
        $customers = array();

        if ($result->num_rows >= 1) {
            while ($row = $result->fetch_assoc()) {   //returns the next row in the result as an associative array
                //Create a new customer object, and add it to the array.
                $customer = new Customer($row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['referrer']);
                $customers[] = $customer;
            }
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }

    public function getID()
    {
        $result = $this->mysqli->query('SELECT * FROM mailingList');  //accept a query and returns a mysqil_result object
        $ID = array();

        if ($result->num_rows >= 1) {
            while ($row = $result->fetch_assoc()) {  //returns the next row in the result as an associative array
                $id = $row['_id'];
                $ID[] = $id;
            }
            $result->free();
            return $ID;
        }
        $result->free();
        return false;
    }

    /*
     * This is an example of how to use a prepared statement
     * with a select query.
     */
    public function getCustomer($_id)
    {
        $query = 'SELECT * FROM mailingList WHERE _id = ?';
        $stmt = $this->mysqli->prepare($query);  //Accepts an SQL query returns a statement object
        $stmt->bind_param('i', $_id);   //used to bind variables to a prepared statement as parameters
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $temp = $result->fetch_assoc();
            $customer = new customer($temp['customerName'], $temp['phoneNumber'], $temp['emailAddress'], $temp['referrer']);
            $result->free();
            return $customer;
        }
        $result->free();
        return false;
    }

    /**
     * @param $customer
     * @return string
     */
    public function addCustomer($customer){
		
        if (!$this->mysqli->connect_errno) {      //Provides information about connection errors
            //The query uses the question mark (?) as a
            //placeholder for the parameters to be used
            //in the query.
            $query = 'INSERT INTO mailingList(customerName,phoneNumber,emailAddress,referrer) VALUES (?,?,?,?)';
            //The prepare method of the mysqli object returns
            //a mysqli_stmt object. It takes a parameterized 
            //query as a parameter.
            $stmt = $this->mysqli->prepare($query);
            //The first parameter of bind_param takes a string
            //describing the data. In this case, we are passing 
            //four variables: four strings (customerName, phoneNumber, emailAddress, referrer).
           
            //The string contains a one-letter datatype description
            //for each parameter. 'i' is used for integers, and 's'
            //is used for strings.
            $name = $customer->getName();
            $phone = $customer->getPhone();
            $email = $customer->getEmail();
            $ref = $customer->getReferrer();

            $stmt->bind_param('ssss', $name, $phone, $email, $ref);   //used to bind variables to a prepared statement as parameters
			$stmt->execute();
            //Execute the statement
            //If there are errors, they will be in the error property of the
            //mysqli_stmt object.
            if ($stmt->error) {
                return $stmt->error;
            } else {
                //echo "<script type = 'text/javascript'>alter(\"Submit Successfully!\")</script>";
                //header("location: mailing_list.php");
                return $customer->getName() . ' signed up successfully!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
}
	
	?>