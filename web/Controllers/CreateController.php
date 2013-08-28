<?php
   
   require_once('../Models/CreateModel.php');
   require_once('../inc/util.php');
   
   class CreateController {
       static function getMasterForm() {
           echo HomeHTMLView::getTopHTML();
           
           if(isset($_POST['submitButton'])) {
               CreateController::processFormData();    
           }
           
           //echo CreateFormView::getAccordionForm();
           echo CreateFormView::getStudentForm();
           echo CreateFormView::getBottomFormTag(); 
            
           echo HomeHTMLView::getBottomHTML();
           
           exit();
       }
       
       static function processFormData() {
           $hasErrors = array();
           $createdPositionID;
           $studentID;
           $companyID;
           $supervisorID;
           $hasStudent = false;
           $hasCompany = false;
           $hasSupervisor = false;
           
           $fName;
           $lName;
           $email;
           
           $cName;
           $cURL;
           $cCity;
           $cState;
           
           $sFName;
           $sLName;
           $sEmail;
           $sPhone;
           
           $pTitle;
           $pYear;
           $pIsPaid;
           $pEstHours;
           
           $studentID = $_POST['selected-student-from-list'];
           $companyID = $_POST['selected-company-from-list'];
           $supervisorID = $_POST['selected-supervisor-from-list'];
           
           if(empty($studentID)) {
              $fname = validateInput($_POST['fname'], "First Name", $hasErrors);
              $lname = validateInput($_POST['lname'], "Last Name", $hasErrors);
              $email = validateInput($_POST['email'], "UNH Email", $hasErrors);
           } else {
               $hasStudent = true;
           }
           
           if(empty($companyID)) {
               $cName = validateInput($_POST['cName'], "Company Name", $hasErrors);
               $cURL = validateInput($_POST['cWebURL'], "Company Website", $hasErrors);
               $cCity = validateInput($_POST['cCity'], "Company City", $hasErrors);
               $cState = validateInput($_POST['cState'], "Company State", $hasErrors);
           } else {
               $hasCompany = true;
           }
           
           if(empty($supervisorID)) {
               $sFName = validateInput($_POST['sFName'], "Supervisor First Name", $hasErrors);
               $sLName = validateInput($_POST['sLName'], "Supervisor Last Name", $hasErrors);
               $sEmail = validateInput($_POST['sEmail'], "Supervisor Email", $hasErrors);
               $sPhone = validateInput($_POST['sPhone'], "Supervisor Phone", $hasErrors);
           } else {
               $hasSupervisor = true;
           }
           
           $pTitle = validateInput($_POST['pTitle'], "Position Title", $hasErrors);
           $pTerm = validateInput($_POST['pTerm'], "Position Term", $hasErrors);
           $pYear = validateInput($_POST['pYear'], "Position Year", $hasErrors);
           $pIsPaid = validateInput($_POST['pIsPaid'], "Is Paid", $hasErrors);
           $pEstHours = validateInput($_POST['pEstHours'], "Estimated Hours", $hasErrors);
           

           if(count($hasErrors) == 0) {
               if(!$hasStudent) {
                   $studentID = StudentModel::createStudent($lname, $fname, $email);
               }
               if(!$hasCompany) {
                   $companyID = CompanyModel::createCompany($cName, $cURL, $cCity, $cState);
               }
               if(!$hasSupervisor) {
                   $supervisorID = SupervisorModel::createSupervisor($sFName, $sLName, $sEmail, $sPhone, $companyID);
               }
               
               if(!empty($studentID) && !empty($companyID) && !empty($supervisorID)) {
                   $createdPositionID = PositionModel::createPosition($pTitle, $pTerm, $pYear, $pIsPaid, $pEstHours, $studentID, $companyID, $supervisorID);  
                   header('Location: /intern/view_position.php?id='.$createdPositionID);
               }
           } else {
               HomeHTMLView::showFormError($hasErrors);  
           }
       }
   }

?>