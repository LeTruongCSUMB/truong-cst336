<?php
include "functions.php";
    $dbConn = getDatabaseConnection();
    echo "id: ";
    echo $_POST["comic-type"];
    echo "</br>";
    
    //checkID();

//SELECT * from tutorials_tbl WHERE tutorial_author = 'Sanjay';
    
    //$result= $dbConn->query("SELECT `category_id` FROM `categories2` WHERE `comic_url`='" . $_POST['comic-type'] . "'");

    //$fetch = $query->fetch();

    //print_r($fetch);

    
    if (isset($_POST['text']) && $_POST['title']&& isset($_POST['xpos']) && isset($_POST['ypos'])) {
        $comicObj = createComic( $_POST['title'], $_POST['text'], $_POST['xpos'], $_POST['ypos'], $_POST['category_id']); 
    
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" 
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
            crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        
        .container {
            background-image: url('<?= $_POST['comic-type']; ?>');
            background-size: contain;
            background-repeat:no-repeat;
            position: relative;
            height: 1000px;
            width: 1000px;
            object-fit: none;
            text-align: center;
            color: Black;
        }
        
        .user-text {
            position: absolute;
            top: <?= $_POST['ypos'];?>px;
            left: <?=$_POST['xpos'];?>px;
            color: black;
        }
        
        </style>
    <body>
    <?php include 'navigation.php' ?>
    <h2>How to place text over an image.</h2>
    <!--
        echo $_POST['top'];
    	echo $_POST['left'];
    	print_r($_POST);
        ?>-->
    <p>
        The X and Y are the values of where your text will be displayed in regards to the comic.
        <br>
        The top left corner is coordinates (0,0) with x > 0 moving towards the right side of the
        <br>
        page, and y > 0 moving towards to the bottom page.
        </p>
        
    <form action="generate.php" method="POST">
        Title: <input type="text" id="title" name="title" placeholder="Enter your title here" value="<?=$_POST['title']?>">
        <br><br>
        Text: <input type="text" id="text" name="text" placeholder="Enter your text here">
        <input type="hidden" name="comic-type" value="<?php echo $_POST['comic-type'];?>">
        <br><br>
    	X: <input type="text" id="top" name="ypos"> px
        <br><br>
        Y: <input type="text" id="left" name="xpos"> px
        <br><br>
        <input type='submit'></input> 
    </form>
    
    
    <br><br><br>
    <div class="container">
      <div class="user-text"><?= $_POST['text'];?></div>
    </div>
    
    
    <!--INSERT INTO comics (st_id,uid,changed,status,assign_status)
    INSERT INTO `comics`(`comic_id`, `title`) VALUES (NULL, )-->
    <!--SELECT st_id,from_uid,now(),'Pending','Assigned'-->
    <!--FROM user -->
        <script>
            $('#top').change(function() {
            $.ajax({
                url: 'imageoverlay.php',
                type: 'POST',
                data: {
                },
                success: function() {
                    
                }               
                });
            });
            
            $('#left').change(function() {
            $.ajax({
                url: 'imageoverlay.php',
                type: 'POST',
                data: {
                },
                success: function() {
                    
                }               
                });
            });
        </script>
    
    </body>
</html> 