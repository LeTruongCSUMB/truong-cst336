<?php
session_start(); 
include 'functions.php';

checkLoggedIn(); 

if (isset($_POST['id'])) {
    //user submitted the form to edit a comic
    editComic($_POST['id'], $_POST['line1'], $_POST['line2'], $_POST['comic-type']); 
}

$comicID = $_GET['id'];
$comicObj = fetchComicFromDB($comicID); 

function generateOptions($selectedType) {
    $comicTypes = array(
        "college-grad" => "Happy College Grad", 
        "thinking-ape" => "Deep Thought Monkey", 
        "coding" => "Learning to Code", 
        "old-class" => "Old Classroom"); 
    
    foreach ($comicTypes as $comicType => $description) {
        echo "<option "; 
        
        if ($selectedType == $comicType)
            echo "selected='selected' "; 
            
        echo "value='$comicType'>$description</option>"; 
    }
}

//echo $comicID;
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
    <h1>Edit Comic</h1>
     
    <?php displayComics(array($comicObj)); ?>
     
    <form method="POST">
        <input type="hidden" name="id" value=<?= $comicObj['id'] ?>>
        Line 1: <input type="text" name="line1" value="<?= $comicObj['line1'] ?>"></input> <br/>
        Line 2: <input type="text" name="line2" value="<?= $comicObj['line2'] ?>"></input> <br/>
        Comic Type:
        <select name="comic-type">
          <?php getOptions(); ?>
        </select>
        <br/>
        <input type="submit"></input>
    </form>
  </body>
</html>
