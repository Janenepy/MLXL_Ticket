<?php
    session_start();
    include ("db.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<title><?php echo $_POST['concert_name']?></title>
<!--title icon-->
<link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
<link rel="stylesheet" type="text/css" href="css/font.css">
<link rel="stylesheet" type="text/css" href="css/buy.css">
<script>
		function showPrice(id){
			//ให้ price = ค่าใน Attribute price ที่ id=id
			var price = document.getElementById(id).getAttribute("price");
			//ให้ price = ค่าใน Attribute avaliable ที่ id=id
			var avaliable = document.getElementById(id).getAttribute("avaliable");
			//price = ค่าใน id price
			document.getElementById("price").innerHTML = price;
			//กำหนดค่าใหม่ที่id=price ให้ = ค่าในตัวแปรprice
			document.getElementById("price").setAttribute("value", price);
			//กำหนดค่าใหม่ที่id=price ให้ = ค่าในตัวแปรavaliable
			document.getElementById("seat").setAttribute("value", avaliable);
			//ปุ่มสามารถกดได้
			document.getElementById("bnt").disabled = false;
			//set allqty =0
			document.getElementById("allqty").selectedIndex=0;
		}
		function checkSeat(seat_reserve){
			var avaliable = document.getElementById("seat").getAttribute("value");
			//เชคว่าจำนวนบัตรี่เรากดมีมากกว่าจำนวนบัตรที่เหลือมั้ย
			if(parseInt(seat_reserve) > parseInt(avaliable)){
				//เมื่อมีจำนวนบัตรไม่พอให้้นแจ้งเตือน
				alert("Seats Not Avarliable");
				//ปุ่มไม่สามารถกดได้
				document.getElementById("bnt").disabled = true;
				//set allqty =0
				document.getElementById("allqty").selectedIndex=0;
			} else{
				//ปุ่มสามารถกดได้
				document.getElementById("bnt").disabled = false;
			}
		}
</script>
</head>
<body style="background-color:#FFC0CB">
<script language="javascript">
//เช็คว่ากรอกฟอร์มมั้ย
function fncSubmit(){
		if(document.getElementById("zone").value == "--Select Zone--"){
			alert('Please select zone concert.');
			document.getElementById("zone").focus();
			return false;
		}  
		else if(document.getElementById("allqty").value == "--Select Number of Seats--"){
			alert('Please enter number of seats.');
			document.getElementById("allqty").focus();
			return false;
		}    
			document.form1.submit();
		}
</script>
<br>
<br>

<br>
<br>
		<!------- navigation bar -------->
		<nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark bg-dark"> <a class="navbar-brand" href="#">MLXL Ticket</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent1">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item active"> <a class="nav-link" color="white">Home <span class="sr-only">(current)</span></a> </li>
				<li class="nav-item active"> <a class="nav-link" href="template_mainUser.php">Concert <span class="sr-only">(current)</span></a> </li>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="#">Action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a> </div>
				</li>
    			</ul>
    			<div style="margin-right: 30px; color:#fff;" id="helloName">
					<a>Hello! <?php echo $_SESSION['user']; ?></a>
  				</div>
   			 <section id="hero">
    			<div class="hero-container">
        			<div class="actions">
						<a href="status.php" class="btn-get-started">STATUS</a>
						<a href="logout.php" class="btn-services">LOG OUT</a>
					</div>
     			 </div>
    		  </div>
  			</section>
  		  </div>
		</nav>
		<!------- navigation bar -------->
		<br><br>
		<div>
		<table width="100%" >
<?php
                $query_price = "SELECT  DISTINCT PRICE
                                FROM CONCERT_INFO 
								WHERE CONCERT_ID = " .$_POST['concert_id'] ." ORDER BY PRICE DESC";
								
                $query_concert_info ="SELECT ZONE_ID, ZONE_NAME, PRICE, SEAT_AVALIABLE
										FROM (
											SELECT ZONE_ID, PRICE, SEAT_AVALIABLE
											FROM CONCERT_INFO 
											WHERE CONCERT_ID = " .$_POST['concert_id'] ." ) CON_INFO
										INNER JOIN ZONE 
										ON ZONE.ID = CON_INFO.ZONE_ID ";
                $result_price = mysqli_query($con, $query_price);
                $result_concert_info = mysqli_query($con, $query_concert_info);

				$all_price = array();
				while($concert_price=mysqli_fetch_array($result_price)){
					//ใส่ค่าpriceทั้งหมดลง$all_price
					array_push($all_price, $concert_price['PRICE']);
				}
//สร้างarray
				$zone_name_list = array();
				$zone_list = array();
				$price_list = array();
				$seat_list = array();
				while($concert_info=mysqli_fetch_array($result_concert_info)){
//ใส่ค่าidของzoneทั้งหมดลง$zone_list
					array_push($zone_list, $concert_info['ZONE_ID']);
//ใส่ค่าชื่อของzoneของzoneทั้งหมดลง$zone_name_list
					array_push($zone_name_list, $concert_info['ZONE_NAME']);
					$price_list[$concert_info['ZONE_ID']] = $concert_info['PRICE'];
					$seat_list[$concert_info['ZONE_ID']] = $concert_info['SEAT_AVALIABLE'];
				}

				$showdate = strtotime($_POST['show_date']);
				$new_showdate = date('d M Y', $showdate);
				
				$reservedate = strtotime($_POST['reserve_date']);
				$new_reservedate = date('d M Y H:i', $reservedate);


				$_SESSION['concert_id'] = $_POST['concert_id'];
				$_SESSION['concert_name'] = $_POST['concert_name'];
				$_SESSION['concert_show_date'] = $new_showdate;
				$_SESSION['location_name'] = $_POST['location_name'];
?>
<!-------------ข้อมูลคอนเสิร์ต-------------------->			
				<th scope="row" style=" width: 50%" abbr="" rowspan="2" ><img src="<?php echo $_POST['concert_pic']?>" width="320" height="420" /></th>
				<td>
                    <p class="header"><?php echo $_POST['concert_name']?></p>
					<p ><b >Show Date : </b> <?php echo $new_showdate?><img src="https://icon-library.net/images/icon-date/icon-date-22.jpg" width="30" align="left" ></p>
					<p ><b> Venue :</b> <?php echo $_POST['location_name']?> <img src="https://pngimage.net/wp-content/uploads/2018/06/venue-icon-png.png" width="30" align="left" ></p>
   			  		<p ><b> Ticket Price :</b> <?php echo implode("/",$all_price)?>  <img src="https://uppic.cc/d/5Tnm" width="30" align="left" ></p>
   			  		<p ><b> Public Sale :</b> <?php echo $new_reservedate?> <img src="https://icons-for-free.com/iconfiles/png/512/buy+cart+ecommerce+online+sale+shopping+icon-1320166541341812176.png" width="30" align="left"> </p>
   			  		<br>
<!-------------จำนวนบัตรที่เหลือ------------------>
   			  		<!-- Button to Open the Modal -->
   			  		<div>
						 <button style="text-align: center;"type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Seats Available</button>
					</div>
					<br>
   				</td>
   			</tr>
   			<tr>	
   				<td>
<!-----------------ฟอร์มสำหรับกดบัตรคอน---------------------->
                     <form name="form1" method="post" action="checkbuy.php" onSubmit="JavaScript:return fncSubmit();">
                        <label> Zone :</label><br> 
<!-------------------วนลูปเพื่อแสดงชื่อโซน---------------------->
<!---------------------เมื่อselectionมีการเปลี่ยนแปลง ให้ส่งค่าidของโซนไปที่ showPrice------------------------->
                        <select style="width: 300px"class="custom-select" name="zone" id="zone" onChange="showPrice(this.value);">
                         <option selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--Select Zone--</option>
<?php for($i=0; $i < count($zone_list); $i++){?>
						 <option id="<?php echo $zone_list[$i]?>" value="<?php echo $zone_list[$i]?>" price="<?php echo $price_list[$zone_list[$i]]?>" avaliable="<?php echo $seat_list[$zone_list[$i]]?>"><?php echo $zone_name_list[$i]?></option><?php }?>
						</select>
						<input type="hidden" id="seat"/>
						 <div>Price :</label>
                               <input style="width: 300px" readonly="readonly" width=" 50px" class="form-control" id="price" name="price"/>
                         </div>		  			
                         <label>Number of Seats :</label><br> 
<!---------------------เมื่อselectionมีการเปลี่ยนแปลง ให้ส่งค่าvalueของโซนไปที่ checkSeat------------------------->
                         <select id="allqty" name="numberOfSeat" class="custom-select" style="width: 300px" onChange="checkSeat(this.value);">
							<option selected>--Select Number of Seats--</option>
							<option id="qty" value="1" >1</option>
							<option id="qty" value="2" >2</option>
							<option id="qty" value="3" >3</option>
							<option id="qty" value="4" >4</option>
						 </select>
						 <br><br>
						<button style="width: 300px" type="submit" id="bnt" class="btn btn-danger btn-lg btn-block">Booking!</button>
					</form>
				</td>
			</tr>
	</table>
	<br>								
	<br>
	<img src="<?php echo $_POST['location_image']?> "width="500" height="420">
</div>
<br>
<!--modal-->
<tr>
	<td>s
		
		<!-- The Modal -->
		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
				<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title"><?php echo "Seats Availble: ".$_POST['concert_name']?></h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body">
					<!--table-->
						<div class="table">
							<table style="width:100%">
								<tr>
									<th>Zone Name</th>
									<th>Seats Availble</th>
								</tr>
								<?php
								   $query = "SELECT zone_id,zone_name,seat_avaliable,concert_id 
										FROM concert_info 
										INNER JOIN zone
										ON zone.id=concert_info.zone_id";
								   
								   if ($result = mysqli_query($con,$query)) {
									   while ($zone = mysqli_fetch_assoc($result)) {
											if($_POST['concert_id']==$zone['concert_id']){
												echo "<tr><td>". $zone["zone_name"]."</td><td>".$zone["seat_avaliable"]."</td><td>";
											}
										}
									}
								?>
							</table>
						</div>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</td>
</tr>
<!--end modal-->
<br><br><br><br><br>
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