<?php

class Log
{
	protected $filename;
	protected $handle;


	protected function __construct($prefix = 'log') 
	{
		$this->setFilename($prefix);
		/*Set the $filename property of the class - $this->filename lets you access filename*/
		$this->handle = fopen($this->filename, 'a');
	}

		// Sets the protected filename when the class is instantiated, via the __construct() method 
		
		protected function setFilename($prefix)
		{
			// Set timezone and date format
		    date_default_timezone_set('America/Chicago');
			$date = date('Y-m-d');
			if(is_string($prefix)) {
				$this->filename = $prefix . date('Y-m-d') . '.log';
			} else {
				exit(['Prefix was not a string']);
			}
	
/*Open the $filename for appending and assign the file pointer 
to the property $handle - $handle is a local variable, can't access from other functions
$this->handles allows access*/
		$this->handle = fopen($this->filename, 'a');
		/*self::handle = fopen(self::filename, 'a');*/
	}


// Sends a 'logLevel' and message to be appended to the file
	public function logInfo($message)
	{
		$this->logMessage("INFO", $message);
	}
	// Sends a 'logLevel' and message to be appended to the file
	public function logError($message)
	{
		$this->logMessage("ERROR", $message);
	}

	public static function logMessage($logLevel, $message) 
/*	Update logMessage(); it should no longer need to open and close 
its own file handle, instead use the $handle property.*/
	{
		/*Each entry is formatted YYYY-MM-DD HH:MM:SS [LEVEL] MESSAGE */
		$stringToWrite = PHP_EOL . "[{$logLevel}] $message";
		fwrite(self::handle, $stringToWrite);
	}

/*	Add a destructor to close $handle when the class is destroyed.*/
	public function __destruct() 
	{
		if (isset($this->handle)) {
			fclose($this->handle);
		}
	}
}

/*$log = new Log();
$log->logMessage('INFO', 'this info message is working');
unset($log);*/

?>