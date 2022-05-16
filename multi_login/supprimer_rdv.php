<?php
    if (isset($_GET["idSup"]))
    {
        $code_user = $_GET["idSup"];

        if(!empty($code_user) && is_numeric($code_user))
        {
            include('config.php');


            $supprime = $supp_query=mysqli_query($conn,"DELETE FROM rendez_vous WHERE NumRdv='$code_user'")
                                                        or die(mysqli_error($conn));

            

            header('Location: home_mes_rdv/home_rdv.php');
        }

    }
    ?>