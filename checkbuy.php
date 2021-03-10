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
<link rel="stylesheet" type="text/css" href="css/registercss.css">
<link rel="stylesheet" type="text/css" href="css/footercss.css">
<!--title icon-->
<link rel="icon" type="image/png" href="icon/MLXL ICON.png"/>
<title>Checkbill</title>
</head>
<body>
<?php
        session_start();
        include ("db.php");
       // echo $_POST['zone'];
       // echo $_POST['price'];
       // echo $_POST['numberOfSeat'];
       // echo $_SESSION['concert_id'];
        if(isset($_POST['zone'])){
            $_SESSION['zone']=$_POST['zone'];
            $_SESSION['price']=$_POST['price'];
            $_SESSION['numberOfSeat']=$_POST['numberOfSeat'];
           
            $query_price = "SELECT PRICE, SEAT_AVALIABLE
                                   FROM CONCERT_INFO 
                                   WHERE CONCERT_ID = " .$_SESSION['concert_id'] ." AND ZONE_ID = " .$_SESSION['zone'] ;

            echo $query_price;
            $result_price = mysqli_query($con, $query_price);
            $concert_price = mysqli_fetch_array($result_price);
//จำนวนเงินรวมในการจองบัตร
            $total_price = $concert_price['PRICE'] * $_SESSION['numberOfSeat'];
            $_SESSION['total_price']=$total_price;
//จำนวนที่นั่งที่เหลือ
            $seat_avariable = $concert_price['SEAT_AVALIABLE'] - $_SESSION['numberOfSeat'];

//update จำนวนที่นั่งที่เหลือล่าสุด
            $query_update ="UPDATE CONCERT_INFO SET SEAT_AVALIABLE =".$seat_avariable." WHERE CONCERT_ID=".$_SESSION['concert_id']." AND ZONE_ID=".$_SESSION['zone'];
            $result_update = mysqli_query($con, $query_update);
         
//insertข้อมูลการสั่งซื้อ            
            $query = "INSERT INTO orders(concert_id,users_id,zone_id,orders_qty,total_price,status_id)  
                         VALUES (".$_SESSION['concert_id'].",".$_SESSION['userid'].",".$_SESSION['zone'].",".$_SESSION['numberOfSeat'].",".$total_price.",1)";
           // echo $query;
            $result = mysqli_query($con, $query);
			if($result){
                $_SESSION['successfully'] = "successfully";
//เอาค่าไอดีที่บันทึกล่าสุด
                $order_id = mysqli_insert_id($con);
                $_SESSION['order_id']=$order_id;
                if(isset($_SESSION['order_id'])){
                   header("Location:template_bill.php");
                }
            }
        
        }

?>

    <!-- #footer -->
    <footer>
        <p>&copy; Copyright <strong>MLXL Ticket</strong>. 
            2019 Designed by <font color="#03C4EB">MLXL</font>
            <br>Jedsadaporn Puttakosai 61102010139  |  Narissa Darawankul 61102010142  
            |  Piyathida Thainguan 61102010153</p>
        <p>Contact information: <a href="mailto:MLXLTICKET@example.com">MLXLTICKET@example.com</a></p>
    </footer>
    <!-- #footer -->
  
</body>
</html>