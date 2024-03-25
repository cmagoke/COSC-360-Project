<?php
 include "db.php";
 session_start();
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
        <form action="search.php" method="get">
            <input type="search" id="search" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
        <?php
             if(isset($_SESSION['user'])){
                $userid = $_SESSION['user'];
                $sql = "SELECT Username FROM User WHERE UserId = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $userid);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if(!is_null($row)){
                    echo "<div id=\"user\"><a href=\"userpage-posts.php\">Hello ". $row['Username'] . "!</a></div>
                    <button id=\"logout\" onclick=\"window.location.href='processLogout.php'\">Log Out</button>";
                }else{
                    echo "failed to get user";
                }
             }else{
                echo "<button id=\"login\" onclick=\"window.location.href='signin.php'\">Log in</button>
                <button id=\"signup\" onclick=\"window.location.href='signup.php'\">Sign Up</button>";
             }
        ?>
    </div>
    
    <div id="forumhead">
        <div class="profile-pic">
            <img src="images/calc.jpeg" alt="Profile Picture">
        </div>

        <div class="subreddit-info">
        <?php
            if(isset($_GET['name'])){
                $forumName = $_GET['name'];
                $sql = "SELECT * FROM Subforum WHERE Name = ?;";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $forumName);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if(!is_null($row)){
                    echo "<h1 class='subreddit-title'>".$row['Name']."</h1>";
                    echo "<span class='subreddit-name'>".$row['Name']."</span>";
                }
            }
        ?>
        </div>

        <?php
        if(isset($_SESSION['user']) && isset($_GET['name'])){
            $forumName = $_GET['name'];
            $userid = $_SESSION['user'];
            echo "<button id=\"joinSub\" class='join-button' onclick=\"joinSub(".$userid.",'".$forumName."')\">Join</button>";            
        }
        ?>

        <nav class="subreddit-navigation">
          <ul>
          <?php
            if(isset($_GET['name'])){
                $forumName = $_GET['name'];
                $sql = "SELECT * FROM Subforum WHERE Name = ?;";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $forumName);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if(!is_null($row)){
                    echo "<li><a href='subforum-posts.php?name=".$row['Name']."'>Posts</a></li>";
                    echo "<li><a href='subforum-rules.php?name=".$row['Name']."'>Rules</a></li>";
                }
            }
          ?>
          </ul>
        </nav>
        <button id="createPost" onclick="window.location.href='posting.php'">Create Post</button>
    </div>
    <div id="mainbody">
        <div id="about">
            <div class="subtitle">About Community</div>
            
            <ul>
            <?php
            if(isset($_GET['name'])){
                $forumName = $_GET['name'];
                $sql = "SELECT * FROM Subforum WHERE Name = ?;";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $forumName);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if(!is_null($row)){
                    echo "<li>".$row['About']."</li>";
                    echo "<li>".$row['NumOfUsers']." Members</li>";
                    echo "<li>Created ".$row['Created']."</li>";
                }
            }
          ?>
            </ul>
        </div>
        <div id="main">
                <?php
                $found = false;
                if(isset($_GET['name'])){
                    $forumName = $_GET['name'];
                    $sql = "SELECT * FROM Post WHERE Subforum = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("s", $forumName);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    while($row = mysqli_fetch_assoc($result)){
                        $found = true;
                        echo "
                        <div class=\"entry\">
                        <div class=\"heading\" >" . $row['Subforum'] . " - " . $row['DateTime'] . "</div>
                        <div class=\"username\">" . $row['Username'] . "</div>
                        <div class=\"title\" onclick=\"window.location.href='single_post.php?id=" . $row['PostId'] . "'\">" . $row['Title'] . "</div>
                        <p>" . $row['Description'] ."</p>
                        <div class=\"vote_comment\">
                            <div><img class=\"up_arrow\" src=\"images/up_arrow.jpg\" onclick=\"upvote(". $row['PostId'] . ",'p')\"></div>
                            <div class=\"vote_count\">" . $row['VotesNum'] . "</div>
                            <div><img class=\"down_arrow\" src=\"images/down_arrow.jpg\"  onclick=\"downvote(". $row['PostId'] . ",'p')\"></div>
                            <div><img class=\"comment-icon\" src=\"images/comment_icon.png\" onclick=\"window.location.href='single_post.php?id=". $row['PostId'] . "'\"></div>
                            <div class=\"comment_count\">". $row['CommentsNum'] . "</div>
                        </div>
                        </div>";
                    }
                    if($found == false){
                        echo "<br>No posts yet";
                    }
                    
                }
                ?>
        </div>
    </div>  
</body>
</html>
