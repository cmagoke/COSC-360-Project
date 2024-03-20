<?php
 include "db.php";
?>
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
            <div class="subtitle">Communities</div>
            <ul class="aside-list">
                <?php
                     $sql = "SELECT Name FROM Subforum";
                     $result = mysqli_query($con, $sql);
                     while($row = mysqli_fetch_assoc($result)){
                        echo "<li class=\"aside-element\"><a href=\"subforum_page.php\">" . $row['Name'] . "</a></li>";
                     }
                ?>
            </ul>
        </div>
        <div id="main">
                <?php
                    $sql = "SELECT * FROM Post";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <div class=\"entry\" onclick=\"window.location.href='single_post.php'\">
                        <div class=\"heading\">" . $row['Subforum'] . " - " . $row['DateTime'] . "</div>
                        <div class=\"username\">" . $row['Username'] . "</div>
                        <div class=\"title\">" . $row['Title'] . "</div>
                        <p>" . $row['Description'] ."</p>
                        <div class=\"vote_comment\">
                            <div><img class=\"up_arrow\" src=\"images/up_arrow.jpg\" onclick=\"upvote(". $row['PostId'] . ")\"></div>
                            <div class=\"vote_count\">" . $row['VotesNum'] . "</div>
                            <div><img class=\"down_arrow\" src=\"images/down_arrow.jpg\"  onclick=\"downvote(". $row['PostId'] . ")\"></div>
                            <div><img class=\"comment-icon\" src=\"images/comment_icon.png\"></div>
                            <div class=\"comment_count\">". $row['CommentsNum'] . "</div>
                        </div>
                        </div>";
                    }
                ?> 
        </div>
    </div>  
</body>
</html>
