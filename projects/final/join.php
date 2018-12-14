<?php
include 'database.php';
include 'functions.php';
?>

<?php
     
    $con = new PDO ("mysql:host=localhost;dbname=comics", "LewisTruong", "cst336");
    echo "Connected";
 
 if(isset($_POST['join'])){
     $userName = $_POST['username'];
     $userpassword = $_POST['password'];
     $pass = sha1($userpassword);
     
     //$sql = "INSERT INTO `users` (`user_id`, `username`, `password`) VALUES (NULL, $userName, $pass)";
     
     $insert = $con->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
     
    //$insert->bindParam(":user_id",NULL);
     $insert->bindParam(":username",$userName);
     $insert->bindParam(":password",$pass);
     
     $insert->execute();
 }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    /*background-color: black;*/
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>
<head>
        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
    </head>
</head>
<body>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        
    <script>
    $(document).ready(function() {
        
        // Does the email exist as a user?
        $("#userID")
            .change(function(e) {
                var userData = {
                    userName: e.target.value
                };
                
                console.log(userData); 

                $.ajax({
                        url: "user/verify.php",
                        type: "POST",
                        dataType: "json",
                        contentType: "application/json",
                        data: JSON.stringify(userData)
                    })
                    .done(function(data) {
                        console.log("Was user found?", data.found);
                        if (!data.found) {
                            $("#idCheckMessage").html(""); 
                        } else {
                            $("#idCheckMessage").html("Username already exists"); 
                        }
                    })
                    .fail(function(xhr, status, errorThrown) {
                        console.log(errorThrown)
                        console.log("error", xhr.responseText);
                    });
                
            });
         
    })   
   function passwordCheckFunction() {
       
    
    var userPassword1 = $('#userPassword1').val();
    var userPassword2 = $('#userPassword2').val();
    
    if (userPassword1 != userPassword2) {
        $('#passwordCheckMessage').html('Password Does Not Match');
    } else {
        $('#passwordCheckMessage').html('');
    }
   
   }
</script>
    
    
<form action="join.php" style="max-width:500px; max-height:500px;margin:auto;" method="POST" id="registerForm">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    
    <label for="ID"><b>User Name</b></label>
    <input id="userID" type="text" placeholder="Enter Username" name="username" value = "<?php echo $username?>">
    
    <label for="psw"><b>Password</b></label>
    <input id="userPassword1"  type="password" placeholder="Enter Password" name="password" value = "<?php echo $userPassword1?>">

    <label for="psw-repeat"><b>Repeat Password</b></label>
    
    
    <input id="userPassword2"onkeyup="passwordCheckFunction()" type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <h5   style="color: red;" id="idCheckMessage"></h5>
    <h5   style="color: red;" id="passwordCheckMessage"></h5>
    <? php 
        include("error.php");
    ?>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="join">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>