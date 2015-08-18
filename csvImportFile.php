<?php

/*simple CSV to MySQL import class written in PHP.
First create "csvimport" class and define required variables*/
//www.php-guru.in/2013/import-csv-data-to-mysql-using-php/

class csvimport
{
    var $separator = ',';
    var $field_names = false;
    var $dbhost = '';   // mysql database server
    var $dbuser = '';       // database username
    var $dbpass = '';       // database password
    var $dbname = '';       // database name
    var $data = '';
    var $error = '';
    var $result = false;
}

/*Next add constructor function in class with two parameters database table name and CSV filename and in constructor function write MySQL database connection. Define database information in above variable list.
*/

function __construct($tablename,$filename)
{
    $Conn = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass) 
                 or $this->error_msg("Error: Invalid MySQL Server Information");
    if (!$Conn)
        $this->error_msg("Error: Invalid MySQL Server Information");
    $DB_select = mysql_select_db($this->dbname, $Conn);
    if (!$DB_select)
        $this->error_msg("Error: Invalid MySQL Database");
    if ($this->temp_path == '')
        $this->temp_path = sys_get_temp_dir(); 
    $this->filename = $filename;
    $this->sql = $sql;           
    $this->import();
}

/*sql execution function which will return resource id
*/
function execute($sql)
{
    if ($sql!="")
    {
        $result = mysql_query($sql) or $this->error_msg("Error: Check MySQL Query($sql)");
        if ($result)
            return $result;
        else
            return false;
    }
}
/* Required functions/methods which are used while importing CSV data in MySQL. Add this functions to above class.
*///function to check number of record of resource id
function count_check($result)
{
    if ($result)
    {
        if (mysql_num_rows($result) > 0)
            return true;
        else
            return false;                   
    }
}       
 
//function to fetch mysql data from resource id in associative array 
function recordset($result)
{
    if ($result)
    {
        while($row = mysql_fetch_assoc($result))
            $data[] = $row;
    }
    return $data;
}
 
//function to display error message
function error_msg($msg)
{
    if ($msg != '')
        die($msg);
    else
        return true;
}

// And finally the import function to get CSV content and insert it into mysql table
function import()
{
    if (file_exists($this->filename))
    {
        $this->data = file_get_contents($this->filename);
        if ($this->data != '')
        {
            $lines = explode("\n", $this->data);
            if (is_array($lines) && count($lines) > 0)
            {
                $insert_string = '';
                $data_array = array();
                if ($this->field_names == true)
                    $start_ind = 0;
                else
                    $start_ind = 1; 
                 
                for($i=$start_ind;$i<count($lines);$i++)
                {
                    if ($lines[$i] != '')
                    {
                        $data_array = explode($this->separator, $lines[$i]);
                        if (is_array($data_array) && count($data_array) > 0)
                        {
                            $t_str = '';
                            foreach($data_array as $data_row)
                            {
                                $t_str .= "'".$data_row."',";
                            }
                        }
                        $insert_string .= '('.trim($t_str,",").'),';
                    }
                }
                $insert_string = trim($insert_string,",");
                if ($insert_string != '')
                {
                    $insert_query = "INSERT INTO ".$this->tablename." VALUES $insert_string";
                    $ins = $this->execute($insert_query);
                    if ($ins)
                        $this->error_msg("Data Inserted Successfully...");
                    else
                        $this->error_msg("Problem While Inserting Data..."); 
                }
            }                   
        }
        else
        {
            $this->error_msg("Error: No Data In CSV file");
        }
         
    }
    else
    {
        $this->error_msg("Error: Cannot open file(".$this->filename.")");
    }
}
/*As we have created csvimport class to import CSV data in MySQL table, now below is the code by which we read csv file and insert data in MySQL table.
*/

$filename = 'test.csv'; // CSV file to be imported to MySQL
$tablename = ""; // MySQL table name in which data to be inserted
new csvimport($tablename,$filename);

?>