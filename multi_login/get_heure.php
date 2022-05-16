<?php include('config.php'); ?>


                
        <option style="text-align:center" value="" selected>
                                        
            ---------- sélectionner une heure ----------
        </option>

    <?php 
    $codeJour=$_GET['codeJour'];

        $query=mysqli_query($conn,"select * from horaire_joursprestations, horaire
            where horaire_joursprestations.IdHoraire=horaire.IdHoraire 
            and IdJrsPres='$codeJour'")
        or die(mysqli_error($conn));

        while($row=mysqli_fetch_array($query)){
    ?>
            <option value="<?php echo $row['IdHoraireJrsPres']; ?>">
                <?php echo $row['LibelleHoraire'] ?>
            </option>
    <?php } 
					
    ?>