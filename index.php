<?php 
/*
Copyright (C) 2022 Computer Wolf LLC.
*/

// Calls the config file with mysql information.
require_once('includes/config.php');

// Start the session
session_start();

$view_query = "UPDATE pluginsTable SET pluginViews = pluginViews + 1 WHERE pluginEnabled = 1";
if (mysqli_query($con, $view_query)) {
    // Do nothing because worked. :)
}
else {
    echo "<h1>ERROR UPDATING BY 1</h1>";
}

$download_query = "SELECT * FROM pluginsTable WHERE pluginEnabled = true";
$download_data = mysqli_query($con, $download_query);

while($download_row = mysqli_fetch_assoc($download_data)) {
    $pluginID = $download_row['pluginID'];
    $pluginLink = $download_row['pluginLink'];
    if(isset($_POST[''.$pluginID.''])) {
        // echo "<a href=\"".$pluginLink."\">This is ".$pluginID." that is selected</a>"; // Debug

        $update_download_query = "UPDATE pluginsTable SET pluginDownloads = pluginDownloads + 1 WHERE pluginID = $pluginID";
        if (mysqli_query($con, $update_download_query)) {
            echo "<meta http-equiv=\"Refresh\" content=\"0 url=".$pluginLink."\" />";
        }
    }
}
?>

<!DOCTYPE html>

<html lang="zxx">

    <head>

        <!-- metas -->

        <meta charset="utf-8">

        <meta name="author" content="themepaa">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="keywords" content="Plugin Site - Home">

        <meta name="description" content="Plugin Site - Home">

        <!-- title -->

        <title>Plugin Site - Home</title>

        <!-- Favicon -->

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">

        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

        <link rel="manifest" href="/site.webmanifest">

        <!-- plugin CSS -->

        <link href="static/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="static/plugin/font-awesome/css/all.min.css" rel="stylesheet">

        <link href="static/plugin/et-line/style.css" rel="stylesheet">

        <link href="static/plugin/themify-icons/themify-icons.css" rel="stylesheet">

        <link href="static/plugin/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">

        <link href="static/plugin/magnific/magnific-popup.css" rel="stylesheet">

        <!-- theme css -->

        <link href="static/style/master.css" rel="stylesheet">
        <!-- <link href="static/css/main.css" rel="stylesheet"> -->

    </head>



    <!-- Body Start -->

    <body data-spy="scroll" data-target="#navbar-collapse-toggle" data-offset="0">

        

        <!-- page loading -->

        <div id="loading">

            <div class="load-circle"><span class="one"></span></div>

        </div>

        <!-- end page loading -->



        <!-- Header -->

        <header class="header-nav header-nav-white">

            <!-- Header Middle -->

            <div class="navbar navbar-default navbar-expand-lg main-navbar main-navbar">

                <div class="container">

                    <div class="navbar-brand">

                        <a class="logo-text" href="https://computerwolf.com/webprojects/Plugin-Site/index.php">

                        Plugin Site

                        </a>

                    </div>

                    

                    <div class="navbar-collapse collapse" id="navbar-collapse-toggle">

                        <ul class="nav navbar-nav ml-auto">

                            <li>

                                <a class="nav-link" href="#home">Home</a>

                            </li>

                            <li><a class="nav-link" href="#projects">Plugins</a></li>

                            <?php if ( isset($_SESSION['uid']) ) :?>
                                <li><a class="nav-link" href="logoff.php">Logout</a></li>
                            <?php else:?>
                                <!-- Left empty as put login form at bottom of page. -->
                            <?php endif;?>

                        </ul>

                    </div>



                    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle" aria-expanded="false">

                        <span class="icon-bar"></span>

                    </button>

                </div>

            </div>

            <!-- End Header Middle -->

        </header>

        <!-- Header End -->



        <!-- Main -->

        <main>

            <!-- Discord Add Testiminail -->
<?php if ( isset($_SESSION['uid']) ) :?>
            <section id="addPlugin" class="section gray-bg" style="background-image: url(static/img/171177.jpg);">

                <div class="container">

                    <div class="row justify-content-center sm-m-25px-b m-45px-b">

                        <div class="col-md-12 col-lg-8">

                            <div class="section-title text-center">

                                <h2 class="white-color">ADD <span class="theme-color">NEW </span> PLUGINS</h2>

                            </div>        

                        </div>

                    </div>

                    <div class="row justify-content-center">

                        <div class="col-lg-7 m-15px-tb">

                            <!-- form -->

                            <div class="contact-form box-shadow-lg dark-bg">
                            
                                <div class="sm-title p-25px-b">

                                    <h5 class="white-color">Upload your plugins here.</h5>

                                    <p class="m-0px">Copyright (C) 2022 Computer Wolf LLC</p>

                                    <!-- <i class="fa fa-quote-left fa-3x fa-pull-left"></i> -->

                                </div>

                                <form method="POST" action="includes/uploadPlugin.php" enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <input id="name" name="name" type="text" placeholder="Plugin Name" value="" class="form-control" maxlength="50" required="">

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <input id="versions" type="text" placeholder="Plugin Versions" name="versions" value="" class="form-control" maxlength="14" required="">

                                            </div>

                                        </div>

                                        <div class="col-sm-12">

                                            <div class="form-group">

                                                <textarea id="message" placeholder="Plugin Description" name="message" class="form-control" maxlength="255" required=""></textarea>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                            <input type="file" name="jar" />

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <select id="enabled" list="enabled" name="enabled" class="form-control" required="">
                                                    <option selected disabled hidden value="">Show for download?</option>
                                                    <option value='1'>Yes</option>
                                                    <option value='0'>No</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="send">

                                                <button class="m-btn m-btn-t-theme" type="submit" name="send">Submit</button>

                                                <a class="m-100px-l m-btn m-btn-t-theme" href="logoff.php">Logout</a>

                                            </div>

                                        </div>



                                    </div>

                                </form>
                                <!-- end form -->

                            </div>
                        </div>
                        
                    </div>

                </div>

            </section>
<?php else:?>

<?php endif;?>
            <!-- End Discord Add Testiminail -->



            <!-- Feature Box -->

            <section id="projects" class="section dark-bg" style="background-image: url(static/img/171177.jpg);">

                <div class="container">

                    <div class="row justify-content-center sm-m-25px-b m-45px-b">

                        <div class="col-md-12 col-lg-8">

                            <div class="section-title text-center">

                                <h3 class="white-color">

                                    <span class="theme-color">My</span> Plugins

                                </h3>

                                <p class="m-0px large white-color">My current and past plugins.</p>

                            </div>        

                        </div>

                    </div>

                    <div class="row">

                    <?php
                        // echo "<h1>INSIDE PLUGIN OUTPUT</h1>"; // Deug
                        $plugin_query = "SELECT * FROM pluginsTable WHERE pluginEnabled = true";
                        $plugin_data = mysqli_query($con, $plugin_query);

                        while($plugin_row = mysqli_fetch_assoc($plugin_data)) {
                            $pluginID = $plugin_row['pluginID'];
                            $pluginUploadDate = $plugin_row['pluginUploadDate'];
                            $pluginName = $plugin_row['pluginName'];
                            $pluginDescription = $plugin_row['pluginDescription'];
                            $pluginVersions = $plugin_row['pluginVersions'];
                            $pluginDownloads = $plugin_row['pluginDownloads'];
                            $pluginViews = $plugin_row['pluginViews'];
                            $pluginLink = $plugin_row['pluginLink'];

                            echo "<div class=\"col-sm-6 col-lg-4 m-15px-tb\">";

                                // echo "<a href=\"".$pluginLink."\" alt=\"Arevior website\" target=\"_blank\">";

                                echo "<div class=\"feature-box-5 text-center p-40px-tb p-20px-lr hover-top transition box-shadow-hover\">";

                                    // echo "<div class=\"f-icon theme-color m-10px-b\">";

                                    //     echo "<img src=\"static/img/projects/arevior-logo.png\" alt=\"".$pluginName."\">";

                                    // echo "</div>";

                                    echo "<div class=\"feature-content\">";
                                        
                                        echo "<h8 class=\"white-color-light\">Downloads: ".$pluginDownloads." Views: ".$pluginViews."</h8>";

                                        echo "<h6 class=\"white-color font-w-700 m-15px-b\">".$pluginName."</h6>";
                                        
                                        echo "<h8 class=\"white-color-light\">Version(s): ".$pluginVersions."</h8>";

                                        echo "<p class=\"m-0px white-color-light\">".$pluginDescription."</p>";

                                        echo "<form method=\"POST\" action=\"\"><button class=\"m-btn m-btn-t-theme\" type=\"submit\" name=\"$pluginID\">Download</button></form>";
                                        
                                        // echo "<a class=\"m-100px-l m-btn m-btn-t-theme\" href=\"".$pluginLink."\">Download</a>";
                                        
                                    echo "</div>";
                                echo "</div>";

                                // echo "</a>";

                            echo "</div>";
                        }

                    ?>



                    </div>

                </div>

            </section>

            <!-- End Feature Box -->

        </main>

        <!-- main end -->

        <!-- Footer-->

        <footer class="footer footer-dark">

            <div class="footer-top">

                <div class="container">

                    <div class="footer-about text-center">

                        <div class="fot-logo">

                            Plugin Site

                        </div>

                        <div class="nav si-dark si-round social-icon si-40 justify-content-center">
                            <?php if ( isset($_SESSION['uid']) ) :?>
                                <p>Log out using the button in the add new plugin form.</p>
                                <!-- <a class="" href="logoff.php">logout</a> -->
                            <?php else:?>
                                <form action="logon.php" method="POST">
                                    <input type="text" name="uid" size="20" autocomplete="off" style="background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required="">
                                    <input type="password" name="password" size="20" autocomplete="off" style="background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required="">
                                    <input type="submit" value="login">
                                </form>
                                <!-- <li><a class="nav-link" href="logon.php">Login</a></li> -->
                            <?php endif;?>

                        </div>

                    </div>

                </div>

            </div>

            <!-- footer top -->

            <div class="footer-bottom">

                <div class="container text-center">

                    <p>Computer Wolf LLC © 2022 copyrightall right reserved</p>

                </div>

            </div>

            <!-- /footer bottom -->

        </footer>

        <!-- footer End -->





        <!-- jquery -->

        <script src="static/js/jquery-3.2.1.min.js"></script>

        <script src="static/js/jquery-migrate-3.0.0.min.js"></script>

        <!-- end jquery -->

        <!-- appear -->

        <script src="static/plugin/appear/jquery.appear.js"></script>

        <!-- end appear -->

        <!--bootstrap-->

        <script src="static/plugin/bootstrap/js/popper.min.js"></script>

        <script src="static/plugin/bootstrap/js/bootstrap.js"></script>

        <!--end bootstrap-->

        <!-- End -->



        <!-- custom js -->

        <script src="static/js/custom.js"></script>

        <!-- end -->



        <!-- end body -->

    </body>

</html>