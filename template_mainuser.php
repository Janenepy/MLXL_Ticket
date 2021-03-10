<?php 
    session_start();
    if(!$_SESSION['userid']){
        header("Location:template_main.php");
    }else{
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--AJax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--Bootstrap-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/font.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--CSS Link to indexcss.css-->
<link rel="stylesheet" type="text/css" href="css/template_maincss.css"/>
<!--title icon-->
<title>MLXL Ticket</title>
<link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
<script language="javascript">
function sendfunction(id){
      alert(id)
}
</script>

</head>
<body style="background-image: url(https://htmlcolorcodes.com/assets/images/html-color-codes-best-prototyping-tools-hero-67966da8.jpg);">
<!--<script>
  function concert($id){
    alert($id);
    //if(!isset($_SESSION['concert_id'])){
     // $_SESSION['concert_id'] = 1;
}

</script>-->
			
					<!------- navigation bar -------->
          <nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark bg-dark"> <a class="navbar-brand" href="#">MLXL Ticket</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" color="white">Home <span class="sr-only">(current)</span></a> </li>
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
        </nav><br><br><br><br><br><br>
      <!------- navigation bar -------->

<!--concert-->
<div class="container-fluid">
<div class="row" >
<!--------------------วนลูปข้อมูลใน table concert---------------------->
<?php
    include ('db.php') ;
    
    $query = "select concert.id as concert_id, concert_name, location_id, show_date, reserve_date, pic, location_name, location_image
              from concert
              inner join location
              on concert.location_id = location.id
              order by show_date desc";
  //$count = 1;
    if($result = mysqli_query($con,$query)){
     
    while($concert=mysqli_fetch_array($result)){
     
?>
<!-------------------ส่วนแสดงข้อมูลคอนเสิร์ต-------------------------->
<div class="col-sm-3" id="main">
		      <div class="card text-center" id="card">
				  <div clss="card-block" >
				    <img src="<?php echo $concert['pic']?>" alt="" class="img-fluid">
            <div class="card-body">
<?php    
              $showdate = strtotime($concert['show_date']);
			       	$new_showdate = date('d M Y H:i', $showdate);
			    	  $reservedate = strtotime($concert['reserve_date']);
              $new_reservedate = date('d M Y H:i', $reservedate);
?>
              <h5><?php echo $concert['concert_name'] ?></h5>
              <?php echo "Reserve Date:" .$new_reservedate ?><br> 
					    <?php echo "Show Date:" .$new_showdate ?> <br>
              <span> <?php echo $concert['location_name'] ?><br> </span>
            </div>
            <div class="card-footer">
            <?php $value=$concert['concert_id'];?>
            <form method="POST" action="template_buy.php">
               <input type="hidden" value="<?php echo $concert['concert_id']?>" name="concert_id" >
               <input type="hidden" value="<?php echo $concert['location_id']?>" name="location_id" >
               <input type="hidden" value="<?php echo $concert['concert_name']?>" name="concert_name" >
               <input type="hidden" value="<?php echo $concert['pic']?>" name="concert_pic" >
               <input type="hidden" value="<?php echo $concert['show_date']?>" name="show_date" >
               <input type="hidden" value="<?php echo $concert['reserve_date']?>" name="reserve_date" >
               <input type="hidden" value="<?php echo $concert['location_name']?>" name="location_name" >
               <input type="hidden" value="<?php echo $concert['location_image']?>" name="location_image" >
               <button type="submit" class="btn btn-1">Buy</button>
            </form>
            </div>
			     </div>
		     </div>   
         </div>
        
<?php 
        }
      }
    } 
?>  
</div></div><br><br>
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