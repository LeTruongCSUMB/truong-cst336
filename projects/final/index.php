<?php

include 'functions.php';


if (isset($_POST['line1']) && isset($_POST['line2'])) {
  $memeObj = createMeme($_POST['line1'], $_POST['line2'], $_POST['meme-type']); 
  
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
  </head>
  
  <body>
    <?php include 'navigation.php' ?>
    <h1>Comic Generator</h1>
    <h3>Welcome to the Comic Generator!</h3>
    
  <form action="generate.php" method="post">
    <div class="input-group mb-3" style="width:500px">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Select A Frame</label>
      </div>
      <select class="custom-select" id="inputGroupSelect01" name="comic-type">
        <?php getOptions(); ?>
      </select>
      <input class="btn btn-primary" type="submit" value="Select"></input>
    </div>
  </form>
    
    <span id="imageShow"></span>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 
        crossorigin="anonymous" 
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=">
        </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      $('#inputGroupSelect01').change(function() {
        console.log($("#inputGroupSelect01").val());
        $.ajax({
        type: "GET",
        url: "imageSelect.php",
        dataType: "json",
        data: JSON.stringify($("comicData")),
        success: function(data,status) {
          console.log(data);
            $("#imageShow").html("<img height='40%' width='40%' src='" +
              $("#inputGroupSelect01").val() + "'>");
            },
            complete: function(data,status) { //optional, used for debugging purposes
          }
        });
      });
    </script>
  
     <footer class="bg-dark mt-4 p-5 text-center" style="color: #FFFFFF; position:absolute;
   bottom:0;">
       &copy;
   </footer>
  </body>
</html>