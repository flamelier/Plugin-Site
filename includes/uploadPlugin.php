<?php
/*
Copyright (C) 2022 Computer Wolf LLC.
*/

// Calls the config file with mysql information.
require_once('../includes/config.php');

// Start the session
session_start();

// var_dump($_FILES); // debug
// echo "<br />"; // debug
// print_r($_FILES); // debug
// echo "<br />"; // debug

$pluginName = $_POST['name'];
$pluginVersion = $_POST['versions'];
$pluginDescription = $_POST['message'];
$pluginEnabled = $_POST['enabled'];

// echo $pluginName; // debug
// echo "<br />"; // debug
// echo $pluginVersion; // debug
// echo "<br />"; // debug
// echo $pluginDescription; // debug
// echo "<br />"; // debug
// echo $pluginEnabled; // debug
// echo "<br />"; // debug

if (!empty($pluginName) && !empty($pluginVersion) && !empty($pluginDescription) && !empty($pluginEnabled)) {
    if (isset($_FILES['jar'])){
        $errors = array();
        $file_name = $_FILES['jar']['name'];
        $file_size = $_FILES['jar']['size'];
        $file_tmp = $_FILES['jar']['tmp_name'];
        $file_type = $_FILES['jar']['type'];
        // $file_ext = strtolower(end(explode('.',$_FILES['jar']['name']))); // Only if you want to limit file type
        
        $expensions= array("jar","zip","jarx");
        
        // if(in_array($file_ext,$expensions)=== false){ // Only if you want to limit file type
        //     $errors[]="extension not allowed, please choose jar, zip, or jarx file."; // Only if you want to limit file type
        // } // Only if you want to limit file type
        
        if ($file_size > 2097152) {
            $errors[]='File size must be 2 MB or less.';
        }
        
        if (empty($errors)==true) {
            move_uploaded_file($file_tmp,"../dl/".$file_name);
            echo "Successfully uploaded and moved file.";
            
    
            // INSERT variable that has the user table and the collumns with the variables for those collumns filled out.
            $INSERT = "INSERT INTO pluginsTable (pluginUploadDate, pluginName, pluginDescription, pluginVersions, pluginLink, pluginEnabled) VALUES (CURRENT_DATE(), '$pluginName', '$pluginDescription', '$pluginVersion', 'https://computerwolf.com/webprojects/Plugin-Site/dl/$file_name', '$pluginEnabled')";
            // Try to insert the new user, it will say new user created successfully and redirect back to index page for them to login, it does this automatically.
            if (mysqli_query($con, $INSERT)) {
                echo "<h1><center>Hello, <b>".$_SESSION['uid']."</b>, please wait for redirect or click <a href=\"index.php\">here</a>.</center></h1>";
                echo "<div align=\"center\"><font size=\"-1\"><a href=\"https://computerwolf.com\">Plugin Site</a>, Copyright (C) 2022 <a href=\"https://computerwolf.com\">Computer Wolf LLC</a>. Please view the <a href=\"https://github.com/flamelier/PluginSit#license\">license</a>.</font></div><p></p>";
                echo "<meta http-equiv=\"Refresh\" content=\"0 url=../index.php\" />";
            }
            // If there is an error with inserting the user into the database it will diplay the error and tell them to call help desk.
            else {
                echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
                echo "<html><head><meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1252\">";
                echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../src/css/main.css\">";
                echo "<title>Plugin &nbsp;-&nbsp; Upload</title>";
                echo "</head><body>";
                echo "<div align=\"center\"><table class=\"Normal\"><tbody><tr class=\"Head1\"><td>Plugin<br>upload</td></tr><tr class=\"body1\"><td>";
                echo "<div align=\"center\"><u><h3>There has been an error</h3></u><p>Error: " . $INSERT . "<br>" . mysqli_error($con) . "</p>";
                echo "<p><b>Please contact <a href=\"https://computerwolf.com\">Computer Wolf</a> for support.<br />Please click <a href=\"../index.php\">here</a> to go back.</b></p>";
                echo "</div></td></tr></tbody></table></div><p></p><hr width=\"500\">";
                echo "<div align=\"center\"><font size=\"-1\"><a href=\"https://computerwolf.com\">Plugin Site</a>, Copyright (C) 2022 <a href=\"https://computerwolf.com\">Computer Wolf LLC</a>. Please view the <a href=\"https://github.com/flamelier/PluginSit#license\">license</a>.</font></div><p></p>";
                echo "</body></html>";
            }
        }
        else {
            echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
            echo "<html><head><meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1252\">";
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../src/css/main.css\">";
            echo "<title>Help Desk &nbsp;-&nbsp; Register</title>";
            echo "</head><body>";
            echo "<div align=\"center\"><table class=\"Normal\"><tbody><tr class=\"Head1\"><td>Registration<br>for new users</td></tr><tr class=\"body1\"><td>";
            echo "<div align=\"center\"><u><h3>There has been an error</h3></u><p>Error: " . print_r($errors) . "</p>";
            echo "<p><b>Please call help desk with this error information.<br />Please click <a href=\"index.php\">here</a> to go back.</b></p>";
            echo "</div></td></tr></tbody></table></div><p></p><hr width=\"500\">";
            echo "<div align=\"center\"><font size=\"-1\"><a href=\"https://computerwolf.com\">Plugin Site</a>, Copyright (C) 2022 <a href=\"https://computerwolf.com\">Computer Wolf LLC</a>. Please view the <a href=\"https://github.com/flamelier/PluginSit#license\">license</a>.</font></div><p></p>";
            echo "</body></html>";
            // print_r($errors);
        }
     }
}


?>