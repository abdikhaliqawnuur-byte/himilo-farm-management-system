<?php
session_start();
require_once ("db/connection.php");



if(isset($_SESSION['username'])){
    header("location: index.php");
}

if(isset($_POST['login'])){
		$username =  $_POST['username'];
		$password = $_POST['password'];
		$sql = $pdo->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
		$farm = $sql->fetch();
		if($farm){
			header("location: index.php");
			$_SESSION['username'] = $farm['username'];
		}
		// } else
			// echo "Please enter your user name and password";
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Himilo Farm</title>
	<style>
		body {
			background-color: #f2f2f2;
			background-image: url('./sawiro/basbaas.jpg');
			background-size: cover;
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
			/* font-weight: bold;
			font-size: 20px; */
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
			/* background-color: #fff; */
			padding: 90px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1); 
			/* max-width: 500px;
			width: 90%;
			background: rgba(255,255,255, 0.5);
			padding: 10px;
			border-radius: 10px; */
		
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
    <a href=""><img src="./sawiro/himilo.jpg" alt="logo"></a> <p>Himilo Mixed Farm</p>
    
    <div>
  
		<!-- <button type="submit">Login</button>
        <button>Sign Up</button> -->
		<a href="Login.php"><button>Login</button></a>
		<a href="Signup.php"><button>Signup</button></a>
    </div>
</header>



<form action="" method="POST">
    <h2>Welcome Himilo Farm Please Login here</h2>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" >
	<span id="username-validation" class="validation-message"></span>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" >
	<span id="password-validation" class="validation-message"></span>

    <div style="display:flex;">
	<input type="submit" name="login" value="Login">
        
    </div>

    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
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
        var passwordInput = document.getElementById("password");

        var isUsernameValid = validateUsername(usernameInput.value);
    	 var isPasswordValid = validatePassword(passwordInput.value);

        // Update validation feedback for username
        var usernameValidation = document.getElementById("username-validation");
        usernameValidation.innerHTML = isUsernameValid ? "" : "Username should only contain lowercase letters.";

        // Update validation feedback for password
        var passwordValidation = document.getElementById("password-validation");
        passwordValidation.innerHTML = isPasswordValid ? "" : "Password cannot contain spaces.";

        if (!isUsernameValid || !isPasswordValid) {
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

