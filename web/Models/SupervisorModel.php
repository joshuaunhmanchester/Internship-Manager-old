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
            $results = SupervisorModel::searchForSupervisor($query);
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
            $pdo = getPDO();
           
            if(strlen(SupervisorModel::checkForSupervisor($email)) > 0) {
                return SupervisorModel::checkForSupervisor($email);
            } else {
                $info = array('last_name' => $lName, 'first_name' => $fName, 'email' => $email, 'phone' => $phone, 'fk_company_id' => $fk_company_id);
                return PDOWrapperModel::insert($pdo, 'supervisor', $info);
            }
        }
        
        
        static function searchForSupervisor($query) {
            $pdo = getPDO();
            $result = array();
            if(!empty($query)) {
                $sql = "SELECT * FROM supervisor WHERE LOWER(last_name) LIKE LOWER(?) OR LOWER(email) LIKE LOWER(?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array('%'.$query.'%','%'.$query.'%'));
                return $stmt->fetchAll();
            } else {
                return "Please enter a search query for last name or email!";
            }
        }
       
        static function checkForSupervisor($email) {
            $pdo = getPDO();
            $sql = "SELECT email FROM supervisor where email=:email";
           
            if($stmt = $pdo->prepare($sql)) {
                $stmt->bindParam(':email', $email);
                
                $stmt->execute();
                return $stmt->fetchColumn(); 
                //fetchColumn() will get the index of the columns provided.  This case, only one was selected so don't need to pass any
                  
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