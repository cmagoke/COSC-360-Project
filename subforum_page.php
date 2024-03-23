<?php
 include "db.php";
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <title>TextHub</title>
   <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <div id="header">
        <a href="homepage.html" id="top-logo">TextHub</a>
        <input type="search" placeholder="Search">
        <a href="signin.html" class="sign"><button id="login" type="button">Log in</button></a>
        <a href="signup.html" class="sign"><button id="signup" type="button">Sign Up</button></a>
    </div>
    <div id="forumhead">
        <div class="profile-pic">
            <img src="images/calc.jpeg" alt="Profile Picture">
          </div>
          <div class="subreddit-info">
            <h1 class="subreddit-title">Calculus</h1>
            <span class="subreddit-name">r/calculus</span>
          </div>
          <button class="join-button">Join</button>
        </header>
        <nav class="subreddit-navigation">
          <ul>
            <li><a href="#">Posts</a></li>
            <li><a href="#">Rules</a></li>
            <li><a href="#">Resources</a></li>
          </ul>
        </nav>
    </div>
    <div id="mainbody">
        <div id="about">
            <div class="subtitle">About Community</div>
            <ul>
                <li>We are a community of individuals who have a love and respect of calculus or wish to learn more.</li>
                <li>425k Mathmaticians</li>
                <li>Created 14th March 2016</li>
            </ul>
        </div>
        <div id="main">
            <div class="entry">
                <div class="heading">t/calculus - 3 hours ago</div>
                <div class="username">johndoe</div>
                <div class="title">How to do intregrals!!?!?!?!</div>
                <p>I am stuck on a intregral problem and don’t know what is the right way to approach it. I have posted a screen shot of the problem below. Any help will be appreciated !!!!</p>
                <div class="vote_comment">
                    <div><img src="images/up_arrow.jpg"></div>
                    <div>20</div>
                    <div><img src="images/down_arrow.jpg"></div>
                    <div><img src="images/comment_icon.png"></div>
                    <div>30</div>
                </div>
            </div>
            <div class="entry">
                <div class="heading">t/calculus - 2 days ago</div>
                <div class="username">MathMan123</div>
                <div class="title">Just aced my Calc 4 test</div>
                <p>I'm finally done with Calculus!!!!</p>
                <div class="vote_comment">
                    <div><img src="images/up_arrow.jpg"></div>
                    <div>-5</div>
                    <div><img src="images/down_arrow.jpg"></div>
                    <div><img src="images/comment_icon.png"></div>
                    <div>87</div>
                </div>
            </div>
            <div class="entry">
                <div class="heading">t/calculus - 5 days ago</div>
                <div class="username">piGuy314</div>
                <div class="title">OPINION: Newton or Leibniz is the founder of Calculus?</div>
                <p>It is known that calculus is nothing without these two scientists/mathematicians, however, what is your opinion on who the true founder is? Leibniz is known for coining the name, while Newton laid the foundation?</p>
                <div class="vote_comment">
                    <div><img src="images/up_arrow.jpg"></div>
                    <div>256</div>
                    <div><img src="images/down_arrow.jpg"></div>
                    <div><img src="images/comment_icon.png"></div>
                    <div>16</div>
                </div>
            </div>
        </div>
    </div>  
    <footer>
        
    </footer>
</body>
</html>
