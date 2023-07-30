<?php
  $showalert = FALSE;
  if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'components/dbconnect.php';
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $exist = FALSE;
    if (!$exist){
      $result = mysqli_query($conn, "INSERT INTO `user`(`email`,`password`) VALUES ('$email','$pass')");
      if($result){
        $showalert=TRUE;
        session_start();
        $_SESSION['loggedin']=TRUE;
        $_SESSION['email']=$email;
        header("location: home.php");
      }
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
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
      if ($showalert){
        echo '<div class="alert alert-success" role="alert">
        Successfully signed up!
      </div>';
      }
    ?>
    <form action='/project/signup.php' method='post'>
      <div class="container mt-3">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
        </div>
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="pass">
        <div id="passwordHelpBlock" class="form-text">
          Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </div>
        <div class="d-grid gap-2 col-6 mx-auto mt-5">
          <button class="btn btn-primary" type="submit">Sign up</button>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto mt-5">
          <button class="btn btn-primary" type="button" onclick= "window.location='login.php';">Log in instead?</button>
        </div>
      </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>


