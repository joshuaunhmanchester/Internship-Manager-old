<?php

class CompanyModel 
{
   static function createCompany($cName, $cWebsite, $cCity, $cState)
   {
       $conn = connect();
       $inserted_user_id = null;
       $studentQuery = "INSERT INTO student (last_name, first_name, email) VALUES (?, ?, ?)";
       
       if(!$studentStmt = $conn->prepare($studentQuery))
       {
           exit("You have a MySQL syntax error: " . $studentQuery . "<br />
                Execution failed: " . $studentStmt->errno . ": " . $studentStmt->error);
       }
       
       if(!$studentStmt->bind_param("sss", $lname, $fname, $unh_email))
       {
           exit("Your arguments do not match the table columns.");
       }
       
       if(!$studentStmt->execute())
       {
           exit("Execution failed. " . $studentStmt->errno . ": " . $studentStmt->error);
       }
       
       mysqli_close($conn);
       
       //header("Location: /intern/", false);
       exit();
       
       return $inserted_user_id = $conn->insert_id;
   }
}

?>