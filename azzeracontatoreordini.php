<?php 
session_start();
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}

if($_COOKIE['fabiowork']!="giliberti")
	{
header('Location: index.php');
die("restarting.."); 
}
 ?>	

<?php

$myfile = fopen("contatoreordini.dat", "w") or die("Unable to open file!");
$txt = "1";
$result=fwrite($myfile, $txt);
fclose($myfile);
echo "ok:".$result;
?>