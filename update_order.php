<?php
        session_start();
        include ("db.php");

        $query_update ="UPDATE ORDERS SET STATUS_ID = ".$_POST['status']." WHERE ID=".$_POST['order_id'];
        $result_update = mysqli_query($con, $query_update);
//เช็คว่าอัพเดทมั้ย
        if($result_update){
            header("Location:update_status.php");
         }
         
?>