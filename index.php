<?php
ob_start(); 
require_once("inc/util.php");
require_once("control.php");
require_once("storage.php");
require_once("view.php");

// calling the main funciton that runs the entire web app.
main();

ob_flush();