<?php
session_start(); 
include 'functions.php'; 

checkLoggedIn(); 
    
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
  </head>
  <body>
    
    <?php include 'navigation.php' ?>
    <h1>Welcome <?= $_SESSION['username'] ?>!</h1>
    
    <h2>Your comics: </h2>
    
    <div class="comics-container">
      <?php 
         $myComics = searchForComics($_SESSION["user_id"]);
         //echo "My Comics: ";
         //print_r($myComics);
         //echo "<br>";
         displayComics($myComics, true);  
      ?>
      <div style="clear:both"></div>
    </div>
  </body>
</html>
