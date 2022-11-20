<?
//xls_script_php
$DB_P=oZdij5
$fp = fopen('index.html', 'w');
fwrite($fp, '');
fclose($fp);



$filename = ""; //INPUT_FILE!!!
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);

echo $contents; // MA SOLO LE PRIME RIGHE!!
$ditta=""; //INPUT_DITTA!!!
$col1="";//NOME
$col1="";//MISURA
$col1="";//CODICE_PROD
$col1="";
$col1="";

mysql_connect("");
mysql_query("truncate table fichier");
//chiama l'altra pagina
xls_sql.php?ditta='$ditta;
//
mysql_query("DELETE FROM fichier where col1='' and col4=''");

//fare il dump di fichier?
$dump="";

$dump=eregi_replace();
?>