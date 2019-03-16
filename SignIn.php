<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

<body class="text-center">

<div style="margin-left:35%; padding:10px;">

<div id="LogIn" style="width:300px">

     <form class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Log In</h1>

    <label for="inputEmail" class="sr-only">Username</label>
    <input type="username" id="inputUsernameLogIn" class="form-control" placeholder="Username" required autofocus>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmailLogIn" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPasswordLogIn" class="form-control" placeholder="Password" required>
    
    
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
</form>

  </div>

<br>
<br>

<?php

if(isset($_POST['enteredUsername'])  && isset($_POST['enteredEmail']) && isset($_POST['enteredPassword']))
{
    // check if the username has been set
  //be sure to validate and clean your variables
  $newUser = htmlentities($_POST['enteredUsername']);
  $newEmail = htmlentities($_POST['enteredEmail']);
  $newPass = htmlentities($_POST['enteredPassword']);
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
      echo "New record created successfully";
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
    <input type="password" name="enteredPassword" id="inputPasswordSignUp1" class="form-control" placeholder="Password" required>

     <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPasswordSignUp2" class="form-control" placeholder="Confirm Password" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
</form>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
