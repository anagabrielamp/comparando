<?php
    session_start();
    if(isset($_SESSION["username"])){
        header('Location: /comparando/home.php'); 
    } else {
        header('Location: /comparando/login.php'); 
    }
?>