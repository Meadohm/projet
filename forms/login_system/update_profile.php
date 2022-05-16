<?php

include 'config.php';

session_start();

?>

<?php

// if (!isset($_SESSION["Code_Us"])) {

//    header("Location: ../../index.php");
//   }
  

$Code_Us = $_SESSION["Code_Us"];
         
  

?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mon profil</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css-profile/style_profile.css">

                   <!-- lien cdnjs -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

</head>
<body>
   
<div class="inform-profile">

   <?php

      $select = mysqli_query($conn, "SELECT * FROM `usager` WHERE CodeUs = '$Code_Us'") 

            or die('La requête a échoué');

      if(mysqli_num_rows($select) > 0){

         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      
      <label>
      <i class="fas fa-info-circle" style='font-size:18px;color:#317AC1'></i>&nbsp;&nbsp;
         Informations personnelles
      </label><br/><br/>


      <div class="flex">

         <div class="inputBox">
            <span>Votre Nom :</span>
            <input type="text" name="update_name" 
            value="<?php echo ucwords($fetch['NomUs']); ?>" class="box" disabled />

            <span>Votre Prénom :</span>
            <input type="text" name="update_pren" 
            value="<?php echo ucwords($fetch['PrenUs']); ?>" class="box" disabled />

            <span>Votre adresse e-mail :</span>
            <input type="email" name="update_email" 
            value="<?php echo $fetch['EmailUs']; ?>" class="box" disabled />

            <span>Numéro de téléphone :</span>
            <input type="tel" name="update_tel" 
            value="<?php echo $fetch['TelUs']; ?>" class="box" disabled/>

            <span>Date de création du compte :</span>
            <input type="text" name="update_dat" 
            value="<?php echo $fetch['Date_Inscription']; ?>" class="box" disabled /><br /><br />

            <!-- <span> 

               <label class="ast">*</label> 
               <label id="nonModifiable">Ces champs sont pas modifiables.</label>
            
            </span> -->

            <a class="btn" href="../../multi_login/home.php">Ok</a>
         </div>

      

   </form>

   

</div>




   <SCRIPT LANGUAGE="JavaScript">
        history.forward()
    </SCRIPT>

</body>
</html>