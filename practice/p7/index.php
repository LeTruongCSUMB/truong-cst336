<?php
    include 'database.php';
  
    $dbConn = getDatabaseConnection();
    //$sql = "INSERT INTO `p1_quotes` (`quoteId`, `quote`, `author`, `category`) VALUES (NULL, '$quote', '$author', '$category');"; 
    
    //$statement = $dbConn->prepare($sql); 
    //$result = $statement->execute();
    
function displayOptions(){
    global $dbConn;
    $sql = 'SELECT DISTINCT (category) FROM p1_quotes';
    $statement = $dbConn->prepare($sql); 
    $statement->execute();
    $records = $statement->fetchAll();
    foreach ($records as $record) {
        echo  '<option>' . $record["category"] . '</option>';
    }
}
    
function getQuote(){
    global $dbConn;
    $sql = "SELECT * FROM p1_quotes WHERE 1";
    
    $sql .= " AND (quote LIKE '%{$_POST['kword']}%' OR category LIKE '%{$_POST['kword']}%')";
    
    if(isset($_POST['oword'])){
        $sql .= " ORDER BY quote";
        if($_POST['oword'] == 'Z-A') {
        $sql .= " DESC";
      }
    }
    $statement = $dbConn->prepare($sql); 
    $statement->execute();
    $records = $statement->fetchAll();
    
    foreach ($records as $record) {
        echo "<br>";
        echo $record["quote"] . ' ' . $record["author"];
        echo "<br>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pratice 7</title>
        <style>
        @import url("css/styles.css");
        </style>
        <div class="title">
        Famous Quote Finder
        </div>
    </head>
    <body>
        <form action="index.php" class="class" method="POST">
            <br>
            Enter Quote Keyword:
            <input type="text" name="kword" size="25" />
            <br><br>
            Category:
                <select name="cword">
                    <option>Select One</option>
                    <?php
                        displayOptions();
                    ?>
                </select>
            <br><br>
             Order
                <br>
                <input type="radio" id="az" name="oword" value="A-Z">
                        <label for="az">A-Z</label> <br>
                
                <input type="radio" id="za" name="oword" value="Z-A">
                    <label for="za">Z-A</label> <br>
            <br>
            <button class="button">Display Quotes!</button>
            <div>
                <?php
                    getQuote();
                ?>
            </div>
        </form>
    </body>
</html>