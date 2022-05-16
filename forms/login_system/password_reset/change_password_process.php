<?php

    if(isset($_GET['code'])) {

        $code = $_GET['code'];

        $conn = new mySqli('localhost', 'root', 'MySQL8@root', 'dgbf');

        if($conn->connect_error) {

            die('Impossible de se connecter à la base de données');
        }


        $verif_requet = $conn->query("SELECT * FROM usager WHERE code = '$code' 
                                        AND updated_time >= NOW() - Interval 1 DAY");

        if($verif_requet->num_rows == 0) {

            header("Location: ../login-register.php");
            exit();
        }

        if(isset($_POST['change'])) {

            $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));

            $new_password = mysqli_real_escape_string($conn, md5(htmlspecialchars($_POST['new_password'])));

            $repet_password = mysqli_real_escape_string($conn, md5( htmlspecialchars($_POST['repet_password'])));

            $check_EmailUs = mysqli_num_rows(mysqli_query($conn, "SELECT EmailUs FROM usager WHERE EmailUs='$email'
            AND code = '$code' AND updated_time >= NOW() - INTERVAL 1 DAY"));

            if ($new_password !== $repet_password) {

                echo '<script>
                        alert("Les mots de passe sont incorrectes.");
                      </script>';
          }

          elseif ($check_EmailUs == 0) {

            echo '<script>

                  alert("L\'adresse saisie est incorrectes.\nVeuillez réessayer.");

                  </script>';
        } 
            else
            {

               $changer_password = $conn->query("UPDATE usager SET MdpUs = '$new_password' WHERE EmailUs = '$email' 
                                                     AND code = '$code' AND updated_time >= NOW() - INTERVAL 1 DAY");

                if($changer_password ) {

                        header("Location: success.html");

                    }

            }

          
        }

        $conn->close();
    }

    else {

        header("Location: ../login-register.php");
        
        exit();
    }
?>
