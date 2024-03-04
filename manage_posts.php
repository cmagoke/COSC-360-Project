<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub</title>
   <link rel="stylesheet" href="./css/adminstyles.css" />
</head>
<body>
    <div id="header">
        <a href="adminpage.php">TextHub Admin</a>
        <input type="search" placeholder="Search">
        <button id="logout" onclick="window.location.href='homepage.php'">Log Out</button>
    </div>
    <div id="main">
        <div class="subtitle">All Posts</div>
        <div class="entry2">
            <div>
                <div class="heading">t/calculus - 3 hours ago</div>
                <div class="username">johndoe</div>
                <div class="title">How to do intregrals!!?!?!?!</div>
                <p>I am stuck on a intregral problem and don’t know what is the right way to approach it. I have posted a screen shot of the problem below. Any help will be appreciated !!!!</p>
            </div>
            <button id="edit">Edit</button>
            <button id="delete">Delete</button>
        </div>
        <div class="entry2">
            <div>
                <div class="heading">t/food - 2 days ago</div>
                <div class="username">BobThe Builder</div>
                <div class="title">Favourite food?</div>
                <img src="images/pizza.jpg">
            </div>
            <button id="edit">Edit</button>
            <button id="delete">Delete</button>
        </div>
    </div> 
    <footer>
        
    </footer>
</body>
</html>
