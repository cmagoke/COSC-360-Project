<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub Admin</title>
   <link rel="stylesheet" href="./css/adminstyles.css" />
</head>
<body>
    <div id="header">
        <a href="adminpage.php">TextHub Admin</a>
        <input type="search" placeholder="Search">
        <button id="logout" onclick="window.location.href='homepage.php'">Log Out</button>
    </div>
    <div id="main">
        <div class="subtitle">Options</div>
        <ul>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="manage_posts.php">Manage Posts</a></li>
        </ul>
    </div> 
</body>
</html>