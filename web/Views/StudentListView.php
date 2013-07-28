<?php

    class StudentListView {
        // takes in 4 parameters that have been validated from the form filled out
        // creates a variable (record) that will contain the html row for the listint table
        static function showOneListing($student_id, $first_name, $last_name, $email) {
            $record = '
                                <tr>
                                    <td>' . $student_id . '</td>
                                    <td>' . $first_name . '</td>
                                    <td>' . $last_name . '</td>
                                    <td>' . $email . '</td>
                                    <td><a href="edit.php?s_id='.$student_id.'">Edit</a></td>
                                </tr>';
                                
            return $record;
        }
        
        static function showOneListingForCreate($student_id, $first_name, $last_name, $email) {
            $record = '
                                <tr>
                                    <td class="list-id">' . $student_id . '</td>
                                    <td class="list-fName">' . $first_name . '</td>
                                    <td class="list-lName">' . $last_name . '</td>
                                    <td class="list-email">' . $email . '</td>
                                    <td class="select-student" id="'. $student_id . '">Select</td>
                                </tr>'; 
                                
            return $record;
        }
        
        // this combines all the HTML of the listint table
        // takes in a paramter (listing) which is the entire table HTML containing all the records
        static function showMasterInternshipList($listing) {
            return studentListView::getTopListingHTML(false) . $listing . StudentListView::getBottomListingHTML();
        }
        
        static function showMasterStudentListForCreate($listing) {
            return studentListView::getTopListingHTML(true) . $listing . StudentListView::getBottomListingHTML();
        }
        
        // used to start the table listing all the current student profile records
        static function getTopListingHTML($forCreateForm) {
            if($forCreateForm) {
                $topHTML = '
                            <div class="create-student-listing-table-wrapper">
                                <table class="listing-table" cellspacing="0">
                                    <tr><th>ID#</th><th>First Name</th><th>Last Name</th><th>Email</th><th></th></tr>';
                    
            } else {
                $topHTML = '
                        <div class="student-listing-table-wrapper">
                            <fieldset>
                                <legend>Student Listing</legend>
                                <table class="listing-table" cellspacing="0">
                                    <tr><th>ID#</th><th>First Name</th><th>Last Name</th><th>Email</th><th></th></tr>';
                
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