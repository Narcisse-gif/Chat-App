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
        if(isset($_POST['button_inscription'])){
            include "connexion_bdd.php";
            extract($_POST);

            if(isset($email) && isset($ndp1) && $email != "" && $ndp1 != "" && isset($ndp2) && $ndp2 != ""){
                if($ndp2 != $ndp1){
                    $error = "Passwords are different !";
                }else{
                    $req = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
                    if(mysqli_num_rows($req) == 0){
                        $req = mysqli_query($con, "INSERT INTO users VALUES (NULL, '$email', '$ndp1') ");
                        if($req){
                            $_SESSION['message'] = "<p class='message_inscription'>Your account has been created successfully !<p>";
                            header("location:index.php");
                        }else{
                            $error = "Inscription failed !";
                        }
                    }else{
                        $error ="This email already exists !";
                    }
                }
            }else{
                $error = "Fields require";
            }
        }
    ?>
    
    <form action="" method="POST" class="form_connexion_inscription">
        <h1>INSCRIPTION</h1>
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
        <input type="password" name="ndp1" class="ndp1">
        <label>Password Confirmation</label>
        <input type="password" name="ndp2" class="ndp2">
        <input type="submit" value="Inscription" name="button_inscription">
        <p class="link">Have you an account ? <a href="index.php">Connect</a></p>
    </form>

    <script src="script.js"></script>

</body>
</html>