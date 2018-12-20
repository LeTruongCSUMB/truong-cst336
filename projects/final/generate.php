<?php
include "functions.php";
    $dbConn = getDatabaseConnection();
    // echo "id: ";
    // echo $_POST["comic-type"];
    // echo "</br>";
    // //checkID();

//SELECT * from tutorials_tbl WHERE tutorial_author = 'Sanjay';
    
    //$result= $dbConn->query("SELECT `category_id` FROM `categories2` WHERE `comic_url`='" . $_POST['comic-type'] . "'");

    //$fetch = $query->fetch();

    //print_r($fetch);
    //$categ =  $_POST["comic-type"];
    
    if (isset($_POST['text']) && $_POST['title']&& isset($_POST['xpos']) && isset($_POST['ypos'])) {
    
    $categ =  $_POST["comic-type"];
    
        $comicObj = createComic( $_POST['title'], $_POST['text'], $_POST['xpos'], $_POST['ypos'], $categ); 
    
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            #mydiv {
          position: absolute;
          z-index: 9;
          background-color: #f1f1f1;
          text-align: center;
          border: 1px solid #d3d3d3;
        }
        
        #mydivheader {
          padding: 10px;
          cursor: move;
          z-index: 10;
          background-color: #2196F3;
          color: #fff;
        }
        </style>
        <title>Welcome</title>
        <link rel="stylesheet" 
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
            crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js"></script>
<!-- or -->
<!--<script src="https://unpkg.com/interactjs@1.3.4/dist/interact.min.js"></script>-->
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
    <!--
        echo $_POST['top'];
    	echo $_POST['left'];
    	print_r($_POST);
        ?>-->
    <div class="info" style="margin:20px ;padding:20px;">
    <h2>How to place text over an image.</h2>

    <p>
        The X and Y are the values of where your text will be displayed in regards to the comic.
        <br>
        The top left corner is coordinates (0,0) with x > 0 moving towards the right side of the
        <br>
        page, and y > 0 moving towards to the bottom page.
        </p>
    </div>    
    <form action="generate.php" method="POST">
        <div id="container" style="margin:20px; padding:20px; boarder:solid 1px gray;">
        <label>Title: <input type="text" id="title" name="title" placeholder="Enter your title here" value="<?=$_POST['title']?>"></label>
        <br><br>
        <label>Text: <input type="text" id="text" name="text" placeholder="Enter your text here"> </label>
        <input type="hidden" name="comic-type" value="<?php echo $_POST['comic-type'];?>">
        <br><br>
    	<label>X: <input type="text" id="top" name="ypos"> px </label>
        <br><br>
        <label> Y: <input type="text" id="left" name="xpos"> px</label>
        <br><br>
        <input type='submit' class="btn btn-primary"></input>
        </div>
    </form>
    
<div id="mydiv">
  sasd
</div>

    
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
    
    <script>
//Make the DIV element draggagle:
dragElement(document.getElementById("mydiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
<script>
    var element = document.getElementById('mydiv');
    var position = element.getBoundingClientRect();
    var x = position.left;
    var y = position.top;
</script>
    </body>
</html> 