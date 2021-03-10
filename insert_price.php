<?php
    session_start();
    include ("db.php");

    $zone_id = $_POST['zone_id'];
    $zone_name = $_POST['zone_name'];
    $zone_price = $_POST['zone_price'];
    $zone_qty = $_POST['zone_qty'];
    $concert_id = $_SESSION['new_concert_id'];

    echo "new con". $concert_id;
    $insert_column = 'INSERT INTO concert_info( concert_id, zone_id, seat_avaliable, price) VALUES ';
//วนลูปเอาข้อมูลที่เก็บเป็นarrayออกมาแล้insertทีละโซน
    for ($i=0;$i<count($zone_id);$i++){
      /*   echo  $zone_id[$i] . "<br>";
        echo  $zone_name[$i] . "<br>";
        echo  $zone_price[$i] . "<br>";
        echo  $zone_qty[$i] . "<br>"; */
        $data_insert = '('.$concert_id.','.$zone_id[$i].','.$zone_qty[$i].','.$zone_price[$i].');';
        $result=mysqli_query($con,  $insert_column.$data_insert);
    }
    if ($result) {
        header('Location:template_mainadmin.php');
    }
    
?>