<?php

include "common_index/service/image_banniere.php";

include "common_index/service/header_index.php";

include "common_index/service/menu.php";

?> 

<i onclick="topFunction()" id="serviceBtnTop" title="Aller en haut"
class="fa fa-chevron-circle-up" style="font-size:36px"></i>

<script>

//Obtenir le bouton
var mybutton = document.getElementById("serviceBtnTop");

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


<!--------------------------------debut de section dirigeant ---------------------------------------------->

<section class="dirigeants text-capitalize">  <!-- id="dirigeant" -->

            <h1 class="heading">
                <span>n</span>
                <span>o</span>
                <span>s</span>
                <span>s</span>
                <span>e</span>
                <span>r</span>
                <span>v</span>
                <span>i</span>
                <span>c</span>
                <span>e</span>
                <span>s</span>
            
            </h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
          
            <div class="col-md-8">

                <table class="tabService tabMarginBottom table table-hover">
                    <thead>
                    <tr>
                        <th>OFFRES DE SERVICE</th>
                        <th>DIRECTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Retrait de bulletin de Solde</td>
                        <td>La Direction de la Solde (DS)</td>
                    </tr>
                    <tr>
                        <td>Dépot des dossiers de demande de stage</td>
                        <td>La Direction des Ressources Humaines (DRH)</td>
                    </tr>

                    </tbody>
                </table>

            </div>

            <div class="col-md-2"></div>
        </div>
    </div>
       

</section>

      

                <!-- Lien de swiperjs -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
<!-- <script src="assets/js-index/script.js"></script> -->

<?php

include "common_index/service/footer.php";

?>