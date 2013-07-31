<?php

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        
        if($action == 'AjaxGenerateSupervisorList') {
            include('../inc/util.php');
            include('../Controllers/SupervisorController.php');
            include('../Views/SupervisorListView.php');
            $conn = connect();
            $supervisorListing = SupervisorController::getSupervisorListing(true, $conn);
            echo SupervisorListView::showMasterSupervisorListForCreate($supervisorListing);
        }
        
        if($action == 'SupervisorSearch') {
            include('../inc/util.php');
            include('../Views/SupervisorListView.php');
            $pdo = getPDO();
            $query = $_POST['q'];
            $listing = "";
            $results = SupervisorModel::searchForSupervisor($query, $pdo);
            foreach($results as $record) {
                $listing = $listing . SupervisorListView::showOneListingForCreate($record['supervisor_id'], $record['first_name'], $record['last_name'], $record['email'], $record['phone']);
            }
            
            echo SupervisorListView::getTopListingHTML(true) . $listing . SupervisorListView::getBottomListingHTML();
        }

        if($action == 'SupervisorContinue') {
            include('../Views/CreateFormView.php');
            echo CreateFormView::getPositionForm();
        }
    }
    
    
    class SupervisorModel  {
        // before you insert, check the unique constraints of the table: unh_email has to be unique.
        // so first do a select query and select the ID so if there is a result row, return that ID
        static function createSupervisor($lName, $fName, $email, $phone, $fk_company_id) {
            $conn = connect();
            $inserted_supervisor_id = null;
           
            $sql = "INSERT INTO supervisor (last_name, first_name, email, phone, fk_company_id) VALUES (?, ?, ?, ?, ?)";
        
            if(!$stmt = $conn->prepare($sql)) {
                exit("You have a MySQL syntax error: " . $sql . "<br />
                    Execution failed: " . $stmt->errno . ": " . $stmt->error);
            }
           
            if(!$stmt->bind_param("ssssi", $lName, $fName, $email, $phone, $fk_company_id)) {
                exit("Your arguments do not match the table columns.");
            }
           
            if(!$stmt->execute()) {
                exit("Execution failed. " . $stmt->errno . ": " . $stmt->error);
            }
           
            mysqli_close($conn);
            exit();
           
            return $inserted_supervisor_id = $conn->insert_id;
        }
    
        static function searchForSupervisor($query, $pdo) {
            $result = array();
            if(!empty($query)) {
                $sql = "SELECT * FROM supervisor WHERE LOWER(last_name) LIKE LOWER(?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array('%'.$query.'%'));
                return $stmt->fetchAll();
                
            } else {
                return "Please enter a search query!";
            }
        }
       
        static function checkForSupervisor($conn, $unh_email) {
            // not being used right now
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
        static function selectAllSupervisors($conn = null) {
            if($conn == null) {
                $conn = connect();
            }        
                
            $supervisorList = array();
           
            $sql = "SELECT * FROM supervisor ORDER BY last_name asc";
            $stmt = $conn->query($sql);
           
            while($row = $stmt->fetch_assoc()) {
                $supervisorList[] = $row;
            }
            $stmt->close();
            return $supervisorList;
        }
     }


?>