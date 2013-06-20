<?php
/*
* File: view.php
* Author: Joshua Anderson
* Created: 5/24
* Modified: 6/20
* Descritption: The view file will handle all the HTML and forms throughout the site
* */


// This function will used to produce the top half of the HTML for the site. 
// It includes the opening HTML tag, the header which contains the title of each page (use-case), the master style sheet
// and the opening body tag.  Inside the body tag, there is the page wrapper class, as well as the header class so
// when the user is doing something, the same HTML and styling appears.  This is always called in conjunction with the 
// getBottomHTML() function.
function getTopHTML()
{
    $topHTML = '
    <html>
        <head>
            <title>'. Site_Title . '</title>
            <link href="/intern/inc/master.css" media="all" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <div class="page-wrapper">
                <div class="header">
                    <a href="/intern"><img class="logo" src="/intern/inc/images/unh-logo.jpg" alt="UNH Manchester" title="UNH Manchester" /></a>
                    <h1>UNH Manchester CompTech Internship Manager</h1>
                    <a href="create" title="Create Internship Position">Create</a>      
                </div>
                <div class="content">';

    return $topHTML;
}

// Contains the closing tags from the top half of the HTML
function getBottomHTML()
{
    $botHTML = '
                </div>
            </div>
        </body>
    </html>
    ';
    
    return $botHTML;
}


// Just shows a welcome message if index.php is not on postback.
// @return's string with message

function welcome()
{
    $welcomeStr = '
                <div class="welcome">
                    Welcome to the COMP TECH Internship Manager
                </div>';
            
    return $welcomeStr;
}


// This is used to build the main form to create a student profile
function buildForm()
{
    $form = '
                <div class="create-form">
                    <form method="POST">
                        <fieldset>
                            <legend>Student Information</legend>
                            <div class="form-item">
                                <div class="label">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="input">
                                    <input type="text" id="fname" name="fname" value="'.$_POST['fname'].'"/>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="label">
                                    <label for="lname">Last Name</label>
                                </div>
                                <div class="input">
                                    <input type="text" id="lname" name="lname" value="'.$_POST['lname'].'"/>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="label">
                                    <label for="email">UNH Email</label>
                                </div>
                                <div class="input">
                                    <input type="text" id="email" name="email" value="'.$_POST['email'].'"/>
                                </div>
                            </div>
                            <input type="submit" id="submitButton" name="submitButton" value="Save" />
                        </fieldset>
                    </form>
                </div>';
                
    return $form;
}


// used to start the table listing all the current student profile records
function getTopListingHTML()
{
    $topHTML = '
                <div class="student-listing-table-wrapper">
                    <fieldset>
                        <legend>Student Listing</legend>
                        <table class="listing-table" cellspacing="0">
                            <tr><th>ID#</th><th>First Name</th><th>Last Name</th><th>Email</th><th></th></tr>';
                
    return $topHTML;
}

// just finishes the bottom of the listing table
function getBottomListingHTML()
{
    $botHTML = '
                        </table>
                    </fieldset>
                </div>';
    
    return $botHTML;
}

// takes in 4 parameters that have been validated from the form filled out
// creates a variable (record) that will contain the html row for the listint table
function showOneListing($student_id, $first_name, $last_name, $email)
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
function showMasterInternshipList($listing)
{
    $results = getTopListingHTML() . $listing . getBottomListingHTML();
    
    return $results;
}

// util function called to display an error
// takes in the array of errors and loops through, displaying each iteration
function showFormError($errorsArray)
{
    $formErrors = "";
   
    if(is_array($errorsArray) && !empty($errorsArray))
    {
        echo '
                <div class="error-message">
                    ';
        foreach($errorsArray as $error)
        {
            echo $error;
            echo '<br />';
        }  
        echo '
                </div>';
    }
}

?>