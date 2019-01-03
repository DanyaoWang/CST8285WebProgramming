<?php
include("header.php");
require_once('dao/abstractDAO.php');
require_once('dao/customerDAO.php');
require_once('PasswordHash.php')?>

<?php
/*
 *  @author:Danyao Wang
 */
	try {
		$customerDAO = new customerDAO();
		$abstractDAO = new abstractDAO();
		$error = false;
		$errormessage = Array();

			if (isset($_POST['customerName']) || isset($_POST['phoneNumber']) || isset($_POST['emailAddress']) || isset($_POST['referral'])) {
			if ($_POST['customerName'] == "") {
				$error = true;
				$errormessage['customerName'] = "Please enter your name";
			}
			if ($_POST['phoneNumber'] == "") {
						$errormessage['phoneNumber'] = "Please enter a phone number";
						$error = true;
			}
			
			if($_POST['phoneNumber'] !=0 && (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['phoneNumber']))){
						$errormessage['phoneNumber'] = "The phone number you input is not in a valid format";
						$error = true;
			}
			
			
			if (empty ( $_POST ['emailAddress'] ) || (! filter_var ( $_POST ['emailAddress'], FILTER_VALIDATE_EMAIL ))){
				$error = true;
				$errormessage['emailAddress'] = "Please enter a valid email";
			}
			
			$email1=$_POST['emailAddress'];
			$sql= "SELECT * FROM mailingList where emailAddress = '$email1'";
			$email = $abstractDAO->getMysqli()->query($sql);
			$num = $abstractDAO->getMysqli()->affected_rows;
			
			if($num != 0){
				$error = true;
				$errormessage['emailAddress'] = "Duplicate Email Address.";
			}
			
			if (empty($_POST['referral'])) {
				$error = true;
				$errormessage['referral'] = "Please input a referral";
			}
			if (!$error) {
				$email = $_POST['emailAddress'];
				$hash = password_hash($email, PASSWORD_DEFAULT);
				$customer = new Customer($_POST['customerName'], $_POST['phoneNumber'], $hash, $_POST['referral']);
				$addSuccess = $customerDAO->addCustomer($customer);
            echo '<h3>' . $addSuccess . '</h3>';
			
			if (isset($_POST["btnSubmit"])){
				$target_path = "files/";  //where the file is going to be placed
				$target_path = $target_path.basename( $_FILES['uploadedfile']['name']); // add the original filename to our target path
			
				if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)){
					echo 'The file '. basename( $_FILES['uploadedfile']['name']).' has been uploaded!';
				}else{
					echo "There was an error uploading the file.";
				}
			}
        }
    }

    ?>

    <div id="content" class="clearfix">
        <aside>
            <h2>Mailing Address</h2>
            <h3>1385 Woodroffe Ave<br>
                Ottawa, ON K4C1A4</h3>
            <h2>Phone Number</h2>
            <h3>(613)727-4723</h3>
            <h2>Fax Number</h2>
            <h3>(613)555-1212</h3>
            <h2>Email Address</h2>
            <h3>info@wpeatery.com</h3>
        </aside>
        <div class="main">
            <h1>Sign up for our newsletter</h1>
            <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP
                eatery!</p>
            <form name="frmNewsletter" id="frmNewsletter" method="post" action="contact.php" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="customerName" id="customerName" placeholder="Danyao Wang"
                                   size='40'>
                            <?php
                            if (isset($errormessage['customerName']))
                                echo '<span style=\'color:red\'>'.$errormessage['customerName'].'</span>'; ?></td>

                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td><input type="text" name="phoneNumber" id="phoneNumber" placeholder="613-878-9290" size='40'>
                            <?php
                            if (isset($errormessage['phoneNumber']))
                                echo '<span style=\'color:red\'>'.$errormessage['phoneNumber'].'</span>'; ?></td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td><input type="text" name="emailAddress" id="emailAddress" placeholder="web@gmail.com"
                                   size='40'>
                            <?php
                            if (isset($errormessage['emailAddress']))
                                echo '<span style=\'color:red\'>'.$errormessage['emailAddress'].'</span>'; ?></td>
                    </tr>
                    <tr>
                        <td>How did you hear<br> about us?</td>
                        <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                            Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                            TV<input type='radio' name='referral' id='referralTV' value='TV'>
                            Other<input type='radio' name='referral' id='referralOther' value='other'>
                            <?php
                            if (isset($errormessage['referral']))
                                echo '<span style=\'color:red\'>'.$errormessage['referral'].'</span>'; ?></td>
                    </tr>
					<tr> <!--File Upload form-->
						<td>Choose a file to upload </td>
					</tr>
					<tr>
						<td><input type = "file" name = "uploadedfile" ></td>
					</tr>
					</tr>
                    <tr>
                        <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input
                                    type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                    </tr>
                </table>
            </form>
        </div><!-- End Main -->
    </div><!-- End Content -->

    <?php
	
	
	
		}catch(Exception $e){
				//If there were any database connection/sql issues,
				//an error message will be displayed to the user.
			echo '<h3>Error on page.</h3>';
			echo '<p>' . $e->getMessage() . '</p>';
		}
?>

<?php include("footer.php"); ?>
