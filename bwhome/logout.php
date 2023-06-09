<?php
if(!isset($_SESSION['user']))header("Location:index.php");



//logout.php
include('includes/a_config.php');

//Reset OAuth access token
//$google_client->revokeToken();

//Desconexion //Destroy entire session data.
session_unset();
session_destroy();
setcookie("PHPSSESID","",time()-1,"/");
unset($_SESSION['usuario']);
unset($_SESSION['idUser']);


//redirect page to index.php
header('location:index.php');

?>
