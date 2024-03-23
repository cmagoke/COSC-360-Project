<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub</title>
   <link rel="stylesheet" href="css/adminstyles.css" />
</head>
<body>
    <div id="header">
        <a href="homepage.php">TextHub</a>
    </div>
    <div id="main">
        <div class="subtitle">Sign up</div>
        <form id="signup" action="createUser.php" method="POST">
            <ul>
                <li>
                    <label>Username:</label>
                    <input type="text" id="user" name="user" required>
                </li>
                    
                <li>
                    <label>Password:</label>
                    <input type="password" id="pass" name="pass" required>
                </li>
                <li>
                    <label>Full Name:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </li>
                <li>
                    <label>Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </li>
                <li>
                    <label>Email:</label>
                    <input type="email" id="email" name="email" required>
                </li>
                <li>
                    <label>Phone Number:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890">
                </li>
            </ul>
            <button class="sign-button" type="submit">Sign up</button>
        </form>
    </div> 
    <div class="buttons">
        <p>Already have an account?</p>
        <a href="signin.php"><button class="sign-button">Sign in</button></a>
    </div>
    
    
    <footer>
        
    </footer>
</body>
</html>