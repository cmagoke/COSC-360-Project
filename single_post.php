<?php
  include "db.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Single Post</title>
    <link rel="stylesheet" href="./css/poststyles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script type="text/javascript" src="js/buttons.js"></script>
    <style>
     h1, h2, p, body{
        font-family: Arial, Helvetica, sans-serif;
      }
     body {
        background-color: #d9d9d9;
      }
   
      .search-icon {
        margin-left: 10px;
        cursor: pointer;
      }
      h1 {
        font-size: 16px;
        margin-right: 12px;
        margin-bottom: 0;
        color: white;
      }
      .rectangle,
      .sort-rectangle {
        position: relative;
        width: 80%;
        background-color: white;
        height: 200px;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding-top: 2em;
        border-radius: 10px;
      }
      .time-stamp,
      .user-info {
        position: absolute;
        top: 10px;
        font-size: 14px;
      }
      .time-stamp {
        left: 10px;
        color: black;
      }
      .user-info {
        right: 10px;
        color: black;
      }
      .title{
      font-size: 1.2em;
      font-weight: bold;
    }
      .help-text {
        margin-bottom: 10px;
      }
      .small-rectangle {
        width: 80%;
        background-color: white;
        text-align: center;
        color: rgb(8, 0, 0);
        font-size: 14px;
        position: relative;
        border-radius: 10px;
        border: 2pt solid  #ed860c;
        margin-top: 0.5em;
        overflow: auto;
      }
      .sort-rectangle {
        width: 20%;
        height: 30px;
        background-color: #ed860c;
        color: black;
        font-size: 14px;
        line-height: 30px;
        margin-top: 30px;
        border-radius: 10px;
        padding: 0em;
      }
      .add-comment-rectangle {
        width: 150px;
        height: 30px;
        background-color: #ed860c;
        color: black;
        font-size: 14px;
        line-height: 40px;
        text-align: center;
        margin: 10px auto 0;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
      }

      .add-icon {
        margin-left: 10px;
        cursor: pointer;
      }
      .comment-box {
        background-color: white;
        margin: 10px auto;
        padding: 20px;
        position: relative;
        width: 80%;
       
        border-radius: 10px;
      }

      .comment-content {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
      }

      .vote-arrows {
        color: #ed860c;
        display: flex;
        align-items: center;
        font-size: 16px;
        margin-right: 20px;
      }

      .comment-text {
        flex-grow: 1;
        text-align: center;
      }
      .jk {
        color: black;
      }
      .homework-arrows {
        color: #ed860c;
        font-size: 14px;
        position: absolute;
        bottom: 5px;
        left: 5px;
        display: flex;
        align-items: center;
      }
      .o {
        color: black;
      }
      #header{
    background-color: #1D8A99;
    height: 134px;
    color: white;
    padding-left: 2em;
    display: flex;
    align-items: center;
}
#header a{
    color:white;
    text-align: center;
    font-size: 1.8em;
    font-weight: bold;
    text-decoration: none;
}
    #header form{
    display: flex;
    flex-direction: row;
    justify-content: left;
    width: 100%;
  }
  #header input[type=search] {
    border: none;
    height: 50px;
    width: 65%;
    margin-left: 2em;
    border-radius: 5px;;
    font-size: 1.2em;
    padding-left: 1em;
}
#header button{
    background-color: #ed780c;
    color:white;
    text-align: center;
    font-size: 1.2em;
    font-weight: bold;
    height: 50px;
    width: 100px;
    border: none;
    border-radius: 5px;
    margin: 0em 0.5em 0em 0.5em;
}

.vote_comment{
    display: flex;
    align-items: flex-start;
}
.vote_comment img{
    height: 20px;
    width: 20px;
}
.vote_comment > div{
    margin: 0.3em;
    color: #ed780c;
}
.entry{
    border-bottom: #1D8A99 2pt solid;
}
.entry:hover, .entry2:hover{
    background-color: rgb(217, 233, 238);
    border-radius: 5px;
}
.heading, .username, .email, .number{
    color: #1D8A99;
}
    </style>
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
    <div class="rectangle">
      <?php
        if(isset($_GET['id'])){
          $postid = $_GET['id'];
          $sql = "SELECT * FROM Post WHERE PostId = ?";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("i", $postid);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();
          if(!is_null($row)){
            echo " <span class=\"time-stamp\">" . $row['DateTime'] . "</span>
            <span class=\"user-info\">". $row['Username'] ."</span>
            <div class=\"title\">". $row['Title'] ."</div>
            <div class=\"small-rectangle\">
              ". $row['Description'] ."
            </div>
            <div class=\"vote_comment\">
              <div><img class=\"up_arrow\" src=\"images/up_arrow.jpg\" onclick=\"upvote(". $row['PostId'] . ",'p')\"></div>
              <div class=\"vote_count\">" . $row['VotesNum'] . "</div>
              <div><img class=\"down_arrow\" src=\"images/down_arrow.jpg\"  onclick=\"downvote(". $row['PostId'] . ",'p')\"></div>
            </div>
          </div>
          <div class=\"add-comment-rectangle\" onclick=\"addComment(". $row['PostId'] .",". isset($_SESSION['user']) . ")\">
          Add A Comment +
         </div>";
          }
        }
      ?>

   <!--  <div class="sort-rectangle">Sort By: Oldest</div> -->

    <div class="comment-box">
      <?php
        $found = false;
         if(isset($_GET['id'])){
          $postid = $_GET['id'];
          $sql = "SELECT * FROM Comment WHERE PostId = ?";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("i", $postid);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
            $found = true;
            echo "
            <div class=\"entry\">
            <div class=\"heading\" >" . $row['Username'] . " - " . $row['DateTime'] . "</div>
            <p>" . $row['Description'] ."</p>
            <div class=\"vote_comment\">
                <div><img class=\"up_arrow\" src=\"images/up_arrow.jpg\" onclick=\"upvote(". $row['CommentId'] . ",'c')\"></div>
                <div class=\"vote_count\">" . $row['VotesNum'] . "</div>
                <div><img class=\"down_arrow\" src=\"images/down_arrow.jpg\"  onclick=\"downvote(". $row['CommentId'] . ",'c')\"></div>
            </div>
            </div>";
          }
          if($found == false){
            echo "No comments yet";
          }
        }
      ?>
     
    </div>
  </body>
</html>
