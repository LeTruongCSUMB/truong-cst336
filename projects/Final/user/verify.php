<?php 

    $json = json_decode(file_get_contents("php://input"), true);
   
    // Make a SQL Select statement that checks if any records match the given username
    

    include '../database.php'; 
    
    
    function validate($username) {
        $dbConn = getDatabaseConnection(); 
        
        $sql = "SELECT * FROM `users` WHERE username=:username"; 
        $statement = $dbConn->prepare($sql); 
        $statement->execute(array(':username' => $username));
    
        $records = $statement->fetchAll(); 
        
        
        return (count($records) >= 1); 
    }
    
    $found = validate($json['userName']); 
    
    echo json_encode(array(
        "userName" => $json["userName"], 
        "found" => $found    
    )); 

?>

