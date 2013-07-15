<?php

   require_once("inc/util.php");
   require_once("Views/CreateFormView.php");
   require_once("Views/StudentListView.php");
   require_once("Views/HomeHTMLView.php");
   require_once("Models/StudentModel.php");
   require_once("MainControl.php");
   
   class StudentController 
   {
       static function main()
       {
           echo HomeHTMLView::getTopHTML();
           
           $internshipListing = StudentController::getInternshipListing();
           echo StudentListView::showMasterInternshipList($internshipListing);
           
           echo HomeHTMLView::getBottomHTML();
       }
       
       // this will return an array of all the listings in a table row (html)
       static function getInternshipListing()
       {
           $internshipMasterList = array();
           $results = "";
           
           $internshipMasterList = StudentModel::selectAllInternships();
           foreach($internshipMasterList as $record)
           {
               $results = $results . StudentListView::showOneListing($record['student_id'], $record['first_name'], $record['last_name'], $record['email']);
           }
           
           return $results;
       }
   }

?>