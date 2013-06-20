<?php
/*
* File: control.php
* Author: Joshua Anderson
* Created: 5/24
* Modified: 6/20
* Descritption: This file will act as the brain of the web application.  It is meant to control how a dynamic page is
* assembled, based on what the user is passing through the super global, $_POST
* */
   
   require_once("inc/util.php");
   require_once("storage.php");
   require_once("view.php");
   
   $hasErrors = array();
   $inputData = array();
   
   // main() will control the index.php page (home page)
   // The main list of positions will be here as well
   function main()
   {
       echo getTopHTML();
       echo welcome();
       
       $internshipListing = getInternshipListing();
       echo showMasterInternshipList($internshipListing);
       
       echo getBottomHTML();
   }
   
   // createMain() will control the create/index.php page (form page)
   function createMain()
   {
       echo getTopHTML();
       
       if(isset($_POST['submitButton']))
       {
           processFormData();
       }
       
       echo buildForm();
       echo getBottomHTML();
       exit();
   }
   
   // This will receive the data from $_POST and will collect all the input data from the form.
   // Will then send to createPosition() funciton to inset the information in the database.  
   function processFormData()
   {
       global $hasErrors;
       $fname = validateInput($_POST['fname'], "First Name");
       $lname = validateInput($_POST['lname'], "Last Name");
       $email = validateInput($_POST['email'], "UNH Email");
       
       if(count($hasErrors) == 0)
       {
           createPosition($lname, $fname, $email);
       }
       else 
       {
           showFormError($hasErrors);
       }
   }
   
   
   // this will return an array of all the listings in a table row (html)
   function getInternshipListing()
   {
       $internshipMasterList = array();
       $results = "";
       
       $internshipMasterList = selectAllInternships();
       foreach($internshipMasterList as $record)
       {
           $results = $results . showOneListing($record['student_id'], $record['first_name'], $record['last_name'], $record['email']);
       }
       
       return $results;
   }
   
   // basic validation - checking for empty inputs
   function validateInput($data, $label)
   {
       global $hasErrors;
       
       if(strlen($data) == 0)
       {
           $hasErrors[] = $label . " is a required field";
       }
       else 
       {
           return $data; 
       }
   }

?>