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
                    echo "<div><h2> Hello ". $row['Username'] . "!</h2></div>
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
        </header>
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
        <?php
        if(isset($_SESSION['user'])){
            echo "<button id=\"createPost\" onclick=\"window.location.href='posting.php'\">Create Post</button>";
        }
        ?>
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
                if(isset($_GET['name'])){
                    $forumName = $_GET['name'];
                    $sql = "SELECT * FROM Subforum WHERE Name = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("s", $forumName);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <div class=\"entry\">
                        <div class=\"heading\" >" . $row['Name'] . "</div>
                        <p>" . $row['Rules'] ."</p>
                        </div>";
                    }
                    
                }
                ?>
        </div>
    </div>  
    <footer>
        
    </footer>
</body>
</html>
