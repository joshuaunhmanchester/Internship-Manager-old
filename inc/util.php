<?php
  /*
  * File: util.php
  * Authors: Joshua Anderson
  * Created: 5/23/13
  * Updated: 5/23
  * Description: Utility functions used throughout the site
  */
  
  // Setting up GLOBAL VARIABLES that will not change and I can use throughout the site.
  DEFINE ('Site_Title', 'UNH Manchester - COMP TECH Internship Manager');
  
  

  /*
  * Opens the database connection.
  * @return object $conn that has connection data
  */
  
  function connect()
  {
      $host = 'localhost';
      $database = 'internshipmanager';
      $username = 'root';
      $password = '';
      
      $connection = new mysqli($host, $username, $password, $database);
      if(mysqli_connect_errno())
      {
          printf('Connection failed! <br />');
          exit();
          
      }
      
      return $connection;
  }


?>  