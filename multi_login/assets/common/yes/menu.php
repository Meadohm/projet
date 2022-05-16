    <!----------------------------------------- debut de la barre de navigation ----------------------------------------->

    <nav class="ma-navbar sticky  navbar  w-100">

            <div class="container-fluid"> 

                <!-- Menu -->

                <ul class="menu">

                    <li class="menu-item">
                        <a class="" href="home.php"><i class="fas fa-home" 
                            style="font-size: 24px;" aria-hidden="true"></i>
                                Accueil
                        </a>
                    </li>

                    <li class="user-icon menu-item">

                    <span> Bienvenue :</span>

                    <div class="chip">
                    <img src="images/img_avatar.png" alt="photo de profile" >
                    <?php echo ucwords($_SESSION['Nom_Us'])?>
                    </div>

                    </li>

                    <li class="menu-item">
                        <a href="home_mes_rdv/home_rdv.php"><i class="fas fa-calendar-alt" 
                        style="font-size:24px;" aria-hidden="true"></i>&nbsp;&nbsp;
                            Mes rendez-vous</a>
                    </li>

                    <li class="menu-item">
                        
                        <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-gear" style="font-size:24px"></i>&nbsp;
                            Compte</a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a class="dropdown-item" href="../forms/login_system/home_profil.php">
                                    Mes informations</a></li> ../forms/login_system/home_profil.php--> 

                                <li><a class="dropdown-item" href="profil/home_inform_profil.php">
                                <i class='far fa-id-card' style='font-size:15px'></i>
                                    Mes informations</a></li>
                                <li><a class="dropdown-item" href="profil_update_pwd/home_update_pwd.php">
                                <i class='fas fa-key' style='font-size:15px'></i>
                                    Modifier le mot de passe</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Reporter le rendez-vous</a></li> -->
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../index.php">
                                <i class='fas fa-caret-left' style='font-size:15px'></i>
                                    -------- Quitter --------</a>
                                </li>
                            </ul>
                    </li>

                    <li class="menu-item">
                        <a href="home_contact/home_contact.php"><i class="fas fa-phone" 
                        style="font-size:24px;" aria-hidden="true"></i>&nbsp;&nbsp;
                            Contact</a>
                    </li>



                 
             </ul>


                <li class="deconx menu-item">

                <a href="#" id="login-btn">
                     <i class='fas fa-sign-out-alt'></i>&nbsp;
                        Déconnexion</a>
                    
                </li>
             
            </div>
        </nav>


        

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
            onclick=window.location.href="../forms/login_system/logout.php"; class="btn">
            <!-- <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have and account? <a href="#">register now</a></p> -->
    </fieldset>
</form>

</div>