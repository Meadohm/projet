<?php include('../config.php'); ?>

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

include "image_banniere.php";

include "header.php";

?>

<!------------------------------------------ ++++++++ ---------------------------------------------->

<?php 

include "menu.php";

?>


<!-+++++++++++++++++++++++++----------------+- debut de section banniere --++++++++++++----------------+++++++>
        
<section class="banner">

    <div class="container-fluid">

        <div class="row">
            <div class="col">

            <div class="label_titre2">
					<i class='fas fa-address-card' style='font-size:18px'></i> 
					Tous vos rendez-vous
			</div>
            
					<table cellpadding="0" cellspacing="0" border="5" style="width:100%;" 
						   class="table  table-bordered">
                            
                                <thead >
                                    <tr>

										<!-- <th style="text-align:center">nº rdv</th> -->
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
										<!-- <th>Modifier</th>                                  
										<th>Supprimer</th>                                   -->
                                                                         
                              
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
											<a href="../supprimer_rdv.php?idSup=<?php echo $row['NumRdv']; ?>"
            							onclick="return confirm('Si vous supprimer ce rendez-vous ( <?php echo  $row['LibellePres'].'  '. 'à la' 
										.$row['LibelleServ']?> ), il sera annulé ! \nEtes-vous sûre de vouloir continuer ? ');" >
											<i class='far fa-trash-alt' style='font-size:12px;color:red'>
												<b>Supprimer</b></i>
											</a>
												
										</td> 
											<?php } ?>
								
										</tbody>
									</table>

							<?php

							$sql="SELECT * FROM rendez_vous WHERE CodeUs = '$session_id'";

							if ($result=mysqli_query($conn,$sql))
							{

							// Renvoie le nombre de lignes dans le jeu de résultats
							$rowcount=mysqli_num_rows($result);

							// printf("Result set has %d rows.\n",$rowcount);
							echo" <strong style ='color:#80586D;font-weight:bold;font-size:15px;'>
								<span style ='color:green; font-size:15px; font-weight:500'>
                                TOTAL : $rowcount</span> RENDEZ-VOUS </strong>";

							mysqli_free_result($result);
							}

							// mysqli_close($conn);
							?>



  


            </div>
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