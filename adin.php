<?php

$username=$_POST['username'];
$password=$_POST['password'];


if (!empty($username) || !empty($password)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "user";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else {
     $SELECT = "SELECT * From login Where username='$username' && password='$password'";
     $INSERT = "INSERT Into login (username, password) values(?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $password);
     $stmt->execute();
     $stmt->bind_result($password);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     if ($rnum==1) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      header("location: admin.php");
    }
      else {
    header("location: adlogin.php");
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
