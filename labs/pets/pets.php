<?= include 'database.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
            jumbotron {
                background-color: #DDDAC7;
            }
            .list {
                border-radius: 25px;
                text-align: left;
                background-color: #DDDAC7;
                width: 75%;
                margin: auto;
                padding: 10px;
                
            }
            .button {
                text-align: right;
            }
        </style>
   
    </head>
    <body>
        
	<!--Add main menu here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pets.php">Adoptions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
            </ul>
        </div>
    </nav>
        
        <div class="jumbotron">
          <h1> CSUMB Animal Shelter</h1>
          <h2> The "official" animal adoption website of CSUMB </h2>
        </div>
        
        <?php
        adoptList();
        ?>
        
        <?php
        function adoptList(){
            $dbConn = getDatabaseConnection(); 
        
            $sql = "SELECT * FROM `pets` WHERE 1";
            
        $statement = $dbConn->prepare($sql); 
    
        $statement->execute(); 
        $records = $statement->fetchAll();
        
        $i = 0;
        foreach ($records as $record) {
            echo '<div class="list">';
            echo 'Name: ';
            echo '<a href="pets.php">' . $record["name"] .'</a>';
            echo '<br>';
            echo 'Type: ' . $record['type'];
            echo '<div class="button">';
            echo '<button type="button" id="submit" name="';
            echo $record["name"];
            //echo $i;
            //$i++;
            echo '" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Adopt me!</button>';
            echo '</div>';
            echo '</div>';
            echo '<br>';
            }
        }
        ?>
        
        <script>
            
            $(document).ready(function() {
            $("#submit").click(function() {
                    $.ajax({
                    type: "get",
                    url: "adopt.php",
                    data: {"name": $("#name").val()},
                    success: function(data,status) {
                        console.log($("#name").val());
                        //alert(status);
                            $("#showName").html(data['name']);
                            $("#showDes").html(
                            "<br>" +
                            "<img src='img/" + data['pictureURL'] + "' alt='" + data['pictureURL'] + "' width='50' height='50'>" +
                            "Name: " + data['name'] + "<br>" +
                            "Breed: " + data['breed'] + "<br>" +
                            "Color: " + data['color'] + "<br>" +
                            "Year of Birth: " + data['yob'] + "<br>" +
                            "Description: " + data['description'] + "<br>"
                            );
                        }
                    });
                });
            });
            
        </script>
        
        <!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Launch demo modal
</button>-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span id="showName"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <span id="showDes"></span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Adopt</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Don't Adopt</button>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>