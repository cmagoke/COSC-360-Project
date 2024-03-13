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
        <a href="homepage.php" id="top-logo">TextHub</a>
        <input type="search" placeholder="Search">
    </div>
    <div id="main">
        <div class="subtitle">Sign up</div>
        <form id="signin" action="processLogin.php" method="POST">
            <ul>
                <li>
                    <label>Username: </label>
                    <input type="text" id="user" name="user" required>
                </li>
                    
                <li>
                    <label>Password: </label>
                    <input type="password" id="pass" name="pass" required>
                </li>
            </ul>
            <button class="sign-button" type="submit">Sign in</button>
        </form>
    </div> 
    <div class="buttons">
        <p>Don't have an account yet?</p>
        <a href="signup.php"><button class="sign-button">Sign up</button></a>
    </div>
    
    
    <footer>
        
    </footer>
</body>
</html>