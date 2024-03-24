<?php
 include "db.php";
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TextHub</title>
    <link rel="stylesheet" href="css/styles.css" />
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
    <div id="user-head">
        <?php
        if(isset($_SESSION['user'])){
            $userid = $_SESSION['user'];
            $sql = "SELECT * FROM User WHERE UserId = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $userid);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if(!is_null($row)){
                echo " <div id=\"profile-pic\">
                <img src=\"showImage.php?user=". $row['Username'] . "\" alt=\"user-pic\">
                </div>
            <div id=\"user-info\"><div id=\"user-title\">";
                echo "<h2>".$row['Fullname']."</h2>";
                echo "</div>";
                echo "<div id='user-name'>";
                echo "<h3>u/".$row['Username']."</h3>";
                echo "</div>";
            }

        }
        ?>
            <nav class="user-nav">
                <ul>
                    <li><a href="userpage-posts.php">Posts</a></li>
                    <li><a href="userpage-comments.php">Comments</a></li>
                    <li>    <button id="createPost">Create Post</button></li>
                  </ul>
            </nav>
        </div>
    </div>

    <div id="about-user">
        <div class="about-title">
            <div class="profile-pic">
            <?php
                if(!is_null($row)){
                    echo  "<img src=\"showImage.php?user=". $row['Username'] . "\" alt=\"user-pic\">";
                }
            ?>
            </div>
            <?php
            if(!is_null($row)){
            echo "<h3>".$row['Username']."</h3>";
            }
            ?>
        </div>
        <?php
        if(!is_null($row)){
            echo "<p>Date of Birth: ".$row['DateOfBirth']."</p>";
            }
        
        ?>
    </div>
    <div id="forum-list">

    </div>

    <div id="user-main">

        <div id="posts">
            <div class="entry">
                <?php
                if(isset($_SESSION['user'])){
                    $userid = $_SESSION['user'];
                    $sql = "SELECT * FROM Post WHERE Username= (SELECT Username FROM User WHERE UserId='$userid')";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <div class=\"entry\">
                        <div class=\"heading\" >" . $row['Subforum'] . " - " . $row['DateTime'] . "</div>
                        <div class=\"username\">" . $row['Username'] . "</div>
                        <div class=\"title\" onclick=\"window.location.href='single_post.php'\">" . $row['Title'] . "</div>
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
                    
                }
                ?>
            </div>

        </div>
        
    </div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>