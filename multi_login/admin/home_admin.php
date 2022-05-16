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


<!------------------------------------------ ++++++++ ---------------------------------------------->

<?php 

include "common/menu.php";

?>


<!-+++++++++++++++++++++++++----------------+- debut de section banniere --++++++++++++----------------+++++++>
        
<section class="banner">
 
    <div class="container-fluid">
        
        <div class="row">
            
        <?php include"common/panels/panel_left.php"?>
          
            <div class="col-md-9">

                <?php
                    
                    $typecompte = mysqli_query($conn,"select * from usager, type_usager 
                                   where CodeUs = '$session_id' and usager.CodeTypeUs='1' 
                                   and usager.CodeTypeUs=usager.CodeTypeUs")
                    or die(mysqli_error($conn));

                     $Affichtypecompte = mysqli_fetch_array($typecompte);

                ?>

                        <span class="label_titre2">
                            Type de compte :
                        <i class='fas fa-user' style='font-size:18px;color:blue;'></i>
                        <b><?php echo $Affichtypecompte['LibelleTypeUs']?></b>
                        </span>

            						
        <!--************************************** contenu de la table *************************************************-->

                            <div id="accueil" class="md-sd tabcontent">
                                <img src="images/prise_rdv.jpg" alt="prise_rdv" style="width:80%; ">
                            </div>

                            <div id="rdvtoday" class="tabcontent">
                                <div class="alert-info">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <i class="fas fa-address-book" style="font-size:17px;" aria-hidden="true"></i>
                                        &nbsp;Table - Rendez-vous d'aujourd'hui !
                                </div><br><br>

                                
                                
					<table id="tablo_mo" cellpadding="0" cellspacing="0" border="5" style="width:100%;" 
						   class="table  table-bordered">
                            
                                <thead >
                                    <tr>
										<th>Ref rdv</th> 
										<th style="text-align:center">Date prise Rdv</th>
										<th style="text-align:center">Prestations</th>
										<th style="text-align:center">Service</th>                          
                                        <th colspan="3" style="text-align:center">Date & Heure Rdv</th>
										
										<th style="text-align:center">Statut</th>
										<th width="800" colspan="2" style="color:brown; font-size:18px; text-align:center">
										<i class='fas fa-wrench' style='font-size:15px;color:red'></i>
												Opérations
										</th>                                    

                                    </tr>
                                </thead>
								
                                <tbody>
								 
                                  <?php 
								  
								 	 $rdv_query=mysqli_query($conn,"select * from rendez_vous, prestation, service 
								  											where CodeUs = '$session_id'
																			and rendez_vous.IdPres=prestation.IdPres
																			and prestation.IdServ=service.IdServ")
																			// ORDER BY NumRdv
								  or die(mysqli_error($conn));

									while($row=mysqli_fetch_array($rdv_query)){

										$heure_query=mysqli_query($conn,"select * from horaire, horaire_joursprestations  
								  											where horaire_joursprestations.IdHoraireJrsPres = '".$row['HeureRdv']."' 
																			  and  horaire.IdHoraire=horaire_joursprestations.IdHoraire");
										$row_heure = mysqli_fetch_array($heure_query);

										$jour_query=mysqli_query($conn,"select * from jour, joursprestations  
								  											where IdJrsPres = '".$row['JourRdv']."' 
																			  and jour.IdJour=joursprestations.IdJour");
										$row_jour = mysqli_fetch_array($jour_query);


										?>
										<tr>

										<td width="10%"><?php  echo $row['NumRdv'];?></td>
										<td width="15%" style="text-align:center"><?php  echo $row['DatPriseRdv'];?></td> 
										<td width="10%" style="text-align:center"><?php  echo $row['LibellePres'];?></td> 
										<td width="10%" style="text-align:center"><?php  echo $row['LibelleServ'];?></td> 
										<td width="20%" style="text-align:center"><?php  echo $row_jour['LibelleJour'];?></td>
										<td width="20%" style="text-align:center"><?php  echo $row['DateRdv'];?></td>
										<td width="20%" style="text-align:center"><?php  echo $row_heure['LibelleHoraire'];?></td>
										<td width="20%" style="text-align:center"><?php  echo $row['StatutRdv'];?></td>

										<td class='' width="100" style="text-align:center;">
											<a href='#'><i class='fas fa-tools' style='font-size:12px'> 
												<b>Modifier</b></i>
											</a>
										</td> 


										<td class='' width='100' style='text-align:center;'>
											<a href="supprimer_rdv_Aujrd.php?idSup=<?php echo $row['NumRdv']; ?>"
            							onclick="return confirm('Si vous supprimer ce rendez-vous ( <?php echo  $row['LibellePres'].'  '. 'à la' 
										.$row['LibelleServ']?> ), il sera annulé ! \nEtes-vous sûre de vouloir continuer ? ');" >
											<i class='far fa-trash-alt' style='font-size:12px;color:red'>
												<b>Supprimer</b></i>
											</a>
												
										</td> 
											<?php } ?>
								
										</tbody>
									</table>


                            </div>

                            <div id="mesRdv" class="tabcontent">

                                <div class="alert-info">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <i class="far fa-address-card" style="font-size:17px;" aria-hidden="true"></i>
                                        &nbsp;Table - Tous les rendez-vous en cours !
                                </div><br><br><br>

                            <p style="text-align:center;font-size:15px;"> 
                                    voir tous les rendez-vous ici
                            </p>

                            </div>

                            <div id="prestaServ" class="tabcontent">

                                <div class="alert-info">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <i class="fas fa-bullhorn" style="font-size:17px;" aria-hidden="true"></i>
                                        &nbsp;Table - Enregistrement de Prestations et Services !
                                </div><br><br><br>

                           <p style="text-align:center; font-size:15px;"> 
                            enregistrer les prestations ici
                            </p>

                            </div>

                            <div id="compte" class="tabcontent">

                                <div class="alert-info">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <i class="far fa-user-circle" style="font-size:17px;" aria-hidden="true"></i>
                                        &nbsp;Table - Gestion des Comptes utilisateurs !
                                </div><br><br><br>

                            <p style="text-align:center; font-size:15px;"> 
                            gerer les comptes utilisateur ici</p>

                            </div>

                            <div id="membre" class="tabcontent">

                                <div class="alert-info">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <i class="fa fa-users" style="font-size:17px;" aria-hidden="true"></i>
                                        &nbsp;Table - Gestion des membres de l'administration !
                                </div><br><br><br>

                            <p style="text-align:center; font-size:15px;"> 
                            gerer les membres de l'administration ici</p>

                            </div>

                            <div id="note" class="tabcontent">

                                <div class="alert-info">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <i class="far fa-bell" style="font-size:17px;" aria-hidden="true"></i>
                                        &nbsp;Table - Enregistrement des informations !
                                </div><br><br><br>

                            <p style="text-align:center; font-size:15px;"> 
                            enregistrer les notes ou infos concernant la dgbf</p>

                            </div>



            </div>

            <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
            
            <script>

            $(document).ready( function () {
            $('#tablo_mo').DataTable();
            } );

            </script>

            <script>
            function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
            </script>


            
        </div>

    </div>
    
</section>
                    

    
       


<?php include "common/footer.php"; ?>