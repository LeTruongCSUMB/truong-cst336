<?php
include "functions.php";
session_start();
$_SESSION['comic-type'] = $_POST['comic-type'];
$imgURL = $_SESSION['comic-type'];
?>
This is generate, where comics are made, welcome.
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.container {
    position: relative;
    text-align: center;
    color: Black;
}

.user-text {
    position: absolute;
    top: <?= $_POST['top'];?>px;
    left: <?=$_POST['left'];?>px;
}
</style>
</head>
<body>

<h2>Image Text</h2>
<?php 
    echo $_POST['top'];
	echo $_POST['left'];
	print_r($_POST);
    ?>
<p>How to place text over an image:</p>

<form action="generate.php" method="POST">
    <input type="text" id="text" name="text" placeholder="Enter your text here">
    <br><br>
	X: <input type="text" id="top" name="top"> px
    <br><br>
    Y: <input type="text" id="left" name="left"> px
    <br><br>
    <input type='submit'></input> 
</form>
<br>
<br><br>
<div class="container">
  <img src="<?= $imgURL; ?>" alt="Comic Image">
  <div class="user-text"><?= $_POST['text'];?></div>
</div>

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