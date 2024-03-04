<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub Manage Users</title>
   <link rel="stylesheet" href="./css/adminstyles.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script type="text/javascript" src="js/buttons.js"></script>
</head>
<body>
    <div id="header">
        <a href="adminpage.php">TextHub Admin</a>
        <input type="search" placeholder="Search">
        <button id="logout" onclick="window.location.href='homepage.php'">Log Out</button>
    </div>
    <div id="enable_main">
        <div class="subtitle">Enabled Users</div>
        <div class="entry">
            <div class="profile"><img src="images/profile.jpg"></div>
            <div class="info">
                <div class="title">John Doe</div>
                <div class="username">johndoe</div>
                <div class="email">johndoe@gmail.com</div>
                <div class="number">123-456-789</div>
            </div>
            <button id="disable">Disable</button>
        </div>
    </div> 
    <div id="disable_main">
        <div class="subtitle">Disabled Users</div>
        <div class="entry">
            <div class="profile"><img src="images/profile.jpg"></div>
            <div class="info">
                <div class="title">Bob The Builder</div>
                <div class="username">BobTheBuilder</div>
                <div class="email">bobbuilds@gmail.com</div>
                <div class="number">789-345-444</div>
            </div>
            <button id="enable">Enable</button>
        </div>
    </div> 
    <footer>
        
    </footer>
</body>
</html>
