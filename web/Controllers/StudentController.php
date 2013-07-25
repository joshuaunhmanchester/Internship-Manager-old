<?php

   require_once("../inc/util.php");
   require_once("../Views/CreateFormView.php");
   require_once("../Views/StudentListView.php");
   require_once("../Views/HomeHTMLView.php");
   require_once("../Models/StudentModel.php");
   require_once("MainControl.php");
   
   class StudentController 
   {
       static function main()
       {
           echo HomeHTMLView::getTopHTML();
           
           $internshipListing = StudentController::getInternshipListing(false);
           echo StudentListView::showMasterInternshipList($internshipListing);
           
           echo HomeHTMLView::getBottomHTML();
       }
       
       // this will return an array of all the listings in a table row (html)
       static function getInternshipListing($isForCreate) // could put a parameter in there to see if its for the form or not
       {
           $internshipMasterList = array();
           $results = "";
           
           $internshipMasterList = StudentModel::selectAllInternships();
           foreach($internshipMasterList as $record)
           {
               if($isForCreate) {
                   $results = $results . StudentListView::showOneListingForCreate($record['student_id'], $record['first_name'], $record['last_name'], $record['email']);  
               } else {
                   $results = $results . StudentListView::showOneListing($record['student_id'], $record['first_name'], $record['last_name'], $record['email']);                   
               }

           }
           
           return $results;
       }
   }

?>