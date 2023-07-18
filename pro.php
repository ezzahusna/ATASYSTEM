<?php

 session_start();

$mysqli= new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

  $id = 0;
  $update= false;
  $name= '';
  $part= '';
  $code= '';
  $classgp= '';
  $teachinghour='';

if(isset($_POST['save'])){
  $name= $_POST['name'];
  $part= $_POST['part'];
  $code= $_POST['code'];
  $classgp= $_POST['classgp'];
  $teachinghour= $_POST['teachinghour'];

  $_SESSION['message'] = "Record has been saved!";
  $_SESSION['msg_type'] = "success";


  $mysqli->query("INSERT Into data (name, part, code, classgp, teachinghour) values( '$name', '$part', '$code', '$classgp', '$teachinghour')") or
     die($mysqli->error);

     $_SESSION['message'] = "Record has been saved!";
     $_SESSION['msg_type'] = "success";

     header("location: admin.php");
}

if(isset($_GET['delete'])){
   $id =  $_GET['delete'];
  $mysqli->query("DELETE FROM data WHERE id=$id") or die(mysqli_error($mysqli()));

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "dangers";

  header("location: admin.php");
}

if(isset($_GET['edit'])){
   $id =  $_GET['edit'];
   $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die(mysqli_error($mysqli()));
   if($result->num_rows==1){
    $row = $result->fetch_array();
    $name = $row['name'];
    $part = $row['part'];
    $code = $row['code'];
    $classgp = $row['classgp'];
    $teachinghour = $row['teachinghour'];
  }
}

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $part = $_POST['part'];
  $code= $_POST['code'];
  $classgp = $_POST['classgp'];
  $teachinghour = $_POST['teachinghour'];

  $mysqli->query("UPDATE data SET name='$name', part='$part', code='$code', classgp='$classgp', teachinghour='$teachinghour' WHERE id=$id") or
    die ($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: admin.php");
}
?>
