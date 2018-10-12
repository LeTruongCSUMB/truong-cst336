<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <style>
        @import url("css/styles.css");
            @font-face { 
                font-family: Okuda; src: url('Okuda.otf');
            }
            h1 {
                color: #CCDDFF;
            }
            span{
                color: #FF9900;
            }
        </style>
            <div style="font-size:5vw;">
                <h1><span>WELCOME </span><br><br><?php 
                if($_POST['division'] == "Command"){
                    echo "<div style='color:#a71313'>";
                    $img = 'img/command.png';
                    
                }else if ($_POST['division'] == "Science"){
                    echo "<div style='color:#2b53a7'>";
                    $img = 'img/science.png';
                    
                }else if ($_POST['division'] == "Operations"){
                    echo "<div style='color:#c1c730'>";
                    $img = 'img/operations.png';
                    
                }
                echo $_POST['rank'] ." ".  $_POST['name'], "<img src=\"$img\" alt=\"insignia\" width=\"100\" height=\"100\" />"; 
                ?></h1>
                <br>
            </div>
    </head>
    <body>
        <div style="color: #CCDDFF">
            <form action="index.php" method="POST">
                <div style="color: #4455BB; font-size:2vw;">
                    Name: <input type="text" name="name" placeholder="Full name here" value="<?=$_POST['name']?>" size="25" />
                </div>
                <br>
                <div style="color: #CC6699; font-size:2vw;">
                    Division:
                    <select name="division">
                        <option <?php if ($_POST['division'] == "Command") echo "Selected = 'selected'";?>>Command</option>
                        <option <?php if ($_POST['division'] == "Science") echo "Selected = 'selected'";?>>Science</option>
                        <option <?php if ($_POST['division'] == "Operations") echo "Selected = 'selected'";?>>Operations</option>
                    </select>
                </div>
                <br>
                <div style="color: #FFCC66; font-size:2vw;">
                    Rank:
                    <br>
                        <input type="radio" name="rank" value="Enlisted" <?php if ($_POST['rank'] == "Enlisted") echo "Checked = 'checked'";?>>
                            <label for="item0">Enlisted</label> <br>
                
                        <input type="radio" name="rank" value="Ensign" <?php if ($_POST['rank'] == "Ensign") echo "Checked = 'checked'";?>>
                            <label for="item1">Ensign</label> <br>
                    
                        <input type="radio" name="rank" value="Lieutenant Junior" <?php if ($_POST['rank'] == "Lieutenant Junior") echo "Checked = 'checked'";?>>
                            <label for="item1">Lieutenant Junior</label> <br>
                            
                        <input type="radio" name="rank" value="Lieutenant" <?php if ($_POST['rank'] == "Lieutenant") echo "Checked = 'checked'";?>>
                            <label for="item1">Lieutenant</label> <br>
                            
                        <input type="radio" name="rank" value="Lieutenant Commander" <?php if ($_POST['rank'] == "Lieutenant Commander") echo "Checked = 'checked'";?>>
                            <label for="item1">Lieutenant Commander</label> <br>
                            
                        <input type="radio" name="rank" value="Commander" <?php if ($_POST['rank'] == "Commander") echo "Checked = 'checked'";?>>
                            <label for="item1">Commander</label> <br>
                            
                        <input type="radio" name="rank" value="Captain" <?php if ($_POST['rank'] == "Captain") echo "Checked = 'checked'";?>>
                            <label for="item1">Captain</label> <br>
                        </div>
                
                    <br>
                    <button class="button">Return to Login</button>
            </form>
        </div>
    </body>
</html>