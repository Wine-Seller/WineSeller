<?php

require_once 'baseModelWineseller.php';
/*require_once 'wineseller_config.php';*/

class User extends Model
{
	protected static $table = 'user';
}


echo User::getTableName();

?>