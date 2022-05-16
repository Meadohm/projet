<?php

session_start();

error_reporting(0);


 // Vérifier que le codeUs de session existe ou non
//  if (!isset($_SESSION["Code_Us"])) {

//     header("Location: ../index.php");
//    }

?>




<!------------------------------------------ ++++++++ ---------------------------------------------->


<?php 

include "image_banniere.php";

include "header.php";

include "menu.php";

?>

                    

<!------------------------------- debut de la section formualire contact ---------------------------------------->

<section class="contact" id="contact">
    
    <h1 class="heading text-capitalize">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
    </h1>
                            
        <div class="row">
                            
            <div class="image">
                <img src="../images/contact2.jpg" alt="">
            </div>
                            
            <form action="">
            <span class="votre_email">Votre adresse e-mail ne sera pas publiée.</span>
                <div class="inputBox">
                    <input type="text" placeholder="Votre nom *" required />
                    <input type="email" placeholder="Votre e-mail *" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required  />
                </div>
                <div class="inputBox">
                    <input type="tel" placeholder="Télephone (ex: (+255) 07 7927 9818)" required />
                    <input type="text" placeholder="Sujet" required />
                </div>
                <textarea placeholder="Votre message" name="" id="" cols="50" rows="50"></textarea>
                    <input type="submit" class="btn" value="Envoyer le message">

                    <p class="champs_oblig">Les champs obligatoires sont marqués *</p>
            </form>
                            
        </div>
                                
</section>


                    <!--section des logos -->
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
            <div class="swiper-slide"><img src="../images/2.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="../images/3.jpg" alt=""    height="50"></div>
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