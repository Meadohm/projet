    <!----------------------------------------- debut de la barre de navigation ----------------------------------------->

    <nav class="ma-navbar sticky  navbar  w-100">

            <div class="container-fluid"> 

                <!-- Menu -->

                <ul class="menu">

                    <li class="menu-item">
                    <a href="../home_admin.php"><i class="fas fa-home" 
                        style="font-size: 24px;" aria-hidden="true"></i>
                        Accueil</a>
                    </li>

                    <li class=" user-icon menu-item">
                  
                    <span> Bienvenue :</span>
                    
                    <div class="chip">
                    <img src="../images/img_avatar.png" alt="photo de profile" >
                    <?php echo ucwords($_SESSION['Nom_Us'].' '.$_SESSION['Pren_Us'])?>
                    </div>

                    </li>

                  

                    <li class="menu-item">
                        
                        <a  class="active nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-gear" style="font-size:24px"></i>&nbsp;
                        <strong>Compte</strong></a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../profil/home_inform_profil.php">
                                <i class='far fa-id-card' style='font-size:15px'></i>
                                    Mes informations</a></li>
                                <li><a class="dropdown-item" href="../profil_update_pwd/home_update_pwd.php">
                                <i class='fas fa-key' style='font-size:15px'></i>
                                    Modifier le mot de passe</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Reporter le rendez-vous</a></li> -->
                                <li><hr class="dropdown-divider"></li>
                               
                                </li>
                            </ul>
                    </li>

                   



                 
             </ul>

             <ul>
                <li class="deconx menu-item">

                <a href="#" id="login-btn">
                     <i class='fas fa-sign-out-alt'></i>&nbsp;
                        Déconnexion</a>
                    
                </li>
                </ul>
         
            </div>


        </nav>



    <ul class="breadcrumb">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li style="color:rgb(39, 221, 121);">Compte</li>

      <li style="color:#fa9805;">Mes informations</li>
    </ul>





        

        <!-- formualire de deconnection  -->

<div class="login-form-container">

<i class="fas fa-times" id="form-close" title="Annuler"></i>

<form action="" method="POST">

    <fieldset>
        <legend>
            <strong><i class='me-2 far fa-bell fa-shake' style='font-size:24px;color:#E1A624;'></i> Message de confirmation</strong>
        </legend> <!-- <i class="fa-solid fa-bell fa-shake"></i> -->
            <h3>M/Mme <span><?php echo ucwords($_SESSION['Pren_Us']." ".$_SESSION['Nom_Us'])?><span></h3>
            <h4>Vous souhaitez quitter votre session ?</h4>

            <!-- <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password"> -->

            
            <input type="button" value="Oui je me deconnecte maintenant !" 
            onclick=window.location.href="../../logout.php"; class="btn">
            <!-- <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have and account? <a href="#">register now</a></p> -->
    </fieldset>
</form>

</div>