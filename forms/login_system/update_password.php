<?php

include 'config.php';

session_start();

// error_reporting(0);

// if (!isset($_SESSION["Code_Us"])) {

//    header("Location: ../../index.php");
//   }
  

$Code_Us = $_SESSION["Code_Us"];

// $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
// $update_pren = mysqli_real_escape_string($conn, $_POST['update_pren']);
// $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
// $update_tel = mysqli_real_escape_string($conn, $_POST['update_tel']);



// mysqli_query($conn, "UPDATE `usager` SET NomUs = '$update_name', PrenUs = '$update_pren',
// EmailUs = '$update_email', TelUs = '$update_tel' WHERE CodeUs = '$Code_Us'") 
// $affich = mysqli_query($conn, "SELECT NomUs, PrenUs, Email, Tel FROM `usager` WHERE CodeUs = '$Code_Us'")
// or die('La requête a échoué');

if(isset($_POST['update_profile'])){


   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){

      if($update_pass != $old_pass){

         $message[] = 'L\'ancien mot de passe ne correspond pas !';

      }
      elseif($new_pass != $confirm_pass){

         $message[] = 'Confirmer que le mot de passe ne correspond pas !';

      }
      else{
                 mysqli_query($conn, "UPDATE `usager` SET MdpUs = '$confirm_pass' 
                                                      WHERE CodeUs = '$Code_Us'") 
         
               or die('La requête a échoué');

               $message[] = 'Mot de passe mis à jour avec succès !';
      }
   }


}


?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mise à jour du profil</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css-profile/style_profile.css">

                   <!-- lien cdnjs -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

</head>
<body>
   
<div class="update-profile">

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

      <?php

               if(isset($message)){

                  foreach($message as $message){

                     echo '<div class="message">'.$message.'</div>';
                  }
            }
      ?>

      <div class="flex">
         <div class="inputBox">
            <span>Nom<label class="ast">*</label> :</span>
            <input type="text" name="update_name" 
            value="<?php echo ucwords($fetch['NomUs']); ?>" class="box" disabled />

            <span>Prénom<label class="ast">*</label> :</span>
            <input type="text" name="update_pren" 
            value="<?php echo ucwords($fetch['PrenUs']); ?>" class="box" disabled />

            <span>Votre adresse e-mail<label class="ast">*</label> :</span>
            <input type="email" name="update_email" 
            value="<?php echo $fetch['EmailUs']; ?>" class="box" disabled />

            

            <span>Date de création du compte<label class="ast">*</label> :</span>
            <input type="text" name="update_dat" 
            value="<?php echo $fetch['Date_Inscription']; ?>" class="box" disabled /><br /><br />

            <span> 

               <label class="ast">*</label> 
               <label id="nonModifiable">Ces champs sont pas modifiables.</label>
            
            </span>

         </div>
         

         <div class="inputBox">

            <input type="hidden" name="old_pass" value="<?php echo $fetch['MdpUs']; ?>">

            <span>Modifier votre mot de passe : <i class='far fa-hand-point-down' style='font-size:20px;color:red'></i></span>
            <input type="password" name="update_pass" placeholder="Entrer l'ancien passe" class="box">

            <span>Nouveau mot de passe :</span>
            <input type="password" name="new_pass" placeholder="Entrez un nouveau mot de passe" class="box">

            <span>Confirmez le mot de passe :</span>
            <input type="password" name="confirm_pass" placeholder="Confirmer le nouveau mot de passe" class="box"><br/>

            <span>Numéro de téléphone<label class="ast">*</label> :</span>
            <input type="tel" name="update_tel" 
            value="<?php echo $fetch['TelUs']; ?>" class="box" disabled/>
         </div>
      </div>

      <input type="submit" value="Modifier" name="update_profile" class="btn">

      <a href="../../multi_login/home.php" class="delete-btn">Ignorer</a>

      

   </form>

   

</div>




   <SCRIPT LANGUAGE="JavaScript">
        history.forward()
    </SCRIPT>

</body>
</html>