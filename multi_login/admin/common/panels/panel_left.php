        
        <script language="javascript" type="text/javascript">
			
			var timerID = null;
			var timerRunning = false;
			function stopclock (){
			if(timerRunning)
			clearTimeout(timerID);
			timerRunning = false;
			}
			function showtime () {
                
			var now = new Date();
			var hours = now.getHours();
			var minutes = now.getMinutes();
			var seconds = now.getSeconds()
			var timeValue = "" + ((hours >24) ? hours -24 :hours)
			if (timeValue == "0") timeValue = 24;
			timeValue += ((minutes < 10) ? ":0" : ":") + minutes
			timeValue += ((seconds < 10) ? ":0" : ":") + seconds
			// timeValue += (hours >= 24) ? " P.M." : " A.M."
			document.clock.face.value = timeValue;
			timerID = setTimeout("showtime()",1000);
			timerRunning = true;
			}
			function startclock() {
			stopclock();
			showtime();
			}
			window.onload=startclock;
			
		</SCRIPT>								          


    <div class="col-md-3">

            <p style='font-size:20px;'>
          
		        <form name="clock">
                    <div style='font-size:15px;'>

                    <strong>Il est :</strong>
		            &nbsp;<input type="submit" class="trans" name="face" value="">

                    </div>
			</form>

            </p>

            <span class="label_titre1">
                <i class='fa fa-calendar' style='font-size:18px;color:#5784BA;'></i>&nbsp;&nbsp;

        <?php
                                    
            $nom_jour_fr = array("Dimanche", "Lundi", "Mardi", 
                                "Mercredi", "Jeudi", "Vendredi", "Samedi");

            $mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", 
                                "août", "septembre", "octobre", "novembre", "décembre");

                            // on extrait la date du jour
            list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));

            echo $nom_jour_fr[$nom_jour].' '.$jour.' '.$mois_fr[$mois].' '.$annee;

        ?>

            </span><br/><br/>
        
            <div class="panel_left">

            <span class="label_titre1">
            <i class='fas fa-edit' style='font-size:18px; color:#5784BA;'></i>&nbsp;&nbsp;
            Tableau de bord&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/>
            <p>

                <div class="tab">

                    <button class="tablinks" onclick="openCity(event, 'accueil')" id="defaultOpen">
                        <i class="fas fa-home" style="font-size:13px;" aria-hidden="true"></i>
                            Accueil 
                        <i class='fas fa-caret-right' style='font-size:18px; margin-left:150px'></i>
                    </button>

                     <?php
                        $sql="SELECT * FROM rendez_vous WHERE CodeUs = '$session_id'";

                        $result=mysqli_query($conn,$sql);
                        
                        $rowcount=mysqli_num_rows($result);

                        mysqli_free_result($result);
                        
                        ?>


                    <button class="notification tablinks" onclick="openCity(event, 'rdvtoday')">
                        <i class="fas fa-address-book" style="font-size:13px;" aria-hidden="true"></i>
                             <span>Rdv d'aujourd'hui </span>
                             <span class="badge"><?php echo $rowcount;?></span>
                            
                        <i class='fas fa-caret-right' style='font-size:18px; margin-left:80px'></i>
                    </button>

                    <button class="tablinks" onclick="openCity(event, 'mesRdv')">
                        <i class="far fa-address-card" style="font-size:13px;" aria-hidden="true"></i>
                            Tous les rendez-vous
                        <i class='fas fa-caret-right' style='font-size:18px; margin-left:48px'></i>
                    </button>

                    <button class="tablinks" onclick="openCity(event, 'prestaServ')">
                        <i class="fas fa-bullhorn" style="font-size:13px;" aria-hidden="true"></i>
                            Prestations & Services
                        <i class='fas fa-caret-right' style='font-size:18px; margin-left:43px'></i>
                    </button>

                    <button class="tablinks" onclick="openCity(event, 'compte')">
                        <i class="far fa-user-circle" style="font-size:13px;" aria-hidden="true"></i>
                            Comptes et utilisateurs
                        <i class='fas fa-caret-right' style='font-size:18px; margin-left:35px'></i>
                    </button>

                    <button class="tablinks" onclick="openCity(event, 'membre')">
                        <i class="fa fa-users" style="font-size:13px;" aria-hidden="true"></i>
                            Membres
                        <i class='fas fa-caret-right' style='font-size:18px; margin-left:135px'></i>
                    </button>

                    <button class="tablinks" onclick="openCity(event, 'note')">
                        <i class="far fa-bell" style="font-size:13px;" aria-hidden="true"></i>
                            Nouvel information
                        <i class='fas fa-caret-right' style='font-size:18px; margin-left:65px'></i>
                    </button>
                    
                </div>
           
                
            </div>

    </div>