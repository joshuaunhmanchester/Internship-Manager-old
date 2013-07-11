<?php

   require_once("inc/util.php");
   require_once("Views/MainView.php");
   require_once("Views/StudentView.php");
   require_once("Models/StudentModel.php");
   require_once("MainControl.php");
   
   class StudentController 
   {
       static function main()
       {
           echo MainView::getTopHTML();
           
           $internshipListing = StudentController::getInternshipListing();
           echo StudentView::showMasterInternshipList($internshipListing);
           
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
               $results = $results . StudentView::showOneListing($record['student_id'], $record['first_name'], $record['last_name'], $record['email']);
           }
           
           return $results;
       }
   }

?>