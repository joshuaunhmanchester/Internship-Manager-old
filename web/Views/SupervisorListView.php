<?php

    class SupervisorListView {
        // takes in 4 parameters that have been validated from the form filled out
        // creates a variable (record) that will contain the html row for the listint table
        static function showOneListing($supervisor_id, $fName, $lName, $email, $phone) {
            $record = '
                                <tr>
                                    <td>' . $supervisor_id . '</td>
                                    <td>' . $fName . '</td>
                                    <td>' . $lName . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . $phone . '</td>
                                    <td><a href="edit.php?s_id='.$supervisor_id.'">Edit</a></td>
                                </tr>';
                                
            return $record;
        }
        
        static function showOneListingForCreate($supervisor_id, $fName, $lName, $email, $phone) {
            $record = '
                                <tr>
                                    <td class="list-id">' . $supervisor_id . '</td>
                                    <td class="list-name">' . $fName . '</td>
                                    <td class="list-url">' . $lName . '</td>
                                    <td class="list-city">' . $email . '</td>
                                    <td class="list-state">' . $phone . '</td>
                                    <td class="select-supervisor" id="'. $supervisor_id . '">Select</td>
                                </tr>'; 
                                
            return $record;
        }
        
        // this combines all the HTML of the listint table
        // takes in a paramter (listing) which is the entire table HTML containing all the records
        static function showMasterSupervisorList($listing) {
            return SupervisorListView::getTopListingHTML(false) . $listing . SupervisorListView::getBottomListingHTML();
        }
        
        static function showMasterSupervisorListForCreate($listing) {
            return SupervisorListView::getTopListingHTML(true) . $listing . SupervisorListView::getBottomListingHTML();
        }
        
        // used to start the table listing all the current student profile records
        static function getTopListingHTML($forCreateForm) {
            if($forCreateForm) {
                $topHTML = '
                            <div class="create-student-listing-table-wrapper">
                                <table class="listing-table" cellspacing="0">
                                    <tr><th>ID#</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th></th></tr>';
                    
            } else {
                $topHTML = '
                        <div class="student-listing-table-wrapper">
                            <fieldset>
                                <legend>Supervisor Listing</legend>
                                <table class="listing-table" cellspacing="0">
                                    <tr><th>ID#</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th></th></tr>';
                
            }
                        
            return $topHTML;
        }
        
        // just finishes the bottom of the listing table
        static function getBottomListingHTML() {
            $botHTML = '
                                </table>
                            </fieldset>
                        </div>';
            
            return $botHTML;
        }
    }
?>