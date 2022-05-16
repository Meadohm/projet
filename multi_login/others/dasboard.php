<?php include('config.php'); ?>

<?php include('header.php'); ?>

<?php

	include('image_banniere.php');

?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php'); ?>




    <div class="container">

		<div class="">

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
											<p>Heure 8 : 15:30 - 16:00</p>
									
											
												
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
								Prenez vos rendez-vous en ligne 
									<!-- <i style='font-size:20px' class='far'>&#xf0a7;</i>  -->
									<i class='far fa-hand-point-down' style='font-size:18px;'></i>
								</div>
						
<!--************************************** reservation *************************************************-->

<!-- J'ai deja defini dans le fichier navbar_dasboard <?php $session_id=$_SESSION['Code_Us'];?> -->
							
							<?php

							if (isset($_POST['sub'])){

								$prestation = $_POST['prestation'];
								
								$service = $_POST['service'];

								$date = $_POST['date'];

								$heure = $_POST['heure'];

								$doc = $_POST['doc'];

								$NumPiece = $_POST['NumPiece'];


							// $prestation_selectionne = $_POST['service_concerne'];
							
							
							 $query = mysqli_query($conn,"select * from rendez_vous 
							 		where DateRdv = '$date' and CodeUs = '$session_id' ")
							
							 or die(mysqli_error($conn));
							
							$count = mysqli_num_rows($query);

								// echo $count; 
						
							if ($count  > 0){ ?>

								<script>

									alert('Vous avez déjà programmé à cette date');

								</script>
							<?php

							}
								else{
							
							?>

							<div class="question">

							<?php 
								$query=mysqli_query($conn,"select * from prestation 
											where IdPres ='$prestation'")
								
								or die(mysqli_error($conn));

								$row=mysqli_fetch_array($query)
							?>
							

							<div class="alert alert-success">Vous avez choisi la prestation de :
								<strong><?php echo $row['LibellePres']; ?></strong> 
								à la date du <strong><?php echo  $date; ?></strong>
							</div>

							<form method="POST" action="yes.php">

							<input type="hidden" name="session_id1" value="<?php echo $session_id; ?>" >
							<input type="hidden" name="date1" value="<?php echo $date; ?>" >
							<input type="hidden" name="prestation1" value="<?php echo $prestation; ?>" >
							<input type="hidden" name="service1" value="<?php echo $service; ?>" >
							<input type="hidden" name="NumPiece1" value="<?php echo $NumPiece; ?>" >
							<input type="hidden" name="heure1" value="<?php echo $heure; ?>" >
							<input type="hidden" name="doc1" value="<?php echo $doc; ?>" >
							
							<!-- <input type="hidden" name="equal" value="<?php echo $equal; ?>" > -->

							<p>Êtes-vous sûr de vouloir fixer votre rendez-vous à cette date ?</p>


							<button name="yes" class="btn btn-success">
								<i class="icon-check icon-large"></i>
								&nbsp;
								  			Oui
							</button> &nbsp;  
								<a href="dasboard.php" class="btn">
								<i class="icon-remove"></i>&nbsp;
											Non
								</a>
							</form>
						
							</div>
							<br><br>
							
							<?php }}   ?> 

						<!-- fin de reservation -->
						
						<form class="form-horizontal" method="POST">

					<div class="control-group">
						<label class="control-label" for="inputPassword">Choix de la prestation</label>
						<div class="controls">

							<select name="prestation" style="width: 320px;"
							onchange="showService(this.value)" required >
								
							<option style="text-align:center" value="" selected>
							
							---------- sélectionner une prestation ----------
							</option>
							
							<?php 
								$query=mysqli_query($conn,"select * from prestation")
								
								or die(mysqli_error($conn));

								while($row=mysqli_fetch_array($query)){
							?>
							
							<option value="<?php echo $row['IdPres']; ?>">
								<?php echo $row['LibellePres'] ?>
							</option>

							<?php 
							
							} ?>

							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail">Service concerné</label>

						<div class="controls">
						<input type="text"  class="" name="service" id="sd" 
								style="border: 3px double #CCCCCC; width: 300px;" 
								readonly required />
						
						 </div>   <!--readonly="readonly" disabled="disabled" -->
						
						</div>

						<div class="control-group">
						<label class="control-label" for="inputPassword">Sélectionner une date</label>
						<div class="controls">

							<select name="date" style="width: 320px;" required>
		
							<option style="text-align:center" value="" selected>
							
							-------------- sélectionner une date --------------
							</option>
							<option>2022/04/24</option>
							<option>Lundi 09 Mai 2022</option>
							<option>Mardi 10 Mai 2022</option>
							<option>Jeudi 12 Mai 2022</option>
							<option>Vendredi 13 Mai 2022</option>
							
							</select>
						</div>
						</div>

						<div class="control-group">
						<label class="control-label" for="inputPassword">Sélectionner une heure</label>
						<div class="controls">

							<select name="heure" style="width: 320px;" required>

							<option style="text-align:center" value="" selected>
							
							-------------- sélectionner une heure --------------
							</option>

								<option>9h30 - 10h30</option>
								<option>11h30 - 12h30</option>
								<option>14h00 - 15h00</option>
								<option>15h00 - 15h45</option>
							
							</select>
						</div>
						</div>

						<div class="control-group">
						<label class="control-label" for="inputPassword">Nature pièce d'identité</label>
						<div class="controls">

							<select name="doc" style="width: 320px;" required>
								
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

						<div class="control-group">
						<label class="control-label" for="inputEmail">Numéro de pièce</label>

						<div class="controls">
						<input type="text"  class="" name="NumPiece"
						style="border: 3px double #CCCCCC; width: 300px;" required/>
						</div>
						
						</div>


						<div class="control-group">
						<div class="controls">
						<button type="submit" name="sub" class="btn btn-info">
							<i class="icon-check icon-large"></i>
							&nbsp;Valider</button>
						</div>
						</div>

						</form>
						
			</div>


						<div class="span3">
						<img src="img/32x32/facebook.png">
						<img src="img/32x32/twitter.png">
						<img src="img/32x32/rss.png">
						
							<ul class="nav nav-list">
							<div class="alert alert-danger"><li class="nav-header">NOTE</li></div>
							
							<li><i class="icon-stop icon-large"></i>
							&nbsp;Monsieur Mahamadou KEITA, le nouveau Directeur de la DTI</li>
							
						<!-- <?php 
						$note_query = mysqli_query($conn,"select * from note ")or die(mysqli_error($conn));
						$note_count =mysqli_num_rows($note_query);
						while($note_row = mysqli_fetch_array($note_query)){
						if ($note_count > 0){ ?>
						
						<li><i class="icon-stop icon-large"></i>&nbsp;<?php echo $note_row['message'] ?></li>
						<?php
						}  } 
						?> -->
						</ul>
						<br>
					
						
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
					document.getElementById("sd").value = this.responseText;
				}
				};
				xmlhttp.open("GET", "get_service.php?codePres=" + str, true);
				xmlhttp.send();
			}
			}
			</script>