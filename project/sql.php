<?php
$server_name = 'localhost';
$username ='root';
$password = '';
$database = 'xyz';

$conn = mysqli_connect($server_name, $username, $password, $database);
if(!$conn){
  die("Sorry failed");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_POST['email'];
  $password = $_POST['pass'];
  echo (' <div class="alert alert-primary" role="alert">
            Email: ' .$email. 'password: ' .$password.'
          </div>' );
}

$sql = "INSERT INTO `emails`(`email`,`pass`) VALUES('$email', '$password')";

$result = mysqli_query($conn, $sql);


echo "SUCCESS";
?>