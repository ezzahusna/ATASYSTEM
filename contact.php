<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Contact - Amanah Tugas Akademik </title>
  <link rel="stylesheet"  href="cnt.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
</head>
<body>
  <?php require_once 'link.php'; ?>

  <?php
  if(isset($_SESSION['message'])): ?>

  <div class="alert alert-<?=$_SESSION['msg_type']?>">

   <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    ?>
  </div>
  <?php endif ?>
  <div class="container">
  <?php
    $mysqli= new mysqli('localhost', 'root', '', 'feedback') or die(mysqli_error($mysqli));?>

  <form  action="link.php" method="POST">
    <h1> Contact Us </h1><br><br>
    <h2>Have any problem  ? We  are ready to help you </h2><br><br>
      <input type="name" name="name" class="form-control" placeholder="Enter Your Name" required><br>
      <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required><br>
      <input type="message" name="message" class="form-control" placeholder="Message" rows="4" required></textarea><br>
       <input type="submit" name="submit" class="form-control submit" value="SEND MESSAGE">
  </form>
</div>
</body>
</html>
