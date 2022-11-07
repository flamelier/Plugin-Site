<?php
/*
Copyright (C) 2022 Computer Wolf LLC.
*/

// Calls the config file with mysql information.
require_once('includes/config.php');

// Start the session
session_start();

//Assigned inputted data from index.php form to variables
$_SESSION['uid'] = $_POST['uid'];

// echo $_POST['uid']; // Debug
// echo $_SESSION['uid']; // Debug
// echo $_POST['password']; // Debug

// Makes sure none of the variables gotten from Logon.php form is empty
if (!empty($_SESSION["uid"]) || !empty($_POST['password'])) {

    if ($_SESSION['uid'] == $loginUsername && $_POST['password'] == $loginPassword) {

        // echo $_POST['uid']; // Debug
        // echo $_SESSION['uid']; // Debug
        // echo $_POST['password']; // Debug

        // if ( isset($_SESSION['uid']) ) { // Debug
        //     echo "test"; // Debug
        // } // Debug

        echo "<h1><center>Hello, <b>".$_SESSION['uid']."</b>, please wait for redirect or click <a href=\"index.php\">here</a>.</center></h1>";
        echo "<meta http-equiv=\"Refresh\" content=\"0 url=index.php\" />";
    
    }
    else {
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
        <html><head><meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1252\">
        <title>Help Desk &nbsp;-&nbsp; Logon</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"static/css/main.css\">
        </head><body>
        <div align=\"center\"><table class=\"Normal\"><tbody><tr class=\"Head1\"><td>Logon<br>to Help Desk</td></tr><tr class=\"body1\"><td>
        <div align=\"center\"><u><h3>Passwords don't match.</h3></u>
        <p><b>Your passwords don't match, please retry.<br />Please click <a href=\"../index.php\">here</a> to go back.</b></p>
        </div></td></tr></tbody></table></div><p></p><hr width=\"500\">
        <div align=\"center\"><font size=\"-1\"><a href=\"https://computerwolf.com/patsypanel\">Patsy Panel</a>, Copyright (C) 2022 <a href=\"https://computerwolf.com\">Computer Wolf LLC</a>. Please view the <a href=\"https://github.com/flamelier/PatsyPanel#license\">license</a>.</font></div><p></p>
        </body></html>";
    }
}
// If the information isnt filled out completely then it will tell them and allow them to try again.
else {
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
    echo "<html><head><meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1252\">";
    echo "<title>Help Desk &nbsp;-&nbsp; Logon</title>";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"static/css/main.css\">";
    echo "</head><body>";
    echo "<div align=\"center\"><table class=\"Normal\"><tbody><tr class=\"Head1\"><td>Logon<br>to Help Desk</td></tr><tr class=\"body1\"><td>";
    echo "<div align=\"center\"><u><h3>Please completely fill out the form.</h3></u>";
    echo "<p><b>Not everything was filled out, please try again.<br />Please click <a href=\"../index.php\">here</a> to go back.</b></p>";
    echo "</div></td></tr></tbody></table></div><p></p><hr width=\"500\">";
    echo "<div align=\"center\"><font size=\"-1\"><a href=\"https://computerwolf.com/patsypanel\">Patsy Panel</a>, Copyright (C) 2022 <a href=\"https://computerwolf.com\">Computer Wolf LLC</a>. Please view the <a href=\"https://github.com/flamelier/PatsyPanel#license\">license</a>.</font></div><p></p>";
    echo "</body></html>";
    die();
}
?>