<?php 
	session_start();
	include	("db.php");
    if(!$_SESSION['userid']){
        header("Location:template_main.php");
    }else{
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--title icon-->
<link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
<link rel="stylesheet" type="text/css" href="css/font.css">
<link rel="stylesheet" type="text/css" href="css/billcss.css">
<title>Bill</title>
</head>
<body>
  	<!------- navigation bar -------->
	<nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark bg-dark"> <a class="navbar-brand" href="#">MLXL Ticket</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent1">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item active"> <a class="nav-link" color="white">Home <span class="sr-only">(current)</span></a> </li>
		<li class="nav-item active"> <a class="nav-link" href="template_mainuser.php">Concert <span class="sr-only">(current)</span></a> </li>
		</ul>
		<div style="margin-right: 30px; color:#fff;" id="helloName">
			<a>Hello! <?php echo $_SESSION['user']; ?></a>
		</div>
		<section id="hero">
			<div class="hero-container">
				<div class="actions">
					<a href="template_mainuser.php" class="btn-get-started" style="text-decoration: none; ">Go To Main Page</a>
				</div>
		</div>
		</section>
		</div>
	</nav><br><br><br>
<?php 
    $query="SELECT zone_name FROM zone WHERE zone.id= ". $_SESSION['zone'];
	$result=mysqli_query($con, $query);
	$zone=mysqli_fetch_array($result);
	$_SESSION['zone_name']=$zone['zone_name'];
?>
<br>
<!---------------แสดงข้อมูลการจองบัตร---------------->
<div class="box" style="width: 50% ">
	<div class="table ">
		<table width="100%" border="0">
			<tr><th class="header"colspan="2" >RESERVE SUMMARY</th></tr>
			<tr><th class="Info" colspan="2">Customer Information<img src="https://uppic.cc/d/5Ymx" align="left" ></th></tr>
				<th >Name-Surname:</th>
				<td><?php echo $_SESSION['user'];?></td> 	
			</tr>
			<tr>
				<th >Email-Address:</th>
				<td><?php echo $_SESSION['email'];?></td>
			</tr>
			<tr>
				<th >Moblie No:</th>
				<td><?php echo $_SESSION['tel'];?></td> 	
			</tr>
			<tr>
			</tr>
			<tr>
			<th class="Info" colspan="2">Order Information<img src="https://uppic.cc/d/5Ymb" align="left" ></th>
			</tr>
			<tr>
				<th >Concert Name:</th>
				<td><?php echo $_SESSION['concert_name'];?></td> 	
			</tr>
			<tr>
				<th >Venue:</th>
				<td><?php echo $_SESSION['location_name'];?></td> 	
			</tr>
			<tr>
				<th >Zone:</th>
				<td><?php echo $_SESSION['zone_name']?></td> 	
			</tr>
			<tr>
				<th >Quantity:</th>
				<td><?php echo $_SESSION['numberOfSeat'];?></td> 	
			</tr>
			<tr>
				<th >Unit Price (Baht):</th>
				<td><?php echo $_SESSION['price'];?></td> 	
			</tr>
			<tr>
				<th>Total Amount (Bath):</th>
				<td><?php echo $_SESSION['total_price'];?></td> 	
			</tr>
			<tr><th class="Info" colspan="2" >Payment Methods<img src="https://uppic.cc/d/5Ymv" width="100px" align="left" ></th></tr>
			<tr><th colspan="2" style="text-align: center; color: blue"><img  style="width: 300px;" class="barcode" src="https://www.sageintelligence.com/wp-content/uploads/2017/08/Image-1-3.png">
		</th></tr>
		</table>
	</div>
	</div>
<?php }?>
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