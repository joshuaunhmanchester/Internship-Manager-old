<?php
/*
* File: control.php
* Author: Joshua Anderson
* Created: 5/24
* Modified: 5/24
* Descritption: This file will act as the brain of the web application.  It is meant to control how a dynamic page is
* assembled, based on what the user is passing through the super global, $_POST
* */
   
   require_once("inc/util.php");
   require_once("storage.php");
   require_once("view.php");

   // main() will control the entire execution of the web application
   function main()
   {
       echo welcome();
   }

?>