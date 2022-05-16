<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

                           <!-- Lien du cdn font awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

    <title>lien envoyé</title>

    <style type="text/css">

        body{

            background-color: #C9E3CC;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 20px;
            
        }

        h4{
            font-family:  monospace, Courier New;
            color: black;
            font-size: 20px;
            font-weight: 500;
        }

        .button{

            font-size: 25px;
            font-weight: 500;

        }

        span{

            color: red;
            font-weight: 800;
        }

    </style>
</head>
<body>
    

 <?php

// error_reporting(0);

    if(isset($_POST['reset'])) {

        $email = $_POST['email'];
    }
    else {
        exit();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'mail/Exception.php';
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    
    // Instantiation and passing `true` enables exceptions

    $mail = new PHPMailer(true);
    
    try {

        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'fofanamohamed7927@gmail.com';                     // SMTP username
        $mail->Password   = 'sergio1250';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //'ssl'        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;      //465                              // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Destinataire
        $mail->setFrom('fofanamohamed7927@gmail.com', 'Admin');
        $mail->addAddress($email);     // Add a recipient

        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Réinitialisation du mot de passe';
        $mail->Body    = 'Pour réinitialiser votre mot de passe,
        <a href="http://rdv-dgbf.dti.ci/forms/login_system/password_reset/change_password.php?code='.$code.'"> 
        cliquez ici</a>.<br/> Vous disposez de 24h pour réinitialiser votre mot de passe.';


        $conn = new mySqli('localhost', 'root', 'MySQL8@root', 'dgbf');


        if($conn->connect_error) {

            die('Impossible de se connecter à la base de données');
        }

        $verif_requet = $conn->query("SELECT * FROM usager WHERE EmailUs = '$email'");

        if($verif_requet ->num_rows) {

            $code_request = $conn->query("UPDATE usager SET code = '$code' WHERE EmailUs = '$email'");
                
            $mail->send();

            echo '<h3 style="color:green; font-size:36px;"><strong>
                    Message envoyé <i class="fa fa-check" style="font-size:20px;color:green"></i>
                  </strong></h3>
            
                   <h4>Vous avez reçu un lien de réinitialisation, vérifiez votre messagerie <i class="envelopicone fas fa-envelope" style="font-size:28px;color:white"></i><br/><br/><br/>
                  Si le message n\'apparait pas dans votre boîte de réception, vérifiez le Spam !
            
                 </h4>';
        }   
            else {
                echo '<br/><br/> <h3 style="color:#BB2D0C; font-size:30px;">
                
                    <strong>ATTENTION !!</strong><h3><br/><br/>
                    
                    <h4 style="font-size:20px;">L\'adresse&nbsp;&nbsp; \'<span>' .$_POST['email']. '</span>\' 
                    &nbsp; n\'existe pas dans notre base de données.<br/><br/><br/>


                     Veuillez vérifier correctement.<h4><br/><br/>

                    <a href="forgot_password.html" class="button">Réessayer</a>';

            }
        $conn->close();
    
    } catch (Exception $e) {
        
        echo "Le message n'a pas pu être envoyé. Erreur de messagerie: {$mail->ErrorInfo}";
    }    
?>


</body>
</html>