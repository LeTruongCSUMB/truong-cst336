<?php
include 'database.php';

$dbConn = getDatabaseConnection();

session_start(); 

//redirect user to login page if not logged in
function checkLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); 
    }
}


function searchForComics($userID = '') {
    global $dbConn; 
    
    $sql = "SELECT
        comics.id,
        comics.line1, 
        comics.line2, 
        categories.comic_url 
      FROM comics INNER JOIN categories 
      ON comics.category_id = categories.category_id 
      WHERE 1"; 
    
    if (!empty($userID)) {
        $sql .= " AND user_id = '$userID'"; 
    }

    
    if(isset($_POST['search'])) {
        // query the databse for any records that match this search
        $sql .= " AND (line1 LIKE '%{$_POST['search']}%' OR line2 LIKE '%{$_POST['search']}%')";
    } 
    
    if(isset($_POST['comics-type-search']) && !empty($_POST['comics-type-search'])) {
        $sql .= " AND comic_type = '{$_POST['comics-type-search']}'"; 
    }
    
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    return $records; 
}

function displayComics($records, $editable=false) {
  echo '<div class="comics-container">'; 
      
  foreach ($records as $record) {
       $comicURL = $record['comic_url']; 
       echo  '<div class="comic-div" style="background-image:url('. $comicURL .')">'; 
       echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; 
       echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
       
      if ($editable) {
        echo '<div class="edit-menu">'; 
        echo '<a href="edit.php?id='. $record['id'] .'">Edit </a>';
        echo '<a href="delete.php?id='. $record['id'].'">Delete</a>'; 
        echo '</div>'; 
      }

       echo  '</div>'; 
  }
  
  echo '<div style="clear:both"></div>'; 
  echo '</div>'; 
}



// Fetch the category_id from the categories table for the chosen comic type

function getCategoryID($comicType) {
  global $dbConn; 
  
  $sql = "SELECT category_id from categories WHERE comic_type = '$comicType'";
     
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
  $records = $statement->fetchAll(); 
  $categoryID = $records[0]['category_id']; 
  
  echo "categoryID: $categoryID <br/>"; 
  return $categoryID; 
}



// INSERT the new comic into the comics table

function insertComic($line1, $line2, $categoryID) {
    global $dbConn; 
    
    $sql = "INSERT INTO `comics` 
      (`id`, `line1`, `line2`, `category_id`, `create_date`, `user_id`) 
      VALUES 
      (NULL, '$line1', '$line2', '$categoryID', NOW(), '{$_SESSION['user_id']}');";
 
    $statement = $dbConn->prepare($sql); 
    $result = $statement->execute(); 
    
    return $result; 
}


// fetch the newly created comic object from database JOINED with the
// the appropriate category information (comic url)
    
function fetchComicFromDB($comicID) {
  global $dbConn; 
    
  $sql = "SELECT 
      comics.id,
      comics.line1, 
      comics.line2, 
      categories.comic_url,
      categories.comic_type
    FROM comics INNER JOIN categories 
    ON comics.category_id = categories.category_id 
    WHERE comics.id = $comicID"; 
  
  
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
  $records = $statement->fetchAll(); 
  $newComic = $records[0]; 
  //echo "New Comic: ";
  //print_r($records);
  //echo "<br>";
  //echo $sql;
  //echo "<br>";
  return $newComic; 
}


function createComic($line1, $line2, $comicType) {
    global $dbConn; 
    
    //Step 1: Get the category ID for the selected comic type
    $categoryID = getCategoryID($comicType); 
    
    //Step 2: Insert the comic information (along with the category ID) into the
    // comics table
    $result = insertComic($line1, $line2, $categoryID); 

    //Step 3: Fetch the new comic joined with the comic_url information
    $last_id = $dbConn->lastInsertId();
    $newComic = fetchComicFromDB($last_id); 
    return $newComic; 


}

function editComic($id, $line1, $line2, $comicType) {
  global $dbConn; 
  
  
  //Step 1: Get the category ID for the selected comic type
  $categoryID = getCategoryID($comicType); 
  
  //Step 2: Update the comic record in the all_comics table

  $sql = "UPDATE `comics` SET line1 = :line1, line2 = :line2, category_id = :category_id WHERE id = :id"; 

  $statement = $dbConn->prepare($sql); 
  $statement->execute(array(
      ':line1' => $line1, 
      ':line2' => $line2, 
      ':category_id' => $categoryID, 
      ':id' => $id
      ));
    
  
}

function deleteComicFromDB($comicID) {
  global $dbConn; 
  
  $sql = "DELETE FROM comics WHERE comics.id = $comicID"; 
  
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
}


function getOptions(){
    global $dbConn;
    
    $sql = "SELECT comic_type, comic_url FROM `categories` WHERE 1";
    
    $statement = $dbConn->prepare($sql); 
      
    $statement->execute(); 
    $records = $statement->fetchAll();
    
    foreach ($records as $record) {
        echo '<option value="';
        echo $record["comic_url"];
        echo '" name="';
        echo $record["comic_type"];
        echo '">';
        echo $record["comic_type"];
        echo '</option>';
        echo '<br>';
    }
}

function getImage(){
    global $dbConn; 
    
    if(!isset($_POST['comic-type'])){
        $sql = "SELECT comic_url FROM `categories` WHERE comic_type='comic1'";
        
        $statement = $dbConn->prepare($sql); 
    
        $statement->execute(); 
        $records = $statement->fetchAll();
        
        foreach ($records as $record) {
            echo $record['comic_url'];
        }
    }else{
    echo $_POST['comic-type'];
    }
}
?>