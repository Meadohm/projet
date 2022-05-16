<?php

include 'config.php';

session_start();

$Code_Us = $_SESSION["Code_Us"];

// if(!isset($Code_Us)){

//    header('location: login-register.php');
// };

if(isset($_GET['logout'])){

   unset($Code_Us);

   session_destroy();

   header('location: login-register.php');
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profil</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css-profile/style_profile.css">

                    <!-- lien cdnjs -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

</head>
<body>
   
<div class="container">

   <div class="profile">

      <?php

          $select = mysqli_query($conn, "SELECT * FROM `usager` WHERE CodeUs = '$Code_Us'") 

             or die('La requête a échoué');

          if(mysqli_num_rows($select) > 0){

             $fetch = mysqli_fetch_assoc($select);
          }

        
      ?>

      <h3 style="text-transform:uppercase">

      <span class="nomutilisateur">hello !</span>&nbsp;&nbsp;&nbsp;
      <?php echo strtoupper($fetch['NomUs'])?>&nbsp;&nbsp;&nbsp;&nbsp;
      <i class='fas fa-hand-sparkles' style='font-size:18px;color:#00A0B0'></i>

     </h3><br/>

     <!-- <p>Que voulez-vous faire ? </p><br/> -->

      <a href="update_profile.php" class="btn">
      <i class='fas fa-address-card' style='font-size:20px;color:#fff'></i>&nbsp;&nbsp; 
            Votre profil</a>
      <a href="../../multi_login/home.php" class="btn-m">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <i class='fas fa-undo-alt' style='font-size:20px;color:#fff'></i>&nbsp;&nbsp; Retour</a>
      <a href="home_profil.php?logout=<?php echo $Code_Us; ?>" class="delete-btn">
      <i class='fas fa-sign-out-alt' style='font-size:20px;color:#fff'></i>&nbsp;&nbsp;
            Déconnectez-vous &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </a><br/><br/><br/>
      
         <p style="font-size:15px; text-transform:uppercase; color:green;">
         Direction générale du budget et des finances</p>

         <p style="font-size:14px; text-transform:capitalize; color:orange;">
         ministère du Budget et du Portefeuille de l'Etat</p> 
      
   </div>
         
</div>


   

</body>
</html>