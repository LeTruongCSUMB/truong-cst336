<?php

 include 'dbConn.php';

 $sql = "SELECT * FROM up_files WHERE fileId = :fileId"; 
 $stmt = $dbConn->prepare($sql);
 $stmt->execute( array(":fileId"=> $_GET['fileId']));

 $stmt->bindColumn('fileData', $data, PDO::PARAM_LOB);
 $record = $stmt->fetch(PDO::FETCH_BOUND);
 
 if (!empty($record)){
    header('Content-Type:' . $record['fileType']);   //specifies the mime type
    header('Content-Disposition: inline;');
    echo $data; 
  } 
?>
