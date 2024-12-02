<?php
    session_start();
    if(isset($_SESSION['user'])){
        include "connexion_bdd.php";

        $req = mysqli_query($con, "SELECT * FROM messages ORDER BY id_m DESC");
        if(mysqli_num_rows($req) == 0){
            echo "Empty mail box";
        }else{
            while($row= mysqli_fetch_assoc($req)){
                if($row['email'] == $_SESSION['user']){
                    ?>
                        <div class="message your_message">
                            <span>You</span>
                            <p><?=$row['msg']?></p>
                            <p class="date"><?=$row['date']?></p>
                        </div>
                    <?php
                }else{
                    ?>
                        <div class="message others_message">
                            <span><?=$row['email']?></span>
                            <p><?=$row['msg']?></p>
                            <p class="date"><?=$row['date']?></p>
                        </div>
                    <?php
                }
            }
        }
    }
?>




