<?php
  // $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  // if(strpos($url, "create") !== false) {
      // echo 'create';
      // require_once("../Views/StudentListView.php"); 
      // require_once("../Controllers/StudentController.php");
      // //require_once("../Models/StudentModel.php");
  // } else {
      // echo 'nope';
      // //require_once()"./Models/StudentModel.php");
  // }
  
  
  
   class StudentController 
   {
       static function main()
       {
           $conn = connect();
           echo HomeHTMLView::getTopHTML();
           
           $internshipListing = StudentController::getInternshipListing(false, $conn);
           echo StudentListView::showMasterInternshipList($internshipListing);
           
           echo HomeHTMLView::getBottomHTML();
       }
       
       // this will return an array of all the listings in a table row (html)
       static function getInternshipListing($isForCreate, $conn) // could put a parameter in there to see if its for the form or not
       {
           $internshipMasterList = array();
           $results = "";
           
           $internshipMasterList = StudentModel::selectAllInternships($conn);
           foreach($internshipMasterList as $record)
           {
               if($isForCreate) {
                   require_once('../Views/StudentListView.php');
                   $results = $results . StudentListView::showOneListingForCreate($record['student_id'], $record['first_name'], $record['last_name'], $record['email']);  
               } else {
                   $results = $results . StudentListView::showOneListing($record['student_id'], $record['first_name'], $record['last_name'], $record['email']);                   
               }

           }
           
           return $results;
       }
   }

?>