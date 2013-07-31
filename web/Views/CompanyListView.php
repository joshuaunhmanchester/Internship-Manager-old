<?php

    class CompanyListView {
        // takes in 4 parameters that have been validated from the form filled out
        // creates a variable (record) that will contain the html row for the listint table
        static function showOneListing($company_id, $cName, $cWebURL, $cCity, $cState) {
            $record = '
                                <tr>
                                    <td>' . $company_id . '</td>
                                    <td>' . $cName . '</td>
                                    <td>' . $cWebURL . '</td>
                                    <td>' . $cCity . '</td>
                                    <td>' . $cState . '</td>
                                    <td><a href="edit.php?s_id='.$company_id.'">Edit</a></td>
                                </tr>';
                                
            return $record;
        }
        
        static function showOneListingForCreate($company_id, $cName, $cWebURL, $cCity, $cState) {
            $record = '
                                <tr>
                                    <td class="list-id">' . $company_id . '</td>
                                    <td class="list-name">' . $cName . '</td>
                                    <td class="list-url">' . $cWebURL . '</td>
                                    <td class="list-city">' . $cCity . '</td>
                                    <td class="list-state">' . $cState . '</td>
                                    <td class="select-company" id="'. $company_id . '">Select</td>
                                </tr>'; 
                                
            return $record;
        }
        
        // this combines all the HTML of the listint table
        // takes in a paramter (listing) which is the entire table HTML containing all the records
        static function showMasterCompanyList($listing) {
            return CompanyListView::getTopListingHTML(false) . $listing . CompanyListView::getBottomListingHTML();
        }
        
        static function showMasterCompanyListForCreate($listing) {
            return CompanyListView::getTopListingHTML(true) . $listing . CompanyListView::getBottomListingHTML();
        }
        
        // used to start the table listing all the current student profile records
        static function getTopListingHTML($forCreateForm) {
            if($forCreateForm) {
                $topHTML = '
                            <div class="create-student-listing-table-wrapper">
                                <table class="listing-table" cellspacing="0">
                                    <tr><th>ID#</th><th>Company Name</th><th>Website</th><th>City</th><th>State</th><th></th></tr>';
                    
            } else {
                $topHTML = '
                        <div class="student-listing-table-wrapper">
                            <fieldset>
                                <legend>Company Listing</legend>
                                <table class="listing-table" cellspacing="0">
                                    <tr><th>ID#</th><th>Company Name</th><th>Website</th><th>City</th><th>State</th><th></th></tr>';
                
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