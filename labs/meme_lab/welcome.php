<?php
  include 'database.php';
  $dbConn = getDatabaseConnection();
  $sql = 'SELECT * FROM all_memes ORDER BY RAND() LIMIT 1';
  $statement = $dbConn->prepare($sql); 
  $statement->execute();
  $records = $statement->fetchAll(); 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <style>
      .meme-div{
        width: 450px;
        height: 450px;
        background-size: cover;
        text-align: center;
        position: relative;
        font-size: 18px;
      }
      
      .memes-container .meme-div{
        width: 200px;
        height:200px;
        float: left;
        margin: 10px 20px;
      }
      
      .memes-container .meme-div h2 {
        font-size: 18px;
      }
      
      
      h2 {
        position: absolute;
        left: 0;
        right: 0;
        margin: 15px 0;
        padding: 0 5px;
        font-family: impact;
        color: white;
        text-shadow: 1px 1px black;
      }
      .line1 {
         top: 0;
       }
      .line2 {
         bottom: 0;
       }
    </style>
  </head>
  
  <body>
    <h1>Meme Generator</h1>
    <?php
    foreach ($records as $record) {
       $memeURL = $record['meme_url']; 
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; 
       echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; 
       echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
       echo  '</div>'; 
    }
    ?>
    <h3>Welcome to my Meme Generator!</h3>
    
    <form action= "meme.php" method="post">
        Line 1: <input type="text" name="line1"></input> <br/>
        Line 2: <input type="text" name="line2"></input> <br/>
        Meme Type:
        <select name="meme-type">
          <option value="college-grad">Happy College Grad</option>
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select>
        
        <input type="submit"></input>
    </form>
    
     <a href="./meme.php">View all memes</a>
     
     
  </body>
</html>