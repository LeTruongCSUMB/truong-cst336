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

.bottom-left {
    position: absolute;
    bottom: "$_POST['bottom']";
    left: "$_POST['left']";
}

.top-left {
    position: absolute;
    top: "$_POST['top']";
    left: "$_POST['left']";
}

.top-right {
    position: absolute;
    top: "$_POST['top']";
    right: "$_POST['right']";
}

.bottom-right {
    position: absolute;
    bottom: "$_POST['bottom']";
    right: "$_POST['right']";
}

.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
</head>
<body>

<h2>Image Text</h2>
<p>How to place text over an image:</p>

<form action="imageoverlay.php" method="POST">
	Top: <input type="text" id="top"> px
    <br><br>
    Left: <input type="text" id="left"> px
    <br><br>
    Bottom: <input type="text" id="bottom"> px
    <br><br>
    Right: <input type="text" id="right"> px
    <br><br>
	<?php 
    echo $_POST['top'];
	echo $_POST['left'];
	echo $_POST['right'];
	echo $_POST['bottom'];
    ?>
</form>
<br>
<button type='submit'>submit</button> 
<br><br>
<div class="container">
  <img src="https://images.pexels.com/photos/67636/rose-blue-flower-rose-blooms-67636.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Snow" style="width:100%;">
  <div class="bottom-left">Bottom Left</div>
  <div class="top-left">Top Left</div>
  <div class="top-right">Top Right</div>
  <div class="bottom-right">Bottom Right</div>
  <div class="centered">Centered</div>
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