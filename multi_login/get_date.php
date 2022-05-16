<?php include('config.php'); ?>
 <option style="text-align:center" value="" selected></option>
 
 
 <?php
											
$nom_jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
$mois_fr = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");

                // on extrait la date du jour


?>

<?php
        
 $code_date=$_GET['code_date'];
$date = gmdate("Y")."-".gmdate("m")."-01";
$jourf= date("t", strtotime($date));
$addMonth = 1;

$i=mktime(0,0,0,gmdate("m"),gmdate("d"),gmdate("Y"));
$j=mktime(0,0,0,gmdate("m")+$addMonth,gmdate("d"),gmdate("Y"));


//$pas c'est 1 jour en time stamp
//$fin, c'est une semaine. En gros, on commencera la boucle à 0 et on testera
//les jours 1 par 1 jusqu'à arriver à la fin des 7 jours de la semaine.
$pas=60*60*24;
$fin=$i+(60*60*24*6);
//recherche du premier jour choisi de la période donnée
//si on tombe sur le bon, on sort de la boucle
$premier =0;
for($deb=$i; $deb<= $fin; $deb+=$pas)
{
 if(gmdate("N", $deb)==$code_date)
 {
  $premier=$deb;
  break;
 }
}
//ici, on a un pas de 7 jours, histoire de tomber tout le temps sur le même jour de la semaine.
//par exemple, on sort tous les mercredis de la période choisie.
$pas=60*60*24*7;
//récupération de tous les jours choisis pour la période donnée
?>
        <?php 
        $i=0;
for($premier; $premier <= $j; $premier+=$pas){
    $i+=1;
    $date=gmdate("d-m-Y", $premier);

   list($nom_jour, $jour, $mois, $annee) = explode('/', date("w/d/n/Y",$premier));
                        
    $date_lbl = $jour.' '.$mois_fr[$mois].' '.$annee;

    ?>
        <option value="<?php echo $date; ?>">
            <?php echo $date_lbl; ?>
        </option>
    <?php }
    if($i==0){ 
					
?> <option value="" selected>
    Aucun RDV pour ce jour
</option>
<?php }
        
?>