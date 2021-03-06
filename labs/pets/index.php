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
                background-color: #242840;
            }
            jumbotron {
                background-color: #DDDAC7;
            }
            h5, p {
                font-size: 20px;
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
        
        <?=
            displayImages();
        ?>
        <a href="pets.php"><button>Adopt us!</button></a>
        
        <?php
        function displayImages(){
            $dbConn = getDatabaseConnection(); 
        
            $sql = "SELECT pictureURL, description, name FROM `pets` WHERE 1";
            
        $statement = $dbConn->prepare($sql); 
    
        $statement->execute(); 
        $records = $statement->fetchAll();
        
        $i = 0;
        echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';
        echo '<div class="carousel-inner">';
        foreach ($records as $record) {
            echo '<div class="carousel-item ';
            echo ($i == 0)? 'active' : '';
            echo '"><img class="w-50 p-3 h-50 d-inline-block" src="img/' . $record["pictureURL"] . '" alt="' . $record["pictureURL"]. '">';
            echo '<div class="carousel-caption d-none d-md-block">';
            echo '<h5>' . $record["name"] . '</h5>';
            echo '<p>' . $record["description"] . '</p>';
            echo '</div>';
            echo '</div>';
            $i++;
        }
        echo '</div>';
        echo '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">';
        echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        echo '<span class="sr-only">Previous</span>';
        echo '</a>';
        echo '<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">';
        echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        echo '<span class="sr-only">Next</span>';
        echo '</a>';
        echo '</div>';
        }
        ?>