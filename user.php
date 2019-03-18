<!DOCTYPE html>
<?php
	session_start();
	if(!(isset($_SESSION['logged_in'])) || $_SESSION['logged_in'] == false)
    header("Location: index.php")
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Blog</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
  </head>

<body style="background-color:#1c1c1c">


  <?php

if(isset($_POST['postTitle'])  && isset($_POST['postContent']))
{
  $blogStory = htmlentities($_POST['postContent']);
  $storyTitle = htmlentities($_POST['postTitle']);

  $servername = "localhost";
  $username = "rootKing";
  $password = "C0xPMVgeEKELbN1e";
  $dbname = "WebAppDB";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $authorsID = $_SESSION["id"];
  $authorsUsername = $_SESSION["username"];
  // Insert values
  $sql = "INSERT INTO postData (title, story, authorId, authorName, isPosted)
  VALUES ( '$storyTitle', '$blogStory', '$authorsID', '$authorsUsername', 0 )";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>


<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="main.php">BloggyMcBloggerson</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="user.php">Write<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="logout.php">LogOut<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>


<div class="container" style="padding-top: 75px">
	<form method="post">
		<div class="form-group">
    		<input type="text" name="postTitle" form-control" placeholder="Title"required autofocus>
        <textarea name="postContent" class="form-control" rows="25" id="comment" placeholder="Body"></textarea>
			<button class="btn btn-outline-success my-2 my-sm-0 btn-block" type="submit">Submit For Review</button>

   		</div>
   </form>
</div>

</body>
</html>

</form>

</div>