<?php

include '../config.php';

session_start();

error_reporting(0);


?>


<?php

    // Vérifier que le codeUs de session existe ou non
// if (!isset($_SESSION["Code_Us"])) {

//    header("Location: ../../index.php");
//   }
  

$Code_Us = $_SESSION["Code_Us"];
         
  

?>




<!------------------------------------------ ++++++++ ---------------------------------------------->


<?php 

include "image_banniere.php";

include "header.php";

include "menu.php";

?>



<!-+++++++++++++++++++++++++----------------+- debut de section banniere --++++++++++++----------------+++++++>


        
<section class="banner d-flex justify-content-center align-items-center pt-5">
    
<div class="container-fluid">

    <div class="row">

        <div class="col-md-2">

        </div>

            <div class="col-md-8">

                <div class="inform-profile">

                        <?php

                        $select = mysqli_query($conn, "SELECT * FROM `usager` 
                                                  WHERE CodeUs = '$Code_Us'") 
                                               or die('La requête a échoué');

                                    if(mysqli_num_rows($select) > 0){

                                        $fetch = mysqli_fetch_assoc($select);
                                    }
                        ?>

                        <form action="" method="post" enctype="multipart/form-data">
                        
                            <label>
                                <i class="fas fa-info-circle" style='font-size:18px;color:#317AC1'>
                                </i>&nbsp;&nbsp;
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
                                        value="<?php echo $fetch['Date_Inscription']; ?>" class="box" disabled /><br/><br/>

                                        <!-- <span> 

                                            <label class="ast">*</label> 
                                            <label id="nonModifiable">Ces champs sont pas modifiables.</label>
                                        
                                        </span> -->

                                        <a class="ok_btn" href="../home.php">Ok</a>
                                        
                                    </div>

                                    
                            </div><br/><br/><br/>
                                <p style="font-size:14px; text-transform:capitalize; color:green;">
                                        ministère du Budget et du Portefeuille de l'Etat</p> 

                        </form>
                </div> 

            </div> 
    
        <div class="col-md-2">

        </div>

        



    </div>

</div>


</section>
                    

<!--------------------------------------- section des logos --------------------------------->

<section class="logo-container">

<h1 class="heading text-capitalize">
            <span>n</span>
            <span>o</span>
            <span>s</span>
            <span>p</span>
            <span>a</span>
            <span>r</span> 
            <span>t</span>
            <span>e</span>
            <span>n</span>
            <span>a</span>
            <span>i</span>
            <span>r</span>
            <span>e</span>
            <span>s</span><br/><br/>
    </h1>

    <div class="swiper-container logo-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="../images/3.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="../images/2.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="../images/1.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="../images/6.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="../images/4.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="../images/8.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="../images/10.jpg" alt=""   height="50"></div>
            <div class="swiper-slide"><img src="../images/5.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="../images/7.jpg" alt=""    height="50"></div>
            
        </div>
    </div>

</section>

            <!-- Lien de swiperjs -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>


<?php include "footer.php"; ?>