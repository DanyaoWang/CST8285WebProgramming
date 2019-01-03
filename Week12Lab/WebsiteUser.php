<?php

class WebsiteUser{
    /* Host address for the database */
    protected static $DB_HOST = "127.0.0.1";
    /* Database username */
    protected static $DB_USERNAME = "wp_eatery";
    /* Database password */
    protected static $DB_PASSWORD = "password";
    /* Name of database */
    protected static $DB_DATABASE = "wp_eatery";
	
    
    private $AdminID;
	private $Username;
    private $Password;
	private $mysqli;
    private $Lastlogin;
    private $dbError;
    private $authenticated = false;
    
    function __construct() {
        $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE);
        if($this->mysqli->errno){
            $this->dbError = true;
        }else{
            $this->dbError = false;
        }
    }
    public function authenticate($Username, $Password){
        $loginQuery = "SELECT * FROM adminusers WHERE Username = ? AND Password = ?";
        $stmt = $this->mysqli->prepare($loginQuery);
        $stmt->bind_param('ss', $Username, $Password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
			$temp=$result->fetch_assoc();
			$this->AdminID=$temp['AdminID'];
            $this->Username = $Username;
            $this->Password = $Password;
            $this->authenticated = true;
			$this->Lastlogin = $temp['Lastlogin'];
			$query = 'update adminusers set Lastlogin=? WHERE Username=?';
			$stmt1= $this->mysqli->prepare($query);
			$date = date("Y-m-d");
			$stmt1->bind_param('ss', $date,$Username);
			$stmt1->execute();
			$stmt1->free_result();
		}
        $stmt->free_result();
    }
    public function isAuthenticated(){
        return $this->authenticated;
    }
    public function hasDbError(){
        return $this->dbError;
    }
    public function getUsername(){
        return $this->Username;		
    }
	public function getID(){
		return $this->AdminID;
	}
	public function getLastLogin(){
		return $this->Lastlogin;
	}
}
?>
