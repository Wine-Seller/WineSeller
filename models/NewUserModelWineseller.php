<?php

require_once 'baseModelWineseller.php';

class User extends Model {

	protected static $table = 'users';
/*static methods can be called without being instantiated; don't have to have an object to establish*/
/*     * Find a record based on an id*/     

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

	public function update()
	// @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id
/*array_unshift() — Prepend one or more elements to the beginning of an array
*/    // @TODO: You will need to iterate through all the attributes to build the prepared query

    // @TODO: Use prepared statements to ensure data security
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
		$query = 'INSERT INTO users (username, password, email, age) VALUES (:username, :password, :email, :age)';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':username', $this->attributes['username'], PDO::PARAM_STR);
		$stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
		$stmt->bindValue(':age', $this->attributes['age'], PDO::PARAM_INT);
		$stmt->execute();
	}

	public function delete()
	{
		$query = 'DELETE FROM users WHERE id = :id';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
	}
}

?>