<!DOCTYPE html>
<html>
    <head>
        <title>Midterm Pratice 2</title>
    </head>
    <body>
        <?php
            include 'database.php';
            $dbConn = getDatabaseConnection();
            
            //Cities/town between 50,000 80,000
            echo "List all cities/towns that have a population between 50,000 and 80,000";
            echo "<br>";
            $sql = 'SELECT * FROM mp_town WHERE `population` BETWEEN 50000 AND 80000';
            $statement = $dbConn->prepare($sql); 
            $statement->execute();
            $records = $statement->fetchAll();
            foreach ($records as $record) {
                echo  $record["town_name"] .' - ' . $record["population"];
            }
            //Towns with opulation from big to small
            echo "<br>";
            echo "List all towns and population, ordered by population (from biggest to smallest)";
            echo "<br>";
            $sql = 'SELECT * FROM `mp_town` ORDER BY `population` DESC';
            $statement = $dbConn->prepare($sql); 
            $statement->execute();
            $records = $statement->fetchAll();
            foreach ($records as $record) {
                echo "<br>";
                echo  $record["town_name"] .'   ' . $record["population"];
                echo "<br>";
            }
            //3 towns with the least population
            echo "<br>";
            echo "List the three least populated towns";
            echo "<br>";
            $sql = 'SELECT * FROM `mp_town` ORDER BY `mp_town`.`population` ASC LIMIT 3';
            $statement = $dbConn->prepare($sql); 
            $statement->execute();
            $records = $statement->fetchAll();
            foreach ($records as $record) {
                echo "<br>";
                echo  $record["town_name"] .'   ' . $record["population"];
                echo "<br>";
            }
            //Towns that starts with the letter "S"
            echo "<br>";
            echo 'List the counties that start with the letter "S"';
            echo "<br>";
            $sql = "SELECT * FROM `mp_county` WHERE `county_name` LIKE 'S%'";
            $statement = $dbConn->prepare($sql); 
            $statement->execute();
            $records = $statement->fetchAll();
            foreach ($records as $record) {
                echo "<br>";
                echo  $record["county_name"];
                echo "<br>";
            }
        ?>
    </body>
</html>