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
    color: white;
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
	echo $_POST['right'];
	echo $_POST['bottom'];
	print_r($_POST);
    ?>
<p>How to place text over an image:</p>

<form action="imageoverlay.php" method="POST">
	X: <input type="text" id="top" name="top"> px
    <br><br>
    Y: <input type="text" id="left" name="left"> px
    <br><br>
    <input type='submit'></input> 
</form>
<br>
<br><br>
<div class="container">
  <img src="https://images.pexels.com/photos/67636/rose-blue-flower-rose-blooms-67636.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Snow" style="width:100%;">
  <div class="user-text">Text</div>
</div>

<script>
    $('#submit').click(function() {
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