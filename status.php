<?php
    session_start();
    include ("db.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--Bootstrap-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--CSS Link to indexcss.css-->
<link rel="stylesheet" type="text/css" href="registercss.css">
<link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
<link rel="stylesheet" type="text/css" href="css/status.css">
<link rel="stylesheet" type="text/css" href="css/lib/font.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/font.css">
<title>Status</title>  
</head>

<body style="background-image: url(https://htmlcolorcodes.com/assets/images/html-color-codes-best-prototyping-tools-hero-67966da8.jpg);">

        <!------- navigation bar -------->
        <nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark bg-dark"> <a class="navbar-brand" href="#">MLXL Ticket</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active"> <a class="nav-link" color="white">Home <span class="sr-only">(current)</span></a> </li>
              <li class="nav-item active"> <a class="nav-link" href="template_mainuser.php">Concert <span class="sr-only">(current)</span></a> </li>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
                <a class="dropdown-item" href="#">Action</a> 
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider">
                  <a class="dropdown-item" href="#">Something else here</a> 
                </div>
              </ul>
            </div>

              <div style="margin-right: 30px; color:#fff;" id="helloName">
                <a>Hello! <?php echo $_SESSION['user']; ?></a>
              </div>
              <div class="actions">
                  <a href="template_mainuser.php" class="btn-get-started">Go To Main Page</a>
              </div>
            </ul>
          </div>  
        </nav>
        <!--<div class="Purchase">Purchase History </div>
        <div class="Infomation"> *Information will be updated every 5 minutes</div>-->
        <br><br><br>
<!---------------แสดงช้อมูลและสถานะที่userกดบัตรไป----------------->
    <aside>
      <div class="box container">
        <table style=" font-family: 'Noto Serif', serif;font-family: 'Taviraj', serif;" border="0">
          <tr  class="w3-red" style="font-size: 40px " >
            <th colspan="6">Purchase History Event</th>
          </tr>
          <tr>
            <th>Order ID</th>
            <th style="color: red">Concert</th>
            <th>Zone</th>
            <th style="color:red">Number of Seats</th>
            <th>Total Price</th>
            <th style="color: red">Status</th>
           </tr>
<?php
    $query = "SELECT orders.id as orders_id,concert_id,users_id,zone_id,orders_qty,total_price,status_id,concert_name,zone_name,firstname,lastname,username,description,status.id 
			FROM orders 
			INNER JOIN concert ON orders.concert_id = concert.id 
			INNER JOIN users ON orders.users_id = users.id 
			INNER JOIN zone ON orders.zone_id = zone.id 
			INNER JOIN status ON orders.status_id = status.id 
			ORDER BY orders.id";

    if ($result = mysqli_query($con,$query)) {
      while ($row = mysqli_fetch_assoc($result)) {
		    if($_SESSION['username']==$row['username']){
          echo "<tr><td>". $row["orders_id"]."</td><td>". $row["concert_name"]."</td><td>".$row["zone_name"]."</td><td>".$row["orders_qty"]."</td><td>".$row["total_price"]."</td><td>"
          .$row["description"]."</td><td>";
        }
      }
    }
?>  
            </table>
            </div>
          </ul>
        </div>
      <br>
      <br>
      <br>
    </aside>
      <!-- #footer -->
      <footer id="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright">
                &copy; Copyright <strong>MLXL Ticket</strong>. 2019
              </div>
              <div class="credits">
                Designed by <font color="#FF0066">MLXL</font>
                <br>
                Jedsadaporn Puttakosai 61102010139  |  Narissa Darawankul 61102010142  |  Piyathida Thainguan 61102010153
            </div>
          </div>
        </div>
      </footer>
      <!-- #footer -->
  </body>
</html>