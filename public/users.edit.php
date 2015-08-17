<?php
// @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id
/*array_unshift() — Prepend one or more elements to the beginning of an array*/
    // @TODO: You will need to iterate through all the attributes to build the prepared query

    // @TODO: Use prepared statements to ensure data security


	public function update()
	{
		$query = 'UPDATE users 
					SET username = :username,
					email = :email,
					age = :age,
					WHERE id = :id';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':username', $this->attributes['username'], PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
		$stmt->bindValue(':age', $this->attributes['age'], PDO::PARAM_INT);
		$stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_STR);
		$stmt->execute();
	}

	public function insert()
	{
		$query = 'INSERT INTO users (username, email, age) VALUES (:username, :email, :age)';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':username', $this->attributes['username'], PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
		$stmt->bindValue(':age', $this->attributes['age'], PDO::PARAM_STR);
		$stmt->execute();
	}

	public function delete()
	{
		$query = 'DELETE FROM users WHERE id = :id';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
	}
?>