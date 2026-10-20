<?php

require_once ("db/connection.php");

session_start();


if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password)
     VALUES ('$username', '$email', '$password')";

    $result = $pdo->query($sql);
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Himilo Farm</title>
	<style>
		body {
			
			background-color: #f2f2f2;
			background-image: url('./sawiro/caws.jpg');
			background-size: cover;
			/* background-repeat: no-repeat; */
			/* background-position: center center; */
			/* background-attachment: fixed; */
			margin: 0;
			padding: 0;

		}
		
		header {
			
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 20px;
			background-color: #333;
			color: #fff;
		}
		header img {
			height: 50px;
			width: 50px;
		}
		header button {
			background-color: #4CAF50; /* Green */
  			border: none;
  			color: white;
  			padding: 10px 20px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			margin-right: 10px;
  			border-radius: 40px;
		}
		form {
			margin-top: 100px;
			display: flex;
			flex-direction: column;
			align-items: center;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1); 
		}
		form h2 {
			margin-bottom: 20px;
			color: #fff;
		}
		form input[type="text"], form input[type="password"] {
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border-style:none none solid none; 
    		border-color:#333; 
    		width:25%;
    		font-size:20px; 
    		color:#333; 
    		background-color:#f2f2f2; 
    		outline:none; 
    		box-shadow:none; 
    		height:auto; 
    		line-height:normal; 
    		resize:none; 
    		font-family:sans-serif; 
    		font-weight:normal; 
    		text-transform:none; 
    		text-indent:none; 
    		text-shadow:none; 
    		text-decoration:none; 
    		text-align:left; 
    		text-overflow:none; 
    		word-spacing:normal; 
    		word-wrap:normal; 
    		white-space:normal; 
    		direction:ltr; 
    		cursor:text;}
    	form input[type="submit"] {
      		background-color:#4CAF50; /* Green */
      		border:none;
      		border-radius: 40px;
      		color:white;
      		padding:20px 20px;
      		width: 150px;
      		text-align:center;
      		text-decoration:none;
      		display:inline-block;
      		font-size:16px;margin-top:-5%;
      		margin-left:-5%;
      		margin-right:-5%;
      		cursor:pointer;}
      	form input[type="submit"]:hover {
      		background-color:#45a049;}
      	form label{
      		font-size :20px;
			font-weight :bold;
			color: white;
			font-family: times new roman;
		}
			
      	form p{
      		font-size :20px;
			color: #fff;
		}
      	form a{
      		color :#fff;}
			
      	form a:hover{
      		color :#45a049;}
      	img{
      		border-radius: 40px;
		}

		
      	
    </style>
</head>
<body>
<header>
<img src="./sawiro/himilo.jpg" alt="logo"></a> <p>Himilo Mixed Farm</p>
    
    <div>
        <!-- <button>Login</button>
        <button>Sign Up</button> -->
		<a href="Login.php"><button>Login</button></a>
		<a href="Signup.php"><button>Signup</button></a>
    </div>
</header>

<form action="" method="POST" id="signup-form">
    <h2>Welcome Himilo Farm Please Sign Up Here</h2>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <span id="username-validation" class="validation-message"></span>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
    <span id="email-validation" class="validation-message"></span>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <span id="password-validation" class="validation-message"></span>

    <div style="display:flex;">
        <input type="submit" value="signup" name="signup">
    </div>
    <p>Already Have an account? <a href="login.php">Log in</a></p>
</form>


<script>
    // Function to validate username
    function validateUsername(username) {
        var regex = /^[a-z]+$/;
        return regex.test(username);
    }

    // Function to validate email
    function validateEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email) && email === email.toLowerCase();
    }

    // Function to validate password
    function validatePassword(password) {
        var hasSpace = password.includes(' ');
        return !hasSpace;
    }

    function showUsernameValidationMessage() {
        var usernameValidation = document.getElementById("username-validation");
        usernameValidation.innerHTML = "Username should only contain lowercase letters.";
    }

    function showEmailValidationMessage() {
        var emailValidation = document.getElementById("email-validation");
        emailValidation.innerHTML = "Invalid email format.";
    }

    function showPasswordValidationMessage() {
        var passwordValidation = document.getElementById("password-validation");
        passwordValidation.innerHTML = "Password cannot contain spaces.";
    }

    function hideValidationMessage(elementId) {
        var validationMessage = document.getElementById(elementId);
        validationMessage.innerHTML = "";
    }

    // Attach event listeners to input fields
    var usernameInput = document.getElementById("username");
    usernameInput.addEventListener("focus", showUsernameValidationMessage);
    usernameInput.addEventListener("input", function () {
        hideValidationMessage("username-validation");
    });

    var emailInput = document.getElementById("email");
    emailInput.addEventListener("focus", showEmailValidationMessage);
    emailInput.addEventListener("input", function () {
        hideValidationMessage("email-validation");
    });

    var passwordInput = document.getElementById("password");
    passwordInput.addEventListener("focus", showPasswordValidationMessage);
    passwordInput.addEventListener("input", function () {
        hideValidationMessage("password-validation");
    });

    // Function to handle form submission
    function validateForm() {
        var usernameInput = document.getElementById("username");
        var emailInput = document.getElementById("email");
        var passwordInput = document.getElementById("password");

        var isUsernameValid = validateUsername(usernameInput.value);
        var isEmailValid = validateEmail(emailInput.value);
        var isPasswordValid = validatePassword(passwordInput.value);

        // Update validation feedback for username
        var usernameValidation = document.getElementById("username-validation");
        usernameValidation.innerHTML = isUsernameValid ? "" : "Username should only contain lowercase letters.";

        // Update validation feedback for email
        var emailValidation = document.getElementById("email-validation");
        emailValidation.innerHTML = isEmailValid ? "" : "Invalid email format.";

        // Update validation feedback for password
        var passwordValidation = document.getElementById("password-validation");
        passwordValidation.innerHTML = isPasswordValid ? "" : "Password cannot contain spaces.";

        if (!isUsernameValid || !isEmailValid || !isPasswordValid) {
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }

    // Attach the validation function to the form's onsubmit event
    var form = document.getElementById("signup-form");
    form.onsubmit = validateForm;
</script>
</body>
</html>

