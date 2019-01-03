<?php
require_once 'password.php';
/**
 * Class used to both store information about a user, and authenticate them.
 * @author Matt LaCasse
 *
 */
class AdminUser{
	/**
	 * Admin user's first name.
	 * @var String
	 */
	private $firstName;
	/**
	 * Admin user's last name.
	 * @var String
	 */
	private $lastName;
	/**
	 * Admin user's username.
	 * @var String
	 */
	private $username;
	/**
	 * Admin user's password.
	 * @var String
	 */
	private $password;
	/**
	 * Hash of user's password.
	 * @var String
	 */
	private $phash;
	
	/**
	 * True if user has been successfully authenticated, otherwise false.
	 * @var Boolean
	 */
	private $authenticated = false;
	
	/**
	 * Constructor. Attempts authentication with provided credentials.
	 * @param String $userName
	 * @param String $password
	 * @return boolean
	 */
	function __construct($userName, $password){
		$this->username = $userName;
		$this->password = $password;
		if($this->authenticate($userName, $password)){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Authenticates user against the authorized_users table in the WP_Eatery database.
	 * @param String $username
	 * @param String $password
	 * @return boolean true if user authenticates successfully, otherwise false.
	 */
	function authenticate($username, $password){
		//Set authenticated to false, as this could be a new user.
		$this->authenticated = false;
		$this->username = $username;
		$this->password = $password;
		$wpeaterydao = new WPEateryDAO();
		//Returns the hashed value of the user's password from the database.
		$userhash = $wpeaterydao->getUserHash($this->username);
		if(!$wpeaterydao->hasMysqlError()){
			//password_verify accepts two parameters: the user's password, and
			//the hash with which to validate it. If the password is correct, it 
			//will return true. Otherwise, it will return false.
			if(password_verify($this->password, $userhash)){
				$this->authenticated = true;
				return true;
			}else{
				return false;
			}
		} else {
			//Oops, we had a database error. Might want to handle this a bit better.
			return false;
		}

	}
	
	/**
	 * Returns firstName.
	 */
	function getFirstName(){
		return $this->firstName;
	}
	
	/**
	 * Sets firstName.
	 * @param String $firstName
	 */
	function setFirstName($firstName){
		$this->firstName = $firstName;
	}
	
	/**
	 * Returns lastName.
	 */
	function getLastName(){
		return $this->lastName;
	}
	
	/**
	 * Sets lastName.
	 * @param String $lastName
	 */
	function setLastName($lastName){
		$this->lastName = $lastName;
	}
	/**
	 * Returns username.
	 * @return String
	 */
	function getUsername(){
		return $this->username;
	}
	
	/**
	 * Sets the username.
	 * @param String $username
	 */
	function setUsername($username){
		$this->username = $username;
	}
	/**
	 * Returns the password
	 * @return String
	 */
	function getPassword(){
		return $this->password;
	}
	/**
	 * Sets the password.
	 * @param String $password
	 */
	function setPassword($password){
		$this->password = $password;
	}
	
	/**
	 * Returns the password hash. 
	 */
	function getPhash(){
		return $this->phash;
	}
	/**
	 * Sets the password hash
	 * @param String $phash
	 */
	function setPhash($phash){
		$this->phash = $phash;
	}
	/**
	 * Returns true if the user is authenticated, otherwise returns false.
	 * @return boolean
	 */
	function isAuthenticated(){
		return $this->authenticated;
	}

}
?>