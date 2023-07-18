
<?php

 session_start();

$mysqli= new mysqli('localhost', 'root', '', 'feedback') or die(mysqli_error($mysqli));



if(isset($_POST['submit'])){
  $name= $_POST['name'];
  $email= $_POST['email'];
  $message= $_POST['message'];

  $_SESSION['message'] = "Record has been saved!";
  $_SESSION['msg_type'] = "success";


  $mysqli->query("INSERT Into contact (name, email, message) values( '$username', '$email', '$message')") or
     die($mysqli->error);

     $_SESSION['message'] = "Record has been saved!";
     $_SESSION['msg_type'] = "success";

     header("location: contact.php");
}
