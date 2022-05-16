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
         
  

if(isset($_POST['update_pwd'])){


    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
 
    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
 
       if($update_pass != $old_pass){
 
          $message_error[] = 'L\'ancien mot de passe ne correspond pas !';
 
       }
       elseif($new_pass != $confirm_pass){
 
          $message_error[] = 'Confirmation de  mot de passe ne correspond pas !';
 
       }
       else{
                  mysqli_query($conn, "UPDATE `usager` SET MdpUs = '$confirm_pass' 
                                                       WHERE CodeUs = '$Code_Us'") 
                or die('La requête a échoué');
 
                $message_succes[] = 'Mot de passe mis à jour avec succès !';
       }
    }
 
 
 }
 

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
                
                $select = mysqli_query($conn, "SELECT * FROM `usager` WHERE CodeUs = '$Code_Us'") 

                or die('La requête a échoué');
    
                    if(mysqli_num_rows($select) > 0){
                
                        $fetch = mysqli_fetch_assoc($select);
                        
                    }
                ?>

                        <form action="" method="post" enctype="multipart/form-data">
                        
                            <label>
                                <i class="fas fa-info-circle" style='font-size:18px;color:#317AC1'>
                                </i>&nbsp;&nbsp;
                                    Modification de mot de passe
                            </label><br/><br/>

                            <?php

                                if(isset($message_error)){

                                foreach($message_error as $message_error){

                                    echo '<div class="message_error">'.$message_error.'</div>';
                                }

                                }
                            ?>

                            <?php

                                    if(isset($message_succes)){

                                    foreach($message_succes as $message_succes){

                                        echo '<div class="message_succes">'.$message_succes.'</div>';
                                    }

                                    }
                            ?>

                            <div class="flex">
                                    <div class="inputBox">

                                        <input type="hidden" name="old_pass" 
                                        value="<?php echo $fetch['MdpUs']; ?>">

                                        <span>Modifier votre mot de passe : <i class='far fa-hand-point-down' 
                                                style='font-size:20px;color:red'></i>
                                        </span>

                                        <!-- <i class="fas fa-unlock-alt update-pwd_icon"></i> -->
                                        <input type="password" name="update_pass" id="my_focus1"
                                        placeholder="Entrer votre ancien mot de passe" class="box">
                                        
                                        <span>Nouveau mot de passe :</span>
                                        <!-- <i class="fa fa-key update-pwd_icon1"></i> -->
                                        <input type="password" name="new_pass" id="my_focus2"
                                        placeholder="Entrez un nouveau mot de passe" class="box">

                                        <span>Confirmez le mot de passe :</span>
                                        <!-- <i class="fa fa-key update-pwd_icon2"></i> -->
                                        <input type="password" name="confirm_pass" id="my_focus3"
                                        placeholder="Retaper le nouveau mot de passe" class="box"><br/>

                                        <div class="chkbox">
                                            <p>
                                                <input type="checkbox" onclick="myFunction()">
                                                Afficher le mot de passe
                                            </p>
                                        </div>

                                    </div>           

                                    <input type="submit" value="Modifier" name="update_pwd" class="modif_btn">

                                    <a href="../home.php" class="ignore_btn">Ignorer</a>
                                        
                            </div><br/><br/><br/>

                                <p style="font-size:14px; text-transform:capitalize; color:green;">
                                        ministère du Budget et du Portefeuille de l'Etat</p> 

                        </form>
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