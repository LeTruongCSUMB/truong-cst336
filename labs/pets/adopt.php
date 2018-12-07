<?php
        
  include 'database.php';
        
  function getPets(){
    $dbConn = getDatabaseConnection(); 
    
    $sql = "SELECT * FROM `pets` WHERE name='" . $_GET['name'] . "'";
    //$sql = "SELECT * FROM `pets` WHERE 1";
    
    $statement = $dbConn->prepare($sql); 
      
    $statement->execute(); 
    $records = $statement->fetchAll();
    $arr = array($records[0]);
  }
  echo json_encode(getPets($arr));
?>