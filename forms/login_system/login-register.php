<?php

include 'config.php';

// Fonction pour démarrer ou Initialiser la session
session_start();

// Désactiver le rapport d'erreurs
 error_reporting(0);

 // Vérifier que le codeUs de session existe ou non
   if (isset($_SESSION["Code_Us"])) {

     header("Location: ../../bienvenu.php");
     
    }

        /* récupérer les données du formulaire en utilisant 
          la valeur des attributs name comme clé*/
    if (isset($_POST["signup"])) {
      
       /*on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
            pour éliminer toute attaque de type injection SQL et XSS*/

      $NomUs = mysqli_real_escape_string($conn, htmlspecialchars($_POST["signup_NomUs"]));
      $PrenUs = mysqli_real_escape_string($conn,  htmlspecialchars($_POST["signup_PrenUs"]));
      $EmailUs = mysqli_real_escape_string($conn,  htmlspecialchars($_POST["signup_EmailUs"]));
      $TelUs = mysqli_real_escape_string($conn,  htmlspecialchars($_POST["signup_TelUs"]));
      $MdpUs = mysqli_real_escape_string($conn, md5(htmlspecialchars($_POST["signup_MdpUs"])));
      $cMdpUs = mysqli_real_escape_string($conn, md5(htmlspecialchars($_POST["signup_cMdpUs"])));

      $check_EmailUs = mysqli_num_rows(mysqli_query($conn, "SELECT EmailUs FROM usager WHERE EmailUs='$EmailUs'"));

          if ($MdpUs !== $cMdpUs) {

                // echo '<script>
                //         alert("Les mots de passe sont incorrectes.");
                //       </script>';

                $erropwdEmail[]  = 'Les mots de passe sont incorrectes. !';

                      $_POST["signup_NomUs"] = $NomUs;
                      $_POST["signup_PrenUs"] = $PrenUs;
                      $_POST["signup_EmailUs"] = $EmailUs;
                      $_POST["signup_TelUs"] = $TelUs;
                      // $_POST["signup_MdpUs"] = "";
                      // $_POST["signup_cMdpUs"] = "";

          } 

               

            elseif ($check_EmailUs > 0) {

                $erropwdEmail[] = 'Cette adresse e-mail est déjà utilisée. !';

                      // echo '<script>
                      //       alert("Cette adresse e-mail est déjà utilisée");
                      //       </script>';
                  } 
                  else{
                          $sql = "INSERT INTO usager (NomUs, PrenUs, EmailUs, TelUs, MdpUs )
                                  VALUES('$NomUs', '$PrenUs', '$EmailUs', '$TelUs', '$MdpUs')";

                                  $result = mysqli_query($conn, $sql);

                                  if ($result) {

                                    $_POST["signup_NomUs"] = "";
                                    $_POST["signup_PrenUs"] = "";
                                    $_POST["signup_EmailUs"] = "";
                                    $_POST["signup_TelUs"] = "";
                                    $_POST["signup_MdpUs"] = "";
                                    $_POST["signup_cMdpUs"] = "";
                                    
                                    $message[] = 'Vous êtes inscrit avec succès. !';
                                   
                                  }
                                  else{

                                    $message[] = 'Echec d\'enregistrement. !';

                                  }
                          
                  }
      
    }

    

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

              <!-- fichier css -->
  <link rel="stylesheet" href="assets/style.css" />

                   <!-- Lien du cdn font awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>



  <title>Formulaire de connexion et d'inscription - Rendez-vous-DGBF</title>

</head>

<body>

<header>

<nav class=" navImage navbar position-fixed d-flex">
     
     <div class="container-fluid">
         <div class="row"> 
              <img src="img/banier0.jpeg" align="" 
              alt="DGBF" width="1360px" height="100px" />
         </div>
     </div> 

 </nav>

    <ul class="breadcrumb">
      <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../../index.php">Index</a></li>
      <li style="color:#fa9805;">Inscription & Connexion</li>
    </ul>
    
</header>


  

<div class="container">

    <div class="forms-container">

      <div class="signin-signup">

                                      <!-- CONNECTION  -->

          <form action="" method="post" class="sign-in-form"  enctype="multipart/form-data">

          <?php

                          if(isset($erropwdEmail)){

                            foreach($erropwdEmail as $error){

                                echo "<div class='erropwdEmail'>$error<br/>
                                      <i class='erroIcon fas fa-hand-point-left'></i>
                                      veuillez réessayer. 
                                        </div><br/>";

                                        
                            }
                          }
            ?>


              <?php

                    if(isset($message)){

                      foreach($message as $message){

                          echo "<div class='message'>$message<br/>
                                Connectez-vous pour continuer 
                                <i class='connectIcon far fa-hand-point-down'></i>
                                  </div><br/>";
                      }
                    }
              ?>

              <h2 class="title">S'identifier</h2>

      <!------------------------------------------ SE CONNECTER --------------------------------------------->
<?php
                      // Vérifier si le formulaire est soumis c-a-d si l'utilisateur clique
                      
          if (isset($_POST["signin"])) {

            $EmailUs  = mysqli_real_escape_string($conn, $_POST["eMail"]);
            $MdpUs = mysqli_real_escape_string($conn, md5($_POST["Mdpass"]));
    
            $check_EmailUs = mysqli_query($conn, "SELECT * FROM usager 
                                            WHERE EmailUs ='$EmailUs' AND MdpUs ='$MdpUs'");
            
                        if (mysqli_num_rows($check_EmailUs) > 0) {
          
                            $row = mysqli_fetch_assoc($check_EmailUs);

                          if($row['CodeTypeUs']==1){

                            $_SESSION["Code_Us"] = $row['CodeUs'];
                            $_SESSION["Nom_Us"] = $row['NomUs'];
                            $_SESSION["Pren_Us"] = $row['PrenUs'];
                            $_SESSION["CodeType_Us"] = $row['CodeTypeUs'];
            
            
                            header("Location: ../../multi_login/admin/home_admin.php");

                          }

                          else{

                            $_SESSION["Code_Us"] = $row['CodeUs'];
                            $_SESSION["Nom_Us"] = $row['NomUs'];
                            $_SESSION["Pren_Us"] = $row['PrenUs'];
            
            
                            header("Location: ../../bienvenu.php");

                          }
                         
                          
                        }

                          else {
                          
                            echo ("<i class='fas fa-exclamation-triangle' style='font-size:30px;color:red'></i>
                                    <p class='h5'>&nbsp;&nbsp;
                                      Email ou mot de passe incorrect !&nbsp;&nbsp;<br/> 
                                      Veuillez réessayer.
                                    </p>");     
                                      
                                }
          }


?>

              <div class="input-field">
                          <i class="fas fa-envelope"></i>

                          <input type="text" placeholder="Adresse e-mail" name="eMail"
                          value="<?php echo $_POST['eMail']; ?>" autofocus required  />
                </div>
                        
                      <div class="input-field input-field3">
                      <i class="fas fa-lock"></i> <!-- <i class="fa fa-key fa-fw"></i>  -->

                          <input type="password"  placeholder="Mot de passe" name="Mdpass" 
                          value="<?php echo $_POST['Mdpass']; ?>" required />

                          <label class="fas fa-eye"></label>
                      </div>

                          <input type="submit" value="Connexion" name="signin" class="btn solid" />

                          <p style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
                          <a href="password_reset/forgot_password.html" style="color: #fa9805;">
                          J'ai oublié mon mot de passe</a>&nbsp;<i class='fas fa-exclamation' style='font-size:18px;color:#fa9805;'></i>
                        </p>

                  </form>

                                                <!-- INSCRIPTION  -->

                  <form action="" class="sign-up-form" method="post">

                    <h2 class="title">S'inscrire</h2>
                  
                    <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Nom" name="signup_NomUs" 
                      value="<?php echo $_POST["signup_NomUs"]; ?>" autofocus required />
                    </div>

                    <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Prénom" name="signup_PrenUs" 
                      value="<?php echo $_POST["signup_PrenUs"]; ?>" required />
                    </div>
                  
                    <div class="input-field">
                      <i class="email_erro fas fa-envelope"></i>
                      <input type="email" placeholder="Adresse e-mail" name="signup_EmailUs"
                      pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  
                      value="<?php echo $_POST["signup_EmailUs"]; ?>" />  <!-- required -->
                    </div>

                    <div class="input-field">
                      <i class="fas fa-phone"></i>
                      <input type="tel" placeholder="Téléphone (ex: +225 0779279818)"  
                      pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" 
                      name="signup_TelUs" title="Doit contenir au moins 9 chiffre sans aucun caractere ni de lettre dedans"
                      value="<?php echo $_POST["signup_TelUs"]; ?>" required />
                    </div>

                    <div class="input-field input-field1">
                    <i class="fas fa-lock"></i>
                      <input type="password" placeholder="Mot de passe" name="signup_MdpUs"
                      value="<?php echo $_POST["signup_MdpUs"]; ?>" required />

                        <label class="fas fa-eye"></label>
                    </div>

                    <div class="input-field input-field2">
                    <i class="fas fa-lock"></i>
                      <input type="password" placeholder="Confirmez le mot de passe" name="signup_cMdpUs" 
                      value="<?php echo $_POST["signup_cMdpUs"]; ?>" required />

                        <label class="fas fa-eye"></label>
                    </div>

                    <input type="submit" class="btn" name="signup" value="S'inscrire maintenant !" />

                  </form>

                  <!-- <button  class="btn-retour"  onclick="document.location='../../index.php'">Retour à la page Index</button> -->
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Vous êtes nouveau ici ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
          S'inscrire
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Avez-vous un compte ? </h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
          S'identifier
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div> 
    </div>

  </div>
















  




                  <!-- code kit fontawesome -->
<!-- <script src="https://kit.fontawesome.com/bc79c740e1.js" crossorigin="anonymous"></script> -->

      <script src="assets/app.js"></script>

</body>
</html>