<?php

include '../newconf.php';
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}
$dbh=connect();
$year=$_REQUEST['y'];

try{

$string="";


if ($year=="totale") $year="";

if ($_REQUEST['art']=="" && $_REQUEST['cat']!="") {
//ale
$cod=$_SESSION['loggedid'];
$cat=$_REQUEST['cat'];
$string="<articolo><codice>1</codice>";
$sql="SELECT * from ordine where id_utente_fk='{$cod}' and ditta like '%$cat%'";
$result = $dbh->query($sql);
$result = $result->fetchAll();
foreach ($result as $parz) {
$sql3="SELECT * from ordine_cliente_prod WHERE codice_ordine='{$parz[codice_ordine]}' ";
$result2 = $dbh->query($sql3);
$result2 = $result2->fetchAll();
 	foreach ($result2 as $parz2)
{
 $string.="<name nome=\"$parz2[codice_prodotto] - $parz2[nome]\" ><qta>$parz2[qta]</qta><price>$parz2[prezzo_unit]</price><nomeprod>aaa</nomeprod><misura>{$parz['misura']}</misura><data>$parz[data_ordine] - $parz[trackno]</data><sconto>$parz2[sconto]</sconto><sconto2>$parz2[sconto2]</sconto2><sconto3>$parz2[sconto3]</sconto3></name>";
}
}

$string.="<ripe><totaleqta>0</totaleqta></ripe></articolo>";
//ale
}
else if (!isset($_REQUEST['art']) && !isset($_REQUEST['cat'])) $string="";
else 		{

$sql="SELECT * FROM ordine_cliente_prod WHERE codice_prodotto = '{$_REQUEST['art']}' AND categoria like '%{$_REQUEST['cat']}%'";
$result = $dbh->query($sql);
$result = $result->fetchAll();

$tot=array();
$string="<articolo><codice>{$_REQUEST['art']}</codice>";
foreach ($result as $parz) {
$sql3="SELECT id_utente_fk,data_ordine from ordine WHERE codice_ordine='{$parz['codice_ordine']}' ";
if ($_REQUEST['codcl']!="") $sql3.=" AND id_utente_fk ='{$_REQUEST['codcl']}'";
if ($debug!=0)  echo $sql3;
$result3 = $dbh->query($sql3);
$result3 = $result3->fetchAll();
$dataordine = $result3[0][1]; 
$result3=$result3[0];
if($_REQUEST['codcl']!="" && $_REQUEST['codcl']!=$result3['id_utente_fk']) continue;
if($year!="" && $year!=substr($dataordine,6)) continue;
$sql2="SELECT cognome from utente WHERE id='{$result3['id_utente_fk']}'";
$result2 = $dbh->query($sql2);
$result2 = $result2->fetchAll();
$result2= str_replace("\&","E",$result2);
$result2= str_replace(">","E",$result2);
$result2= str_replace("<","E",$result2);
$name=$result2[0]['cognome'];

$tot[]=$parz['qta'];
$string.="<name nome=\"$name\" id=\"$result3[id_utente_fk]\"><qta>{$parz['qta']}</qta>";
if($parz['newprice']!=NULL) $string.="<modif>{$parz['newprice']}</modif>";
$string.="<price>{$parz['prezzo_unit']}</price><misura>{$parz['misura']}</misura><nomeprod>{$parz['nome']}</nomeprod><data>$dataordine</data><sconto>$parz[sconto]</sconto><sconto2>$parz[sconto2]</sconto2><sconto3>$parz[sconto3]</sconto3></name>";
}

$one=array_sum($tot); //totale delle quantità

$string.="<ripe><totaleqta>$one</totaleqta></ripe></articolo>";
}

if ($debug==0) header('Content-type: text/xml');
echo $string;


} 
catch (PDOException $exc) { 
if ($debug==1){
print "<br>Error articoli.php!: " . $exc->getMessage() . "<br/>"; die();  
}
else { echo "<articoli></articoli>";die(); }
}
?>

