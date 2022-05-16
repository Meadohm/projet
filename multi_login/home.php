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

include "common/image_banniere.php";

include "common/header.php";

?>


    
<!------------------------------------------ DEBUT CHARGEMENT DE LA PAGE ---------------------------------------------->

<!-- <div class="loader">
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

</div> -->


<!------------------------------------------ ++++++++ ---------------------------------------------->

<?php 

include "common/menu.php";

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
            

                        <?php

                            if (isset($_POST['sub'])){

                                $prestation = $_POST['prestation'];
                                
                                $service = $_POST['service'];

                                $date = $_POST['date'];

                                $jour_rdv = $_POST['jour_rdv'];

                                $heure = $_POST['heure'];

                                $doc = $_POST['doc'];

                                $NumPiece = $_POST['NumPiece'];


                                $query = mysqli_query($conn,"select * from rendez_vous 
                                    where DateRdv = '$date' and HeureRdv ='$heure' and CodeUs = '$session_id' ")
                                    or die(mysqli_error($conn));

                                $count = mysqli_num_rows($query);

                                // echo $count; 

                             if ($count  > 0){

                                    $message_error[] = 'Vous avez déjà programmé 
                                                        un rendez-vous à cette date ou à cette heure. Veuillez vérifier';  

                                    if(isset($message_error)){
                        
                                         foreach($message_error as $message_error){
                        
                                            echo '<div class="message_error">'.$message_error.'</div>';
                                            
                                                 }
                        
                                            }
                                                       
                                }

                                else{
                        ?>

                            <div class="question">

                            <?php 
                                $query=mysqli_query($conn,"select * from joursprestations, jour, 
                                                        prestation, horaire_joursprestations, horaire
                                                        where joursprestations.IdJour=jour.IdJour 
                                                        and joursprestations.IdPres=prestation.IdPres
                                                        and horaire_joursprestations.IdHoraire=horaire.IdHoraire
                                                        and prestation.IdPres ='$prestation'
                                                        and joursprestations.IdJrsPres ='$jour_rdv;'
                                                        and horaire_joursprestations.IdHoraireJrsPres  ='$heure'")
                                    or die(mysqli_error($conn));

                                $row=mysqli_fetch_array($query);
                            ?>


                        <div class="alert-question">Vous avez choisi la prestation de :<br/>
                            <strong>"<?php echo $row['LibellePres'];?>"</strong>&nbsp;&nbsp;
                            pour le <strong><?php echo $row['LibelleJour']?>&nbsp;&nbsp;
                            <?php echo $date;?>&nbsp;&nbsp; à &nbsp;&nbsp;<?php echo $row['LibelleHoraire'];?>
                            </strong>
                        </div><br>


                        <form method="POST" action="homeYes.php">

                        <input type="hidden" name="session_id1" value="<?php echo $session_id;?>" >
                        <input type="hidden" name="jour_rdv1" value="<?php echo $jour_rdv;?>" >
                        <input type="hidden" name="date1" value="<?php echo $date;?>" >
                        <input type="hidden" name="prestation1" value="<?php echo $prestation;?>" >
                        <input type="hidden" name="service1" value="<?php echo $service;?>" >
                        <input type="hidden" name="NumPiece1" value="<?php echo $NumPiece;?>" >
                        <input type="hidden" name="heure1" value="<?php echo $heure;?>" >
                        <input type="hidden" name="doc1" value="<?php echo $doc;?>" >

                        <p>Êtes-vous sûr de vouloir fixer votre rendez-vous à cette date ?</p>


                            <button name="yes" class="btn btn-success">Oui</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <a href="home.php" class="btn">Non</a>

                        </form>

                            </div>

                            <br><br>

                        <?php }}
                        
                        ?> 

                            <?php
                            
                            if(!isset($_POST['sub']) || (isset($_POST['sub']) && isset($message_error))){
                            
                            
                            ?>
                        <form class="form-horizontal" method="POST">

                            <div class="control-group">

                                <label class="control-label" style="margin-left:10px;" for="inputPassword">
                                     Choix de la prestation :
                                </label>

                                <div class="controls">

                                    <select name="prestation" style="width:360px;" 
                                    onchange="showService(this.value);showJour(this.value)" required >
								
							            <option style="text-align:center" value="" selected>
                            							
							            -------- sélectionner une prestation --------
							            </option>
							
                                        <?php 
                                            $query=mysqli_query($conn,"select * from prestation")
                                            or die(mysqli_error($conn));

                                            while($row=mysqli_fetch_array($query)){
							            ?>
							                <option value="<?php echo $row['IdPres']; ?>" 
                                            <?php if(isset($prestation) && $row['IdPres']==$prestation) 
                                            echo " selected"?>>
                                            <?php echo $row['LibellePres'] ?>
							                </option>
						
                                        <?php 
							
                                         } ?>

							            </select>
                                </div>
                            </div>

                            <div class="control-group">

						        <label class="control-label" style="margin-left:45px;" for="inputEmail">
                                    Service concerné :
                                </label>

						        <div class="controls">
						            <input type="text" value="<?php if(isset($service)) 
                                        echo $service;?>" class="input-control" name="service"
                                    id="serv_conc" readonly required />
						        </div>  
						
						    </div>

                            <div class="control-group">
						        <label class="control-label" style="margin-left:20px;" for="inputPassword">
                                &nbsp;&nbsp;sélectionner un jour :
                                </label>

                                <div class="controls">

                                    <select name="jour_rdv" style="width:120px;" id="jour_conc" 
                                    onchange="showHeure(this.value);showdate(this.value);" required>
                                    
                                    <option style="text-align:center" value="" selected> </option>

                                    <?php 
                                       	$query=mysqli_query($conn,"select * from joursprestations, jour
                                           where joursprestations.IdJour=jour.IdJour and IdPres='$prestation'")
                                       or die(mysqli_error($conn));
                                   
                                       while($row=mysqli_fetch_array($query)){
                                       ?>
                                           <option value="<?php echo $row['IdJrsPres']; ?>"  
                                           <?php if(isset($jour_rdv) && $row['IdJour']==$jour_rdv) 
                                            echo " selected"?>>
                                               <?php echo $row['LibelleJour'] ?>
                                           </option>
                                       <?php } 
							
                                          ?>
                                        
                                    </select>   
                                </div>

                                <label class="control-label" style="margin-left:35px;" for="inputPassword">
                                date :
                                </label>

                                <div class="controls">

                                    <select name="date" style="width:130px;" id="date_conc" 
                                    onchange="" required>
                
                                        <option style="text-align:center" value="" selected> </option>

                                    </select>   
                                </div>

						    </div>
        
						<div class="control-group">
						        <label class="control-label" for="inputPassword">
                                    Sélectionner une heure :
                                </label>
						    <div class="controls">

							    <select name="heure" style="width: 360px;" id="heure_conc" required>

							    <option style="text-align:center" value="" selected> </option>		
							
							</select>
						    </div>
						</div>
                        
						 <div class="control-group" id="block_piece" style="display:none">
						        <label class="control-label" style="margin-left:4px;">
                                    Nature pièce d'identité :
                                </label>
						    <div class="controls">

							    <select name="doc" style="width:360px;" required>
                                    
                                <?php 
							
								$query=mysqli_query($conn,"select CodeDoc, NatureDoc from document")
								or die(mysqli_error($conn));

								while($row=mysqli_fetch_array($query)){
							    ?>
                                    <option value="<?php echo $row['CodeDoc']; ?>">
							            <?php echo $row['NatureDoc'] ?>
							        </option>
							        <?php } ?>
							
							    </select>

						    </div>
						</div>

						<div class="control-group" id="block_num_piece" style="display:none;">
                            <label class="control-label" style="margin-left:44px;">
                                Numéro de pièce :
                            </label>

						    <div class="controls">
                                <input type="text" Value="<?php if(isset($NumPiece))
                                echo $NumPiece;?>" class="input-control" name="NumPiece" />
                            </div>
						</div>

						<div class="control-group">
						<div class="controls">

						<button type="submit" style='margin-left:300px;' name="sub" class="btn ">
                        <i class='far fa-check-circle' style='font-size:18px'></i>
							Valider</button>
                            
						</div>
						</div>
                        

                        </form>
                            
                        <?php } ?>
                
                            
                <div class="alert-info">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong  class="bnne">Bonne nouvelle !</strong> 
                        Vous pouvez prendre rendez-vous sur  deux mois.
                </div>



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
                document.getElementById("block_piece").style.display=(str==1)?"block":"none";
                document.getElementById("block_num_piece").style.display=(str==1)?"block":"none";

			if (str.length == 0) {
				document.getElementById("serv_conc").value = "";
                document.getElementById("date_conc").innerHTML = "<option style='text-align:center' value='' selected></option>";
                document.getElementById("heure_conc").innerHTML = "<option style='text-align:center' value='' selected></option>";
			
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
                document.getElementById("jour_conc").innerHTML = "<option style='text-align:center' value='' selected></option>";
				
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


            /* fonction pour afficher les jours en fonction de la prestation selectionnée */

                    function showdate(str) {

if (str.length == 0) {				
    document.getElementById("date_conc").innerHTML = "<option style='text-align:center' value='' selected></option>";
    
} else {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("date_conc").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "get_date.php?code_date=" + str, true);
            xmlhttp.send();
        }
        }


                /* fonction pour afficher les heures en fonction du jour selectionné */

            function showHeure(str) {

                if (str.length == 0) {
                    document.getElementById("heure_conc").innerHTML = "<option style='text-align:center' value='' selected></option>";
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


<?php include "common/footer.php"; ?>