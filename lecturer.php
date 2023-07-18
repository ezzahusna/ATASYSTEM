<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `lecturers` WHERE CONCAT(`name`, `part`, `code`, 'classgp') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `lecturers`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "test");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lecturers - Amanah Tugas Akademik</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>

        *{
          margin: 0;
          padding:0;
        }

        body{
          background-image: url(03.jpg);
          background-size: contain;
        }

        .menu-bar{
          background: #F1DAB0;
          text-align: center;
          width: 1100px;
          height:60px;
          margin-left: 14.5%;
        }

        .menu-bar ul{
          display: inline-flex;
          list-style: none;
          color: black;

        }

        .menu-bar ul li{
          width: 120px;
          margin: 10px;
          padding: 10px;
        }

        .menu-bar ul li a{
          text-decoration: none;
          color: black;
          font-family: sans-serif;
        }

         .menu-bar ul li:hover{
          background: white;
          border-radius: 3px;
        }
        .menu{
          display: none;
        }

        .sub-menu{
          display: none;
        }

        .menu-bar ul li:hover .menu{
          display: block;
          position: absolute;
          background-color: white;
          margin-top: 5px;
          margin-left: -10px;
          border-radius: 3px;
        }

        .menu-bar ul li:hover .menu ul{
          display:block;
          margin: 10px;
        }

        .menu-bar ul li:hover .menu ul li{
          width: 100px;
          padding: 5px;
          border-bottom: 1px dotted black;
          background: transparent;
          border-radius: 0;
          text-align: left;
        }

        .menu-bar ul li:hover .menu ul li: last-child{
          border-bottom: none;
        }

        .menu-bar ul li:hover .menu ul li a:hover{
        color: #DAA520;
        }

        .menu-bar ul li:hover .sub-menu{
          display: block;
          position: absolute;
          background-color: white;
          margin-top: 10px;
          margin-left: -10px;
          border-radius: 3px;
        }

        .menu-bar ul li:hover .sub-menu ul{
          display:block;
          margin: 10px;
        }

        .menu-bar ul li:hover .sub-menu ul li{
          width: 100px;
          padding: 10px;
          border-bottom: 1px dotted black;
          background: transparent;
          border-radius: 0;
          text-align: left;
        }

        .menu-bar ul li:hover .sub-menu ul li: last-child{
          border-bottom: none;
        }

        .menu-bar ul li:hover .sub-menu ul li a:hover{
        color: #DAA520;
        }

        .wd{
          width: 1100px;
          height: 1900px;
          background-color: white;
          padding: 55px;
          margin-left: 14.5%;
        }

        .main{
          position: absolute;
          top: 20%;
          left: 45%;
          transform: translate(-50%,-50%);
        }

        input{
          border: 1px solid black;
          height: 40px;
          width:300px;
          border-radius: 50px;
          padding: 0px 10px;
          box-sizing: border-box;
        }

        .btn{
          position: absolute;
          top: 20%;
          left: 60%;
          transform: translate(-50%,-50%);
        }

        .btn input{
          border: 1px solid black;
          height: 40px;
          width:100px;
          border-radius: 50px;
          padding: 0px 10px;
        }
            table,tr,th,td
            {
                border: 1px solid black;
                margin: 5px;
                margin-top: 5%;
                color: black;
                text-align: center;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
      <div class="menu-bar">
        <ul>
          <li class="active"><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-book"></i> About</a>
            <div class="menu">
                <ul>
                  <li><a href="System.php">System</a></li>
                  <li><a href="team.php">Our Team </a></li>
                </ul>
            </div>
          </li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="main.php"><i class="fa fa-sign-out"></i> Log-Out </a>
        </ul>
      </div>
      <div class="wd">
        <form action="lecturer.php" method="post">
          <div class="main">
            <input type="text" name="valueToSearch" placeholder="Search by name/part/code"><br><br>
          </div>
          <div class="btn">
            <input type="submit" name="search" value="Filter"><br><br>
          </div>

          <div class="row justify-content-center">
              <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Part</th>
                    <th>Code</th>
                    <th>Group</th>
                    <th>Teaching hour</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['part'];?></td>
                    <td><?php echo $row['code'];?></td>
                    <td><?php echo $row['classgp'];?></td>
                    <td><?php echo $row['teachinghour'];?></td>
                </tr>
                <?php endwhile;?>
              </table>
            </div>
        </form>
      </div>
    </body>
</html>
