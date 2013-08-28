<?php
/*
* File: view.php
* Author: Joshua Anderson
* Created: 5/24
* Modified: 6/20
* Descritption: The view file will handle all the HTML and forms throughout the site
* */


class HomeHTMLView
{
    
    static function getHomepageHTML() {
        $html = '
        <html>
            <head>
                <title>UNH at Manchester COMP Internship Manager</title>
                <link href="/intern/inc/css/master.css" media="all" rel="stylesheet" type="text/css" />
                <link href="http://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet" type="text/css">
                <link href="http://fonts.googleapis.com/css?family=Oxygen:400,300|Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
               
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                <script type="text/javascript" src="/intern/inc/js/functions.js"></script>
            </head>
            <body class="home-page-body">
                <div id="container">
                    <div id="header">
                        <div id="logo">
                            <a href="/intern">
                                <img src="inc/images/logo-transparent.png" alt="UNH at Manchester" title="UNH at Manchester" />
                            </a>    
                        </div>
                        <div id="compTech-logo">
                            <a href="http://comptech.unh.edu/" title="CompTech at UNH Manchester" target="_blank" >
                                <img src="inc/images/comptech-logo.png" />   
                            </a>
                        </div>
                    </div>
                    <div id="hp-content">
                        <div class="center">
                            <div id="tagline">
                                <h2>SELECT AN ACTION BELOW</h2>    
                            </div>
                            <div id="icon-container">
                                <div class="icon">
                                    <a href="/intern/create" title="Create New Position">
                                        <h3>CREATE A POSITION</h3>
                                        <img src="inc/images/icons/Screenshot.png" title="Create New Position" />    
                                    </a>                      
                                </div>
                                <div class="icon middle">
                                    <a href="#" title="Search">
                                        <h3>CREATE A POSITION</h3>
                                        <img src="inc/images/icons/Search.png" title="Search" />    
                                    </a>                      
                                </div>
                                <div class="search-modal-container">
                                    
                                </div>
                                <div class="icon">
                                    <a href="/intern/create" title="View Lists">
                                        <h3>CREATE A POSITION</h3>
                                        <img src="inc/images/icons/Explorer.png" title="View Lists" />    
                                    </a>                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>';
        
        return $html;
    }
    
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
               <link href="/intern/inc/css/master.css" media="all" rel="stylesheet" type="text/css" />
               
               <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" type="text/css">
               <link href="http://fonts.googleapis.com/css?family=Oxygen:400,300|Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
               <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" type="text/css">
               <link href="http://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet" type="text/css">
               <link href="http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet" type="text/css">
               
               <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
               <script type="text/javascript" src="/intern/inc/js/functions.js"></script>
            </head>
            <body clas="inner-page-body">
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
    static function getBottomHTML() {
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
    
    static function welcome() {
        $welcomeStr = '
                    <div class="welcome">
                        Welcome to the COMP TECH Internship Manager
                    </div>';
                
        return $welcomeStr;
    }
    
    
    // util function called to display an error
    // takes in the array of errors and loops through, displaying each iteration
    static function showFormError($errorsArray) {
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