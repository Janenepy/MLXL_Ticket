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
<link rel="stylesheet" type="text/css" href="registercss.css">
<!--title icon-->
<link rel="icon" type="image/png" href="icon/MLXL ICON.png"/>
<title></title>
</head>
<body>
<?php
    session_start();
    include ("db.php");
    if(isset($_POST['conname'])){
        $_SESSION['conname']=$_POST['conname'];
        $_SESSION['piclink']=$_POST['piclink'];
        $_SESSION['location_id']=$_POST['location_id'];
        $_SESSION['reservecon']=$_POST['reservecon'];
        $_SESSION['showcon']=$_POST['showcon'];
        $_SESSION['location_name']=$_POST['location_name'];
    
       
        $insert_column = "INSERT INTO concert(concert_name, location_id, show_date, reserve_date, pic) VALUES ";

        $query= '(\''.$_SESSION['conname'].'\','.$_SESSION['location_id'].',\''.$_SESSION['showcon'].'\',\''.$_SESSION['reservecon'].'\',\''.$_SESSION['piclink'].'\');';
        $result=mysqli_query($con,  $insert_column.$query);
        if ($result) {
            $new_concert_id = mysqli_insert_id($con);
            $_SESSION['new_concert_id']=$new_concert_id;
            header('Location:add_price.php');
        }
    }
?>
</body>
</html>