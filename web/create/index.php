<?php
ob_start(); 
require_once("../inc/util.php");
require_once("../Controllers/CreateController.php");

// calling the main funciton that creates and processes the master form
CreateController::getMasterForm();

ob_flush();