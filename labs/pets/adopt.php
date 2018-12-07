<?php
        
  include 'database.php';
        
  function getPets(){
    $dbConn = getDatabaseConnection(); 
          
    $sql = "SELECT * FROM `pets` WHERE 1";
              
    $statement = $dbConn->prepare($sql); 
      
    $statement->execute(); 
    $records = $statement->fetchAll();
    
    
  }
/*function getDes(){
      $dbConn = getDatabaseConnection(); 
          
      $sql = "SELECT * FROM `pets` WHERE 1";
              
      $statement = $dbConn->prepare($sql); 
      
      $statement->execute(); 
      $records = $statement->fetchAll();
          
      $i = 0;
    foreach ($records as $record) {
      echo '<img src="img/' . $record["pictureURL"] . '" alt="' . $record["pictureURL"]. ' width="50" height="50">';
      echo 'Name: ' . $record['name'];
      echo '<br>';
      echo 'Year of Birth: ' . $record['yob'];
      echo '<br>';
      echo 'Breed: ' . $record['breed'];
      echo '<br>';
      echo 'Description: ' . $record['description'];
      echo '<br>';
    }
  }*/
?>