<?php include('config.php'); ?>

<?php include('header.php'); ?>
<?php include('session.php'); ?>



<?php include('navbar_dasboard.php'); ?>

    <div class="container">

		<div class="margin-top">

					<div class="row">
						
									<div class="span3">
											<ul class="nav nav-tabs nav-stacked">
												<li class="active">
												<a href="#"><i class="icon-pencil icon-large"></i>&nbsp;Créer un compte</a>
												</li>
										
											</ul>
											<p><strong>Aujourd'hui c'est :</strong></p>
									<div class="alert alert-success">
											<i class="icon-calendar icon-large"></i>

											<?php
											// $Today = date('d:m:y');
											// $new = date('l, F d, Y', strtotime($Today));
											// echo $new;

									/*Voici les deux tableaux des jours 
									et des mois traduits en français*/
							$nom_jour_fr = array("dimanche", "lundi", "mardi", 
										"mercredi", "jeudi", "vendredi", "samedi");

				$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", 
									  "août", "septembre", "octobre", "novembre", "décembre");

									// on extrait la date du jour
						list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));

						echo $nom_jour_fr[$nom_jour].' '.$jour.' '.$mois_fr[$mois].' '.$annee;

											?>
										</div>		
									<div class="alert alert-info">Heure de réception</div>

											<p>Heure 1 : 9:30 - 10:00</p>
											<p>Heure 2 : 10:00 - 10:30</p>
											<p>Heure 3 : 10:30 - 11:00</p>
											<p>Heure 4 : 11:30 - 12:00</p>
											<p>Heure 5  - 12:30 - 13:00</p><br/>
											
											<p>Heure 6 : 14:00 - 14:30</p>
											<p>Heure 7 : 14:30 - 15:00</p>
											<p>Heure 4 : 15:30 - 16:00</p>
									
											
												
									<div class="alert alert-info">Heures de travail</div>

											<p>Lundi - Vendredi (7h30 à 16h00)</p>
										
											<p>Nom du service ici</p>
										
										
										
									<div class="alert alert-info">Info du service</div>
									<div class="testimonial_div">
										
										<p>
										Les attributions de la Direction de la Solde contenues 
										dans le décret portant organisation du Ministère délégué 
										auprès du Premier Ministre, chargé de l’Economie et des 
										Finances déterminent sa structuration.
										Toutefois, l’examen des attributions et de l’organisation 
										de cette direction appelle, avant tout, un regard rétrospectif 
										sur cette unité administrative.
										
										</p>
										</div>		
									</div>
									<div class="span6">
										<img src="img/dgbf.jpg" style="width:700px; height:100px">
										<br>
										<br>
										
								<div class="text-center alert alert-info" style='font-size:20px;'>
										Sélectionnez la date de rendez-vous et service
								</div>

		<!-- reservation -->
		<?php 
		
			if (isset($_POST['yes'])){ 

				$session_id1 = $_POST['session_id1'];
				$date1 = $_POST['date1'];
				$prestation1 = $_POST['prestation1'];
				$service1 = $_POST['service1'];
				$NumPiece1 = $_POST['NumPiece1'];
				$heure1 = $_POST['heure1'];
				$doc1 = $_POST['doc1'];
				// $service1 = $_POST['service1'];
				// $equal = $_POST['equal'];

			
				$query = mysqli_query($conn,"select * from prestation where IdPres ='$prestation1'")
								
						or die(mysqli_error($conn));

							$row=mysqli_fetch_array($query);

							$DesignRdv = $row['LibellePres']; 
							
			

			mysqli_query($conn,"insert into rendez_vous(DesignRdv, DateRdv, HeureRdv, CodeUs, IdPres, CodeDoc, NumDocFournir, StatutRdv) 
					values('$DesignRdv', '$date1', '$heure1 ', '$session_id1','$prestation1', '$doc1', '$NumPiece1', 'En attente')");
	
									
		
		?>
		<div class="yes"><h3>Votre rendez-vous a été fixé le  <?php echo  $date1; ?>. MERCI</h3></div>
		<?php }
		
			else{ ?>

				<script>
				alert('error');
				</script>
				<?php } 
				
			?>
		<br>
		<br>
	
	<!-- end reservation -->
	
	
	
				</div>
				<div class="span3">
				<img src="img/32x32/facebook.png">
				<img src="img/32x32/twitter.png">
				<img src="img/32x32/rss.png">


				<div class="alert alert-info">Liste des services</div>
						
								<table class="table  table-bordered">
									
										<thead>
											<tr>
												<th>Offre de services</th>
												<th>Direction</th>                                 
											
											</tr>
										</thead>
										<tbody>
										
										<!-- <?php $user_query=mysqli_query($conn,"select * from service")
										or die(mysqli_error($conn));
											while($row=mysqli_fetch_array($user_query)){
											$id=$row['service_id']; ?>
											<tr class="del<?php echo $id ?>">
											<td><?php echo $row['service_offer']; ?></td> 
											<td><?php echo $row['price']; ?></td>                         
											<?php } ?> -->

										<tr>
											<td>Retrait du bullettin</td>
											<td>DS</td>
										</tr>

										<tr>
											<td>Dépot de dossier de demande de stage</td>
											<td>DRH</td>
										</tr>
								
										</tbody>
									</table>
						<div class="alert alert-info">M. TRAORE SEYDOU</div>	
							<img  class="img img-polaroid" src="images/dg.jpg">
						</div>
						
					</div>
			</div>
    </div>
<?php include('footer.php') ?>