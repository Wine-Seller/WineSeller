<!--login form-->
<?php
//$_SESSION

require_once'Auth.login.php';
//require_once'input.php';

//if (Auth::check()){
//	header('Location:/authorized.php');
//	exit();
//}


if (Input::has ('username') && Input::has ('password')){
//go to authorized page
	$username = Input::get('username')
	$password = Input::get('password')
	
	if (Input::attempt($username, $password)){
		header(Location:/authorized.php);
	}


?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>

    <form method="POST">
        <input type="text" name="username" placeholder='username'><br>
        <input type="password" name="password" placeholder='password '><br>
        <input type="submit">
    </form>
</body>
</html>
