<?php
	require_once '../bootstrap.php';

	class User extends Model
	{
		protected static $table = 'users';
		// determine whether username is in user table
		public static function verifyUser($username)
		{
			$dbc = self::dbConnect();
			// See if username exists in the database
			$userFound = $dbc->query("SELECT username FROM " . static::$table . " WHERE username = '" . $username . "'")->fetchColumn();
			/*ternary boolean for whether user is found */
			return !empty($userFound) ? true : false;
		}
		// If a username exists in the table, retrieve its password
		public static function getPassword($username)
		{

			$dbc = self::dbConnect();
			// See if username exists in the database
			$userExists = self::verifyUser($username);
			if(!$userExists){
				throw new Exception ("Username does not exist.");
			}
			return $password = $dbc->query("SELECT password FROM " . static::$table . " WHERE username = '" . $username . "'")->fetchColumn();
	    }
	    // Verify if submitted password matches password in user table
	    public static function verifyLogin($username, $inputPassword)
	    {
    		// retrieve hashed password from table if in user table
    		$realPassword = self::getPassword($username);
    		if(password_verify($inputPassword, $realPassword)) {
    			return true;
    		} else {
    			return false;
    		}
	    }
	    // If username is in user table, retrieve email and user_id
		public static function getUserInfo($username)
		{
			$dbc = self::dbConnect();
			// See if username exists in the database
			$userExists = self::verifyUser($username);
			if(!$userExists){
				throw new Exception ("Username does not exist.");
			}
			$stmt = $dbc->prepare("SELECT user_id, email, age FROM " . static::$table . " WHERE username = :username");
			$stmt->bindValue(':username', $username, PDO::PARAM_STR);
			$stmt->execute();
			$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
			$userInfo['username'] = $username;
			//$userInfo array contains user_id, username, email, and age.
			return $userInfo;	
	    }
	}
?>