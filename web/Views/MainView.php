<?php
/*
* File: view.php
* Author: Joshua Anderson
* Created: 5/24
* Modified: 6/20
* Descritption: The view file will handle all the HTML and forms throughout the site
* */


class MainView
{
    // This function will used to produce the top half of the HTML for the site. 
    // It includes the opening HTML tag, the header which contains the title of each page (use-case), the master style sheet
    // and the opening body tag.  Inside the body tag, there is the page wrapper class, as well as the header class so
    // when the user is doing something, the same HTML and styling appears.  This is always called in conjunction with the 
    // getBottomHTML() function.
    static function getTopHTML()
    {
        $topHTML = '
        <html>
            <head>
               <title>'. Site_Title . '</title>
               <link href="/intern/inc/master.css" media="all" rel="stylesheet" type="text/css" />
               
               <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" type="text/css">
               <link href="http://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet" type="text/css">
               <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" type="text/css">
               <link href="http://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet" type="text/css">
               
               <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
               <script type="text/javascript" src="/intern/inc/js/functions.js"></script>
            </head>
            <body>
               <div id="site">
                   <div id="left-nav">
                       <div id="logo">
                           <img src="/intern/inc/images/UNHMlogoline_blue.jpg" alt="UNH Manchester" />
                       </div>
                       <div id="nav">
                           <ul>
                               <li class="active">
                                   <a href="/intern"><p class="active">home</p></a>
                               </li>
                               <li>
                                   <a href="/intern/create"><p>create</p></a>
                               </li>
                               <li>
                                   <a href="/intern/student.php"><p>students</p></a>
                               </li>
                               <li>
                                   <a href="/intern/company.php"><p>companies</p></a>
                               </li>
                               <li>
                                   <a href="/intern/supervisors.php"><p>supervisors</p></a>
                               </li>
                           </ul>
                       </div>
                   </div>
                   <div id="content">';
    
        return $topHTML;
    }
    
    // Contains the closing tags from the top half of the HTML
    static function getBottomHTML()
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
    
    static function welcome()
    {
        $welcomeStr = '
                    <div class="welcome">
                        Welcome to the COMP TECH Internship Manager
                    </div>';
                
        return $welcomeStr;
    }
    
    // used to start the table listing all the current student profile records
    static function getTopListingHTML()
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
    static function getBottomListingHTML()
    {
        $botHTML = '
                            </table>
                        </fieldset>
                    </div>';
        
        return $botHTML;
    }
    
    // util function called to display an error
    // takes in the array of errors and loops through, displaying each iteration
    static function showFormError($errorsArray)
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
}


?>