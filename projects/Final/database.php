<?php
// connect to our mysql database server

function getDatabaseConnection() {
    
    if (strpos($_SERVER['SERVER_NAME'], "c9users") !== false) {
        $host = "localhost";
        $username = "LewisTruong";
        $password = "cst336"; //best practice: defined in a seperate file
        $dbname = "comics";
    }else{
        // running on Heroku
        $host = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b792c0e574fe58";
        $password = "32d26c4f"; // best practice: define this in a separte file
        $dbname = "heroku_ead796e816995bb";   
    }
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

?>

