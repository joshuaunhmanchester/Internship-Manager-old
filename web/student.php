<?php
ob_start(); 
require_once("inc/util.php");
require_once("Controllers/StudentController.php");
require_once("Controllers/MainControl.php");
require_once("Views/CreateFormView.php");
require_once("Views/StudentListView.php");
require_once("Views/HomeHTMLView.php");
require_once("Models/StudentModel.php");
require_once("Models/CompanyModel.php");

// calling the main funciton that runs the entire web app.
StudentController::main();

ob_flush();