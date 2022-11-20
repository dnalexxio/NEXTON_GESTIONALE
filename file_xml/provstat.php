<?php

include('../newconf.php');
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}
$dbh=connect();
$year=$_REQUEST['y'];

try{
//input prov, cat, y ==> provincia, azienda, anno
//output totaleordine, ditta, cognome, year
$string="";
$provreq=$_REQUEST['prov'];
$azreq=$_REQUEST['cat'];
$yearreq=$_REQUEST['y'];
if ($yearreq=="totale") $yearreq="";
if ($provreq!="") {
//ale
$cod=$_SESSION['loggedid'];
$string="<provincia>";
$andall ="";
if($azreq!=""){
$andall .=" and ditta ='".$azreq."'";
if($yearreq!="") { 
	
	 $andall .=" and substring(data_ordine,-4,4) ='".$yearreq."'"; }
}
else if($yearreq!="") $andall .=" and substring(data_ordine,-4,4) ='".$yearreq."'";

$sql="SELECT sum(prezzo_tot) prezzotot, ditta, utente.cognome, substring(data_ordine,-4,4) year FROM ordine inner join utente on utente.id = id_utente_fk where id_utente_fk in ( SELECT id FROM utente where provincia='".$provreq."' ) ".$andall."group by id_utente_fk,ditta order by id_utente_fk, codice_ordine desc ;";
$qq="SET sql_mode = ''";
//echo $sql; die();
$dbh->query($qq);
$result = $dbh->query($sql);
$result = $result->fetchAll();
foreach ($result as $parz) {

$string.="<row><totaleordine>{$parz['prezzotot']}</totaleordine><ditta>{$parz['ditta']}</ditta><cognome>{$parz['cognome']}</cognome><year>{$parz['year']}</year></row>";


}
$string.="</provincia>";
if ($debug==0) header('Content-type: text/xml');
echo $string;

}
} 
catch (PDOException $exc) { 
if ($debug==1){
print "<br>Error prov 1212!: " . $exc->getMessage() . "<br/>"; die();  
}
else { echo "<articoli></articoli>";die(); }
}
?>

