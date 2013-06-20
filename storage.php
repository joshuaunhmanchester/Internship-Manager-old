<?php

/*
* File: storage.php
* Author: Joshua Anderson
* Created: 5/25
* Modified:
* Descritption: This will be used to handle all the data gathered and inserted into our internshipmanager database
* 
 * so - how to return results from select (bind_param as well) as array: http://stackoverflow.com/questions/12534137/return-mysqli-query-result-as-an-array-in-php
 * 
 * */
   
   require_once("inc/util.php");
   require_once("control.php");
   require_once("view.php");
   
   // This will be esentially creating the "position".  
   // It will insert the data in our database
   /*
    * This will be essentially creating the "position".
    * It will insert all the form data in the database
    * PHASE 1 NOTES: This will only be inserting the user's data (5/30)
    * @param string $lname
    * @param string $fname
    * @param string $unh_email
    */
   function createPosition($lname, $fname, $unh_email)
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
       
       $inserted_user_id = $conn->insert_id;
       
       mysqli_close($conn);
       
       header("Location: /intern/", false);
       exit();
   }
   
   // returns an array containing all the student records
   function selectAllInternships()
   {
       $conn = connect();
       $internshipsList = array();
       
       $query = "SELECT * FROM student ORDER BY last_name asc";
       $stmt = $conn->query($query);
       
       while($row = $stmt->fetch_assoc())
       {
           $internshipsList[] = $row;
       }
       
       $stmt->close();
       return $internshipsList;
   }
   
?>