<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Posting to sub_forum</title>
  <style>
      h1, h2, p, body{
        font-family: Arial, Helvetica, sans-serif;
      }
      body {
        margin: 0;
        padding: 0;
        background-color: #d9d9d9;
      }

      .header{
        background-color: #1D8A99;
        height: 134px;
        padding: 0px;
        color: white;
        display: flex;
        align-items: center;
        padding-left: 2em;
        padding-right: 1em;
      }
      .header a{
        color:white;
        font-size: 1.8em;
        font-weight: bold;
        text-decoration: none;
        width: 90%;
      }
    .header button{
        background-color: #ed780c;
        color:white;
        text-align: center;
        font-size: 1.2em;
        font-weight: bold;
        height: 50px;
        width: 100px;
        border: none;
        border-radius: 5px;;
        margin: 0em 0.5em 0em 0.5em;
    }

      .user-info {
        color: black;
        display: flex;
        align-items: center;
      }

      .user-info i {
        margin-right: 5px;
      }

      .posting {
        border-radius: 10px;
        position: relative;
        width: 40%;
        background-color: white;
        height: 30px;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding: 5px;
      }
      .small-rectangle {
        width: 80%;
        height: 150px;
        border: #ed780c 2pt solid;
        text-align: center;
        line-height: 100px;
        color: rgb(8, 0, 0);
        font-size: 1.2em;
        border-radius: 10px;
        margin-top: 1em;
      }
      .rectangle {
        width: 80%;
        background-color: white;
        height: 300px;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
      }
      .create {
        width: 100px;
        height: 50px;
        background-color: #ed780c;
        text-align: center;
        line-height: 50px;
        color: rgb(8, 0, 0);
        font-size: 1em;
        border-radius: 10px;
        border: none;
        justify-self: end;
        margin-top: 1em;
      }
    .title{
      font-size: 1.8em;
      font-weight: bold;
      border: #ed860c 2pt solid;
      width: 80%;
      border-radius: 10px;
    }
    #header{
    background-color: #1D8A99;
    height: 134px;
    color: white;
    padding-left: 2em;
    display: flex;
    align-items: center;
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
    </style>
</head>

<body>
  <div class="header">
    <a href="homepage.php">TextHub</a>
    <form>
    </form>
    <?php
    if (isset ($_SESSION['user'])) {
      $userid = $_SESSION['user'];
      $sql = "SELECT Username FROM User WHERE UserId = ?";
      $stmt = $con->prepare($sql);
      $stmt->bind_param("i", $userid);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      if (!is_null($row)) {
        echo "<div id=\"user\"><a href=\"userpage-posts.php\">Hello " . $row['Username'] . "!</a></div>
                    <button id=\"logout\" onclick=\"window.location.href='processLogout.php'\">Log Out</button>";
      } else {
        echo "failed to get user";
      }
    } else {
      echo "<button id=\"login\" onclick=\"window.location.href='signin.php'\">Log in</button>
                <button id=\"signup\" onclick=\"window.location.href='signup.php'\">Sign Up</button>";
    }
    ?>
  </div>
  <form id="postForm" action="addposting.php" method="GET">
    <div class="posting">Posting to
      <select id="subforum" name="subforum">
        <?php
           $sql = "SELECT Name FROM Subforum";
           $result = mysqli_query($con, $sql);
           while($row = mysqli_fetch_assoc($result)){
               echo " <option value=\"" . $row['Name']. "\">" . $row['Name']. "</option>";
           }
        ?>
      </select>
    </div>

    <div class="rectangle">


      <input type="text" id="Title" name="Title" placeholder="Title here" class="title" />

      <input type="text" id="Description" name="Description" placeholder="Description here" class="small-rectangle" />

      <button type="submit" class="create">Submit</button>

  </form>
  </div>


</body>

</html>