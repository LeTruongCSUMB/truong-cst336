<?php

session_start(); 

include 'database.php'; 

$dbConn = getDatabaseConnection(); 

function validate($username, $password) {
    global $dbConn; 
    $dbConn = getDatabaseConnection(); 
    
    $sql = "SELECT * FROM `users2` WHERE username=:username AND password=:password";
    
    $statement = $dbConn->prepare($sql); 
    $statement->execute(array(':username' => $username, ':password' => sha1($password)));

    $records = $statement->fetchAll(); 


    if (count($records) == 1) {
        // login successful
        $_SESSION['user_id'] = $records[0]['user_id']; 
        $_SESSION['username'] = $records[0]['username']; 
        
        echo $_sESSION['user_id'];
        
        header('Location: index.php');
        
    }  else {
        echo "<div class='error'>Username and password are invalid </div>"; 
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
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        /*background-color: black;*/
    }
    
    * {
        box-sizing: border-box;
    }
    
    /* Add padding to containers */
    .container {
        padding: 16px;
        background-color: white;
    }
    
    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    
    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    
    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
    
    /* Set a style for the submit button */
    .registerbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    
    .registerbtn:hover {
        opacity: 1;
    }
    
    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }
    
    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }
</style>
    </head>
    <body>
        <?php 
            if (isset($_POST['username'])) {
                validate($_POST['username'], $_POST['password']);  
            }
        ?>
        
        
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <a class="navbar-brand">Comic Generator</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
            <li class="nav-item active">
          <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
        </li>
        
    <?php
      if($_SESSION['user_id']==null){
    ?>
        
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Login <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="join.php">Register</a>
        </li>
        <?php
        } else{
        ?>

        <li class="nav-item active">
          <a class="nav-link" href="home.php">MeMe Generator </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
      <?php
      
          
        }
      
      ?>

    </div>
  </nav>
        
        <form style="max-width:500px; max-height:500px;margin:auto;" method="POST">
            <h1> Welcome to the Comic Generator!</h1>
            <div class="container">
            Username: <input type="text" name="username"></input> <br/>
            Password: <input type="password" name="password"></input> <br/>
            <!--<input type="submit" value="Login">-->
            <button type="submit" class="registerbtn" name="join">Login</button>
            
            <div class="container signin">
            <p>New Around here? 
            <a href="join.php">Sign Up</a>.</p>
            </div>
        </form>

    </body>
</html>
