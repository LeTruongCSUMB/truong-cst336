<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <meta charset="utf-8">
        <style>
            @import url("css/styles.css");
            @font-face { 
                font-family: Okuda; src: url('Okuda.otf');
            }
        </style>
    </head>
        <h1>OFFICER</h1><h2>LOGIN</h2>
    <body>
        <form action="save.php" method="GET">
            <br>
            <div style="color: #4455BB">
            Name: <input type="text" name="name" placeholder="Full name here" value="" size="25" />
            </div>
            <br>
            <div style="color: #CC6699">
            Division:
            <select name="division">
                <option value="">Select Division</option>
                <option value="Command">Command</option>
                <option value="Science">Science</option>
                <option value="Operations">Operations</option>
            </select>
            </div>
            <br>
            <div style="color: #FFCC66">
            Rank:
            <br>

            <input type="radio" id="rank1" name="rank" value="Ensign">
                <label for="item1">Ensign</label> <br>
                
            <input type="radio" id="rank2" name="rank" value="Lieutenant Junior">
                <label for="item1">Lieutenant Junior</label> <br>
                
            <input type="radio" id="rank3" name="rank" value="Lieutenant">
                <label for="item1">Lieutenant</label> <br>
                
            <input type="radio" id="rank4" name="rank" value="Lieutenant Commander">
                <label for="item1">Lieutenant Commander</label> <br>
                
            <input type="radio" id="rank5" name="rank" value="Commander">
                <label for="item1">Commander</label> <br>
                
            <input type="radio" id="rank6" name="rank" value="Captain">
                <label for="item1">Captain</label> <br>
            </div>
            <br>
            <button class="button">Save</button>
        </form>
    </body>
</html>