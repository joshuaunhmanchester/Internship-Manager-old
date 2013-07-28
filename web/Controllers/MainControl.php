<?php
/*
* File: control.php
* Author: Joshua Anderson
* Created: 5/24
* Modified: 6/20
* Descritption: This file will act as the brain of the web application.  It is meant to control how a dynamic page is
* assembled, based on what the user is passing through the super global, $_POST
* */
   

   
   class MainControl
   {
       // main() will control the index.php page (home page)
       // The main list of positions will be here as well
       static function main()
       {
           echo HomeHTMLView::getTopHTML();
           echo HomeHTMLView::welcome();
           echo HomeHTMLView::getBottomHTML();
       }
   }

?>