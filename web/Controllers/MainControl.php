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
   require_once("Views/MainView.php");
   require_once("Views/StudentView.php");
   require_once("Models/StudentModel.php");
   require_once("StudentController.php");
   
   class MainControl
   {
       // main() will control the index.php page (home page)
       // The main list of positions will be here as well
       static function main()
       {
           echo MainView::getTopHTML();
           echo MainView::welcome();
           
           $internshipListing = MainControl::getInternshipListing();
           echo MainView::showMasterInternshipList($internshipListing);
           
           echo MainView::getBottomHTML();
       }
       
       // this will return an array of all the listings in a table row (html)
       static function getInternshipListing()
       {
           $internshipMasterList = array();
           $results = "";
           
           $internshipMasterList = StudentModel::selectAllInternships();
           foreach($internshipMasterList as $record)
           {
               $results = $results . MainView::showOneListing($record['student_id'], $record['first_name'], $record['last_name'], $record['email']);
           }
           
           return $results;
       }

   }

?>