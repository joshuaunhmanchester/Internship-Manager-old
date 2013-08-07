<?php

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        
        if($action == 'AjaxGenerateCompanyList') {
            include('../inc/util.php');
            include('../Controllers/CompanyController.php');
            $conn = connect();
            $internshipListing = CompanyController::getCompanyListing(true, $conn);
            echo CompanyListView::showMasterCompanyListForCreate($internshipListing);
        }
        
        if($action == 'CompanySearch') {
            include('../inc/util.php');
            include('../Views/CompanyListView.php');
            $pdo = getPDO();
            $query = $_POST['q'];
            $listing = "";
            $results = CompanyModel::searchForCompany($query);
            foreach($results as $record) {
                $listing = $listing . CompanyListView::showOneListingForCreate($record['company_id'], $record['name'], $record['website_url'], $record['city'], $record['state']);
            }
            
            echo CompanyListView::getTopListingHTML(true) . $listing . CompanyListView::getBottomListingHTML();
        }

        if($action == 'CompanyContinue') {
            include('../Views/CreateFormView.php');
            echo CreateFormView::getSupervisorForm();
        }
    }
    
    class CompanyModel  {
        /*
         * This function takes in 4 params:
         * 1. lname = Last Name of Student
         * 2. fname = First Name of Student
         * 3. unh_email = Email of Student
         * 
         * Creates a PDO object, and first checks to see if the company email that was passes already exists, if it does, it 
         * will return that companies' ID - if not, this will create an associative array ($info) that contains the params.
         * We will then pass that array, along with the PDO object, and which table we want to use.  
         * 
         * RETURNS ID of company
        **/
        static function createCompany($cName, $cWebURL, $cCity, $cState)
        {
            $pdo = getPDO();
           
            if(strlen(CompanyModel::checkForCompany($cName)) > 0) {
                return CompanyModel::checkForStudent($cName);
            } else {
                $info = array('name' => $cName, 'website_url' => $cWebURL, 'city' => $cCity, 'state' => $cState);
                return PDOWrapperModel::insert($pdo, 'company', $info);
            }
        }
    
        static function searchForCompany($query) {
            $pdo = getPDO();
            $result = array();
            if(!empty($query)) {
                $sql = "SELECT * FROM company WHERE LOWER(name) LIKE LOWER(?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array('%'.$query.'%'));
                return $stmt->fetchAll();
                
            } else {
                return "Please enter a search query!";
            }
        }
       
        static function checkForCompany($cName) {
            $pdo = getPDO();
            $sql = "SELECT name FROM company where name=:name";
           
            if($stmt = $pdo->prepare($sql)) {
                $stmt->bindParam(':name', $cName);
                
                $stmt->execute();
                return $stmt->fetchColumn(); 
                //fetchColumn() will get the index of the columns provided.  This case, only one was selected so don't need to pass any
                  
                $stmt->close();
            } 
           
            $conn->close();
        }
       
        // returns an array containing all the student records
        static function selectAllCompanies($conn = null) {
            if($conn == null) {
                $conn = connect();
            }        
                
            $companyList = array();
           
            $sql = "SELECT * FROM company ORDER BY name asc";
            $stmt = $conn->query($sql);
           
            while($row = $stmt->fetch_assoc()) {
                $companyList[] = $row;
            }
            $stmt->close();
            return $companyList;
        }
     }


?>