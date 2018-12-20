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
        header('Location: index.html');
        
    }  else {
        echo "<div class='error'>Username and password are invalid </div>"; 
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Race Sign Up</h1>
        
        <?php 
            if (isset($_POST['username'])) {
                validate($_POST['username'], $_POST['password']);  
            }
        ?>

        <form method="POST">
            Username: <input type="text" name="username"></input> <br/>
            Password: <input type="password" name="password"></input> <br/>
            <input type="submit" value="Login">
        </form>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                
                
            <script>
                // Does the email exist as a user?
                $("#username")
                    .change(function(e) {
                        var userData = {
                            userName: e.target.value
                        };
                        
                        console.log(userData); 
        
        
        
                        debugger;
                        
                        $.ajax({
                                url: "user/verify.php",
                                type: "POST",
                                dataType: "json",
                                contentType: "application/json",
                                data: JSON.stringify(userData)
                            })
                            .done(function(data) {
                                console.log("Was user found?", data);
                            })
                            .fail(function(xhr, status, errorThrown) {
                                console.log(errorThrown)
                                console.log("error", xhr.responseText);
                            });
                        
                    });

        </script>
    </body>
</html>