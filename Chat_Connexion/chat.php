<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location: index.php");
    }
    $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user?> | Chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="chat">
        <div class="button_email">
            <span><?= $user?></span>
            <a href="deconnexion.php" class="Deconnexion_btn">Deconnexion</a>
        </div>
        <div class="messages_box">Loading......</div>

        <?php
            if(isset($_POST['send'])){
                $message = $_POST['message'];

                include("connexion_bdd.php");
                if(isset($message) && $message != ""){
                    $req = mysqli_query($con, "INSERT INTO messages VALUES (NULL, '$user', '$message', NOW())");
                    header("location: chat.php");
                }else{
                    header("location: chat.php");
                }
            }
        ?>

        <form action="" class="send_message" method="POST">
            <textarea name="message" cols="30" rows="2" id="" placeholder="Your message"></textarea>
            <input type="submit" value="Send" name="send">
        </form>
    </div>

            <script>
                var message_box =document.querySelector('.messages_box');
                setInterval(function(){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200)[
                            message_box.innerHTML = this.responseText
                        ]
                    };
                    xhttp.open("GET", "messages.php", true);
                    xhttp.send()
                }, 500)
            </script>

</body>
</html>