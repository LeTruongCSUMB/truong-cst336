<!DOCTYPE html>
<html>
    <head>
        <title>Pratice 4 Password Generator</title>
    </head>
    <body>
        <div class="Input">
        <form action="save.php" method="POST">
            Passord Generator
            <br>
            How many passwords do you want to generate?
            <br>
            <input required type="text" name="size" placeholder="Number of Passwords" size="15" />
            <br>
            <input type="radio" id="8pass" name="charPass" value="8pass">
                    <label for="8">8 characters</label>
            <br>
            <input type="radio" id="16pass" name="charPass" value="16pass">
                    <label for="16">16 characters</label>
            <br>
            <input type="radio" id="32pass" name="charPass" value="32pass">
                    <label for="32">32 characters</label>
            <br>
        </form>
        </div>
        
        <div class="output">
            Here are the generated passwords:
            <br>
        </div>
    </body>
</html>