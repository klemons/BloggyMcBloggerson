<!doctype html>
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

<body class="text-center">

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



      <div class="album py-5 bg-light" style="margin-top:50px">
        <div class="container">
          <div class="row">

<?php
    if(isset($_POST['letsPost']))
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
      // Insert values
      $sql = "UPDATE postData SET isPosted = 1 WHERE postId =".$_POST['letsPost'];
      if ($conn->query($sql) === TRUE) {
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }
?>

<?php
//removes posts
    if(isset($_POST['letsNotPost']))
    {
      $whichStory = ($_POST['letsNotPost']);
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
      // Update values
      $sql = "UPDATE postData SET isPosted = 0 WHERE postId =".$_POST['letsNotPost'];
      if ($conn->query($sql) === TRUE) {
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }
?>


<?php
  $servername = "localhost";
  $username = "rootKing";
  $password = "C0xPMVgeEKELbN1e";
  $dbname = "WebAppDB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);

  } 

  $sql = "SELECT * FROM postData ORDER BY postTime DESC;";
  $result = $conn->query($sql);


//have DB info.
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 

      if($_SESSION['isAdmin'] == 1){
        echo
            '<div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <div class="card-body">
                    <h3>'; 

                    echo $row['title']; 


                    echo '</h3>
                    <p class="card-text">'; 


                    echo $row['story']; 


                    echo '</p>
                      <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <form method="post" action="read.php">
                                <input type="hidden" name="read" value="'; echo $row['postId']; echo'">
                                <button  class="btn btn-sm btn-outline-secondary"type="submit">Veiw</button>
                              </form>';
                        
                        if($row['isPosted'] == true){
                        echo '<form method="post">
                                <input type="hidden" name="letsNotPost" value="'; echo $row['postId']; echo'">
                                <button  class="btn btn-sm btn-outline-secondary"type="submit">Remove</button>
                              </form>';
                      }
                      else
                      {

                        echo'<form method="post">
                                <input type="hidden" name="letsPost" value="'; echo $row['postId']; echo'">
                                <button class="btn btn-sm btn-outline-secondary" type="submit" >Post</button>
                             </form>';
                      }

                      echo '</div>
                      <small class="text-muted">'; 

                      echo $row['postTime'];

                      echo '</small>';

                      echo '
                      <small class="text-muted">'; 


                      echo '<br/>';
                      echo $row['authorName'];

                      echo '</small>
                    </div>
                  </div>
                </div>
              </div>';
            }

      else if($row['isPosted'] == true){
        echo
            '<div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <div class="card-body">
                    <h3>'; 

                    echo $row['title']; 


                    echo '</h3>
                    <p class="card-text">'; 


                    echo $row['story']; 


                    echo '</p>
                      <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <form method="post" action="read.php">
                                <input type="hidden" name="read" value="'; echo $row['postId']; echo'">
                                <button  class="btn btn-sm btn-outline-secondary"type="submit">Veiw</button>
                              </form>
                      </div>
                      <small class="text-muted">'; 

                      echo $row['postTime'];

                      echo '</small>';

                      echo '
                      <small class="text-muted">'; 

                      echo '<br/>';
                      echo $row['authorName'];

                      echo '</small>
                    </div>
                  </div>
                </div>
              </div>';
            }
  }
}
  else
  {
    echo 'failed to get data';
  }
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
