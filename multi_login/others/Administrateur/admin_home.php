<?php

session_start();

// error_reporting(0);


 // Vérifier que le codeUs de session existe ou non
//  if (!isset($_SESSION["Code_Us"])) {

//     header("Location: ../index.php");
//    }

?>




<!------------------------------------------ ++++++++ ---------------------------------------------->


<?php 

include "common/image_banniere.php";

include "common/header.php";

?>


    
<!------------------------------------------ DEBUT CHARGEMENT DE LA PAGE ---------------------------------------------->

<div class="loader">
            <span class="lettre">C</span>
            <span class="lettre">H</span>
            <span class="lettre">A</span>
            <span class="lettre">R</span>
            <span class="lettre">G</span>
            <span class="lettre">E</span>
            <span class="lettre">M</span>
            <span class="lettre">E</span>
            <span class="lettre">N</span>
            <span class="lettre">T</span>

</div>


<!------------------------------------------ ++++++++ ---------------------------------------------->

<?php 

include "common/menu.php";

?>


<!-+++++++++++++++++++++++++----------------+- debut de section banniere --++++++++++++----------------+++++++>
        
<section class="banner">

 <div class="container-fluid">

    <!--<div class="slideshow-container">

        <div class="mySlides fade">
        <div class="numbertext">1 / 5</div>
        <img src="images/rdv5.jpg" style="width:100%">
        <div class="text">Prendre ton rendez-vous en ligne</div>
        </div>

        <div class="mySlides fade">
        <div class="numbertext">2 / 5</div>
        <img src="images/rdv5.jpg" style="width:100%">
        <div class="text">Un outil disponible 24h/7jrs</div>
        </div>

        <div class="mySlides fade">
        <div class="numbertext">3 / 5</div>
        <img src="images/rdv5.jpg" style="width:100%">
        <div class="text">C'est simple et efficace</div>
        </div>

        

        <div class="mySlides fade">
        <div class="numbertext">4 / 5</div>
        <img src="images/rdv5.jpg" style="width:100%">
        <div class="text">C'est simple et efficace</div>
        </div>

     

        <div class="mySlides fade">
        <div class="numbertext">5 / 5</div>
        <img src="images/rdv5.jpg" style="width:100%">
        <div class="text">C'est simple et efficace</div>
        </div>

    </div>
        <br>

        <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        </div> -->

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
            <div class="swiper-slide"><img src="images/2.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="images/3.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="images/1.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="images/6.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="images/4.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="images/8.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="images/10.jpg" alt=""   height="50"></div>
            <div class="swiper-slide"><img src="images/5.jpg" alt=""    height="50"></div>
            <div class="swiper-slide"><img src="images/7.jpg" alt=""    height="50"></div>
            
        </div>
    </div>

</section>

            <!-- Lien de swiperjs -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>


<?php include "common/footer.php"; ?>