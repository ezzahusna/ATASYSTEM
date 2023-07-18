<?php

$mysqli= new mysqli('localhost', 'root', '', 'admin') or die(mysqli_error($mysqli));



if(isset($_POST['submit'])){
  $name= $_POST['username'];

  $mysqli->query("INSERT Into adlogin (username]) values( '$username')") or
     die($mysqli->error);
}

?>
