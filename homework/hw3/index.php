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
            h1 {
                color: #CCDDFF;
            }
            span{
                color: #FF9900;
            }
        </style>
    </head>
        <div style="font-size:3vw;">
            <h1><span>OFFICER </span>LOGIN</h1>
        </div>
    <body>
        <form action="save.php" method="POST">
            <br>
            <div style="color: #4455BB; font-size:2vw;">
                Name: <input required type="text" name="name" placeholder="Full name here" size="25" />
            </div>
            <br>
            <div style="color: #CC6699; font-size:2vw;">
                Division:
                <select required name="division">
                    <option>Select Division</option>
                    <option>Command</option>
                    <option>Science</option>
                    <option>Operations</option>
                </select>
            </div>
            <br><br><br><br><br><br><br><br>
            <div style="color: #FFCC66; font-size:2vw;">
                Rank:
                <br>
                <input type="radio" id="rank0" name="rank" value="Enlisted">
                        <label for="item0">Enlisted</label> <br>
                
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