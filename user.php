<!DOCTYPE html>
<?php
	session_start();
	if(!(isset($_SESSION['logged_in'])) || $_SESSION['logged_in'] == false)
    header("Location: index.php")
?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Write Story Below</h2>
  <p></p>
	<form>
		<div class="form-group">
    		<input type="text" name="postTitle" class="
      form-control" placeholder="Title" required autofocus>
      		<textarea name="postContent" class="form-control" rows="25" id="comment" placeholder="Body"></textarea>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Submit For Review</button>
   		</div>
   </form>
</div>

</body>
</html>



<?php

if(isset($_POST['enteredUsername'])  && isset($_POST['enteredEmail']) && isset($_POST['enteredPassword']) && $_POST['enteredPassword'] == $_POST['enteredPassword2'])
{
    // check if the username has been set
  //be sure to validate and clean your variables
  $newUser = htmlentities($_POST['enteredUsername']);
  $newEmail = htmlentities($_POST['enteredEmail']);
  $newPass = htmlentities($_POST['enteredPassword']);
  $newPass = crypt ($newPass,"cryptTestKey");
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
  // Insert values
  $sql = "INSERT INTO userData (username, password, email)
  VALUES ('$newUser', '$newPass', '$newEmail')";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>

<div id="SignUp" style="width:300px">
  <form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>

    <label for="inputEmail" class="sr-only">Username</label>
    <input type="username" name="enteredUsername"  id="inputUsernameSignUp" class="form-control" placeholder="Username" required autofocus>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="enteredEmail" id="inputEmailSignUp" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="enteredPassword" id="inputPasswordSignUp1" class="form-control" onKeyUp="check_pass()" placeholder="Password" required>

     <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="enteredPassword2" id="inputPasswordSignUp2" class="form-control" onKeyUp="check_pass()" placeholder="Confirm Password" required>
    <div id="pass_same" style="display:inline;"></div>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
</form>

</div>