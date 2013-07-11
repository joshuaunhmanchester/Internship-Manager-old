<?php
ob_start(); 
require_once("inc/util.php");
require_once("Controllers/StudentController.php");

// calling the main funciton that runs the entire web app.
StudentController::main();

ob_flush();