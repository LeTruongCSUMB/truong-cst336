<?php
    include "functions.php";

    $rawJsonString = file_get_contents("php://input");
    
    // Make it a associative array (true, second param)
    $jsonData = json_decode($rawJsonString, true);
    //$jsonData = array("test" => 5);
    echo json_encode($jsonData);
?>