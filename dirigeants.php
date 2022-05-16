<?php

include "common_index/dirigeant/image_banniere.php";

include "common_index/dirigeant/header_index.php";

include "common_index/dirigeant/menu.php";

?> 

<i onclick="topFunction()" id="dirigeantBtnTop" title="Aller en haut"
class="fa fa-chevron-circle-up" style="font-size:36px"></i>

<!--------------------------------debut de section dirigeant ---------------------------------------------->

<section class="dirigeants text-capitalize">  <!-- id="dirigeant" -->

    <h1 class="heading">
        <span>n</span>
        <span>o</span>
        <span>s</span>
        <span>d</span>
        <span>i</span>
        <span>r</span>
        <span>i</span>
        <span>g</span>
        <span>e</span>
        <span>a</span>
        <span>n</span>
        <span>t</span>
        <span>s</span>
    </h1>

    <div class="swiper-container dirigeants-slider">

        <div class="swiper-wrapper swiper-wrapper1">

            <div class="swiper-slide">
                <div class="box">
                    <img src="images/ministre.jpg" alt="">
                    <h3>ministre du budget</h3>
                    <h4>M. moussa SANOGO</h4>
                    <p>Lorem ipsum dolor sit molestias consectetur ducimus beatae, reprehenderit exercitationem!</p>                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="box">
                    <img src="images/dg.jpg" alt="">
                    <h3>Directeur général</h3>
                    <h4>M. TRAORE seydou</h4>
                    <p>Lorem ipsum dolor sit molestias consectetur ducimus beatae, reprehenderit exercitationem!</p>                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="box">
                    <img src="images/dbe.jpg" alt="">
                    <h3>directeur du budget</h3>
                    <h4>M. yaya DIOMANDE</h4>
                    <p>Lorem ipsum dolor sit molestias consectetur ducimus beatae, reprehenderit exercitationem!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="box">
                    <img src="images/dga1.jpg" alt="">
                    <h3>directeur adjoint</h3>
                    <h4> M. Roger DIABA</h4>
                    <p>Lorem ipsum dolor sit molestias consectetur ducimus beatae, reprehenderit exercitationem!</p>                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="box">
                    <img src="images/dga2.jpg" alt="">
                    <h3>directeur adjoint</h3>
                    <h4>Mme Massanfi DIOMANDE</h4>
                    <p>Lorem ipsum dolor sit molestias consectetur ducimus beatae, reprehenderit exercitationem!</p>                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="box">
                    <img src="images/" alt="">
                    <h3>directeur des TI</h3>
                    <h4>M. Moussa KEITA</h4>
                    <p>Lorem ipsum dolor sit molestias consectetur ducimus beatae, reprehenderit exercitationem!</p>                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

</section>

                <!-- Lien de swiperjs -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
<script src="assets/js-index/script.js"></script>

<?php

include "common_index/dirigeant/footer.php";

?>