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
                            $("#error-message").html("Username not found"); 
                        } else {
                            $("#error-message").html("Username found"); 
                        }
                    })
                    .fail(function(xhr, status, errorThrown) {
                        console.log(errorThrown)
                        console.log("error", xhr.responseText);
                    });
                
            });
         
    })   
	function passwordCheckFunction() {
	    console.log("inpassword function");
		var userPassword1 = $('#userPassword1').val();
		console.log(userPassword1);
		
		var userPassword2 = $('#userPassword2').val();
		console.log(userPassword2);
		if (userPassword1 != userPassword2) {
			$('#passwordCheckMessage').html('Password Does Not Match');
		} else {
			$('#passwordCheckMessage').html('');
		}
	}
</script>
    
<?php include 'navigation.php' ?>
    
 <!--   <%=-->
	<!--	String userID = null;-->
	<!--	if (session.getAttribute("userID") != null) {-->
	<!--		userID = (String) session.getAttribute("userID");-->
	<!--	}-->
	<!--	if(userID ==null){-->
	<!--		session.setAttribute("messageType", "Error Message");-->
	<!--		session.setAttribute("messageContent", "Already Login");-->
	<!--		response.sendRedirect("index.jsp");-->
	<!--		return;-->
	<!--	}-->
	<!--=%>-->

    
<form action="/index.php" style="max-width:500px; max-height:500px;margin:auto;" method="POST" id="registerForm">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="ID"><b>ID</b></label>
    <input id="userID" type="text" placeholder="Enter ID" name="userID" required>

    <label for="psw"><b>Password</b></label>
    <input id="userPassword1"  type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    
    
    <h5	style="color: red;" id="passwordCheckMessage"></h5>
    
    <input id="userPassword2"onkeyup="passwordCheckFunction()" type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" onclick="registerFunction();">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>