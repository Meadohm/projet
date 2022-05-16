<?php

include "common_index/contact/image_banniere.php";

include "common_index/contact/header_index.php";

include "common_index/contact/menu.php";

?> 


<i onclick="topFunction()" id="contactBtnTop" title="Aller en haut"
class="fa fa-chevron-circle-up" style="font-size:36px"></i>

<script>

//Obtenir le bouton
var mybutton = document.getElementById("contactBtnTop");

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


<!--------------------------------debut de section formulaire de contact ---------------------------------------------->

<section class="contact">
    
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
                <img src="images/contact2.jpg" alt="">
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
                    <input type="submit" class="contact-btn" value="Envoyer le message">

                    <p class="champs_oblig">Les champs obligatoires sont marqués *</p>
            </form>
                            
        </div>
                                
</section>



<?php

include "common_index/contact/footer.php";

?> 