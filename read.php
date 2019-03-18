<!doctype html>

<head>
	 <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Blog</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
</head>
<body>

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

<?php
    if(isset($_POST['read']))
    {
      $servername = "localhost";
      $username = "rootKing";
      $password = "C0xPMVgeEKELbN1e";
      $dbname = "WebAppDB";
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          echo "3";
      } 

	 $sql = "SELECT * FROM postData WHERE postId = ".$_POST['read'];
      $result = $conn->query($sql);


		//have DB info.
  	if ($result->num_rows > 0) {
    	while ($row = $result->fetch_assoc()) {
    	echo "<br/>";
    	echo "<br/>"; 
    	echo "<br/>";
    	echo "<br/>";
    	echo "<br/>";
      	echo $row["title"];
      	echo "<br/>";
      	echo $row["story"];
		}
      $conn->close();
		}
	}
?>
</body>