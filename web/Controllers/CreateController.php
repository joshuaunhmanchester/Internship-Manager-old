<?php

   require_once("../inc/util.php");
   require_once("../Views/MainView.php");
   require_once("../Views/StudentView.php");
   require_once("../Views/FormView.php");
   require_once("../Models/StudentModel.php");
   
   class CreateController 
   {
       static function getMasterForm()
       {
           echo MainView::getTopHTML();
           
           if(isset($_POST['submitButton']))
           {
               CreateController::processFormData();    
           }
           
           echo FormView::getAccordionForm();
           echo MainView::getBottomHTML();
           
           exit();
       }
       
       static function processFormData()
       {
           $hasErrors = array();
           $studentID = "";
           $companyID = "";
           $supervisorID = "";
           
           $fname = validateInput($_POST['fname'], "First Name", $hasErrors);
           $lname = validateInput($_POST['lname'], "Last Name", $hasErrors);
           $email = validateInput($_POST['email'], "UNH Email", $hasErrors);
           
           $companyType = $_POST['company-select'];
           
           if($companyType == "existing") {
               // get the post value of the dropdown list which will contain the $companyID to pass to supervisor
               // and position functions
           } else {
               $cName = validateInput($_POST['cName'], "Company Name", $hasErrors);
               $cWebsite = validateInput($_POST['$cWebsite'], "Website URL", $hasErrors);
               $cCity = validateInput($_POST['$cCity'], "City", $hasErrors);
               $cState = validateInput($_POST['cState'], "State", $hasErrors);
           }

           if(count($hasErrors) == 0)
           {
               $studentID = StudentModel::createStudent($lname, $fname, $email);
               $companyID = CompanyModel::createCompany($cName, $cWebsite, $cCity, $cState);
           }
           else 
           {
               MainView::showFormError($hasErrors);  
           }
       }
   }

?>