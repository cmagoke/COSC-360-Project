<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextHub Homepage</title>
   <link rel="stylesheet" href="./css/styles.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script type="text/javascript" src="js/buttons.js"></script>
</head>
<body>
    <div id="header">
        <a href="homepage.php">TextHub</a>
        <input type="search" placeholder="Search">
        <button id="login" onclick="window.location.href='signin.php'">Log in</button>
        <button id="signup" onclick="window.location.href='signup.php'">Sign Up</button>
    </div>
    <div id="mainbody">
        <div id="aside">
            <div class="subtitle">Trending</div>
            <ul class="aside-list">
                <li class="aside-element"><a href="subforum_page.php">t/calculas</a></li>
                <li class="aside-element"><a href="subforum_page.php">t/food</a></li>
                <li class="aside-element"><a href="subforum_page.php">t/cars</a></li>
            </ul>
        </div>
        <div id="main">
            <div class="entry">
                <div class="heading">t/calculus - 3 hours ago</div>
                <div class="username">johndoe</div>
                <div class="title">How to do intregrals!!?!?!?!</div>
                <p>I am stuck on a intregral problem and don’t know what is the right way to approach it. I have posted a screen shot of the problem below. Any help will be appreciated !!!!</p>
                <div class="vote_comment">
                    <div><img class="up_arrow" src="images/up_arrow.jpg"></div>
                    <div class="vote_count">20</div>
                    <div><img class="down_arrow" src="images/down_arrow.jpg"></div>
                    <div><img class="comment-icon" src="images/comment_icon.png"></div>
                    <div class="comment_count">30</div>
                </div>
            </div>
            <div class="entry">
                <div class="heading">t/food - 2 days ago</div>
                <div class="username">Bob The Builder</div>
                <div class="title">Favourite food?</div>
                <img src="images/pizza.jpg">
                <div class="vote_comment">
                    <div><img class="up_arrow" src="images/up_arrow.jpg"></div>
                    <div class="vote_count">200</div>
                    <div><img class="down_arrow" src="images/down_arrow.jpg"></div>
                    <div><img class="comment-icon" src="images/comment_icon.png"></div>
                    <div class="comment_count">30</div>
                </div>
            </div>
        </div>
    </div>  
    <footer>
        
    </footer>
</body>
</html>
