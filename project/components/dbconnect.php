<?php
$username = 'root';
$password = '';
$database = 'xyz';
$server = 'localhost';

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
  die();
}

?>