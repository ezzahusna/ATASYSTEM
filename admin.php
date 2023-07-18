<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> ADMIN </title>
  <script src="https://code.jquery.com/jquery-2.1.3.js"integrity="sha256-goy7ystDD5xbXSf+kwL4eV6zOPJCEBD1FBiCElIm+U8="crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<style>
*{
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}

body{
  font-family: sans-serif;
}

.menu-bar{
  background: white;
  height: 50px;
  width: 100%;
}

.menu-bar ul{
  float: right;
  margin-right: 20px;
}

.menu-bar ul li{
  display: inline-block;
  line-height: 30px;
  margin: 10px 10px;
  border: 1px solid black;
  border-radius: 8px;
  padding: 8px 30px;
}

.menu-bar ul li a{
  color: black;
  font-size: 17px;
  text-align: none;
  transition: 0.10s ease;
  text-decoration: none;
}

.menu-bar ul li:hover{
  background-color: #CCD1D1;
  color:  #000;
}


</style>
</head>
<body>
  <div class="menu-bar">
    <ul>
      <li><a href="home.php"><i class="fa fa-sign-out"></i> Log-Out </a></li>
    </ul>
  </div>
  <?php require_once 'pro.php'; ?>

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
    $mysqli= new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
    $result= $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    //pre_r($result);?>

    <div class="row justify-content-center">
        <table class="table">
            <thead>
              <tr>
                <th>Lecturer Name</th>
                <th>Part</th>
                <th>Code</th>
                <th>Group</th>
                <th>Teaching hour</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <?php
            while($row= $result->fetch_assoc()): ?>
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['part']; ?></td>
                <td><?php echo $row['code']; ?></td>
                <td><?php echo $row['classgp']; ?></td>
                <td><?php echo $row['teachinghour']; ?></td>
                <td>
                  <a href="admin.php?edit=<?php echo $row['id']; ?>"
                    class="btn btn-info">Edit</a>
                    <a href="pro.php?delete=<?php echo $row['id']; ?>"
                      class="btn btn-danger">Delete</a>
                </td>
              </tr>
            <?php endwhile; ?>
      </table>
      </div>

  <?php
    function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';
    }
  ?>
  <div class="row justify-content-center">
    <form action="pro.php" method="POST">
      <input type="hidden" name="id" value=<?php echo $id; ?>">
      <div class="form-group">
      <label> Name </label>
      <input type="name" name="name"  class="form-control" value="<?php echo $name; ?>" placeholder="Enter name">
      </div>
      <div class="form-group">
      <label>Part</label>
      <input type="part" name="part"  class="form-control" value="<?php echo $part; ?>" placeholder="Enter part">
      </div>
      <div class="form-group">
      <label> Code </label>
      <input type="code" name="code"  class="form-control"  value="<?php echo $code; ?>" placeholder="Enter code subject">
      </div>
      <div class="form-group">
      <label> Group </label>
      <input type="classgp" name="classgp"  class="form-control"  value="<?php echo $classgp; ?>" placeholder="Enter group">
      </div>
      <div class="form-group">
      <label> Teaching hour </label>
      <input type="teachinghour" name="teachinghour"  class="form-control"  value="<?php echo $teachinghour; ?>" placeholder="Enter teaching hour">
      </div>
      <div class="form-group">
        <?php
        if($update == true): ?>
        <button type="submit" clas="btn btn-info" name="update"> Update </button>
      <?php else: ?>
        <button type="submit" clas="btn btn-primary" name="save"> Save </button>
      <?php endif; ?>
      </div>
    </form>
</div>
</div>
</body>
</html>
