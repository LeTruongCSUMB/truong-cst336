<!--this is where the comic strip generator will be coded-->
<?php

//include 'functions.php';

/*if (isset($_POST['line1']) && isset($_POST['line2'])) {
  $memeObj = createMeme($_POST['line1'], $_POST['line2'], $_POST['meme-type']); 
}*/

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
  </head>
  
  <body>
    <?php include 'navigation.php' ?>
    <h1>Comic Generator</h1>
    <img height="150px" width="150px" src="">
    <h3>Welcome to the Comic Generator!</h3>
    
    <form method="post">
        Line 1: <input type="text" name="line1"></input> <br/>
        Line 2: <input type="text" name="line2"></input> <br/>
        Comic Style:
        <select name="comic-type">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        
        <button type="submit">Sign In</button>
    </form>
     
     
  </body>
</html>