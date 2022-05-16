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
                        <span class="label_titre2">Fin de la prise du rendez-vous 
                        <i class='far fa-thumbs-up' style='font-size:18px;'></i>
                        </span>

            						
<!--************************************** Confirmation *************************************************-->
							
                        <?php 
                            
                            if (isset($_POST['yes'])){

                        //         $header="MIME-Version: 1.0\r\n";
                        //         $header.='From:"rdv.dgbf@gmail.com"<support@primfx.com>'."\n";
                        //         $header.='Content-Type:text/html; charset="uft-8"'."\n";
                        //         $header.='Content-Transfer-Encoding: 8bit';

                        //         $message='
                        // <html>
                        //     <body>
                        //         <div align="center">
                                    
                             
                        //             J\'ai envoyé ce mail avec PHP !
                                   
                                    
                        //         </div>
                        //     </body>
                        // </html>
                        // ';

                    // mail("moh.fofana21@gmail.com", "Salut tout le monde !", $message, $header);
                                
                                $session_id1 = $_POST['session_id1'];
                                $jour_rdv1 = $_POST['jour_rdv1'];
                                $prestation1 = $_POST['prestation1'];
                                $service1 = $_POST['service1'];
                                $NumPiece1 = $_POST['NumPiece1'];
                                $heure1 = $_POST['heure1'];
                                $doc1 = $_POST['doc1'];
                                $date1 = $_POST['date1'];
                                // $service1 = $_POST['service1'];
                                // $equal = $_POST['equal'];

        
                    $query = mysqli_query($conn,"select * from prestation where IdPres ='$prestation1'")
                                            
                                    or die(mysqli_error($conn));

                                        $row=mysqli_fetch_array($query);

                                        $DesignRdv = $row['LibellePres']; 
        

                mysqli_query($conn,"insert into rendez_vous(DesignRdv, JourRdv, HeureRdv, DateRdv, 
                                                    CodeUs, IdPres, CodeDoc, NumDocFournir, StatutRdv) 
                                values('$DesignRdv', '$jour_rdv1', '$heure1 ', '$date1', '$session_id1',
                                                '$prestation1', '$doc1', '$NumPiece1', 'En attente')");

                    ?>

                            <?php 
                                $query=mysqli_query($conn,"select * from joursprestations, 
                                                        horaire_joursprestations, horaire
                                                        where horaire_joursprestations.IdHoraire=horaire.IdHoraire
                                                        and horaire_joursprestations.IdHoraireJrsPres  ='$heure1'")
                                    or die(mysqli_error($conn));

                                $row=mysqli_fetch_array($query);
                            ?>

                    <!--************** *********************************************************************************** -->

                            <?php 
                                $queryserv=mysqli_query($conn,"select * from prestation, service
                                                        where prestation.IdServ=service.IdServ
                                                        and prestation.IdPres ='$prestation1'")
                                    or die(mysqli_error($conn));

                                $rowServ=mysqli_fetch_array($queryserv);
                            ?>

                        <div class="yes">
                                <h2 style="text-align:center;font-size:30px;color:green;">
                                <strong>C'est génial !</strong></h2><br/><br/><br/>
                            <h2>Votre rendez-vous a été fixé pour le <?php echo $date1;?><br/><br/>
                                à &nbsp;<?php echo $row['LibelleHoraire'];?> à la 
                                <b style="color:blue;"><?php echo $rowServ['LibelleServ'];?></b></h2>

                                    <h1>MERCI <i class='fas fa-handshake' style='font-size:24px;color:green'></i></h1>

                                    <button>
                                        <a href="home.php" class="btnYes">
                                            Terminé
                                            <i class='far fa-thumbs-up' style='font-size:20px;color:#fff'></i>
                                        </a>
                                    </button>
                            
                            </div>


                    <?php }
    
                    else{ ?>

                        <script>
                        alert("Erreur d'enregistrement...");
                        </script>
                        <?php } 
                        
                    ?>
                <br>



            </div>

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