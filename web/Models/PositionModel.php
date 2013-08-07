<?php
    // Title: Models/PositionModel.php
    // Author: Joshua Anderson
    // Modified Date: 8/6/13
    // Description: This model handles all the interaction with the database regarding the STUDENT table.  This will 
    // incoorporate the PDOWrapper class when making the calls to insert, update, select, delete student record(s).

    require_once('../Classes/PDOWrapper.php');
    
    class PositionModel {
        /*
         * 
        **/
        static function createPosition($position_title, $term, $year, $is_paid, $est_hours_per_week, $fk_student_id, $fk_company_id, $fk_supervisor_id) {
            $pdo = getPDO();
            $info = array('position_title' => $position_title, 'term' => $term, 
                          'year' => $year, 'is_paid' => $is_paid,
                          'est_hours_per_week' => $est_hours_per_week, 'fk_student_id' => $fk_student_id, 
                          'fk_company_id' => $fk_company_id,
                          'fk_supervisor_id' => $fk_supervisor_id);
            return PDOWrapperModel::insert($pdo, 'position', $info);
        }
    
        /*
         * This function takes in 1 param:
         * 1. query = The search term
         * This function does a simple query of the database and searches for records that match either the last name or
         * email of the student.
         * 
         * RETURNS an array of the resulting students.
        **/
        static function searchForStudent($query) {
            $pdo = getPDO();
            $result = array();
            if(!empty($query)) {
                $sql = "SELECT * FROM student WHERE LOWER(last_name) LIKE LOWER(?) OR LOWER(email) LIKE LOWER(?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array('%'.$query.'%','%'.$query.'%'));
                return $stmt->fetchAll();
                
            } else {
                return "Please enter a search query!";
            }
        }
       
        /*
         * This function takes in 1 param:
         * 1. unh_email = The email of the student in question
         * This function does a simple check of the student table to see if there is a record with the email address
         * provdied.
         * 
         * RETURNS the ID if a match is made.
        **/
        static function checkForStudent($unh_email) {
            $pdo = getPDO();
            $sql = "SELECT student_id FROM student where email=:email";
           
            if($stmt = $pdo->prepare($sql)) {
                $stmt->bindParam(':email', $unh_email);
                
                $stmt->execute();
                return $stmt->fetchColumn(); 
                //fetchColumn() will get the index of the columns provided.  This case, only one was selected so don't need to pass any
                  
                $stmt->close();
            } 
           
            $conn->close();
        }
       
        // returns an array containing all the student records
        static function selectAllInternships($conn = null) {
            if($conn == null) {
                $conn = connect();
            }        
                
            $internshipsList = array();
           
            $sql = "SELECT * FROM student ORDER BY last_name asc";
            $stmt = $conn->query($sql);
           
            while($row = $stmt->fetch_assoc()) {
                $internshipsList[] = $row;
            }
            $stmt->close();
            return $internshipsList;
        }
     }


?>