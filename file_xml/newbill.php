<?php
include '../newconf.php';
try {
	$isset_y = (isset($_REQUEST['y'])==true? "1":"0") ;
	
if($isset_y=="0" ) $_REQUEST['y']=date("Y");
else $year=$_REQUEST['y'];
$dbh=connect();
$sql2="SELECT nome, cognome,id from utente;";
if($debug==1) echo $sql2;
$result2=$dbh->query($sql2);
$result2=$result2->fetchAll();
$string="<clienti>"; 
$ismajor=0;
$classifica=array();
foreach ($result2 as $row) {

$sql="SELECT prezzo_tot from ordine WHERE id_utente_fk='{$row['id']}' AND data_ordine like '%$year%'";
$result=$dbh->query($sql);
$result=$result->fetchAll();
$tot=array();

if($debug==1) echo $sql;
		foreach ($result as $parz) {
			 $parz[0] = str_replace(",",".",  $parz[0]);
			 $parz[0]=number_format($parz[0], 3 , "." , "");

			$tot[]=$parz[0];

				}
$one=array_sum($tot);
$one=number_format($one, 3, ".", "");
//$one = str_replace("\.",",",  $one);
if($one>0) $ismajor+=1;
$string.="<cliente><nome>{$row['cognome']}</nome><tot>{$one}</tot><ismaj>{$ismajor}</ismaj></cliente>";
$classifica[]=$row['cognome'];
$classifica[$row['cognome']]=$one;
}
$string.="</clienti>";
// $xml = simplexml_load_string($string);
//if(empty($xml)) die("now");
if($debug==0) header('Content-type: text/xml');
// echo $xml->asXML();
echo $string;
}
catch (PDOException $e) {
   print "<br>ErrorTOTAL!: " . $e->getMessage() . "<br/>";
   die();
}
array_multisort($classifica, $ar2);
?>