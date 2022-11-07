<?php
/*
Copyright (C) 2022 Computer Wolf LLC.
*/

// global path constants.
define('PATH_ABSOLUTE', dirname(__FILE__) . '/../');
define('PATH_INCLUDES', PATH_ABSOLUTE . 'includes/');

// mysql.
$host = "localhost"; /* Host name */
$user = "userName"; /* User */
$password = "password"; /* Password */
$dbname = "databaseName"; /* Database name */

/*
* Set your username and password for login below:
*/
$loginUsername = "admin"; /* Your login username */
$loginPassword = "password"; /* Your login password */

// Sets mysqli conenct as a variable to be called in other files.
$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>