<?php include('config.php'); ?>

<?php include('header.php'); ?>
<?php include('session.php'); ?>



<?php include('navbar_dasboard.php'); ?>

    <div class="container">

		<div class="margin-top1">

			<img src="img/banier0.jpeg" style="width:1200px; height:100px" /><br>

					<div class="testimonial_div">	
						<p>
						<!-- <marquee direction="right" class="marginTop"> -->
						<marquee behavior="alternate" scrollamount="2" class="marginTop">
						<strong style ='color:#80586D;font-weight:bold; font-size:20px'>
						Ministre du Budget et du Portefeuille de l'Etat - Direction Générale du Budget et des Finances
						</strong>
        </marquee>
												
						</p>
					</div>
					
		</div>				
										
					
				<div class="alert alert-info text-center" style='font-size:18px;'>
					<i class='fas fa-address-card' style='font-size:18px'></i> 
					Mes Rendez-vous
				</div>
	
					<table cellpadding="0" cellspacing="0" border="0" style="width:100%;" 
						   class="table  table-bordered" id="example">
                            
                                <thead >
                                    <tr>

										<!-- <th style="text-align:center">nº rdv</th> -->
										<th style="text-align:center">code rdv</th> 
										<th style="text-align:center">Date de prise du rdv</th>
										<th style="text-align:center">Prestations</th>
										<th style="text-align:center">Service</th>                          
                                        <th colspan="2" style="text-align:center">Date & Heure du rendez-vous</th>
										
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

									?>


										<tr>

										<td width="500" style="text-align:center"><?php  echo $row['NumRdv'];?></td>
										<td width="2100" style="text-align:center"><?php  echo $row['DatPriseRdv'];?></td> 
										<td width="1000px"><?php  echo $row['LibellePres'];?></td> 
										<td width="1500"><?php  echo $row['LibelleServ'];?></td> 
										<td width="1500"><?php  echo $row['DateRdv'];?></td> 
										<td width="1500"><?php  echo $row['HeureRdv'];?></td>
										<td width="500"><?php  echo $row['StatutRdv'];?></td>

										<td class='button' width="100" style="text-align:center;">
											<a href=#><i class='fas fa-tools' style='font-size:10px'> 
												<b>Modifier</b></i>
											</a>
										</td> 


										<td class='button' width='100' style='text-align:center'>
											<a href="supprimer_rdv.php?idSup=<?php echo $row['NumRdv']; ?>"
            					onclick="return confirm('Si vous supprimer ce rendez-vous ( <?php echo  $row['LibellePres'].'  '. 'à la' .$row['LibelleServ']?> ), il sera annulé ! \nEtes-vous sûre de vouloir continuer ? ');" >
											<i class='far fa-trash-alt' style='font-size:10px;color:red'>
												<b>Supprimer</b></i>
											</a>
												>
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
							echo" <strong style ='color:#80586D;font-weight:bold;'>
								<span style ='color:green'>TOTAL : $rowcount</span> RENDEZ-VOUS </strong>";

							mysqli_free_result($result);
							}

							// mysqli_close($conn);
							?>
</div>
		
</div>





			
<style type="text/css">

.button {
            
    border-radius: 10px;
	color:white;
    padding: 1px 1em;
    position: relative;
    text-decoration: none;
		    
           /* display: inline-block; */
        }

.marginTop{

	margin-top: 10px;
}

.margin-top1{

	margin-top: 53px;
}

		/*---------------------------------------Debut de Footer-------------------------------------------------- */
.footer1 {
  text-align: center;
  padding: 14.5px 0px;
  margin-top: 16.3rem;
  border-top: 1px solid #e5e5e5;
  background-color: #E1A624;
}
.footer1 p {
  margin-bottom: 0;
  color: #777;
}

</style>

<footer class="footer1">
      <div class="container">
	  <div class="foot-margin">
          <p><a>Copyright � 2021 Direction Général du Budget et des Finances. 
            by M. Fofana Mohammed | Tous droits réservés</a></p>
      </div>
      </div>
</footer>
	
		<script type="text/javascript">
			$(function() {
				$('#da-thumbs > li').hoverdir();
			});
		</script>
<?php include('tooltip.php'); ?>

</body>
</html>