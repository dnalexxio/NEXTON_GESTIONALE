<?
include '../newconf.php';
try {
if($_REQUEST['y']=="") $_REQUEST['y']=date("Y");
$year=$_REQUEST['y'];
$dbh=connect();
$sql2="SELECT nome, cognome,id from utente;";

$result2=$dbh->query($sql2);
$result2=$result2->fetchAll();
$string="<clienti>"; 
foreach ($result2 as $row) {
$sql="SELECT prezzo_tot from ordine WHERE id_utente_fk='{$row['id']}' AND data_ordine like '%$year%'";
$result=$dbh->query($sql);
$result=$result->fetchAll();
$tot=array();

// echo $sql;
foreach ($result as $parz) {
 $parz[0] = str_replace(",",".",  $parz[0]);
 $parz[0]=number_format($parz[0], 3 , "." , "");

$tot[]=$parz[0];

}
$one=array_sum($tot);
$one=number_format($one, 3, ".", "");
//$one = str_replace("\.",",",  $one);
$string.="<cliente><nome>{$row['cognome']}</nome><tot>{$one}</tot></cliente>";

}
$string.="</clienti>";
// $xml = simplexml_load_string($string);
//if(empty($xml)) die("now");
header('Content-type: text/xml');
// echo $xml->asXML();
echo $string;
}
catch (PDOException $e) {
   print "<br>ErrorTOTAL!: " . $e->getMessage() . "<br/>";
   die();
}
?>