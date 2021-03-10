<?php 
    session_start();

    if(session_destroy()){
        header("Location: template_main.php");
    }
?>