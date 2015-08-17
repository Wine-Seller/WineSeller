<?php
/*following convention where class name is singular/capitalized & table names are plural; each table has a model which is a special kind of class
model serves as data layer in between application and table in DB; rest of code doesn't have to connect to DB or talk to DB directly*/

require_once 'baseModelWineseller.php';

/*add condition requiring wine viewers to be over 21???*/

class User extends Model 
{
	protected static $table = 'users';
	/*determine if entered username exists in users table - test based on id - static methods can be called without being instantiated; don't have to have an object to establish*/
	
	public static function find($id)
	{
		/*can't use a prepared statement on a tablename*/
		/*:id is a placeholder id - id is a variable standin for actual variable; assigning a variable is a type of binding;
		don't use string interpolation/don't pass in straight variables into statement
		such as 'id' or leads to hacking of data; protect everywhere data coming in*/
		self::dbConnect();
	  	// @TODO: Create select statement using prepared statements
		$query = 'SELECT * FROM users WHERE id = :id';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        
        // @TODO: Store the result set in a variable named $result
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		        
		// The following code will set the attributes on the calling object based on the result variable's contents
		/*instance starts out as nothing*/
		$instance = null;
        if ($result)
        {
        	/*populate instance with properties*/
            $instance = new static;
            $instance->attributes = $result;
        }
        /*instance is an object*/
        return $instance;

	}

	/*Find all records/get all rows from the users table*/
	public static function all()
	{
		/*Start by connecting to the DB*/
		self::dbConnect();
		
		/*get all rows*/
		// @TODO: Learning from the previous method, return all the matching records

		$stmt = self::$dbc->query('SELECT * from users');
		
		/*Assign results to a variable*/
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;

		$instance = null;
		if ($result) {
			$instance = new static;
			$instance->attributes = $result;
		}
		return $instance;
	}

	// If a username exists in the table, retrieve its password
	public static function getPassword($username)
	{
		$dbc = self::getDbConnect();
		// See if username exists in the database
		$userExists = self::checkUser($username);
		if(!$userExists){
			throw new Exception ("Username does not exist.");
		}
		return $password = $dbc->query("SELECT password FROM " . static::$table . " WHERE username = '" . $username . "'")->fetchColumn();
    }
    // Check if passed password matches password stored in table
    public static function verifyLogin($username, $inputPassword)
    {
		// If username exists, get their hashed password from table
		$realPassword = self::getPassword($username);
		if(password_verify($inputPassword, $realPassword)) {
			return true;
		} else {
			return false;
		}
    }
    // If a username exists in the table, retrieve its email and user_id
	public static function getUserInfo($username)
	{
		$dbc = self::getDbConnect();
		// See if username exists in the database
		$userExists = self::checkUser($username);
		if(!$userExists){
			throw new Exception ("Username does not exist.");
		}
		$stmt = $dbc->prepare("SELECT user_id, contact_email, date_created FROM " . static::$table . " WHERE username = :username");
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
		$userInfo['username'] = $username;
		return $userInfo;	//is an array that contains user_id, contact_email, date_created and username.
    }


	/*     * Persist the object to the database*/ 
	public function save()
	{
        // @TODO: Ensure there are attributes before attempting to save
		if(isset($this->attributes)) {
        // @TODO: Perform the proper action - if the `id` is set, this is an update, if not it is a insert
        // @TODO: Ensure that update is properly handled with the id key
			if (isset($this->attributes['id'])) {
				$this->update();
			} else {
				$this->insert();
			}
		}
		/*need for when add data, need new connection to save it*/
		self::dbConnect();
	}
}    

?>