<?php
//
include('../newconf.php');
echo "bonifica";
if (!isset($_SESSION['logged'])) 
{
header('Location: ../index.php');
die("restarting.."); 
} 


?>