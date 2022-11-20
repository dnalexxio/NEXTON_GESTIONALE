<?php
include '../newconf.php';


 
try{
$dbh=connect();
$sql="SELECT * FROM fatture ";
if($_REQUEST['d']=="TUTTE") $_REQUEST['d']="";
if(!isset($_REQUEST['y'])) $_REQUEST['y']="2009";
$subs=substr($_REQUEST['y'],2);
if ($_REQUEST['d']!="") $sql.=" WHERE ditta LIKE '$_REQUEST[d]' AND trimestre like '%$subs'";
else $sql.="WHERE trimestre like '%$subs' ";

$result=$dbh->query($sql);
if (DEBUG!=0) echo $sql;
$dataset=$result->fetchAll();
$string="<fatture>";
if(!$dataset) $string.="<fattura><numero>non ci sono campi</numero></fattura>";
else{

foreach($dataset as $datas) {
$string.="<fattura><id>{$datas['id']}</id><numero>{$datas['numero']}</numero><data>{$datas['data']}</data><totale>{$datas['totale']}</totale><imponibile>{$datas['imponibile']}</imponibile><ditta>{$datas['ditta']}</ditta><trimestre>{$datas['trimestre']}</trimestre><pagato>{$datas['pagato']}</pagato></fattura>";
$tot+=$datas['imponibile'];
}
}
$string.="<totale>$tot</totale>";
$string.="</fatture>";

header('Content-type: text/xml');

echo $string;



} catch (PDOException $exc) { 
echo $sql;
print "<br>Error2!: " . $exc->getMessage() . "<br/>";  
die();
 }






?>