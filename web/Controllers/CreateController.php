<?php
   
   class CreateController 
   {
       static function getMasterForm()
       {
           echo HomeHTMLView::getTopHTML();
           
           if(isset($_POST['submitButton']))
           {
               CreateController::processFormData();    
           }
           
           //echo CreateFormView::getAccordionForm();
           echo CreateFormView::getStudentForm();
           echo CreateFormView::getBottomFormTag(); 
            
           echo HomeHTMLView::getBottomHTML();
           
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
               HomeHTMLView::showFormError($hasErrors);  
           }
       }
   }

?>