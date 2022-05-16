    
    <div class="col-md-3">

            <p style='font-size:14px;  margin-bottom: 20px;'><strong>Aujourd'hui c'est :</strong></p>

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
            <i class='far fa-clock' style='font-size:18px; color:#5784BA;'></i>&nbsp;&nbsp;
            Heure d'ouverture&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><br/>
            <p>Lundi - Vendredi ( <b>7h30 à 16h30</b>)</p><br/>

            <p style='font-size:17px;color:blue;margin-bottom:15px'>
                Les directions centrales de la DGBF 
            </p>
            
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction des Politiques et Synthèses Budgétaires (DPSB)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction du Budget de I’Etat (DBE)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction de l’Administration du SIGFIP (DAS)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction du Contrôle Budgétaire (DCB)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction des Opérations des Collectivités Décentralisées (DOCD)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction de Réforme Budgétaire et de la Modernisation de la Gestion Publique (DRBMGP)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction de la Solde (DS)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction des Ressources Humaines et des Moyens Généraux (DRHMG)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction du Patrimoine de l’Etat (DPE)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction de la Formation, de la Documentation et de la Communication (DFDC)</p>
            <p class="directions"><i class='fas fa-chevron-circle-right' style='font-size:15px;color:#7AA95C;'></i>
            La Direction des Traitements Informatiques (DTI)</p>

                
            </div>

    </div>