<?php
    session_start();
    include ("db.php");
    
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
<!--Bootstrap-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--CSS Link to indexcss.css-->
<link rel="stylesheet" type="text/css" href="registercss.css">
<link rel="stylesheet" type="text/css" href="css/update_statuscss.css">
<!--title icon-->
<link rel="icon" type="image/png" href="MLXL ICON.png"/>
<title>Update status | MLXL Ticket</title>

</head>

<body>
   <!------- navigation bar -------->
<nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark bg-dark"> <a class="navbar-brand" href="#">MLXL Ticket</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"> <a class="nav-link" href="#"><span class="sr-only">(current)</span></a> </li>
       <li class="nav-item active"> <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a> </li>
    </ul>
    <div style="margin-right: 30px" id="helloName">
    <a style="color:aliceblue">Hello!  <?php echo $_SESSION['username']; ?></a>
    </div>
    <section id="hero">
    <div class="hero-container">
        <div class="actions">
          <a href="template_mainadmin.php" class="btn-get-started" style="text-decoration: none;">Go To Main Page</a>
        </div>
      </div>
    </section>
  </div>
</nav>
  <br><br>
<?php
           // $update ="UPDATE `orders` SET status='comfirm' WHERE id=$row['firstname']";
      //$result = mysqli_query($con,$update);
?>
<!----------------แสดงข้อมูลของผู้ที่กดบัตร---------------------->
<div class="box container">
  <h1>Update Status</h1>
  <br>
  <table class="tabl "  width="100" border="0" >
      <tr>
        <th>Order ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Concert</th>
        <th>Zone</th>
        <th>Seats Of Number</th>
        <th>Total Price</th>
        <th>Update</th>
      </tr>
<?php
    $query = "SELECT ORDER_ID, CONCERT_ID, USERS_ID, ORDERS_QTY, TOTAL_PRICE, CONCERT_NAME, USERS_ID, FIRSTNAME, LASTNAME, USERNAME, ZONE_ID, ZONE_NAME
              FROM (
                SELECT ID AS ORDER_ID, CONCERT_ID, USERS_ID, ZONE_ID, ORDERS_QTY, TOTAL_PRICE 
                FROM ORDERS
                WHERE STATUS_ID = 1 ) OD
              INNER JOIN CONCERT ON OD.CONCERT_ID = CONCERT.ID
              INNER JOIN USERS ON OD.USERS_ID = USERS.ID
              INNER JOIN ZONE ON OD.ZONE_ID = ZONE.ID
              ORDER BY ORDER_ID";
    
    if ($result = mysqli_query($con,$query)) {
      while ($row= mysqli_fetch_assoc($result)){
        echo "<tr><td>". $row["ORDER_ID"]."</td><td>". $row["FIRSTNAME"]."</td><td>".$row["LASTNAME"]."</td><td>".$row["CONCERT_NAME"]."</td><td>".$row["ZONE_NAME"]."</td><td>"
        .$row["ORDERS_QTY"]."</td><td>".$row["TOTAL_PRICE"]."</td><td>";
?>
<!-------------------ปุ่มสำหรับเปลี่ยนสถานะโดยส่งค่าidของ table status ไปที่ update_order.php---------------------->
       <form method="POST" action="update_order.php">
        <input type="hidden" name="order_id" value="<?php echo $row['ORDER_ID']?>">
        <input type="hidden" name="status" value="2" >
        <button id="confirm" class="btn btn-success"  type="submit" >Confirm</button>
       </form>
       <form method="POST" action="update_order.php">
        <input type="hidden" name="order_id" value="<?php echo $row['ORDER_ID']?>" >
        <input type="hidden" name="status" value="3" >
        <button id="cancel" class="btn btn-danger"  type="submit" >Cancel</button>
       </form>
<?php
      }

       }
?>
        </table>
      </div>
    </div>
	</body>
</html>