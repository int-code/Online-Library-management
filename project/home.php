<?php
  session_start();
  if(!(isset($_SESSION['loggedin'])) || isset($_SESSION['loggedin']) != true){
    header("location: login.php");
    exit;
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js">
    </script>
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js">
    </script>
  </head>
  <body>
<?php
  require 'components/nav.php';
  echo '<header>
  <!-- Jumbotron -->
  <div class="p-5 text-center bg-light" style="margin-top: 0px;">
    <h1 class="mb-3">Welcome!</h1>
    <h4 class="mb-3">E-library management system</h4>
    <!-- <a class="btn btn-primary" href="" role="button"></a> -->
  </div>
  <!-- Jumbotron -->
</header>';
  include 'components/dbconnect.php';
  $email = $_SESSION['email'];
  $q = mysqli_query($conn,"SELECT id FROM `user` WHERE `email`='$email'");
  $issued_books = mysqli_query($conn, "SELECT `books`.`name`, `books`.`author`, `issue_hist`.`issue_date` FROM `issue_hist` JOIN `books` WHERE `issue_hist`.`uid`=(SELECT `id` FROM `user` WHERE `email`='$email')");
  echo '<div align=center><h1>Issued Books</h1></div>
  <div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">';
  while($row = mysqli_fetch_assoc($issued_books)){
    echo ('<div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">'.$row['name'].'</h5>
        <p class="card-text">By '.$row['author'].'<br>Issue Date: '.$row['issue_date'].' </p>
      </div>
    </div>
  </div></div>');
  }
  echo "</div>"
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>


