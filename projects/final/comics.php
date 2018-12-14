<?php
session_start();
include 'functions.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Our Comics!</title>
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
  </head>
  <body>
    <?php include 'navigation.php' ?>
    
    <h1>Find a Comic</h1>
    <form method="post" action="comics.php">
        Search:  <input type="text" name="search"></input> 
        Comic type: <select name="comic-type">
                    <option value=""></option>
                      <?php getOptions(); ?>
                    </select> <br/>
        ORDER: 
        <input type="radio"  name="order" value="newest-first"> Newest first
        <input type="radio"  name="order" value="oldest-first"> Oldest first
        <br/>
        <input type="Submit"></input>
    </form>
    <div class="comics-container">
      <?php 
        $comics = searchForComics(); 
        displayComics($comics); 
      ?>
      <div style="clear:both"></div>
    </div>
    
  </body>
</html>