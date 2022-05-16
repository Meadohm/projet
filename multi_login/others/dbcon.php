<?php
$conn = mysqli_connect('localhost','root','MySQL8@root','database');
if(!$conn){
	echo "Connection Failed: ".mysqli_error($conn);
	exit;

	
}
?>
