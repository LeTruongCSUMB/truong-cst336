<!DOCTYPE>
<!DOCTYPE html>
<html>
    
    <head>
    <title>Welcome</title>
  <style>
  svg {
  width: 100%;
  height: 240px;
  background-color: #2e9;
  
  -ms-touch-action: none;
      touch-action: none;
}
.edit-rectangle {
  fill: #92e;
  stroke: #fff;
}
body { margin: 0; }

  </style>
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
  </head>
    <body>
         
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/interactjs@1.3.4/dist/interact.min.js"></script>


<script>
const interact = require('interactjs');
interact(target).draggable({onmove: dragMoveListener})
function dragMoveListener (event) {
  var target = event.target,
  // keep the dragged position in the data-x/data-y attributes
  x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
  y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

  // translate the element
  target.style.webkitTransform = target.style.transform
                               = 'translate(' + x + 'px, ' + y + 'px)';
  // update the posiion attributes
  target.setAttribute('data-x', x);
  target.setAttribute('data-y', y);
}</script>
  

  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
        
    <a class="navbar-brand">Comic Generator</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
            <li class="nav-item active">
          <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
        </li>
        
    <?php
      if($_SESSION['user_id']==null){
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
          <a class="nav-link" href="home.php">MeMe Generator </a>
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
  
<ul id="my-list">
  <li> item 1 </li>
  <li> item 2 </li>
  <li> item 3 </li>
</ul>
</body>
</html>