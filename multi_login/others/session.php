<?php

//  session_start();

$session_id=$_SESSION['Code_Us'];


// Vérifiez si la variable de session SESS_MEMBER_ID est présente ou non

 if (!isset($_SESSION['Code_Us']) || (trim($_SESSION['Code_Us']) == '')) { 
    
?>

 <script>
    window.location = "../index.php";
 </script>
<?php

 }
 
 $session_id = $_SESSION['Code_Us'];
 ?>