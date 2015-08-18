<?php
	require_once '../bootstrap.php';

	class User extends Model
	{
		protected static $table = 'users';

		// Does a passed username exist in the table?
		public static function checkUser($username)
		{
			$dbc = self::dbConnect();
			// See if username exists in the database
			$userFound = $dbc->query("SELECT username FROM " . static::$table . " WHERE username = '" . $username . "'")->fetchColumn();
			return !empty($userFound) ? true : false;
		}

		// If a username exists in the table, retrieve its password
		public static function getPassword($username)
		{

			$dbc = self::dbConnect();
			// See if username exists in the database
			$userExists = self::checkUser($username);
			if(!$userExists){
				throw new Exception ("Username does not exist.");
			}
			return $password = $dbc->query("SELECT password FROM " . static::$table . " WHERE username = ' ' . $username . ' '")->fetchColumn();
	    }
	    // Verify if submitted password matches password in user table
	    public static function verifyLogin($username, $inputPassword)
	    {
    		// retrieve hashed password from table if in user table
    		$dbPassword = self::getPassword($username);
    		if(password_verify($inputPassword, $dbPassword)) {
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
			$userExists = self::checkUser($username);
			if(!$userExists){
				throw new Exception ("Username does not exist.");
			}
			$stmt = $dbc->prepare("SELECT user_id FROM " . static::$table . " WHERE username = :username");
			$stmt->bindValue(':username', $username, PDO::PARAM_STR);
			$stmt->execute();
			$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
			$userInfo['username'] = $username;
			//$userInfo array contains user_id, username, email, and age
			return $userInfo;	
	    }

	    public function update() 
		// After insert, add the id back to the attributes array so the object can properly reflect the id 
	    /*array_unshift() — Prepend one or more elements to the beginning of an array; iterate through all the attributes to build the prepared query; use prepared statements to ensure data security*/
		{
			$query = 'UPDATE users 
						SET username = :username,
						password = :password,
						email = :email,
						age = :age,
						WHERE id = :id';
			$stmt = self::$dbc->prepare($query);
			$stmt->bindValue(':username', $this->attributes['username'], PDO::PARAM_STR);
			$stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
			$stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
			$stmt->bindValue(':age', $this->attributes['age'], PDO::PARAM_INT);
			$stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_STR);
			$stmt->execute();
		}

	public function insert()
	{
		parent::dbConnect();
		$query = 'INSERT INTO users (username, password, email, age)
								VALUES (:username, :password, :email, :age);';
	
		$stmt = parent::$dbc->prepare($query);
		$stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
		$stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindValue(':age', $this->age, PDO::PARAM_INT);
		
		return $stmt->execute();
	}

	}
?>