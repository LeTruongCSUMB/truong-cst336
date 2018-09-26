<?php

    $covers = array("destiny_2", "civilization_v", "star_wars_empire_at_war", "watchdogs", "battlefield_3", "doom", "gta_v", "space_engineers", "team_fortress_2", "xcom_2", "overwatch");
    $posQuotes = array("Amazing!", "A must buy!", "This Game Rocks!", "10/10 would recommend.", "Brilliant.", "Game of the Year.");
    $negQuotes = array("Avoid at all cost", "I want my 2 hours back.", "...", "Questionable decisions.", "0/10", "Didn't live up to the hype...");
    
    function gameReview() {
        global $covers, $posQuotes, $negQuotes;
        for ($i = 0; $i < 4; $i++) {
            echo "<div class='cover'>";
            $randVal = rand(0,count($covers)-1);
            $randomCover = $covers[$randVal];
            if ($randomCover == "gta_v" || $randomCover == "xcom_2"){
                echo strtoupper(str_replace("_", " ", "$randomCover"));
            }else {
                echo ucwords(str_replace("_", " ", "$randomCover"));
            }
            echo "<br>";
            echo "<img width='100' height='150' src='img/$randomCover.png'>"; 
            echo "<br>";
            
            $totalReviews = rand(100, 300);
            
            $score = 100;
                for($j = 4; $j >= 0; $j--) {
                    if($j == 4){
                    $ratings = rand(0, $score);
                    $ratings = $score - $ratings;
                    echo "$ratings/100 ";
                    echo "<br>";
                    
                    if ($ratings < 20) {
                        echo "<img width='15' src='img/star.png'>";
                        echo "<br>";
                        $nq=array_rand($negQuotes,1);
                        echo "<i>$negQuotes[$nq]</i>";
                        unset($negQuotes[$nq]);
                        $negQuotes = array_values($negQuotes);
                        break;
                        
                    }else if ($ratings < 40) {
                        for($k = 0; $k < 2; $k++){
                            echo "<img width='15' src='img/star.png'>";
                        }
                        echo "<br>";
                        break;
                        
                    }else if ($ratings < 60) {
                        for($k = 0; $k < 3; $k++){
                            echo "<img width='15' src='img/star.png'>";
                        }
                        echo "<br>";
                        break;
                        
                    }else if ($ratings < 80) {
                        for($k = 0; $k < 4; $k++){
                            echo "<img width='15' src='img/star.png'>";
                        }
                        echo "<br>";
                        break;
                        
                    }else {
                        for($k = 0; $k < 5; $k++){
                            echo "<img width='15' src='img/star.png'>";
                        }
                        echo "<br>";
                        
                        $pq=array_rand($posQuotes,1);
                        echo "<i>$posQuotes[$pq]</i>";
                        unset($posQuotes[$pq]);
                        $posQuotes = array_values($posQuotes);
                        break;
                    }
                }
            }
            echo "<br>Total reviews: $totalReviews";
            echo "</div>";
            unset($covers[$randVal]);
            $covers = array_values($covers);
        }
    }
?>