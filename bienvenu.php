<?php

//  include 'forms/config.php';
 session_start();

 error_reporting(0);

if (!isset($_SESSION["Code_Us"])) {

     header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>

                    <!-- lien cdnjs -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

                    
    <link rel="stylesheet" href="assets/css-index/bienvenu.css">
</head>
<body>

 <!------------------------------------------------ debut de la barre de navigation -------------------------------------------------------->
 <header>

 <nav class="navImage"> <!-- d-flex -->
     
    <div class="container-fluid">
        <div class="row"> 
                    <img src="images/banier0.jpeg" align="" alt="DGBF" 
                    width="100%" height="100px" /> <!--  width="1390px" height="70%" -->
                </a>
        </div>
    </div>
            
</nav>

<ul class="breadcrumb">
      <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../../index.php">Index</a></li>

        <li>
        <a href="forms/login_system/login-register.php">Inscription & Connexion</a>
        </li>

      <li style="color:#fa9805;">Bienvenue</li>
    </ul>
    
</header> 

    <section class="bienv">

        <h1>
        <strong>BONJOUR, M/Mme
            <span><?php echo $_SESSION['Pren_Us']." ".$_SESSION['Nom_Us']?>,</strong></span><br /><br />     
        </h1>

        <p>
              <b>bienvenue sur la plateforme de prise de rendez-vous<br>&nbsp;
                de la direction générale du budget et des finances</b> 
        </p>

        <ul>

        <li>
               <a href="forms/login_system/logout.php" class="button">
               <i class='fas fa-angle-double-left' style='color:#fff'></i>&nbsp; Retour 
            </a>
            </li>

           <li>
               <a href="multi_login/home.php" name="continu" class="button">
                Continuer&nbsp;
                <i class='fas fa-arrow-alt-circle-right' style=' color:#fff;'></i>
            </a>
            </li>

        </ul>
        
    </section>


    <SCRIPT LANGUAGE="JavaScript">
        history.forward()
    </SCRIPT>

</body>
</html>