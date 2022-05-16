<?php
 $w = 16; // Pour la 7 ème semaine à rechercher
 
// A voir pour l'année pour les numéros de semaines antérieures à la date
// courante


 
for($i = 1; $i <= 365; $i++) {

  $week = date("W", mktime(0, 0, 0, 1, $i, 2022));
  if($week == $w) {

    echo "Le jour " . $i . " est le premier jour de la semaine numéro : " . $w . "<br />";
    // Ensuite pour afficher tous les jours de la semaine
 
    for($d = 0; $d < 7; $d++) {

    	echo date("l d/m/Y", mktime(0, 0, 0, 1, $i+$d, 2022)) . "<br />";
    }
    break;
  }
}
?>