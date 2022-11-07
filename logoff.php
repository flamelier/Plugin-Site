<?php
/*
Copyright (C) 2022 Computer Wolf LLC.
*/

// Calls the config file with mysql information.
require_once('includes/config.php');

// Start the session
session_start();

if ( isset($_SESSION['uid']) ) {
   // remove all session variables
    session_unset();

    // destroy the session
    session_destroy(); 
}

echo "<h1><center>Hello, please wait for redirect or click <a href=\"index.php\">here</a>.</center></h1>";
echo "<meta http-equiv=\"Refresh\" content=\"0 url=index.php\" />";
?>