<?php
    
    //PLAN:
    //1. Generate a random number ==> store it in the session [DONE]
    //2. Have a form where the user can enter their guess
    //3. Form validation Logic ==> determine whether the guess is too high/low
    //4. Store the history in the session
    //5. clear the session when the user clicks "start over"
    
    session_start();
    
    //user has already "destroy"
    
    if(isset($_POST['destroy'])) {
        session_destroy();
        session_start();
    }
    
    if(!isset($_SESSION['randomVal'])) {
    $_SESSION['randomVal'] = rand(1, 100);
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        Random number: <?php echo $_SESSION['randomVal'] ?>
        <form method="POST">
            <input type="submit" name="destroy" value="Start Over"></input>
        </form>
        
    </body>
</html>