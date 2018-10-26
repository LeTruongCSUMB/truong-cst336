<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Midterm Pratice 1</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <meta charset="utf-8">
        <style>
            @import url("css/styles.css");
        </style>
    </head>
        <div style="font-size:3vw; text-align:center;">
            <h1>Winter Vacation Planner!</h1>
        </div>
    <body>
        <center style="font-size: 18px;"><form action="index.php" method="get">
            <br>
            <div>
            Select Month:
                <select name="month">
                    <option>Select</option>
                    <option>November</option>
                    <option>December</option>
                    <option>January</option>
                    <option>February</option>
                </select>
            </div>
            <br>
            <div>
            Number of locations:
            
                <input type="radio" id="loc3" name="loc" value="3">
                        <label for="loc3"><strong>Three</strong></label>
                        
                <input type="radio" id="loc4" name="loc" value="4">
                        <label for="loc4"><strong>Four</strong></label>
                        
                <input type="radio" id="loc5" name="loc" value="5">
                        <label for="loc5"><strong>Five</strong></label>
            </div>
            <br>
            <div>
            Select Country:
                <select name="country">
                    <option>USA</option>
                    <option>Mexico</option>
                    <option>France</option>
                </select>
            </div>
            <br>
            <div>
            Visit locations in alphabetical order:
                <input type="radio" id="AZ" name="alpha" value="forward">
                        <label for="AZ"><strong>A-Z</strong></label>
                <input type="radio" id="ZA" name="alpha" value="backward">
                        <label for="ZA"><strong>Z-A</strong></label>
            </div>
            <br>
            <div>
            <button type="submit" name="create" value="clicked">Create Itinerary</button>
            </div>
            <div>
                <?php
                    $France = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
                    $Mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
                    $USA = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
                
                    if(($_GET['create'] == "clicked") && ($_GET['month'] != "Select") && ($_GET['loc'] != "")){
                        echo "<br>";
                        echo "<div style='font-size= 25px;'>";
                        echo  $_GET['month'] . " Itinerary";
                        echo "</div>";
                        echo "<br>";
                        echo "<div style='font-size= 20px;'>";
                        echo "Visiting ". $_GET['loc'] ." places in ". $_GET['country'];
                        echo "</div>";
                        echo "<br>";
                        
                        if ($_GET['month'] == "November"){
                                $days = 31;
                            }else if ($_GET['month'] == "December" || $_GET['month'] == "January"){
                                $days = 32;
                            }else if ($_GET['month'] == "February"){
                                $days = 29;
                            }
                                if($_GET['loc'] == "3"){
                                    $f = 3;
                                }else if($_GET['loc'] == "4"){
                                    $f = 4;
                                }else if($_GET['loc'] == "5"){
                                    $f = 5;
                                }
                                    $country = $_GET['country'];
                                    if($_GET['country'] == "France"){
                                        $co = [];
                                        $co = $France;
                                        
                                    }else if($_GET['country'] == "Mexico"){
                                        $co = [];
                                        $co = $Mexico;
                                        
                                    }else if($_GET['country'] == "USA"){
                                        $co = [];
                                        $co = $USA;
                                        
                                    }

                                for($i = 0; $i < $f; $i++){
                                    $visits[$i] = (rand(1, $days-1));
                                    echo $visits[$i];
                                    
                                    $places = (rand(0, count($co)-1));
                                    $img = $co[$places];
                                    $image = "<img src='img/$country/$img.png' alt='place' height='50' width='50'>";
                                    unset($co[$places]);
                                    $co = array_values($co);
                                }
                                unset($visits[$i]);
                                $visits = array_values($visits);
                                
                            echo '<table border="1">';
                            for($d = 1; $d < $days; $d++){
                                
                                
                                if($counter++ == 0) {
                                    echo '<tr>';
                                }if($counter < 7){
                                    if(in_array($d, $visits)){
                                        if ($img == "ny"){
                                            echo '<td width="150px", height="100px", align="center">' . $d . '<br> ' . $image . '<br>New York</td>';
                                        }else{
                                            echo '<td width="150px", height="100px", align="center">' . $d . '<br> ' . $image . '<br> ' . ucwords(str_replace("_", " ", "$img")) . '</td>';
                                        }
                                    }else{
                                    echo '<td width="150px", height="100px", align="center">' . $d . '</td>';
                                    }
                                }else if($counter == 7){
                                    if(in_array($d, $visits)){
                                        if ($img == "ny"){
                                            echo '<td width="150px", height="100px", align="center">' . $d . '<br> ' . $image . '<br>New York</td>';
                                        }else{
                                            echo '<td width="150px", height="100px", align="center">' . $d . '<br> ' . $image . '<br> ' . ucwords(str_replace("_", " ", "$img")) . '</td>';
                                        }
                                    }else{
                                    echo '<td width="150px", height="100px", align="center">' . $d . '</td>';
                                    }
                                    echo '</tr>';
                                    $counter= 0;
                                }
                            }
                            echo '</table>';
                    }else{
                        if ($_GET['month'] == "Select") {
                            echo "<br>";
                            echo "<div style='color:red; font-size: 40px;'>You must select a Month!</div>";
                        }
                        if (($_GET['loc'] == "") && ($_GET['create'] == "clicked")) {
                            echo "<br>";
                            echo "<div style='color:red; font-size: 40px;'>You must specify the number of locations!</div>";
                        }
                    }
                    
                    
                ?>
            </div>
        </form></center>
    </body>
</html>