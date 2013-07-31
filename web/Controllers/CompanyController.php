<?php
   class CompanyController  {
       static function main() {
           $conn = connect();
           echo HomeHTMLView::getTopHTML();
           
           $internshipListing = CompanyController::getCompanyList(false, $conn);
           echo CompanyListView::showMasterCompanyList($internshipListing);
           
           echo HomeHTMLView::getBottomHTML();
       }
       
       // this will return an array of all the listings in a table row (html)
       // could put a parameter in there to see if its for the form or not 
       static function getCompanyListing($isForCreate, $conn) {
           $companyMasterList = array();
           $results = "";
           
           $companyMasterList = CompanyModel::selectAllCompanies($conn);
           foreach($companyMasterList as $record) {
               if($isForCreate) {
                   require_once('../Views/CompanyListView.php');
                   $results = $results . CompanyListView::showOneListingForCreate($record['company_id'], $record['name'], $record['website_url'], $record['city'], $record['state']);  
               } else {
                   $results = $results . CompanyListView::showOneListing($record['company_id'], $record['name'], $record['website_url'], $record['city'], $record['state']);                
               }
           }
           return $results;
       }
   }

?>