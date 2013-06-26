<?php
ob_start(); 
require_once("inc/util.php");
require_once("Controllers/MainControl.php");

// calling the main funciton that runs the entire web app.
MainControl::main();

ob_flush();