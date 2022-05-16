<?php

include "common_index/image_banniere.php";

include "common_index/header_index.php";

include "common_index/menu.php";

?> 

<i onclick="topFunction()" id="accueilBtnTop" title="Aller en haut"
class="fa fa-chevron-circle-up" style="font-size:36px"></i>

<script>

//Obtenir le bouton
var mybutton = document.getElementById("accueilBtnTop");

// *Lorsque l'utilisateur fait défiler vers le bas 
//20 pixels à partir du haut du document, affichez le bouton
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// Lorsque l'utilisateur clique sur le bouton, 
//faites défiler vers le haut du document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

                            <!-- debut de section banniere -->
        
<section class="sticky banner d-flex justify-content align-items-center pt-5">
    
    <div class="container  ">
        <!-- <marquee direction="right" class="marginTop">
            <span>
                Un service simple et gratuit disponible 24h/24 7j/7
            </span>
        </marquee> -->
            <div class="row marginTop1">
                <div class="col-md-6">
                    <marquee behavior="alternate" scrollamount="2" >
                        <mark>Du Nouveau !</mark>
                    </marquee>
                    <h1 class="text-capitalize py-3 banner-desc">
                        Un rendez-vous <br/> 
                        en quelques clics !<br/>
                        <br/>c'est facil et rapide...&nbsp;
                        
                    </h1>
                </div>
                
                <div class="col-md-6">
                    
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/rdv7.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/rdv8.jpeg" class="d-block w-100" alt="...">
                        </div>
                        
                        </div>
                    </div>
                    
                </div>

                <div class="row marginTop2">
                    <div class="col-12-md-sm">
                        <p class="pp" align="center">
                            <a href="forms/login_system/login-register.php" class="btn link-btn">
                                Connectez-vous pour prendre rendez-vous</a>&nbsp;&nbsp;
                            
                            <button class="btn btn-savoir" 
                            onclick="window.location.href = 'savoirplus/savoirplus.php';">
                                <i class='far fa-hand-point-right' style='font-size:15px; color:black'></i>
                                En savoir plus
                            </button>
                        </p>
                    </div>
                </div>
            </div>
    </div>

</section>


<?php

include "common_index/footer.php";

?> 



                <!-- Lien de swiperjs -->
  <!-- <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script> -->





