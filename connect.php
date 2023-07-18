<?php

header("location: login.php");

$username=$_POST['username'];
$password=$_POST['password'];
$fullName=$_POST['fullName'];
$email=$_POST['email'];
$position=$_POST['position'];
$numberPhone = $_POST['numberPhone'];

if (!empty($username) || !empty($password) || !empty($fullName) || !empty($email) || !empty($position) || !empty($numberPhone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "test";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (username, password, fullName, email, position, numberPhone) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssi", $username, $password, $fullName, $email, $position, $numberPhone);
      $stmt->execute();

      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
}
else {
 echo "All field are required";
 die();
}
?>
