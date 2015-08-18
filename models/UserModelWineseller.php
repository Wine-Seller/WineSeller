<?php
	require_once '../bootstrap.php';

	class User extends Model
	{
		protected static $table = 'users';

		// Does a passed username exist in the table?

		public static function find($id)
		{
		/*can't use a prepared statement on a tablename*/
		/*:id is a placeholder id - id is a variable standin for actual variable; assigning a variable is a type of binding;
		don't use string interpolation/don't pass in straight variables into statement
		such as 'id' or leads to hacking of data; protect everywhere data coming in*/
		self::dbConnect();
	  	// Create select statement using prepared statements
		$query = 'SELECT * FROM users WHERE id = :id';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		 // Store the result set in a variable named $result
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

		// If a username exists in the table, retrieve its password
		public static function getPassword($username)
		{
		self::dbConnect();
	 	// Create select statement using prepared statements
		$query = 'SELECT * FROM users WHERE username = :username';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		
		 // Store the result set in a variable named $result
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

	    // Verify if submitted password matches password in user table
    	// retrieve hashed password from table if in user table
	    public static function verifyLogin($username, $inputPassword)
	    {
	    	self::dbConnect();
    		if(password_verify($inputPassword, $dbPassword)) {
    			return true;
    		} else {
    			return false;
    		}
	 	// Create select statement using prepared statements
		$query = 'SELECT * FROM users WHERE username = :username';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		
		 // Store the result set in a variable named $result
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		        
		// The following code will set the attributes on the calling object based on the result variable's contents
		/*instance starts out as nothing*/
		$instance = null;
        if ($result)
        {
        	/*populate instance with properties*/
            $instance = new static;
            $instance->attributes = $result;
        /*instance is an object*/
        return $instance;
        };


	    }
	    // If username is in user table, retrieve email and user_id
		public static function getUserInfo($username)
		{
			$dbc = self::dbConnect();
			// See if username exists in the database
			$userExists = self::find($username);
			if(!$userExists){
				throw new Exception ("Username does not exist.");
			}
			$query = 'SELECT user_id FROM ' . static::$table . 'WHERE username = :username';
			self::$dbc->prepare($query);
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