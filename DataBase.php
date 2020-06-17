<?php
  $servername = "localhost";
  $username = "username";
  $password = "password";

  //Creating connection
  $conn = mysqli_connect($servername, $username, $password);

  //Checking connection
  if (!$conn){
    die("Connection Failed: ".mysqli_connect_error());
  }
  echo "Connected Successfully";
 ?>
