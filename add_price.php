<?php
    session_start();
    include ("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
  <title>Add Price</title>
  <link rel="stylesheet" type="text/css" href="css/font.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/add_pricecss.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="background-image: url(https://daks2k3a4ib2z.cloudfront.net/55e8561e77e11c5b2669313b/55e915813f65f3605faf200b_colortheory.jpg);">
      <!------- navigation bar -------->
      <nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark bg-dark"> <a class="navbar-brand" href="#">MLXL Ticket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active"> <a class="nav-link" color="white">Home <span class="sr-only">(current)</span></a> </li>
            </ul>
          <div style="margin-right: 30px; color:#fff;" id="helloName">
            <a>Hello! <?php echo $_SESSION['username']; ?></a>
          </div>
        <section id="hero">
          <div class="hero-container">
          </div>
          </div>
           </div>
        </section>
          </div>
           </nav><br><br><br><br>
      <!------- navigation bar -------->
      <div class="box container">
        <table width="100">
          <tr>
            <th colspan="2" style="font-size: 50px;"> Add Price Ticket</th>
          </tr>
          <tr>
<?php
              $showdate = strtotime($_SESSION['showcon']);
			       	$new_showdate = date('d M Y H:i', $showdate);
			    	  $reservedate = strtotime($_SESSION['reservecon']);
              $new_reservedate = date('d M Y H:i', $reservedate);
?>
<!---------------แสดงข้อมูลคอนเสิร์ตที่กรอกจาฟอร์มหน้า add_concert.php--------------->
              <th scope="row" style=" width: 50%" abbr=""  ><img src="<?php echo  $_SESSION['piclink']?>" width="320" height="420" />
            <td class="Info">
              <p ><b>Concert Name : </b><?php echo $_SESSION['conname']?></p>
              <p ><b>Public Sale : </b> <?php echo $new_reservedate?></p>
              <p ><b>Show Date :</b> <?php echo $new_showdate?> </p>
              <p ><b>Location :</b> <?php echo $_SESSION['location_name']?> </p>
            </td>
          </th>
        </tr>
<?php
    $query_price = "SELECT location_id,zone_name,qty,zone_id
                    FROM layout 
                    INNER JOIN zone 
                    ON zone.id=layout.zone_id 
                    WHERE location_id = ".$_SESSION['location_id']." order by zone_id";
    $result_price = mysqli_query($con, $query_price);
?>
        <tr>
        <br>
          <td colspan="2">
           <div class="container">
             <form method="post" action="insert_price.php">
<!-------------วนลูปแดงโซนในสถาที่นั้น-------------->
                <div class="row" >
<?php while($price=mysqli_fetch_array($result_price)){?>
                  <ul>
                  <br>
                    <div>
                      <input readonly="readonly" type="text" value="<?php echo $price['zone_name']?>" name="zone_name[]" style="width:80px; height:50px" >
                      <input  type="hidden" value="<?php echo $price['zone_id']?>" name="zone_id[]" >
                      <input  type="hidden" value="<?php echo $price['qty']?>" name="zone_qty[]" >
<!------------------ใส่ราคาในแต่ละโซนโดยเก็บเป็น array----------------------------->
                      <input type="text" 
                      class="form-control"  
                      class="p-2 bg-white" id="zone_price" id="<?php echo $price['zone_id']?>" placeholder="Enter price" name="zone_price[]" required>  
                    </div>
                  </ul>
<?php } ?>
                </div>
                <br>
          <tr>
            <td colspan="2">
              <div class="actions">
                <button type="submit" class="btn btn-warning" style="font-size: 30px; color: white">Add Concert</button>
              </div>
            </td>
          </tr>
      </form>
    </div>
  </td>
  </tr>
</table>
</div>
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