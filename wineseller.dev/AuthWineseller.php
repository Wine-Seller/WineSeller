<?php
/*Your Auth.php file will need to require_once your Log.php file*/
/*create a class called Auth. */ 
require_once '../InputWineseller.php';
require_once '../LogWineseller.php';

class Auth
{
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
	
	/*Auth::attempt() will take in a $username and $password. */
	public static function attempt($username, $password) {
		if($username =='guest' && password_verify($password, static::$password)) {
			$_SESSION['LOGGED_IN_USER']=$username;
			$log=newLog();
			$log->info("username logged in successfully");
			return true;
			return true;
		} else {
/*	If either the username or password are incorrect then log an error: 
"User $username failed to log in!".*/
			$log->error("username failed to login");
			return false;
		}		
	}
	
	/*Auth::check() will return a boolean whether or not a user is logged in.
	*/
 	public static function check()
 	{
		if(isset($_SESSION['LOGGED_IN_USER'])) {
	 		return true;
	 	} else {
	 		return false;
	 	}
	}

/*Auth::user() will return the username of the currently logged in user.*/
	public static function user()
	{
		if (Input::has('username')) {
			return Input::get('username');
		}
	}
	
	public static function logout()
	{
		$_SESSION = array();
	}

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	function endSession() {
	if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
		    // destroy the current session
			session_destroy();
		    header('location: login.php');
		    exit();

	}
}
 
?>