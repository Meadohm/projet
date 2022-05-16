

<?php 
//         error_reporting(0);
// echo "date du jour en français : " ;
// // selon le serveur c'est fr ou fr_FR ou fr_FR.ISO8859-1 qui est correct.
// setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
// echo strftime("%A %d %B %Y.");

//Voici les deux tableaux des jours et des mois traduits en français
$nom_jour_fr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", 
		"septembre", "octobre", "novembre", "décembre");
        
// on extrait la date du jour
list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y"));
echo "date du jour en français : " ;
echo $nom_jour_fr[$nom_jour].' '.$jour.' '.$mois_fr[$mois].' '.$annee; 

/*pour les jours, il faut bien commencer par Dimanche, et pour les mois 
    il faut laisser la première case de vide car janvier = 1*/
?>