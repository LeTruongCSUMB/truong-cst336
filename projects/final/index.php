<?php

include 'functions.php';

//echo "check: " . $_SESSION['user_id'];

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
    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  
    <a class="navbar-brand">Comic Generator</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
                <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        
    <?php
      if(!isset($_SESSION['user_id'])){
    ?>
        
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Login <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="join.php">Register</a>
        </li>
        
        <?php
        } else{
        ?>
        
        <li class="nav-item active">
          <a class="nav-link" href="comics.php">Comics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
      <?php
      
          
        }
      
      ?>

    </div>
  </nav>

    <h1 style="margin-left:10px; padding:10px">Comic Generator</h1>
    <h3 style="margin-left:10px; padding:10px">Welcome to the Comic Generator!</h3>
    
  <form action="generate.php" method="post">
    <div class="input-group mb-3" style="width:500px ;margin:10px; padding:20px">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Select A Frame</label>
      </div>
      <select class="custom-select" id="inputGroupSelect01" name="comic-type">
        <?php getOptions(); ?>
      </select>
      <input class="btn btn-primary" type="submit" value="Select"></input>
    </div>
  </form>
    <div id="container" style="margin:20px; padding:20px;">
    <span id="imageShow"></span>
    </div>
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
  
  </body>
</html>