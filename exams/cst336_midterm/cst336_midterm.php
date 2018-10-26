<?php
include 'database.php';

function createQuote($quote, $author) {
    $dbConn = getDatabaseConnection(); 

    $sql = "INSERT INTO `q_quotes` (`quoteId`, `quote`, `author`, `num_likes`) VALUES (NULL, '$quote', '$author', `num_likes`)";
    
    $statement = $dbConn->prepare($sql); 
    $result = $statement->execute(); 
    
    /*if (!$result) {
      return null; 
    }
    
    $last_id = $dbConn->lastInsertId();

    
    // fetch the newly created object from database
    
    $sql = "SELECT * from q_quotes WHERE id = $last_id"; 
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    $newQuote = $records[0]; 
    
    return $newQuote;*/ 
}
function displayQuote($quote, $author){
    $dbConn = getDatabaseConnection();
                
    $sql = 'SELECT * FROM `q_quotes` ORDER BY RAND() LIMIT 1';
    $statement = $dbConn->prepare($sql); 
    $statement->execute();
    $records = $statement->fetchAll();
    foreach ($records as $record) {
        echo  '<div class ="text">' . $record["quote"] .'</div><div class="author"><i>-' . $record["author"] . '</i></div>';
    }
}
function error(){
    if (!(isset($_POST['quote']))) {
        echo "<div class='error'>Text must not be empty</div>";
    }
    if (!(isset($_POST['author']))) {
        echo "<div class='error'>Author must not be empty</div>";
    }
}
if (isset($_POST['quote']) && isset($_POST['author'])) {
  $quoteObj = createQuote($_POST['quote'], $_POST['author']); 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Midterm CST 336</title>
        <meta charset="utf-8">
        <style>
            @import url("styles.css");
        </style>
    </head>
    <body>
        <form action="create.php" method="POST">
            <?php
                displayQuote($quote, $author);
            ?>
            <br><br><br><br>
            <a href="https://truong-lewis-cst336-letruong.c9users.io/ws/cst336_midterm/create.php">Create</a>
        </form>
    </body>
</html>