<!-- perform a logout when that page is accessed, and then redirect to the login page.
 -->

<?php
require_once '../auth.login.php';
require_once '../utils/InputWineseller.php';

session_start();

Auth::logout();

    
?>