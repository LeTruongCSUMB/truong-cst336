<?php
include 'database.php';

$dbConn = getDatabaseConnection();

session_start(); 

//redirect user to login page if not logged in
function checkLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); 
    //    $userLogin = $_POST['user_id'];
        
    }
     
}

//SQL code for joining USERS with COMIC-TEXT-BOX for USER_ID
    /*
    $sql = "SELECT 
            `users2`.`user_id` 
            FROM `users2` 
            INNER JOIN `comic-text-box` 
            ON `comic-text-box`.`user_id` = `users2.`user_id`";
    */
        
//SQL code for joining COMICS with COMIC-TEXT-BOX for COMIC_ID
    /*
    $sql = SELECT 
            `comic-text-box`.`comic_id` 
            FROM `comic-text-box` 
            INNER JOIN `comics` 
            ON `comic-text-box`.`comic_id` = `comics`.`comic_id`
    
    */        
function searchForComics($userID = '') {
    global $dbConn; 
    
    $sql = "SELECT 
            `comics`.`title`,
            `comic-text-box`.`text`, 
            `comics`.`comic_id`, 
            `comics`.`comic_url` 
            FROM `comic-text-box` 
            INNER JOIN `comics` 
            ON `comic-text-box`.`comic_id` = `comics`.`comic_id`"; 
    
    if (!empty($userID)) {
        $sql .= " AND user_id = '$userID'"; 
    }

    
    if(isset($_POST['search'])) {
        // query the databse for any records that match this search
        $sql .= " AND (text LIKE '%{$_POST['search']}%')";
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
  
  $sql = "SELECT category_id from categories2 WHERE comic_type = '$comicType'";
     
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
  
  $records = $statement->fetchAll(); 
  
  $categoryID = $records[0]['category_id']; 
  
  echo "categoryID: $categoryID <br/>"; 
  
  return $categoryID; 
}



// INSERT the new comic into the comics table

function insertComic($text, $xpos, $ypos) {
    global $dbConn; 
    
    //check if title already exists in the database select from comics
    //if no then insert row into comics table and category_id
    //else yes then get the comic.id from the comic-text-bx where comic.id = {...}
    
    
    // $sql = "INSERT INTO `comic-text-box` (`comic_id`, `text`, `xpos`, `ypos`) VALUES 
    //   (NULL, '$text', '$xpos', '$ypos')";
 
    echo "userid: " . $_SESSION['user_id'];
    $insert = $dbConn->prepare("INSERT INTO comic-text-box(text, xpos, ypos) VALUES(:title, :xpos, :ypos)");   

    $insert->bindParam(":text", $text);
    $insert->bindParam(":xpos", $xpos);
    $insert->bindParam(":ypos", $ypos);

    $insert->execute();
 //   echo $sql;
 
    // $statement = $dbConn->prepare($sql);
    
    // $result = $statement->execute(); 
    
    // return $result; 
}


// fetch the newly created comic object from database JOINED with the
// the appropriate category information (comic url)
    
function fetchComicFromDB($comic_id) {
  global $dbConn; 
    
  $sql = "SELECT
        `comics`.`comic_id`, 
        `categories2`.`category_id` 
        FROM `comics` INNER JOIN `categories2` 
        ON `comics`.`category_id` = `categories2`.`category_id`"; 
  
  $statement = $dbConn->prepare($sql); 
  
  $records = $statement->fetchAll(); 
  $newComic = $records[0]; 
  //$statement->execute(); 
  
  //echo "New Comic: ";
  //print_r($records);
  //echo "<br>";
  //echo $sql;
  //echo "<br>";
  return $newComic; 
}


function createComic($title, $text, $xpos, $ypos, $category_id) {
   
    global $dbConn; 
     
        
     if($title == $query){
    //     // $insert = $dbConn->prepare( "SELECT `comic_id`, 
    //     //         `title`,
    //     //         `category_id` 
    //     //         FROM `comics` WHERE `title` = $title";
    //     //         );
    //     $insert = $dbConn->prepare( "SELECT `comic_id`, `title`, `category_id` FROM `comics` WHERE `title` = $title");
        
     echo "title == query";
        
     }else {
     //   INSERT INTO `comics` (`comic_id`, `title`, `comic_url`) VALUES (NULL, '123\r\n', '');
      //echo "start here"."</br>". $category_id ."</br>";
        $insert = $dbConn->prepare("INSERT INTO comics(title, comic_url) VALUES (:title , :category_id)");
        $insert->bindParam(":title", $title);
        $insert->bindParam(":category_id", $category_id);
 //       $insert->execute();
        
    }
    

    //  $insert = $con->prepare("INSERT INTO users2 (username, password) VALUES (:username, :password)");
     
    // //$insert->bindParam(":user_id",NULL);
    //  $insert->bindParam(":username",$userName);
    //  $insert->bindParam(":password",$category_id);
     
    
    //Step 1: Get the category ID for the selected comic type
    $categoryID = getCategoryID($category); 
    
    //Step 2: Insert the comic information (along with the category ID) into the
    // comics table
    //$result = insertComic($title, $text, $xpos, $ypos, $category); 

    //Step 3: Fetch the new comic joined with the comic_url information
     $last_id = $dbConn->lastInsertId();
     $newComic = fetchComicFromDB($last_id); 
    
    return $newComic; 
    
}

function editComic($id, $text, $xpos, $ypos, $category_id) {
  global $dbConn; 
  
  
  //Step 1: Get the category ID for the selected comic type
  $categoryID = getCategoryID($category_id); 
  
  //Step 2: Update the comic record in the all_comics table

  $sql = "UPDATE `comics` SET text = :text, xpos = :xpos, ypos = :ypos, category_id = :category_id WHERE id = :id"; 

  $statement = $dbConn->prepare($sql); 
  $statement->execute(array(
      ':text' => $text, 
      ':xpos' => $xpos, 
      ':ypos' => $ypos, 
      ':category_id' => $category_id, 
      ':id' => $id
      ));
    
  
}

function deleteComicFromDB($category_id) {
  global $dbConn; 
  
  $sql = "DELETE FROM comics WHERE comics.id = $category_id"; 
  
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
}


function getOptions(){
    global $dbConn;
    
    $sql = "SELECT comic_type, comic_url FROM `categories2` WHERE 1";
    
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

/*function getImage(){
    global $dbConn; 
    
    /*if(!isset($_POST['comic-type'])){
        $sql = "SELECT comic_url FROM `categories2` WHERE `comic_type` ='comic1'";
        
        $statement = $dbConn->prepare($sql); 
    
        $statement->execute(); 
        $records = $statement->fetchAll();
        
        foreach ($records as $record) {
            echo $record['comic_url'];
        }
    }else{
    echo $_POST['comic-type'];
    //}
}*/
function checkID(){
    $sql = "SELECT `category_id` FROM `categories2` WHERE `comic_url` LIKE '" . $_POST['comic-type'] . "'<br>";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    foreach ($records as $record) {
        echo $record['category_id'];
    }
}
?>