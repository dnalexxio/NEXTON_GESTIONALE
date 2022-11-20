<?php
date_default_timezone_set('Europe/Paris');
session_start();
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}
$filenameale="contatoreordini.dat";

$myfile = fopen($filenameale, "r") or die("Unable to open file!");
echo fread($myfile,filesize($filenameale));
fclose($myfile);


echo "<h1>Happy New YEAR</h1>";
$myfile = fopen($filenameale, "w") or die("Unable to open file!");
$txt = "1";
if(fwrite($myfile, $txt)) {echo "RESETTED COUNTER";
fclose($myfile);}
else echo "COUNTER FILE NOT RESETTED";
?>