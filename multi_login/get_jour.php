<?php include('config.php'); ?>


                
        <option style="text-align:center" value="" selected></option>
<?php 
$codePres=$_GET['codePres'];
if($codePres){
	$query=mysqli_query($conn,"select * from joursprestations, jour
        where joursprestations.IdJour=jour.IdJour and IdPres='$codePres'")
	or die(mysqli_error($conn));

    while($row=mysqli_fetch_array($query)){
    ?>
        <option value="<?php echo $row['IdJrsPres']; ?>">
            <?php echo $row['LibelleJour'] ?>
        </option>
    <?php } 
				
        }	
?>