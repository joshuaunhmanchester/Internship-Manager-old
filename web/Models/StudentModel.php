<?php

require_once("../Controllers/StudentController.php");

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    
    if($action == 'AjaxGenerateStudentList') {
        $internshipListing = StudentController::getInternshipListing(true);
        echo StudentListView::showMasterStudentListForCreate($internshipListing);
    }
}


class StudentModel 
{
    // before you insert, check the unique constraints of the table: unh_email has to be unique.
    // so first do a select query and select the ID so if there is a result row, return that ID
   static function createStudent($lname, $fname, $unh_email)
   {
       $conn = connect();
       $inserted_user_id = null;
       
       if(strlen(StudentModel::checkForStudent($conn, $unh_email)) > 0) {
           return StudentModel::checkForStudent($conn, $unh_email);
       } else {
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
           
           if(!$studentStmt->execute()) {
               exit("Execution failed. " . $studentStmt->errno . ": " . $studentStmt->error);
           }
           
           mysqli_close($conn);
           
           //header("Location: /intern/", false);
           exit();
           
           return $inserted_user_id = $conn->insert_id;
       }
   }
   
   static function checkForStudent($conn, $unh_email) {
       $sql = "SELECT student_id FROM student where email=?";
       
       if($stmt = $conn->prepare($sql)) {
           $stmt->bind_param("s", $unh_email);
           
           $stmt->execute();
           $stmt->bind_result($out_id);
           $stmt->fetch();
           
           return $out_id;
           
           $stmt->close();
       } 
       
       $conn->close();
   }
   
   // returns an array containing all the student records
   static function selectAllInternships()
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
}


?>