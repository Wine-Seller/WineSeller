<?php
/*The users.show.php page will have hard-coded data showing view of one single user profile*/

require_once '../bootstrap.php';
require_once '../UserModelWineseller.php';

if(Input::has('id')) {
	$id = Input::get('id');
	$user = User::find($id);
} else {
	header('');
	exit();
}

?>

<!-- add HTML for how to show User Profile -->

<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>