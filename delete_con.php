<?php
    session_start();
    include ("db.php");
    
    $query_concert="DELETE FROM concert WHERE id = ".$_POST['concert_id'].";";
    $query_concert_info="DELETE FROM concert_info WHERE concert_id = ".$_POST['concert_id'].";";
    $query_orders="DELETE FROM orders WHERE concert_id = ".$_POST['concert_id'].";";
    echo $query_concert;
    echo $query_concert_info;
    echo $query_orders;

    $result_orders=mysqli_query($con,  $query_orders);
    $result_concert_info=mysqli_query($con,  $query_concert_info);
    $result_concert=mysqli_query($con,  $query_concert);
 //เช็คว่าได้ลบข้อมูลมั้ย   
    if($result_concert_info || $result_concert || $result_orders){
        header('Location:template_mainadmin.php');
    }
?>