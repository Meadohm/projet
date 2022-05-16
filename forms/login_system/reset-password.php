<?php

include 'config.php';

session_start();

if (isset($_SESSION["user_id"])) {
  header("Location: welcome.php");
}

if (isset($_POST["resetPassword"])) {

  $password = mysqli_real_escape_string($conn, md5($_POST["new_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["cnew_password"]));

  if ($password === $cpassword) {

    $sql = "UPDATE users SET password='$password' WHERE token='{$_GET["token"]}'";
    mysqli_query($conn, $sql);

    header("Location: login-register.php");

  }
     else {
         echo "<script>
         
                alert('Le mot de passe ne correspond pas.');
                
                </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Formulaire de connexion et d'inscription - Rendez-vous-DGBF</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          
          <h2 class="title">
            Réinitialiser le mot de passe
          </h2>

          <div class="input-field">
            <i class="fas fa-lock"></i>

            <input type="password" placeholder="Nouveau mot de passe" name="new_password" 
            value="<?php echo $_POST['new_password']; ?>" required />

          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>

            <input type="password" placeholder="Confirmer le nouveau mot de passe" 
            name="cnew_password" value="<?php echo $_POST['cnew_password']; ?>" required />

          </div>

          <input type="submit" value="Réinitialiser le mot de passe" name="resetPassword" class="btn solid" />

        </form>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">

          <h3>Réinitialiser le mot de passe ?</h3>

          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>

        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
    </div>
  </div>
















































  
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="app.js"></script>
</body>

</html>