<?php
/*following convention where table names are plural
and for each table has a model which is a special kind of class
model serves as data layer in between application and table in DB;
rest of code doesn't have to connect to DB or talk to DB directly*/

require_once 'baseModelWineseller.php';

/*call the class Product or Ad???*/
class Ad extends Model {

	protected static $table = 'ads';
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

		$stmt = self::$dbc->query('SELECT * from wineseller');
		
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
					SET vendor_name = :vendor_name,
					location_city_code = :location_city_code,
					location_state_code = :location_state_code,
					location_zip_code = :location_zip_code,
					product_category = :product_category,
					product_origin = :product_origin,
					product_style = :product_style,
					vintage_year = :vintage_year,
					price = :price,
					description = :description,
					WHERE id = :id';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':vendor_name', $this->attributes['vendor_name'], PDO::PARAM_STR);
		$stmt->bindValue(':location_city_code', $this->attributes['location_city_code'], PDO::PARAM_STR);
		$stmt->bindValue(':location_state_code', $this->attributes['location_state_code'], PDO::PARAM_STR);
		$stmt->bindValue(':location_zip_code', $this->attributes['location_zip_code'], PDO::PARAM_INT);
		$stmt->bindValue(':product_category', $this->attributes['product_category'], PDO::PARAM_STR);
		$stmt->bindValue(':product_origin', $this->attributes['product_origin'], PDO::PARAM_STR);
		$stmt->bindValue(':product_style', $this->attributes['product_style'], PDO::PARAM_STR);
		$stmt->bindValue(':vintage_year', $this->attributes['vintage_year'], PDO::PARAM_INT);		
		$stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_INT);
		$stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
		$stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_STR);
		$stmt->execute();
	}

	public function insert()
	{
		$query = 'INSERT INTO national_parks (vendor_name, location_city_code, location_state_code, location_zip_code, product_category, product_origin, product_style, vintage_year, price, description)
								VALUES (:vendor_name, :location_city_code, :location_state_code, :location_zip_code, :product_category, :product_origin, :product_style, :vintage_year, :price, :description)';
	
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':vendor_name', Input::get('vendor_name'), PDO::PARAM_STR);
		$stmt->bindValue(':location_city_code', Input::get('location_city_code'), PDO::PARAM_STR);
		$stmt->bindValue(':location_state_code', Input::get('location_state_code'), PDO::PARAM_STR);
		$stmt->bindValue(':location_zip_code', Input::get('location_zip_code'), PDO::PARAM_INT);
		$stmt->bindValue(':product_category', Input::get('product_category'), PDO::PARAM_STR);
		$stmt->bindValue(':product_origin', Input::get('product_origin'), PDO::PARAM_STR);
		$stmt->bindValue(':product_style', Input::get('product_style'), PDO::PARAM_STR);
		$stmt->bindValue(':vintage_year', Input::get('vintage_year'), PDO::PARAM_INT);
		$stmt->bindValue(':price', Input::get('price'), PDO::PARAM_INT);
		$stmt->bindValue(':description', Input::get('description'), PDO::PARAM_STR);
		$stmt->execute();
	}

	public function delete()
	{
		$query = 'DELETE FROM national_parks WHERE id = :id';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
	}
}

?>