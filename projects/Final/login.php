<!--this is where we log in-->
<?php

session_start(); 

include 'database.php'; 
$dbConn = getDatabaseConnection(); 

function validate($username, $password) {
    global $dbConn; 
    $dbConn = getDatabaseConnection(); 
    
    $sql = "SELECT * FROM `users` WHERE username=:username AND password=SHA(:password)"; 
    $statement = $dbConn->prepare($sql); 
    $statement->execute(array(':username' => $username, ':password' => $password));

    $records = $statement->fetchAll(); 
    
    
    if (count($records) == 1) {
        // login successful
        $_SESSION['user_id'] = $records[0]['user_id']; 
        $_SESSION['username'] = $records[0]['username']; 
        header('Location: index.php');
        
    }  else {
        echo "<div class='error'>Username or password are invalid!</div>"; 
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
    </head>
    <body>
        <?php include 'navigation.php' ?>
    
        <h1> Welcome to the Comic Generator!</h1>
        
        <?php 
            if (isset($_POST['username'])) {
                validate($_POST['username'], $_POST['password']);  
            }
        ?>
        Username: Banana password: cst336
        <form method="POST">
            Username: <input type="text" name="username"></input> <br/>
            Password: <input type="password" name="password"></input> <br/>
            <button type="submit">Sign In</button>
        </form>
        
    
        
        
    </body>
</html>