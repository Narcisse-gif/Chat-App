<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location: index.php");
    }
    session_destroy();
    header("Location: index.php");
?>