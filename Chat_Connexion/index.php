<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
        if(isset($_POST['button_con'])){
            include "connexion_bdd.php";
            extract($_POST);

            if(isset($email) && isset($ndp1) && $email != "" && $ndp1 != ""){
                $req = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND ndp = '$ndp1'");
                if(mysqli_num_rows($req) > 0){

                    $_SESSION['user'] = $email;
                    header("location:chat.php");
                    unset($_SESSION['message']);

                }else{
                    $error = "Incorrect email or password !";
                }
            }else{
                $error = "Fields require";
            }
        }
    ?>
    <form action="" method= "POST" class="form_connexion_inscription">
        <h1>CONNEXION</h1>
        <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];

            }
        ?>
        <p class="message_error">
            <?php
                if(isset($error)){
                    echo $error;
                }
            ?>
        </p>
        <label>Mail Address</label>
        <input type="email" name="email">
        <label>Password</label>
        <input type="password" name="ndp1">
        <input type="submit" value="Connexion" name="button_con">
        <p class="link">Haven't you an account ? <a href="inscription.php">Create one</a></p>
    </form>

</body>
</html>