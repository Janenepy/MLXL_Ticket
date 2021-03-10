<?php
    session_start();
    include ("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
  <link rel="stylesheet" type="text/css" href="css/font.css">
  <title>Add Concert</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/add_concertcss.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="css/font.css">
  <script>
    function setLocation(value){
//กำหนดค่าใหม่ที่id=location_id ให้ = valueค่าที่ส่งมา
      document.getElementById("location_id").setAttribute("value", value);
      //alert( document.getElementById(value).innerHTML);
//กำหนดค่าใหม่ที่id location_id ให้ = ชือสถานที่
      document.getElementById("location_name").setAttribute("value", document.getElementById(value).innerHTML);
   
    }
	</script>
</head>
<body style="background-image: url(https://daks2k3a4ib2z.cloudfront.net/55e8561e77e11c5b2669313b/55e915813f65f3605faf200b_colortheory.jpg);">
<?php 
       $query="SELECT location_name, id FROM location order by id ";
       $result=mysqli_query($con, $query);

?>
      <br>
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
               <div class="actions">
                <a href="update_status.php" class="btn-get-started" id="btn-success">UPDATE STATUS</a>
                <a href="logout.php" class="btn-services">LOG OUT</a>
                </div>
              </div>
              </div>
            </div>
          </section>
         </div>
        </nav><br><br><br><br>
        <!------- navigation bar -------->
<!-----------------------แบบฟอร์มรับค่าข้อมูลของคอนเสิร์ต-------------------------->
        <div class="body">
          <div class="layer">
            <div class="container">
            
              <h1 style="color: black">Add New Concert</h2>
              <p style="color: black;">*If there is a new concert. Please fill in information.</p>

              <form  class="container-fluid" method="post" action="add_con_check.php" >

                <div class="form-group">
                  <label for="cname">Name Concert:</label>
                  <input type="text" class="form-control" id="cname" placeholder="Enter name concert" name="conname" required>
                </div>

                 <div class="form-group">
                  <label for="pwd">Link Picture Concert:</label>
                  <input type="text" class="form-control" id="plink" placeholder="Enter link" name="piclink" required>
                </div>

                 <div class="form-group">
                  <label for="pwd">Public Sale:</label>
                  <input type="datetime-local"  class="form-control" id="pSale" placeholder="Enter date" name="reservecon" required>
                </div>

                  <div class="form-group">
                   <label for="pwd">Show Date:</label>
                   <input type="datetime-local"  class="form-control" id="pSale" placeholder="Enter date" name="showcon" required>
                  </div>

                  <label for="pwd">Location:</label>
                  <div class="container-fluid">
                    <div class="row " >
<!-------------------วนลูปเพื่อแสดงชื่อสถานที่----------------------->
 <?php while($location=mysqli_fetch_array($result)){?>
                      <div class="d-flex p-3 bg-white text-white"> 
                         <input type="hidden" id="location_id" name="location_id">
                         <input type="hidden" id="location_name" name="location_name">
<!---------------------เมื่อกดปุ่มจะส่งค่าไอดีของlocationไปที่ฟังก์ชันsetLocation--------------------------->
                        <button id="<?php echo $location['id'];?>"  type="submit" onClick="setLocation(this.value);" value="<?php echo $location['id'];?>" class="button " style="width:500px; height:50px"><?php echo $location['location_name'];?></button>
                      </div>
<?php } ?>
                    </div>
                </div>
                  
              </form>
            </div>
          </div>
        </div>
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