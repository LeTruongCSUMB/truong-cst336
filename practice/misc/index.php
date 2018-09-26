<!DOCTYPE html>

<html>
    <head>
        <title>Sessions</title>
    </head>
    <body>
        <?php
         echo '<form action="index.php" method="post">';
             echo 'Names <br><br>';
             echo '<input type="radio" id="item1" name="Names" value="$_POST["ename1"]">';
             echo '<label for="item1"><input type="text" name="ename1" size="25" /></label>';
             echo '<br><br>';
             echo '<input type="radio" id="item2" name="Names" value="$_POST["ename2"]">';
             echo '<label for="item2"><input type="text" name="ename2" size="25" /></label>';
             echo '<br><br>';
             echo '<input type="radio" id="item3" name="Names" value="$_POST["ename3"]">';
             echo '<label for="item3"><input type="text" name="ename3" size="25" /></label>';
             echo '<br><br>';
             echo '<input type="radio" id="item4" name="Names" value="$_POST["ename4"]">';
             echo '<label for="item4"><input type="text" name="ename4" size="25" /></label>';
             echo '<br><br>';
             echo '<input type="radio" id="item5" name="Names" value="$_POST["ename5"]">';
             echo '<label for="item5"><input type="text" name="ename5" size="25" /></label>';
             echo '<br><br>';
             echo '<input type="submit" value="Save"/>';
         echo '</form>';
         ?>
    </body>
</html>