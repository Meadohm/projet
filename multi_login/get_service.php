<?php include('config.php'); ?>


<?php 
$codePres=$_GET['codePres'];
if($codePres){
	$query=mysqli_query($conn,"select * from prestation, service 
        where prestation.IdServ=service.IdServ and IdPres='$codePres'")	
	or die(mysqli_error($conn));

    $result=mysqli_fetch_array($query);

    // print_r($result);

    echo  $result['LibelleServ'];}

    // echo  mysqli_num_rows($query);
					
?>