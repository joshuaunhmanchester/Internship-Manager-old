<?php
   class SupervisorController  {
       static function main() {
           $conn = connect();
           echo HomeHTMLView::getTopHTML();
           
           $supervisorListing = SupervisorController::getSupervisorList(false, $conn);
           echo SupervisorListView::showMasterSupervisorList($supervisorListing);
           
           echo HomeHTMLView::getBottomHTML();
       }
       
       // this will return an array of all the listings in a table row (html)
       // could put a parameter in there to see if its for the form or not 
       static function getSupervisorListing($isForCreate, $conn) {
           $supervisorMasterList = array();
           $results = "";
           
           $supervisorMasterList = SupervisorModel::selectAllSupervisors($conn);
           foreach($supervisorMasterList as $record) {
               if($isForCreate) {
                   require_once('../Views/SupervisorListView.php');
                   $results = $results . SupervisorListView::showOneListingForCreate($record['supervisor_id'], $record['first_name'], $record['last_name'], $record['email'], $record['phone']);  
               } else {
                   $results = $results . SupervisorListView::showOneListing($record['supervisor_id'], $record['first_name'], $record['last_name'], $record['email'], $record['phone']);                
               }
           }
           return $results;
       }
   }

?>