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
           
           $fname = validateInput($_POST['fname'], "First Name", $hasErrors);
           $lname = validateInput($_POST['lname'], "Last Name", $hasErrors);
           $email = validateInput($_POST['email'], "UNH Email", $hasErrors);
           
           if(count($hasErrors) == 0)
           {
               StudentModel::createStudent($lname, $fname, $email);
           }
           else 
           {
               MainView::showFormError($hasErrors);  
           }
       }
   }

?>