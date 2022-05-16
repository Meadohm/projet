<?php include('config.php'); ?>

<?php

session_start();

$session_id=$_SESSION['Code_Us'];

// error_reporting(0);


 // Vérifier que le codeUs de session existe ou non
//  if (!isset($_SESSION["Code_Us"])) {

//     header("Location: ../index.php");
//    }

?>




<!------------------------------------------ ++++++++ ---------------------------------------------->


<?php 

include "common/yes/image_banniere.php";

include "common/yes/header.php";

?>

<?php 

include "common/yes/menu.php";

?>


<!-+++++++++++++++++++++++++----------------+- debut de section banniere --++++++++++++----------------+++++++>
        
<section class="banner">
 
    <div class="container-fluid">
        
        <div class="row">
            
        <?php include"common/panels/panel_left.php"?>
         
        <div class="col-md-6">
                        <span class="label_titre2">Prenez vos rendez-vous en ligne 
                        <i class='far fa-hand-point-down' style='font-size:18px;'></i>
                        </span>


            						
<!--************************************** reservation *************************************************-->
                            
                            <div class="question">

                            <?php 
                                $query=mysqli_query($conn,"select * from joursprestations, jour, prestation, horaire_joursprestations, horaire
                                                where joursprestations.IdJour=jour.IdJour 
                                                and joursprestations.IdPres=prestation.IdPres
                                                and horaire_joursprestations.IdHoraire=horaire.IdHoraire
                                                and prestation.IdPres ='$prestation'")
                                    or die(mysqli_error($conn));

                                $row=mysqli_fetch_array($query)
                            ?>


                            <div class="alert-question">Vous avez choisi la prestation de :<br/>
                            <strong><?php echo $row['LibellePres']; ?></strong> 
                            pour le <strong><?php echo $row['LibelleJour'] ?> à <?php echo $row['LibelleHoraire']; ?>
                            </strong>
                            </div><br>

                            <form method="POST" action="homeYes.php">

                            <input type="hidden" name="session_id1" value="<?php echo $session_id; ?>" >
                            <input type="hidden" name="jour_rdv1" value="<?php echo $jour_rdv; ?>" >
                            <input type="hidden" name="date1" value="<?php echo $date; ?>" >
                            <input type="hidden" name="prestation1" value="<?php echo $prestation; ?>" >
                            <input type="hidden" name="service1" value="<?php echo $service; ?>" >
                            <input type="hidden" name="NumPiece1" value="<?php echo $NumPiece; ?>" >
                            <input type="hidden" name="heure1" value="<?php echo $heure; ?>" >
                            <input type="hidden" name="doc1" value="<?php echo $doc; ?>" >

                            <p>Êtes-vous sûr de vouloir fixer votre rendez-vous à cette date ?</p>


                            <button name="yes" class="btn btn-success">Oui</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="home.php" class="btn">Non</a>

                            </form>

                            </div>

                            <br><br>


            
            <?php include"common/panels/panel_right.php"?>

            
        </div>

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

    
	<!-------------------------- script d'affichage du service concerné ! get_service ----------------------------->

			<script>

			function showService(str) {
			if (str.length == 0) {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {

				    if (this.readyState == 4 && this.status == 200) {

					document.getElementById("serv_conc").value = this.responseText;
				}
				};
				xmlhttp.open("GET", "get_service.php?codePres=" + str, true);
				xmlhttp.send();
			}
			}


            /* fonction pour afficher les jours en fonction de la prestation selectionnée */

            function showJour(str) {

			if (str.length == 0) {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("jour_conc").innerHTML = this.responseText;
				}
				};
				xmlhttp.open("GET", "get_jour.php?codePres=" + str, true);
				xmlhttp.send();
			}
			}

                /* fonction pour afficher les heures en fonction du jour selectionné */

            function showHeure(str) {

                if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
                } 
                    else {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("heure_conc").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "get_heure.php?codeJour=" + str, true);
                xmlhttp.send();
            }
            }
            
			</script>


<?php include "common/yes/footer.php"; ?>