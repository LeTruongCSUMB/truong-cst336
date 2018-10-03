<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <style>
        @import url("css/styles.css");
            @font-face { 
                font-family: Okuda; src: url('Okuda.otf');
            }
        </style>
    </head>
    <body>
        
        <div style="color: #CCDDFF">
            <form action="index.php" method="POST">
                <button class="button">Return to Login</button>
            </form>
            <?php
            
                echo '<p>$_POST: ';
                echo '<pre>';
                var_dump($_POST);
                echo '</pre>';
                echo "</p>";
                
                echo '<p>$_GET: ';
                echo '<pre>';
                var_dump($_GET);
                echo '</pre>';
                echo "</p>";
            ?>
        </div>
    </body>
</html>