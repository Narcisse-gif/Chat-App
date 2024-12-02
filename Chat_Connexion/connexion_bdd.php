<?php
    $con = mysqli_connect("localhost", "root", "", "chat_connexion");
    $req = mysqli_query($con, "SET NAMES UTF8");
    if(!$con){
        echo "Connexion failed";
    }
?>