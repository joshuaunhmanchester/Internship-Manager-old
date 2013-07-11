<?php

    class StudentView {
        // takes in 4 parameters that have been validated from the form filled out
        // creates a variable (record) that will contain the html row for the listint table
        static function showOneListing($student_id, $first_name, $last_name, $email)
        {
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
        
        // this combines all the HTML of the listint table
        // takes in a paramter (listing) which is the entire table HTML containing all the records
        static function showMasterInternshipList($listing)
        {
            $results = MainView::getTopListingHTML() . $listing . MainView::getBottomListingHTML();
            
            return $results;
        }
    }
?>