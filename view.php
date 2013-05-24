<?php
/*
* File: view.php
* Author: Joshua Anderson
* Created: 5/24
* Modified: 5/24
* Descritption: The view file will handle all the HTML and forms throughout the site
* */


// Just shows a welcome message if index.php is not on postback.
// @return's string with message

function welcome()
{
    $welcomeStr = "<div class='welcome'>Welcome to the COMP TECH Internship Manager</div>";
    return $welcomeStr;
}

?>

<html>
    <head>
        <title><?php echo Site_Title; ?></title>
        <link href="inc/master.css" media="all" rel="stylesheet" type="text/css" />
    </head>
</html>