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
    <div id="user-head">
        <div id="profile-pic">
            <img src="images/man.png" alt="user-pic">
        </div>
        <div id="user-info">
            <div id="user-title">
                <h2>John Doe</h3>
            </div>
            <div id="user-name">
                <h3>u/johndoe</h3>
            </div>
            <nav class="user-nav">
                <ul>
                    <li><a href="#" onclick="loadContent('posts')">Posts</a></li>
                    <li><a href="#" onclick="loadContent('comments')">Comments</a></li>
                    <li><a href="#" onclick="loadContent('upvotes')">Upvoted</a></li>
                    <li><a href="#" onclick="loadContent('downvotes')">Downvoted</a></li>
                  </ul>
            </nav>
        </div>
    </div>
    <div id="about-user">
        <div class="about-title">
            <div class="profile-pic">
            <img src="images/man.png">
            </div>
            <h3>u/johndoe</h3>
        </div>
        <p>3k TextScore</p>
        <p>Joined 16th January 2015</p>
    </div>
    <div id="forum-list">

    </div>
    <div id="user-main">

        

        </div>

        <div id="comments-page">
        </div>

        <div id="upvoted-page">
        </div>

        <div id="downvoted-pag">
        </div>

        
    </div>

    
    <footer>
        
    </footer>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>

<script>
function loadContent(type){
    var content='';
    switch (type) {
        case 'posts':
            content="<div id="posts">\
            <div class="entry">\
                <div class="heading">t/calculus - 3 hours ago</div>\
                <div class="username">johndoe</div>\
                <div class="title">How to do intregrals!!?!?!?!</div>\
                <p>I am stuck on a intregral problem and don't know what is the right way to approach it. I have posted a screen shot of the problem below. Any help will be appreciated !!!!</p>\
                <div class="vote_comment">\
                    <div><img src="images/up_arrow.jpg"></div>\
                    <div>20</div>\
                    <div><img src="images/down_arrow.jpg"></div>\
                    <div><img src="images/comment_icon.png"></div>\
                    <div>30</div>\
                </div>\
            </div>\
            <div class="entry">\
                <div class="heading">t/food - 5 days ago</div>\
                <div class="username">johndoe</div>\
                <div class="title">Look what I made...</div>\
                <p>I saw this dish in my favorite show and had to make it!</p>\
                <img src="images/food.png">\
                <div class="vote_comment">\
                    <div><img src="images/up_arrow.jpg"></div>\
                    <div>367</div>\
                    <div><img src="images/down_arrow.jpg"></div>\
                    <div><img src="images/comment_icon.png"></div>\
                    <div>49</div>\
                </div>\
            </div>";
            break;
        case 'comments':
            content="<p>comments</p>";
            break
        default:
            content = '<p>No content found.</p>';

    }
    document.getElementById("content").innerHTML = content;
}
<?php
$userPostsSQL = "SELECT * FROM Post WHERE Username=?";
$userComments = "SELECT * FROM Comment WHERE Username=?";
$userPosts = mysqli_query($con, $userPostsSQL);
$userComments = mysqli_query($con, $userCommentsSQL);
?>
</script>