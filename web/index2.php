<?php


?>

<style>
    body {
        margin: 0;
        padding: 0;
        width: 100%;
        font-family: 'Oxygen', sans-serif;
        background: #F3F3F3;
    }
    
    h1 {
        
    }
    
    h2 {
        font-family:'Open Sans Condensed', sans-serif;
        letter-spacing: .1em;
        font-weight: 300;
        font-size: 36px;
        color: #212121;
    }
    
    #tagline {
        border-bottom: 1px solid #cccccc;
    }
    
    img {
        width: 100%;
    }
    
    #container {
        
    }
    
    #container #header {
        background: #002c77;
        margin-bottom: 30px;
    }
    
    #container #header #logo {
        width: 600px;
        display: inline-block;
    }
    
    #container #header #compTech-logo {
        width: 300px;
        display: inline-block;
        position: absolute;
        top: 20px;
        right: 5px;
    }
    
    #content {
        
    }
    
    .center {
        text-align: center;
    }
    
    #icon-container {
        width: 960px;
        min-height: 250px;
        padding: 10px;
        color: #666;
        margin: 0 auto;
        position: relative;
        margin-top: 45px;
        background: #fff;
        border-top: 2px solid #740202 !important;
    }

    #icon-container .icon {
        background-color: white;
        box-shadow: 1px 1px 5px #CCCCCC;
        float: left;
        height: 250px;
        width: 300px;
        text-align: center;
    }
    
    #icon-container .middle {
        margin-right: 30px;
        margin-left: 30px;
    }
    
    .icon img {
        width: auto;
    }
    
    .icon a {
        color: #fff;
        text-decoration: none;
        
    }
    
    .icon:hover {
        opacity: .75;
        cursor: pointer;
    }
    

</style>

<html>
    <head>
        <title>UNH at Manchester COMP Internship Manager</title>
        <link href="http://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
       
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="/intern/inc/js/functions.js"></script>
    </head>
    <body>
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
            <div id="content">
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
</html>

<script>
    $(function() {
       $('.middle').on('click', function(e) {
           alert('test');
       });
    });
</script> 