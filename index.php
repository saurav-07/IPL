<!DOCTYPE html>
<html lang="" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <title>Admin</title>
  </head>

  <body>

    <?php
      $name = $team = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $team = test_input($_POST["team"]);
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $servername = "localhost";
      $username = "username";
      $password = "password";
      $dbname = "myDB";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // sql to delete a record
      $sql = "DELETE FROM Players WHERE Name = '$name' AND Team = '$team'";

      if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }

      mysqli_close($conn);
    ?>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#">Home</a>
      <a href="#">Teams</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </div>


    <div id="main">
      <div class="_menu">
        <span id="menu" onclick="openNav()">&#9776; Menu</span>
        <!--<button type="button" id="login" class="btn btn-primary" style="background: white; color: Black"><i class="fa fa-sign-in-alt"></i> Login
        </button>-->
      </div>

      <div class="_header">IPLT20</div>
      <br><br>

      <div class="container">
        <h1 id="choice">Choose an operation to continue:</h1>
        <br><br>
        <div class="row">
          <div class="col"><a href="#" id="add_effect" class="btn btn-default btn-block"><strong>View database <i class="fa fa-database"></i></strong></a></div>
          <div class="col"><a href="#" id="add_effect" class="btn btn-default btn-block"><strong>View player <i class="fas fa-user"></i></strong></a></div>
          <div class="col"><a href="#" id="add_effect" class="btn btn-default btn-block"><strong>Add player <i class="fas fa-user-plus"></i></strong></a></div>
          <div class="col"><a href="#" id="add_effect" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal"><strong>Remove player <i class="fas fa-user-minus"></i></strong></a></div>
        </div>
      </div>
      <br><br><hr>

      <h3>Some graphs of team perfomance</h3>

      <div id="chart_div" align="center" width="120%"></div><hr>
      <div id="barchart_material" align="center" width="70%"></div>

      <div class="logout">
        <h1 >Are you done? Click below to logout.</h1>
        <a href="#" id="logout" class="btn btn-info btn-lg" style="background:red">
          Log out <i class="fa fa-sign-out-alt"></i>
        </a>
      </div>

    </div>

    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          Name: <input type="text" name="name"><br>
          Team: <input type="text" name="team"><br>
          <input type="submit">
          </form>
        </div>

      </div>
    </div>
  </div>

  </body>
</html>
